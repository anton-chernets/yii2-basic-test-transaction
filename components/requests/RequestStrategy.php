<?php

namespace app\components\requests;

interface RequestStrategy
{
    function getPaymentCashRequest();
}