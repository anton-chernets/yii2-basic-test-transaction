<?php


namespace app\components\responses;

/**
 * Обработчик ответа о транзакции
 *
 * Class TransactionResponseJson
 * @package components\responses
 */
class TransactionResponseJson extends ResponseAbstract
{
    const CODE_SUCCESS = 'success';
    const CODE_REJECT = 'reject';
    const CODE_ERROR = 'error';

    private $submitDataResult;
    private $submitDataErrorMessage = '';

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

    public function isSuccess()
    {
        return $this->getSubmitDataResult() === self::CODE_SUCCESS;
    }

    public function isReject()
    {
        return $this->getSubmitDataResult() === self::CODE_REJECT;
    }

    public function isError()
    {
        return $this->getSubmitDataResult() === self::CODE_ERROR;
    }

    public function getErrorMessage()
    {
        return $this->getSubmitDataErrorMessage();
    }

    /**
     * @return string
     */
    public static function simulateSuccess()
    {
        return '{"SubmitDataResult":"success"}';
    }

    /**
     * @return string
     */
    public static function simulateReject()
    {
        return '{"SubmitDataResult":"reject"}';
    }

    /**
     * @return string
     */
    public static function simulateError()
    {
        return '{"SubmitDataResult":"error", "SubmitDataErrorMessage":"test"}';
    }

    /**
     * @return string
     */
    private function getSubmitDataResult()
    {
        return $this->submitDataResult;
    }

    /**
     * @return  mixed
     */
    private function getSubmitDataErrorMessage()
    {
        return $this->submitDataErrorMessage;
    }
}