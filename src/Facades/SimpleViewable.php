<?php

namespace Shuaau\SimpleViewable\Facades;

use Illuminate\Support\Facades\Facade;

class SimpleViewable extends Facade {


    /**
     * @method \Shuaau\SimpleViewable\SimpleViewable view($model)
     * @method \Shuaau\SimpleViewable\SimpleViewable unique($model)
     * @method \Shuaau\SimpleViewable\SimpleViewable expires($model, $date)
     * @method \Shuaau\SimpleViewable\SimpleViewable count($model)
     * @method \Shuaau\SimpleViewable\SimpleViewable countUnique($model)
     * @method \Shuaau\SimpleViewable\SimpleViewable countFrom($model, $from)
     * @method \Shuaau\SimpleViewable\SimpleViewable countUniqueFrom($model, $from)
     * @method \Shuaau\SimpleViewable\SimpleViewable countBetween($model, $from, $to)
     * @method \Shuaau\SimpleViewable\SimpleViewable countUniqueBetween($model, $from, $to)
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'SimpleViewable';
    }

}
