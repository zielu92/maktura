<?php

namespace App\Http\Helpers;

class PricesHelper
{
    /**
     * calculate price with vat rate - return gross price
     *
     * @param  mixed $rate
     * @param  mixed $valueNetto
     * @return float
     */
    public static function calculatePriceWithVat(string $rate = '', float $valueNet): float
    {
        if (!is_numeric($rate)) {
            return round($valueNet,2);
        }
        //calculate the % in dynamic way
        return round($valueNet * (($rate/100)+1),2);
    }

    /**
     * calculate vat - return vat value only
     *
     * @param  mixed $rate
     * @param  mixed $valueNetto
     * @return float
     */
    public static function calculateVatNet(string $rate = '', float $valueNet): float
    {
        if (!is_numeric($rate)) {
            return 0;
        }
        //calculate the % in dynamic way
        return round($valueNet * ($rate/100),2);
    }

}
