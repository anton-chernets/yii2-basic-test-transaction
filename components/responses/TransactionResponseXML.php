<?php

namespace app\components\responses;

/**
 * Обработчик ответа о транзакции
 *
 * Class TransactionResponseXML
 * @package components\responses
 */
class TransactionResponseXML extends ResponseAbstract
{
    const CODE_SUCCESS = '1';
    const CODE_FAILED = '0';

    const CODE_SUCCESS_DESCRIPTION = 'SUCCESS';
    const CODE_REJECT_DESCRIPTION = 'REJECT';
    const CODE_ERROR_DESCRIPTION = 'ERROR';

    private $returnCode;
    private $transactionId;
    private $returnCodeDescription;
    private $returnError = '';

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

    public function isSuccess()
    {
        return $this->returnCode === self::CODE_SUCCESS
            and $this->returnCodeDescription === self::CODE_SUCCESS_DESCRIPTION;
    }

    public function isReject()
    {
        return $this->returnCode === self::CODE_FAILED
            and $this->returnCodeDescription === self::CODE_REJECT_DESCRIPTION;
    }

    public function isError()
    {
        return $this->getReturnCode() === self::CODE_FAILED
            and $this->getReturnCodeDescription() === self::CODE_ERROR_DESCRIPTION;
    }

    public function getErrorMessage()
    {
        return $this->returnError;
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @return string
     */
    public static function simulateSuccess()
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
            <userInfo version="1.6">
                <returnCode>1</returnCode>
                <returnCodeDescription>SUCCESS</returnCodeDescription>
                <transactionId>AC158457A86E711D0000016AB036886A03E7</transactionId>
            </userInfo>';
    }

    /**
     * @return string
     */
    public static function simulateReject()
    {
         return '<?xml version="1.0" encoding="UTF-8"?>
            <userInfo version="1.6">
                <returnCode>0</returnCode>
                <returnCodeDescription>REJECT</returnCodeDescription>
            </userInfo>';
    }

    /**
     * @return string
     */
    public static function simulateError()
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
            <userInfo version="1.6">
                <returnCode>0</returnCode>
                <returnCodeDescription>ERROR</returnCodeDescription>
                <returnError>Lead not Found</returnError>
            </userInfo>';
    }

    /**
     * @return string
     */
    private function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * @return mixed
     */
    private function getReturnCodeDescription()
    {
        return $this->returnCodeDescription;
    }
}