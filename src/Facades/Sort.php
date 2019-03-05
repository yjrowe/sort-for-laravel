<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/5
 * Time: 10:33
 */
namespace Aex\Sort\Facades;

use Illuminate\Support\Facades\Facade;

class Sort extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sort';
    }
}