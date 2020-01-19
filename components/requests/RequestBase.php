<?php


namespace app\components\requests;

use Yii;
use app\models\Employer;

class RequestBase
{
    const FORMAT_JSON = 'json';
    const FORMAT_XML = 'xml';

    /** @var Employer $employer */
    protected $employer;

    public function __construct()
    {
        $this->employer = Yii::$app->mementoEmployer->getEmployer();
    }
}