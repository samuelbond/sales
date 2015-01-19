<?php
/**
 * @author Samuel I Amaziro
 */

namespace components\AdvertTransformer;


use components\AbstractDAO;

/**
 * Class AdvertTransformerDAO
 * @package components\AdvertTransformer
 */
abstract class AdvertTransformerDAO extends AbstractDAO{

    /**
     * @var null|string
     */
    protected $dataStoreName = null;
    /**
     * @var null|string
     */
    protected $defaultFilePath = null;
    /**
     * Provides a way to find a specific item
     * @param array $item
     * @throws |Exception
     * @return mixed
     */
    public function find(array $item)
    {
        throw new \Exception("Unsupported method");
    }

    /**
     * Gets all sales
     * @throws |Exception
     * @return array
     */
    abstract public function fetchAllSales();

    /**
     * Get a sale based on an order ref
     * @throws |Exception
     * @param $orderRef string
     * @return array
     */
    abstract public function fetchSalesByOrderRef($orderRef);

    /**
     * @param null|string $dataStoreName
     */
    public function setDataStoreName($dataStoreName)
    {
        $this->dataStoreName = $dataStoreName;
    }

    /**
     * @param null|string $defaultFilePath
     */
    public function setDefaultFilePath($defaultFilePath)
    {
        $this->defaultFilePath = $defaultFilePath;
    }



}