<?php
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 12/12/17
 * Time: 1:11 PM
 */

namespace App\Traits\ParserTraits;


use App\Helper\Api\Format\JSON;
use App\Helper\Api\Format\Serialize;

trait ParserHelperMethodTrait
{

    /**
     * JSON parser, helper function.
     * @param $payload
     * @return array
     * @throws \App\Exceptions\Api\ParserException
     */
    public function json($payload)
    {
        return $this->parse($payload, new JSON());
    }


    /**
     * @param array  $nestedArray
     * @param string $key
     * @return array
     */
    public function getKeyVal($nestedArray= [],$key='')
    {
        return array_column($nestedArray, $key);
    }

    /**
     * Serialized Data parser, helper function.
     * @param $payload
     * @return array
     * @throws \App\Exceptions\Api\ParserException
     */
    public function serialize($payload)
    {
        return $this->parse($payload, new Serialize());
    }

}