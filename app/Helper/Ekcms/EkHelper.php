<?php
namespace App\Helper\Ekcms;

use App\User;
use Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Mail;

class EkHelper {

    /**
     * @param $items
     * @param $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginateCollection($items, $perPage)
    {
        if(is_array($items)){
            $items = collect($items);
        }

        return new \Illuminate\Pagination\LengthAwarePaginator(
            $items->forPage(\Illuminate\Pagination\Paginator::resolveCurrentPage() , $perPage),
            $items->count(), $perPage,
            \Illuminate\Pagination\Paginator::resolveCurrentPage(),
            ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
        );
    }

    public function encode($value)
    {
        $data = HashEncodePrefix::PREFIX.$value;
        return base64_encode($data);
    }

    public function changeDateFormat($value)
    {
        $carbonDate = Carbon::parse($value);
        $carbonDate->format('jS M, Y H:i');
        return $carbonDate;
    }

    public function decode($value)
    {
        $data = base64_decode($value);
        $result = explode(HashEncodePrefix::PREFIX,$data);
        if (isset($result[1])) {
            return $result[1];
        } else {
            return $result;
        }

    }


    public function sendEmail($modelPath,$emailData)
    {
        try {
            Mail::send(['html' => $modelPath], array('text' => $emailData['message']), function ($message) use ($emailData) {

                $message->from($emailData['from']);
                $message->to($emailData['email'])->subject($emailData['subject']);
            });
            return true;
        } catch (\Swift_TransportException $exception) {
            return $exception->getMessage();
        }
    }


    /**
     * @return string
     */
    public function getAuthUserId()
    {
        if(null !== Auth::user())
        {
            return Auth::user()->id;
        }else{
            return "";
        }
    }

    public function getUsernameForAudit($id)
    {
        $user = User::find($id);
        if($user !== null)
        {
            return $user->username;
        }else{
            return null;
        }

    }

    /**
     * @param $time
     * @return string
     */
    public function convertDateTime($time)

    {
        if(!empty($time)){
            $dt = new \DateTime($time);
            $tz = new \DateTimeZone(TIMEZONE);
            $dt->setTimezone($tz);
            return  $dt->format('Y-m-d H:i:s');
        }
    }


    /**
     * @param $time
     * @return string
     */
    public function convertDate($time)

    {
        if(!empty($time)){
            $dt = new \DateTime($time);
            $tz = new \DateTimeZone('America/Chicago');
            $dt->setTimezone($tz);
            return  $dt->format('Y-m-d');
        }
    }


    /**
     * @param int    $length
     * @param bool   $add_dashes
     * @param string $available_sets
     * @return bool|string
     */
    public function randomPassword($length = 6, $add_dashes = false, $available_sets = 'luds') {
        $sets = array();
        if(strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if(strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if(strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if(strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';
        $all = '';
        $password = '';
        foreach($sets as $set)
        {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];
        $password = str_shuffle($password);
        if(!$add_dashes)
            return $password;
        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while(strlen($password) > $dash_len)
        {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }

    /**
     * @param     $number
     * @param int $precision
     * @return float|int
     */
    public function round_up($number, $precision = 2)
    {
        $fig = pow(10, $precision);
        return (ceil($number * $fig) / $fig);
    }

    /**
     * @param $number
     * @param $decimal
     * @return bool|float|string
     */
    public function roundNumber($number, $decimal)
    {
        $whole = (int) $number;
        $frac = $number - $whole;
        if($frac == 0)
        {
            return $number;
        }
        $fraction = round($number - $whole, 10);
        $removedot = str_replace('.', '',(string)$fraction);
        $fractionstring = (string)$fraction;
        $fractionstring[0] =substr($fractionstring,1);
        $removedot = str_replace('.', '',$fractionstring);
        $removedot =str_replace('', '',$removedot);
        $length = strlen($removedot);
        for($i=$length-1; $i>$decimal; $i--)
        {
            //var_dump($i.' value of the number '. $removedot[$i]);
            if($removedot[$i]>=5)
            {
                //var_dump($removedot[$decimal]. '<br/>');
                if($removedot[$decimal] == 9)
                {
                    continue;
                }
                if($removedot[$i] == 9)
                {
                    if(isset($removedot[$i-2]))
                    {
                        $removedot[$i] =0;
                        $removedot[$i-1] =$removedot[$i-1] + 1;
                    }
                }
                else
                {
                    $removedot[$i-1] = $removedot[$i-1] + 1;
                }
            }
        }
        $addednumber = $whole.'.'.$removedot;
        $wholedigitlen = strlen((string)$whole);
        $result = substr($addednumber,0,$wholedigitlen+2+$decimal);
        $result = self::tofloat($result);
        return $result;

    }


    /**
     * @param $num
     * @return float
     */
    public function tofloat($num) {
        $dotPos = strrpos($num, '.');
        $commaPos = strrpos($num, ',');
        $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
            ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);
        if (!$sep) {
            return floatval(preg_replace("/[^0-9]/", "", $num));
        }
        return floatval(
            preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
            preg_replace("/[^0-9]/", "", substr($num, $sep+1, strlen($num)))
        );
    }


    /**
     * @param $a
     * @param $b
     * @return string
     */
    public function bcsubstract($a,$b){

        return bcsub((string)$a,(string)$b,18);
    }

    /**
     * @param $a
     * @param $b
     * @return string
     */
    public function bcaddition($a,$b){

        return bcadd((string)$a,(string)$b,18);
    }


    /**
     * @return mixed
     */
    public function getCountries()
    {

        $client = new Client();
        $response = $client->get('https://restcountries.eu/rest/v2/all');
        $countries = \GuzzleHttp\json_decode($response->getBody()->getContents());
        return $this->transformCountries($countries);


    }

    protected function transformCountries($countries){

        $transformed_countries = [];
        foreach($countries as $key=> $country){
            $transformed_countries[$key]['name'] = $country->name;
            $transformed_countries[$key]['alpha_code'] = $country->alpha2Code;
            $transformed_countries[$key]['alpha_code_3'] = $country->alpha3Code;
            $transformed_countries[$key]['native_name'] = $country->nativeName;
            $transformed_countries[$key]['alternate_spellings'] =json_encode($country->altSpellings);
        }

        return $transformed_countries;

    }

    public static function uploadImage($file=null,$path=null,$height=null,$width=null)
    {

        $image = $file;
        $paths = public_path().$path;
        if(is_dir($paths)!=true){
            \File::makeDirectory($paths, $mode = 0755, true);
        }
        $filename = uniqid().'.'.$file->getClientOriginalExtension();

        $img = \Image::make($image->getRealPath());

        $img->resize($img->width(), $img->height(), function($constraint)
        {
            $constraint->aspectRatio();
        });

        $img->save($paths.'/'.$filename);

        return $filename;

    }






}