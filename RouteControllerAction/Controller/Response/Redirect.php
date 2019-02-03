<?php

namespace M2Dev\RouteControllerAction\Controller\Response;

use Magento\Framework\App\ResponseInterface;

class Redirect extends \Magento\Framework\App\Action\Action
{

    // http://m2cevmw.local/{routeName}/{controllerFolder}/{actionClass}
    // http://m2cevmw.local/myroute/respose/redirect
    public function execute()
    {
        $type = \Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT;

        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */   //Ctrl + Click en TYPE_JSON para copiar la referencia
        $resultRedirect = $this->resultFactory->create($type);

        // {domain}/{route}/{controlle}/{action}
        // PATH: {route}/{controller}/{action}
        return $resultRedirect->setUrl('https://www.facebook.com/');    //Redireccionar a una pagina externa
        return $resultRedirect->setPath('customer/account/create');     //Redireccinar
        return $resultRedirect->setPath('*/*/page');    // '*/*/page' - Cuando se trabaja bajo el mismo frontName y ControllerFolder
        return $resultRedirect->setPath('*/*/page', ['p1'=>'v1', 'p2'=>'v2']);  //Redireccionando y enviando parametros
    }
}