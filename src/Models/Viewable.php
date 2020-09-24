<?php

namespace Shuaau\SimpleViewable\Models;

use Illuminate\Database\Eloquent\Model;

class Viewable extends Model
{

    protected $guarded = [];

    protected $dates = [
        'expiration_date'
    ];

    public function viewable() {
        return $this->morphTo();
    }
}
