<?php
namespace App\Traits\ParserTraits;
use InvalidArgumentException;

/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 12/12/17
 * Time: 1:09 PM
 */

trait FormatRegistrationTrait
{

    /**
     * Register Format Class.
     *
     * @param $format
     * @param $class
     *
     * @throws InvalidArgumentException
     *
     * @return self
     */
    public function registerFormat($format, $class)
    {
        if ( ! class_exists($class)) {
            throw new \InvalidArgumentException("Parser formatter class {$class} not found.");
        }
        if ( ! is_a($class, 'App\Helper\Api\Format\FormatInterface', true)) {
            throw new \InvalidArgumentException('Parser formatter must implement the App\Helper\Api\Format\FormatInterface interface.');
        }
        $this->supported_formats[$format] = $class;
        return $this;
    }

}