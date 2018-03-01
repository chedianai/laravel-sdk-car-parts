<?php
/**
 * Created by PhpStorm.
 * User: keal
 * Date: 2018/2/28
 * Time: 下午11:49
 */

namespace Chedianai\LaravelCarParts;

use Illuminate\Support\Facades\Facade as LaravelFacade;

class Facade extends LaravelFacade
{
    /**
     * 默认为 Server.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'chedianai.carparts';
    }

    public static function CarPart()
    {
        return app('chedianai.carparts');
    }
}