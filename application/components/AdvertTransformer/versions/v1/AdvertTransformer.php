<?php
/**
 * @author Samuel I Amaziro
 */
namespace components\AdvertTransformer\versions\v1;

/**
 * Class AdvertTransformer
 * @package components\AdvertTransformer\versions\v1
 */
class AdvertTransformer extends \components\AdvertTransformer\AdvertTransformer{

    private $transformedSales;

    public function transformAllSales()
    {
        $this->transformedSales = array();

        $transformationOne = function ($amount)
        {
            $percent = 5/100 * $amount;
            $pence =  50/100;
            $com = $percent + $pence;
            $commission = sprintf('%.2f', $com);

            return $commission;
        };

        $transformationTwo = function ($dateTime)
        {
            return strtotime($dateTime);
        };

        $data = $this->dao->fetchAllSales();

        foreach($data as $sale)
        {
            $amount = $sale->amount;
            $commission = $transformationOne($amount);
            $affiliate = $sale->affiliate;
            $orderRef = $sale->orderRef;
            $datetime = $sale->datetime;
            $unixTimeStamp = $transformationTwo($datetime);
            $this->transformedSales[] = $affiliate."|".$amount."|".$commission."|".$unixTimeStamp."|"."\"".$orderRef."\"";
        }
    }

    /**
     * @return mixed
     */
    public function getTransformedSales()
    {
        return $this->transformedSales;
    }




} 