<?php
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 12/13/17
 * Time: 4:14 PM
 */

namespace App\Helper\Ekcms\Facade;

use Illuminate\Support\Facades\Facade;


class EkHelper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'EkHelper'; }
}