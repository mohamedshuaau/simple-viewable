<?php

namespace Shuaau\SimpleViewable\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Shuaau\SimpleViewable\Models\Viewable;

trait ViewableModel {

    /**
     * @return MorphMany
     */
    public function views(): MorphMany {
        return $this->morphMany(Viewable::class, 'viewable');
    }

}
