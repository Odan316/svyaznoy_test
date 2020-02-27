<?php


namespace app\core;

use app\components\currencies\CurrenciesComponent;

/**
 * Class App
 * @package app\core
 *
 * This class is a fake - it emulates real application core, we need it co contain CurrenciesRatios service
 */
class App
{
    private static $_instance;

    public $currenciesComponent = null;

    // It is simplified App creation, only to load CurrenciesRatios service
    private function __construct()
    {
        // It is faking real config loading
        $config = [
            'currencies' => [
                'dataProviders' => [
                    [
                        'class' => '\app\components\currencies\data_storages\CacheDataStorage',
                        'priority' => 1,
                        'cacheLifetime' => 3200 // it is example of storage parameter
                    ],
                    [
                        'class' => '\app\components\currencies\data_storages\DBDataStorage',
                        'priority' => 2,
                    ],
                    [
                        'class' => '\app\components\currencies\data_storages\UrlDataStorage',
                        'priority' => 3,
                        'url' => 'https://some-fake-url.ru/get-currencies' // it is example of storage parameter
                    ]
                ]
            ]
        ];

        $this->currenciesComponent = new CurrenciesComponent($config['currencies']);
    }

    private function __clone()
    {
        // only to prevent cloning
    }

    private function __wakeup()
    {
        // only to prevent unserializing
    }

    /**
     * @return App
     */
    public static function getInstance()
    {
        if(empty(static::$_instance)){
            static::$_instance = new static();
        }

        return static::$_instance;
    }

}