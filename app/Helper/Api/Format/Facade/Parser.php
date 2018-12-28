<?php
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 12/13/17
 * Time: 4:14 PM
 */

namespace App\Helper\Api\Facade;

use Illuminate\Support\Facades\Facade;


class Parser extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'EkParser'; }
}