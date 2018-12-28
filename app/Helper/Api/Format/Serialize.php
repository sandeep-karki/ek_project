<?php
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 12/12/17
 * Time: 12:33 PM
 */

namespace App\Helper\Api\Format;


use App\Exceptions\Api\ParserException;

class Serialize implements FormatInterface
{
    /**
     * Parse Payload Data
     * @param string $payload
     * @throws ParserException
     * @return array
     */
    public function parse($payload)
    {
        if ($payload) {
            try {
                return unserialize(trim($payload));
            } catch (\Exception $ex) {
                throw new ParserException('Failed To Parse Serialized Data');
            }
        }
        return [];
    }
}