<?php

namespace Eloquent\Meta;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model {

    /**
     * primaryKey
     *
     * @var integer
     * @access protected
     */
    protected $primaryKey = array('metaable_id','metaable_type','key');

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    public $table = 'meta';

    /**
     * @var array
     */
    public $fillable = ['metaable_id', 'metaable_type', 'key', 'value'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function metaable() {
        return $this->morphTo();
    }

}