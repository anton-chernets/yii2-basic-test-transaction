<?php


namespace app\models;

use DateTime;

class Human
{
    public $firstName;
    public $lastName;
    protected $dateOfBirth;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return  $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return  $this->lastName;
    }

    /**
     * @return string
     */
    public function getDateOfBirth()
    {
        return  $this->dateOfBirth;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getAge()
    {
        $datetimeBirth = new DateTime($this->dateOfBirth);

        $datetimeNow = new DateTime();

        $diff = $datetimeBirth->diff($datetimeNow);

        return $diff->y;
    }
}