<?php
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 12/12/17
 * Time: 11:42 AM
 */

namespace App\Helper\Api\Format;


interface FormatInterface
{
    /**
     * Parse Payload Data
     *
     * @param string $payload
     *
     * @throws ParserException
     *
     * @return array
     */
    public function parse($payload);
}