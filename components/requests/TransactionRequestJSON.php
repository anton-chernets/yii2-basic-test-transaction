<?php


namespace app\components\requests;

use yii\helpers\Json;

class TransactionRequestJSON extends RequestBase implements RequestStrategy
{
    /**
     * Тело запроса для проводки платежа
     *
     * @return string - Тело запроса
     * @throws \Exception
     */
    public function getPaymentCashRequest()
    {
        return Json::encode(array(
            "userInfo" => [
                "firstName" => $this->employer->getFirstName(),
                "lastName" => $this->employer->getLastName(),
                "dateOfBirth" => $this->employer->getDateOfBirth(),
                "Salary" => $this->employer->getSalary(),
                "creditScore" => $this->employer->getCreditScoreName()
            ]
        ));
    }
}