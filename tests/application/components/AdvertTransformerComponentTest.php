<?php
/**
 * @author Samuel I Amaziro
 */

require_once dirname(dirname( realpath(dirname(__FILE__)))).DIRECTORY_SEPARATOR."bootstrap.php";

class AdvertTransformerComponentTest extends PHPUnit_Framework_TestCase{

    protected $injector;

    protected function setUp()
    {
        $injector = new \components\AdvertTransformer\AdvertTransformerInjector();
        $this->injector = $injector;

    }

    public function testXMLDataTransformation()
    {
        $component = new \components\AdvertTransformer\AdvertTransformer();
        $this->injector->needed(array(
            "data_source_file_name" => "imaginary.xml",
            "file_path" => PUBLIC_PATH."files",
        ));
        $this->injector->setDAO("xml");
        $component = $component->getInstance($this->injector);
        $component->transformAllSales();
        $resultSet = $component->getTransformedSales();
        $this->assertGreaterThan(0, sizeof($resultSet));
        $line = ((sizeof($resultSet) > 0) ? $resultSet[0] : "");
        $this->assertContains("|", $line);
        $this->assertContains('"', $line);
        $list = explode("|", $line);
        $this->assertEquals(5, ((is_array($list)) ? sizeof($list) : 0));
    }

    /**
     * @dataProvider xmlDataProvider
     */
    public function testDAOXMLScheme($tag)
    {
        $xml = file_get_contents(PUBLIC_PATH."files".DIRECTORY_SEPARATOR."imaginary.xml");
        $this->assertTrue((((strpos($xml, $tag)) === false) ? false : true), "XML file has invalid structure");
    }

    /**
     * @dataProvider commissionAmountProvider
     */
    public function testCommissionPayable($amount, $expectedCommission)
    {
        $component = new \components\AdvertTransformer\AdvertTransformer();
        $component = $component->getInstance($this->injector);
        $this->assertEquals($component->transformationOne($amount), $expectedCommission, "Failed to calculate the correct commission payable");
    }

    /**
     * @dataProvider dateTimeProvider
     */
    public function testUNIXTimeStamp($date)
    {
        $component = new \components\AdvertTransformer\AdvertTransformer();
        $component = $component->getInstance($this->injector);
        $this->assertEquals($date, date("Y-m-d H:i:s", $component->transformationTwo($date)), "Failed to create the correct UNIX timestamp");
    }


    public function commissionAmountProvider()
    {
        return array(
            array(3.99, 0.70),
            array(4.18, 0.71)
        );
    }

    public function xmlDataProvider()
    {
        return array(
            array("<sale>"),
            array("<datetime>"),
            array("</datetime>"),
            array("<amount>"),
            array("</amount>"),
            array("<orderRef>"),
            array("</orderRef>"),
            array("<affiliate>"),
            array("</affiliate>"),
            array("</sale>"),
        );
    }

    public function dateTimeProvider()
    {
        return array(
            array("2010-06-23 12:33:42"),
            array("2012-06-01 07:33:50"),
            array("2013-06-01 07:33:50")
        );
    }
} 