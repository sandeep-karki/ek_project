<?php
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 12/12/17
 * Time: 1:12 PM
 */

namespace App\Traits\ParserTraits;


trait ConstructionMethodTrait
{

    /**
     * Return a value from the array identified from the key.
     *
     * @param $key
     * @param $data
     * @return mixed
     */
    private function getValueAtKey($key, $data)
    {
        $keys = explode('.', $key);
        while (count($keys) > 1) {
            $key = array_shift($keys);
            // Wildcard Key
            if (preg_match($this->wildcards, $key) && is_array($data) && ! empty($data)) {
                // Shift the first item of the array
                if (preg_match('/^:(index|item)\[\d+\]$/', $key)) {
                    for ($x = substr($key, 7, -1); $x >= 0; $x--) {
                        if (empty($data)) {
                            return false;
                        }
                        $item = array_shift($data);
                    }
                } elseif ($key == ':last') {
                    $item = array_pop($data);
                } else {
                    $item = array_shift($data);
                }
                $data =& $item;
            } else {
                if ( ! isset($data[$key]) || ! is_array($data[$key])) {
                    return false;
                }
                $data =& $data[$key];
            }
        }
        // Return value
        $key = array_shift($keys);
        if (preg_match($this->wildcards, $key)) {
            if (preg_match('/^:(index|item)\[\d+\]$/', $key)) {
                for ($x = substr($key, 7, -1); $x >= 0; $x--) {
                    if (empty($data)) {
                        return false;
                    }
                    $item = array_shift($data);
                }
                return $item;
            } elseif ($key == ':last') {
                return array_pop($data);
            }
            return array_shift($data); // First Found
        }
        return ($data[$key]);
    }
    /**
     * Array contains a value identified from the key, returns bool
     *
     * @param $key
     * @param $data
     * @return bool
     */
    private function hasValueAtKey($key, $data)
    {
        $keys = explode('.', $key);
        while (count($keys) > 0) {
            $key = array_shift($keys);
            // Wildcard Key
            if (preg_match($this->wildcards, $key) && is_array($data) && ! empty($data)) {
                // Shift the first item of the array
                if (preg_match('/^:(index|item)\[\d+\]$/', $key)) {
                    for ($x = substr($key, 7, -1); $x >= 0; $x--) {
                        if (empty($data)) {
                            return false;
                        }
                        $item = array_shift($data);
                    }
                } elseif ($key == ':last') {
                    $item = array_pop($data);
                } else {
                    $item = array_shift($data);
                }
                $data =& $item;
            } else {
                if ( ! isset($data[$key])) {
                    return false;
                }
                if (is_bool($data[$key])) {
                    return true;
                }
                if ($data[$key] === '') {
                    return false;
                }
                $data =& $data[$key];
            }
        }
        return true;
    }
    /**
     * Build the array structure for value.
     *
     * @param $route
     * @param null $data
     * @return array|null
     */
    private function buildArray($route, $data = null)
    {
        $key  = array_pop($route);
        $data = [$key => $data];
        if (count($route) == 0) {
            return $data;
        }
        return $this->buildArray($route, $data);
    }
    /**
     * Remove a value identified from the key
     *
     * @param $array
     * @param $key
     */
    private function removeValue(&$array, $key)
    {
        $keys = explode('.', $key);
        while (count($keys) > 1) {
            $key = array_shift($keys);
            if ( ! isset($array[$key]) || ! is_array($array[$key])) {
                return;
            }
            $array =& $array[$key];
        }
        unset($array[array_shift($keys)]);
    }

}