<?php


namespace app\components\currencies\data_storages;


use app\components\currencies\CurrencyRatio;
use app\components\currencies\interfaces\CurrencyRatiosDataStorage;
use Exception;

/**
 * Class UrlDataStorage
 * Load data over HTTP
 *
 * @package app\components\currencies\data_storages
 */
class UrlDataStorage implements CurrencyRatiosDataStorage
{
    /**
     * Example parameter
     *
     * @var string
     */
    private $_url;

    private $_dataIsLoaded;

    private $_data;

    /**
     * UrlDataStorage constructor.
     * @param $config
     * @throws Exception
     */
    public function __construct($config)
    {
        // Set configurable parameters
        if(!isset($config['url'])){
            throw new Exception(); // We should throw some exception, that will signalize about bad app configuration
        } else {
            $this->_url = $config['url'];
        }
    }

    /**
     * @inheritDoc
     */
    public function hasActualRatios()
    {
        // Dummy logic of loading data from URL, will return true if loading is successful
        $this->loadData();
        return $this->_dataIsLoaded;
    }

    /**
     * @inheritDoc
     */
    public function getRatios()
    {
        // Dummy logic of returning loaded data if it was loaded

        return $this->_data;
    }

    /**
     * @inheritDoc
     */
    public function storeRatios($ratios)
    {
        // Do nothing
    }

    /**
     * Loads data from url
     */
    private function loadData()
    {
        // Dummy logic of loading data from URL
        for($i = 0; $i < 2; $i++){
            $currency = new CurrencyRatio();
            $currency->code = $i === 0 ? 'RUB' : 'USD';
            $currency->isDefault = $i === 0 ? true : false;
            $currency->ratio = $i === 0 ? 1 : 0.7;

            $this->_data = $currency;
        }

        $this->_dataIsLoaded = true;
    }
}