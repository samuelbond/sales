<?php

class IndexController extends Zend_Controller_Action
{
    /**
     * @var \components\AdvertTransformer\versions\v1\AdvertTransformer
     */
    private $component;

    public function init()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->removeHelper('viewRenderer');
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
        Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');

        $this->component->transformAllSales();
        $transformedSales = $this->component->getTransformedSales();
        $paginator = Zend_Paginator::factory($transformedSales);
        $paginator->setItemCountPerPage(20);
        $paginator->setCurrentPageNumber($this->_getParam('page', 1));
        $this->view->paginator = $paginator;
        $this->render();


    }



}

