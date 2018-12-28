<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GameResult extends Model
{
    protected $table = "game_results";
    protected $fillable = ['id','user_id','prize_id','date','code','bill_number','status','ip_address','latitude','longitude'];


    public function getAllData($data=array()){
        $gameResult = GameResult::query();
        if(isset($data['keywords'])) {
            $gameResult = GameResult::whereHas('ApiUser', function ($query) use ($data) {
                $query
                    ->whereRaw(" LOWER(CONCAT_WS(' ', name,date,code,status,ip_address,latitude,longitude)) LIKE LOWER('%" . (trim($data['keywords'])) . "%')");
            })->whereHas('Prize', function ($query) use ($data) {
                $query
                    ->orwhereRaw(" LOWER(CONCAT_WS(' ',user_id,title,date,code,status,ip_address,latitude,longitude)) LIKE LOWER('%" . (trim($data['keywords'])) . "%')");

            });

        }

        return $gameResult->orderBy('created_at','desc')->paginate(20);
    }


    public function getTotalPrizeDistributon(){
        $gameResult = GameResult::query();
        return $gameResult->whereHas('Prize', function ($query) {
            $query->where('title','!=','Try Again');
        })->count();
    }

    public function coutAsPerPrize(){

//        return  DB::table('game_results')
//
//            ->select('prize_id', DB::raw('count(*) as total'))
//            ->groupBy('prize_id')
//            ->pluck('total','prize_id');
//
        return $users = DB::table('game_results')
            ->leftJoin('prizes', 'game_results.prize_id', '=', 'prizes.id')
            ->select('prizes.title', DB::raw('count(*) as total'))
            ->groupBy('prizes.title')
            ->pluck('total','prizes.title')->toArray();
    }

    public function GamePlayedCount(){
        return $orderbydate = DB::table('game_results')
            ->select(array(DB::Raw('count(*) as total'),DB::Raw('DATE(date) as date')))
            ->groupBy(DB::Raw('DATE(date)'))
            ->pluck('total','date')->toArray();
    }


    public function ApiUser(){

        return $this->belongsTo('App\ApiUser','user_id');
    }

    public function Prize(){

        return $this->belongsTo('App\Prizes','prize_id');
    }
}
