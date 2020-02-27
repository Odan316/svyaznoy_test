<?php


namespace app\components\currencies\data_storages;

use app\components\currencies\interfaces\CurrencyRatiosDataStorage;

/**
 * Class CacheDataStorage
 * Provides data from cache
 *
 * @package app\components\currencies\data_storages
 */
class CacheDataStorage implements CurrencyRatiosDataStorage
{
    /**
     * Example parameter
     *
     * @var int
     */
    private $_cacheLifetime;

    public function __construct($config)
    {
        // Set configurable parameters
        $this->_cacheLifetime = isset($config['cacheLifetime']) ?: 0;
    }

    /**
     * @inheritDoc
     */
    public function hasActualRatios()
    {
        return false; // Dummy logic of checking cache lifetime and cache existence
    }

    /**
     * @inheritDoc
     */
    public function getRatios()
    {
        return []; // Dummy logic of returning cached ratios
    }

    /**
     * @inheritDoc
     */
    public function storeRatios($ratios)
    {
        // Dummy logic of of creating cache
    }
}