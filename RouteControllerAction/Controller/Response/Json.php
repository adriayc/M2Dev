<?php

namespace M2Dev\RouteControllerAction\Controller\Response;

use Magento\Framework\App\ResponseInterface;

class Json extends \Magento\Framework\App\Action\Action
{

    // http://m2cevmw.local/{routeName}/{controllerFolder}/{actionClass}
    // http://m2cevmw.local/myroute/respose/json
    public function execute()
    {
        $type = \Magento\Framework\Controller\ResultFactory::TYPE_JSON;

        /** @var \Magento\Framework\Controller\Result\Json $resultJson */       //Ctrl + Click en TYPE_JSON para copiar la referencia
        $resultJson = $this->resultFactory->create($type);
        $data = ['uno', 'dos', 'tres'];

        return $resultJson->setData($data);
    }
}