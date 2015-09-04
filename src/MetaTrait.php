<?php

namespace Eloquent\Meta;

trait MetaTrait {

    /**
     * Get all the meta for current user .
     *
     * @return mixed
     */
    public function meta() {
        return $this->morphMany($this->metaClass(), 'metaable');
    }

    /**
     * Sync meta .
     *
     * @param array $meta
     * @return mixed
     *
     */
    public function syncMeta(array $meta) {
        $dbMeta = $this->meta()->lists('value', 'key')
            ->toArray();

        $toInsert = array_diff_key($meta, $dbMeta);
        $toDelete = array_diff_key($dbMeta, $meta);
        $toUpdate = array_diff_key($meta, array_merge($toInsert, $toDelete));

        array_walk($toInsert, function($value, $key)  {
            $this->meta()->saveMany([
                new Meta([
                    'key' => $key,
                    'value' => $value,
                ])
            ]);
        });

        array_walk($toDelete, function() {
            $this->meta()
                ->where('key', func_get_arg(1))
                ->delete();
        });

        array_walk($toUpdate, function($value, $key) {
            $meta = $this->meta()
                ->where('key', $key)
                ->first();

            if( isset($meta) )
                $meta->fill(['value' => $value])
                    ->save();
        });

        return $this;
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

        if($key[0] == '*')
            $this->meta()
                ->delete();

        $this->meta()
            ->whereIn('key', $key)
            ->delete();
    }

    /**
     * Get meta class.
     *
     * @return mixed
     */
    protected function metaClass() {
        return isset($this['metaClass']) ? $this['metaClass'] : Meta::class;
    }
}