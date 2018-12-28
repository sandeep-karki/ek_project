<?php
namespace App\Helper\Api\Format;
use App\Exceptions\Api\ParserException;

/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 12/12/17
 * Time: 11:41 AM
 */

class JSON implements FormatInterface
{
    /**
     * Parse Payload Data
     *
     * @param string $payload
     *
     * @throws ParserException
     * @return array
     *
     */
    public function parse($payload)
    {
        if ($payload) {
            $json = json_decode(trim($payload), true);
            if ( ! $json) {
                throw new ParserException('Failed To Parse JSON');
            }
            return $json;
        }
        return [];
    }



}