<?php

namespace Eloquent\Meta;

interface MetaAble {

    /**
     * Sync meta .
     *
     * @param array $meta
     * @return mixed
     */
    public function syncMeta(array $meta);

    /**
     * Remove meta by key / keys .
     *
     * @param $key
     * @return mixed
     */
    public function removeMeta($key);
}