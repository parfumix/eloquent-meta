<?php

namespace Eloquent\Meta;

trait MetaTrait {

    public function meta() {
        return $this->morphMany(Meta::class, 'metaable');
    }

    /**
     * Sync meta .
     *
     * @param array $meta
     * @return mixed
     */
    public function syncMeta(array $meta) {

    }

    /**
     * Remove meta by key / keys .
     *
     * @param $key
     * @return mixed
     */
    public function removeMeta($key) {
        if(! is_array($key))
            $key = (array)$key;

        $this->meta()
            ->whereIn('key', $key)
            ->delete();
    }
}