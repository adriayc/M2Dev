<?php

namespace M2Dev\RouteControllerAction\Controller\Response;

use Magento\Framework\App\ResponseInterface;

class Forward extends \Magento\Framework\App\Action\Action
{

    // http://m2cevmw.local/{routeName}/{controllerFolder}/{actionClass}
    // http://m2cevmw.local/myroute/respose/forward
    public function execute()
    {
        $type = \Magento\Framework\Controller\ResultFactory::TYPE_FORWARD;

        /** @var \Magento\Framework\Controller\Result\Forward $resultForward */     //Ctrl + Click en TYPE_JSON para copiar la referencia
        $resultForward = $this->resultFactory->create($type);

        //Forward a otra accion
        return $resultForward->forward('json');     //Reenvio a una accion del mismo controller

        /* Otros ejemplos de forward */

        //Forward a otro modulo + controller + action
//        return $resultForward->setModule('customer')
//            ->setController('account')
//            ->forward('create');

        //Forward a otro controller + action
//        return $resultForward->setController('demo')
//            ->forward('action');
    }
}