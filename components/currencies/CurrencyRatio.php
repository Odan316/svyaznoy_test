<?php


namespace app\components\currencies;

/**
 * Class CurrencyRatio
 *
 * @package app\components\currencies
 */
class CurrencyRatio extends CurrencyRatioAbstract
{
    /**
     * @inheritDoc
     */
    public function isDefault()
    {
        return $this->isDefault;
    }

    /**
     * @inheritDoc
     */
    public function getRatioToDefault()
    {
        return $this->ratio;
    }
}