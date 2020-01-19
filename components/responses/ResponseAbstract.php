<?php

namespace app\components\responses;

use yii\helpers\Json;

abstract class ResponseAbstract implements ResponseInterface
{
    use ResponseAbstractTrait;

    /**
     * @param $responseObject
     * @param $responseBody
     * @return array
     */
    public static function responseBodyToArray($responseObject, $responseBody)
    {
        $result = [];

        if($responseObject InstanceOf TransactionResponseJson) {
            $result = Json::decode($json = $responseBody);
        } elseif ($responseObject InstanceOf TransactionResponseXML) {
            $xml = simplexml_load_string($responseBody, 'SimpleXMLElement', LIBXML_NOERROR);

            foreach ($xml as $key => $value) {
                $result[(string)$key] = (string)$value;
            }

            return $result;
        }

        return $result;
    }
}
