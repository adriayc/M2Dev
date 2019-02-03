<?php

namespace M2Dev\RouteControllerAction\Controller\Response;

class Page extends \Magento\Framework\App\Action\Action
{

    // http://m23cevmw.local/{routeName}/{controllerFolder}/{actionClass}
    // http://m23cevmw.local/myroute/response/page
    public function execute()
    {
        $type = \Magento\Framework\Controller\ResultFactory::TYPE_PAGE;

        // (/ + ** + space bar) para obtener la variable y mostrar mas opciones
        /** @var \Magento\Framework\View\Result\Page $resultPage */     //Ctrl + Click en TYPE_PAGE para copiar la referencia
        $resultPage = $this->resultFactory->create($type);
        $resultPage->getConfig()->getTitle()->set(__("My Title"));

        return $resultPage;
    }
}