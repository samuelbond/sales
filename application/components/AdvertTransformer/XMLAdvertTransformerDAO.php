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
        try
        {
            $xmlObject = $this->readXML();
            if($xmlObject instanceof \SimpleXMLElement)
            {
                return ((isset($xmlObject->sale)) ? $xmlObject : array());
            }
            throw new \Zend_Exception("Could not read xml file provided");
        }catch (\Exception $ex)
        {
            throw new \Zend_Exception("An error occurred while trying to read xml file");
        }

    }

    /**
     * @throws |Exception
     * @return \SimpleXMLElement
     */
    protected function readXML()
    {
        return simplexml_load_file($this->defaultFilePath.DIRECTORY_SEPARATOR.$this->dataStoreName);
    }

}