<?php


abstract class Model
{
    public function hydrate(array $_param = [])
    {
        foreach ($this as $key=>$value) {
            if (array_key_exists($key, $_param)) {
                $this->{$key} = $_param[$key];
            }
        }
    }

    function __construct(array $_data = [])
    {
        $this->hydrate($_data);
    }

    public function toArray(array $_toIgnore = [])
    {
        $result = [];

        foreach ($this as $key => $value) {
            if (!in_array($key, $_toIgnore)) {
                $result[$key] = $value;
            }
        }
        return $result;
    }
}
