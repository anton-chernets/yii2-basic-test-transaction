<?php


namespace app\components;

use app\models\Employer;

class MementoEmployer
{
    private $data = [
        "firstName" => "Vasya",
        "lastName" => "Pupkin",
        "dateOfBirth" => "1984-07-31",
        "Salary" => "1000",
        "creditScore" => "good",
    ];

    public function getEmployer()
    {
        return new Employer(
            $this->data['firstName'],
            $this->data['lastName'],
            $this->data['dateOfBirth'],
            $this->data['Salary'],
            $this->data['creditScore']
        );
    }
}