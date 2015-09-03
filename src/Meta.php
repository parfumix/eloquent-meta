<?php

namespace Eloquent\Meta;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model {

    public $table = 'meta';

    public $fillable = ['metaable_id', 'metaable_type', 'key', 'value'];

    public function metaable() {
        return $this->morphTo();
    }

}