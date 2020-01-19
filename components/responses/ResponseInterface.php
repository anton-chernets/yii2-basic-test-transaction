<?php

namespace app\components\responses;

/**
 * Интерфейс для обработчиков ответов сервисов
 *
 * Interface ResponseInterface
 */
interface ResponseInterface
{
    /**
     * Проверка на признак успеха
     * @return boolean
     * @inheritdoc
     */
    function isSuccess();

    /**
     * Проверка на признак отклонено
     * @return boolean
     * @inheritdoc
     */
    function isReject();

    /**
     * Проверка на признак ошибки
     * @return boolean
     * @inheritdoc
     */
    function isError();

    /**
     * @return string
     */
    function getErrorMessage();

    /**
     * Тело ответа для симулированного запроса
     *
     * @return static
     */
    static function simulateSuccess();
    static function simulateReject();
    static function simulateError();
}