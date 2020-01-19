<?php

namespace app\components\responses;

trait ResponseAbstractTrait
{
    /**
     * @param ResponseAbstract $object
     * @param $data
     * @return ResponseAbstract
     */
    public function buildObject(ResponseAbstract $object, $data)
    {
        foreach($data as $key => $value) {
            $key = lcfirst($key);
            if(property_exists($object, $key)) {
                $object->{$key} = $value;
            }
        }

        return $object;
    }
}