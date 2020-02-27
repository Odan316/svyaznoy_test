<?php


namespace app\components\currencies\interfaces;


interface CurrencyRatiosDataStorage
{
    /**
     * Return true if dataProvider have actual currencies info for provide
     * Return false if dataProvider has no data or data not actual
     *
     * @return boolean
     */
    public function hasActualRatios();

    /**
     * Return data with
     * @return CurrencyRatioInterface[]
     */
    public function getRatios();

    /**
     * Store new ratios info (if it possible)
     *
     * @var $ratios CurrencyRatioInterface[]
     * @return void
     */
    public function storeRatios($ratios);
}