<?php


namespace app\models;

use Yii;

class Employer extends Human
{
    private $salary;
    private $creditScore;

    /**
     * @param $firstName
     * @param $lastName
     * @param $dateOfBirth
     * @param $salary
     * @param $creditScore
     */
    public function __construct($firstName, $lastName, $dateOfBirth, $salary, $creditScore)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->salary = $salary;
        $this->dateOfBirth = $dateOfBirth;
        $this->creditScore = $creditScore;
    }

    /**
     * @return string
     */
    public function getSalary()
    {
        return  $this->salary;
    }

    /**
     * @return mixed | integer
     */
    public function getCreditScore()
    {
        return Yii::$app->mementoCreditScores->getCreditScore($this->creditScore);
    }

    /**
     * @return mixed | integer
     */
    public function getCreditScoreName()
    {
        return $this->creditScore;
    }
}