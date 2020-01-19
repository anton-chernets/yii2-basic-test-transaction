<?php


namespace app\components;

use yii\base\InvalidConfigException;

class MementoCreditScores
{
    public $map = [];

    /**
     * @param $soreName
     * @return mixed
     * @throws InvalidConfigException
     */
    public function getCreditScore($soreName)
    {
        if (array_key_exists($soreName, $this->map))
            return $this->map[$soreName];
        else
            throw new InvalidConfigException();
    }
}