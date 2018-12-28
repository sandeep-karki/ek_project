<?php
namespace App\Helper\Api;
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 12/12/17
 * Time: 11:38 AM
 */

use App\Helper\Api\Format\FormatInterface;
use App\Traits\ParserTraits\ConstructionMethodTrait;
use App\Traits\ParserTraits\FormatRegistrationTrait;
use App\Traits\ParserTraits\ParserHelperMethodTrait;

/**
 * Class Parser
 * @package App\Helper\Api
 */
class Parser
{
 use ConstructionMethodTrait, ParserHelperMethodTrait, FormatRegistrationTrait;

    /**
     * @var string
     */
    private $wildcards = '/^(\*|%|:first|:last|:(index|item)\[\d+\])$/';

    /**
     * @var array Supported Formats
     */
    private $supported_formats = [

        'application/json'         => 'App\Helper\Api\Format\JSON',
        'application/x-javascript' => 'App\Helper\Api\Format\JSON',
        'text/javascript'          => 'App\Helper\Api\Format\JSON',
        'text/x-javascript'        => 'App\Helper\Api\Format\JSON',
        'text/x-json'              => 'App\Helper\Api\Format\JSON',
        'json'                     => 'App\Helper\Api\Format\JSON',

    ];


    /**
     * get payload with exact keymatch
     * @param $keys
     * @return array
     * @throws \App\Exceptions\Api\ParserException
     */
    public function filterBy($keys)
    {
        $keys = is_array($keys) ? $keys : func_get_args();
        $results = [];
        foreach ($keys as $key) {
            $results = array_merge_recursive($results, $this->buildArray(explode('.', $key), $this->get($key)));
        }
        return $results;
    }

    /**
     * get all payload exclude the keyword
     * @param $keys
     * @return array
     * @throws \App\Exceptions\Api\ParserException
     */
    public function exclude($keys)
    {
        $keys = is_array($keys) ? $keys : func_get_args();
        $results = $this->payload();
        foreach ($keys as $key) {
            $this->removeValue($results, $key);
        }
        return $results;
    }

    /**
     * check if the payload contain certain keys
     * @param $keys
     * @return bool
     * @throws \App\Exceptions\Api\ParserException
     */
    public function contain($keys)
    {
        $keys = is_array($keys) ? $keys : func_get_args();
        $results = $this->payload();
        foreach ($keys as $value) {
            if ($this->hasValueAtKey($value, $results) === false) {
                return false;
            }
        }
        return true;
    }


    /**
     * get specific item from payload
     * @param null  $key
     * @param array $default
     * @return array|mixed
     * @throws \App\Exceptions\Api\ParserException
     */
    public function get($key = null, $default = [])
    {
        if ($this->contain($key)) {
            return $this->getValueAtKey($key, $this->payload());
        }
        return $default;
    }

    public function replaceDashes (&$obj) {
        $vars = get_object_vars($obj);
        foreach ($vars as $key => $val) {
            if (strpos($key, "-") !== false) {
                $newKey = str_replace("-", "_", $key);
                $obj->{$newKey} = $val;
                unset($obj->{$key});
            }
        }
        return (array)$obj;
    }


    /**
     * @param string $format
     * @return array
     * @throws \App\Exceptions\Api\ParserException
     */
    public function payload($format = '')
    {
        $class = $this->getFormatClass($format);
        return $this->parse($this->getPayload(), new $class);
    }

    /**
     * return whole payload
     * @return array
     * @throws \App\Exceptions\Api\ParserException
     */
    public function all()
    {
        return $this->payload();
    }


    /**
     * Autodetect the payload data type using content-type value.
     * @param string $format
     * @return String|name of format class
     */
    public function getFormatClass($format = '')
    {
        if ( ! empty($format)) {
            return $this->processContentType($format);
        }
        if (isset($_SERVER['CONTENT_TYPE'])) {
            $type = $this->processContentType($_SERVER['CONTENT_TYPE']);
            if ($type !== false) {
                return $type;
            }
        }
        if (isset($_SERVER['HTTP_CONTENT_TYPE'])) {
            $type = $this->processContentType($_SERVER['HTTP_CONTENT_TYPE']);
            if ($type !== false) {
                return $type;
            }
        }
        return 'App\Helper\Api\Format\JSON';
    }


    /**
     * Process the content-type values
     * @param $contentType
     * @return bool|mixed
     */
    private function processContentType($contentType)
    {
        foreach (explode(';', $contentType) as $type) {
            $type = strtolower(trim($type));
            if (isset($this->supported_formats[$type])) {
                return $this->supported_formats[$type];
            }
        }
        return false;
    }


    /**
     * Return the payload data from the HTTP post request.
     *
     * @codeCoverageIgnore
     *
     * @return string
     */
    protected function getPayload()
    {
        return file_get_contents('php://input');
    }

    /**
     * @param                 $payload
     * @param FormatInterface $format
     * @return array
     * @throws Format\ParserException
     */
    public function parse($payload, FormatInterface $format)
    {
        return $format->parse($payload);
    }



}