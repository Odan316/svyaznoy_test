<?php


namespace app\components\currencies\interfaces;

/**
 * Interface CurrencyRatioInterface
 *
 * Interface, used to implement ratio functionality to currencies.
 * It is supposed, that for every currency we keep only ratio to default currency,
 * so we need only one method, for returning ratio info
 *
 * @package app\components\currencies\interfaces
 */
interface CurrencyRatioInterface
{
    /**
     * Method, to provide ability to check if currency is default
     *
     * @return bool
     */
    public function isDefault();

    /**
     * Method to get currency ratio
     *
     * @return float
     */
    public function getRatioToDefault();
}