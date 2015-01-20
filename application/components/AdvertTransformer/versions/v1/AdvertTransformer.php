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

        $data = $this->dao->fetchAllSales();

        foreach($data as $sale)
        {
            $amount = $sale->amount;
            $commission = $this->transformationOne($amount);
            $affiliate = $sale->affiliate;
            $orderRef = $sale->orderRef;
            $datetime = $sale->datetime;
            $unixTimeStamp = $this->transformationTwo($datetime);
            $this->transformedSales[] = $affiliate."|".$amount."|".$commission."|".$unixTimeStamp."|"."\"".$orderRef."\"";
        }
    }

    /**
     * Converts a given date into a UNIX Time Stamp
     * @param $dateTime
     * @return int
     */
    public function transformationTwo($dateTime)
    {
        return strtotime($dateTime);
    }

    /**
     * Calculates the commission payable
     * @param $amount
     * @return string
     */
    public function transformationOne($amount)
    {
        $percent = 5/100 * $amount;
        $pence =  50/100;
        $com = $percent + $pence;
        $commission = number_format(round($com, 2),2);

        return $commission;
    }


    /**
     * @return mixed
     */
    public function getTransformedSales()
    {
        return $this->transformedSales;
    }




} 