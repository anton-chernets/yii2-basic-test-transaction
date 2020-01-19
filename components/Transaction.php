<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\UserException;
use linslin\yii2\curl\Curl;
use app\components\requests\RequestBase;
use app\components\requests\TransactionRequestJSON;
use app\components\requests\TransactionRequestXML;
use app\components\responses\TransactionResponseXML;
use app\components\responses\TransactionResponseJson;

class Transaction  extends Component
{
    /** @var boolean $isTest */
    public $isTest;

    /** @var Curl - Объект Curl запроса */
    private $curl;

    public function __construct()
    {
        parent::__construct();

        $this->curl = new Curl();
    }

    /**
     * Проводим транзакцию
     *
     * @param $requestType
     * @return void
     * @throws UserException
     * @throws \Exception
     */
    public function doCheckTransaction($requestType)
    {
        /** @var RequestBase $request */
        if($requestType == RequestBase::FORMAT_JSON) {

            $request = new TransactionRequestJSON();
            $responseObject = new TransactionResponseJson();
        } else if($requestType == RequestBase::FORMAT_XML) {

            $request = new TransactionRequestXML();
            $responseObject = new TransactionResponseXML();
        } else {

            throw new UserException('undefined request type');
        }

        if($this->isSimulate()){

            $response = $responseObject::simulateSuccess();
        } else {
            Yii::info('start transaction');

            $response = $this->curl->setRawPostData($request->getPaymentCashRequest())
                ->post('http://example.com/');
        }

        switch ($this->curl->responseCode) {
            case 'timeout':
                throw new UserException('timeout error logic here');
                break;

            case 200:
                break;

            case 404:
                throw new UserException('Error 404');
                break;
        }

        $responseArray = $responseObject::responseBodyToArray($responseObject, $response);

        $result = $responseObject->buildObject($responseObject, $responseArray)->isSuccess();

        print_r($result);die;
    }

    /**
     * @inheritDoc
     */
    private function isSimulate()
    {
        return $this->isTest;
    }
}