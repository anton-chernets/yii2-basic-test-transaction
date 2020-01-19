<?php


namespace app\components\requests;

class TransactionRequestXML extends RequestBase implements RequestStrategy
{
    /**
     * Тело запроса для проводки платежа
     *
     * @return string - Тело запроса
     * @throws \Exception
     */
    public function getPaymentCashRequest()
    {
        return '<?xml version="1.0" ?>
            <userInfo version="1.6">
                <firstName>'.$this->employer->getFirstName().'</firstName>
                <lastName>'.$this->employer->getLastName().'</lastName>
                <salary>'.$this->employer->getSalary().'</salary>
                <age>'.$this->employer->getAge().'</age>
                <creditScore>'.$this->employer->getCreditScore().'</creditScore>;
            </userInfo>';
    }
}