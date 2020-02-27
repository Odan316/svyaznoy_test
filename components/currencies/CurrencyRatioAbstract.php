<?php


namespace app\components\currencies;


use app\components\currencies\interfaces\CurrencyRatioInterface;

abstract class CurrencyRatioAbstract implements CurrencyRatioInterface
{
    /**
     * Currency 3-char code
     *
     * @var string
     */
    public $code;

    /**
     * @var boolean
     */
    public $isDefault;

    /**
     * Ratio to default currency
     *
     * @var float
     */
    public $ratio;
}