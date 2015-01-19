<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 19/01/15
 * Time: 21:37
 */

namespace components\AdvertTransformer;


use components\AbstractDAO;

class XMLAdvertTransformerDAO extends AdvertTransformerDAO{
    /**
     * Gets all sales
     * @throws |Exception
     * @return array
     */
    public function fetchAllSales()
    {
        $xmlObject = $this->readXML();

        return ((isset($xmlObject->sale)) ? $xmlObject : array());
    }

    /**
     * Get a sale based on an order ref
     * @throws |Exception
     * @param $orderRef string
     * @return array
     */
    public function fetchSalesByOrderRef($orderRef)
    {
        // TODO: Implement fetchSalesByOrderRef() method.
    }

    /**
     * @return \SimpleXMLElement
     */
    protected function readXML()
    {
        return simplexml_load_file($this->defaultFilePath.DIRECTORY_SEPARATOR.$this->dataStoreName);
    }

}