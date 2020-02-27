<?php


namespace app\components\currencies\data_storages;


use app\components\currencies\interfaces\CurrencyRatiosDataStorage;

/**
 * Class DBDataStorage
 * Provides data from DB
 *
 * @package app\components\currencies\data_storages
 */
class DBDataStorage implements CurrencyRatiosDataStorage
{
    public function __construct($config)
    {
        // Set configurable parameters
    }

    /**
     * @inheritDoc
     */
    public function hasActualRatios()
    {
        return false; // Dummy logic of checking existence of ratios data in DB
    }

    /**
     * @inheritDoc
     */
    public function getRatios()
    {
        return []; // Dummy logic of querying ratios data from db
    }

    /**
     * @inheritDoc
     */
    public function storeRatios($ratios)
    {
        // Dummy logic of of saving ratios data to DB
    }
}