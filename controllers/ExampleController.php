<?php


namespace app\controllers;

use app\core\App;

/**
 * Class ExampleController
 * This class is needed only to emulate request for currencies ratios.
 *
 * @package app\controllers
 */
class ExampleController
{
    /**
     * This method is a stub without real logic, only to call for currencies info
     */
    public function someActionCase()
    {
        $currenciesRatio = App::getInstance()->currenciesComponent->getCurrenciesRatios();
    }
}