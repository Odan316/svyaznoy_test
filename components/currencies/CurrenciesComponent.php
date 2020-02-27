<?php

namespace app\components\currencies;

use app\components\currencies\interfaces\CurrencyRatioInterface;
use app\components\currencies\interfaces\CurrencyRatiosDataStorage;
use Couchbase\Exception;

/**
 * Class CurrenciesComponent
 *
 * We create component to be used as single instance, that will handle all request for currencies ratios
 *
 * @package app\components\currencies
 */
class CurrenciesComponent
{
    /**
     * @var CurrencyRatiosDataStorage[]
     */
    private $_dataStorages = [];

    /**
     * CurrenciesComponent constructor.
     *
     * @param $config array
     */
    public function __construct($config)
    {
        // Construct and save data storages from config
        if(isset($config['dataStorages']) && !empty($config['dataStorages'])){
            foreach($config['dataStorages'] as $dpConfig){
                if(isset($dpConfig['class'])){
                    $dataStorage = new $dpConfig['class']($dpConfig);
                    if(isset($dpConfig['priority']) && !isset($this->_dataStorages[$dpConfig['priority']])){
                        // Functionality for direct control of storages priority order
                        $this->_dataStorages[$dpConfig['priority']] = $dataStorage;
                    } else {
                        array_push($this->_dataStorages, $dataStorage);
                    }
                }
            }
        }
    }

    /**
     * Iterates over data storages, trying to retrieve data
     * If data wasn't loaded from first storage, than saves data to all previous storages
     *
     * @return CurrencyRatioInterface[]
     * @throws Exception
     */
    public function getCurrenciesRatios()
    {
        $currenciesRatios = [];
        $deprecatedDataProviders = [];
        foreach($this->_dataStorages as $priority => $dataStorage){
            if($dataStorage->hasActualRatios()){
                $currenciesRatios = $dataStorage->getRatios();
            } else {
                $deprecatedDataProviders[] = $dataStorage;
            }
        }

        if(count($deprecatedDataProviders) > 0 && !empty($currenciesRatios)){
            foreach($this->_dataStorages as $dataStorage){
                $dataStorage->storeRatios($currenciesRatios);
            }
        }

        if($currenciesRatios){
            throw new Exception(); // Throws exception, that signalize? that we could not load any currencies data
        }

        return $currenciesRatios;
    }

}