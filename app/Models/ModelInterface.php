<?php

namespace App\Models;

/**
 *
 */
interface ModelInterface
{

    /**
     * Return data in JSON
     *
     * @var mixed
     * @return JSON
     */
    public static function return($data);

}
