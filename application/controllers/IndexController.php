<?php

class IndexController extends Zend_Controller_Action
{
    /**
     * @var \components\AdvertTransformer\versions\v1\AdvertTransformer
     */
    private $component;

    public function init()
    {
// Local to this controller only; affects all actions,
        // as loaded in init:
        $this->_helper->viewRenderer->setNoRender(true);

        // Globally:
        $this->_helper->removeHelper('viewRenderer');

        // Also globally, but would need to be in conjunction with the
        // local version in order to propagate for this controller:
        Zend_Controller_Front::getInstance()
            ->setParam('noViewRenderer', true);

        $injector = new \components\AdvertTransformer\AdvertTransformerInjector();
        $injector->needed(array(
            "data_source_file_name" => "imaginary.xml",
            "file_path" => PUBLIC_PATH."files",
        ));
        $injector->setDAO("xml");
        $component = new \components\AdvertTransformer\AdvertTransformer();
        $this->component = $component->getInstance($injector);
    }

    public function indexAction()
    {

        echo "<pre>";
        $this->component->transformAllSales();
        print_r($this->component->getTransformedSales());
        echo "</pre>";
        echo "i am here";
        //var_dump($component::getInstance());

    }

    public function testpageAction()
    {
        echo "am alive";
    }


}

