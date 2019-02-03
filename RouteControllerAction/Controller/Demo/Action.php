<?php

namespace M2Dev\RouteControllerAction\Controller\Demo;

use Magento\Framework\App\ResponseInterface;

class Action extends \Magento\Framework\App\Action\Action
{
    // http://m23cevmw.local/{routeName}/{controllerFolder}/{actionClass}
    // http://m23cevmw.local/myroute/demo/action
    public function execute()
    {
        echo "Hola mundo desde la clase action!";

        /*
         * bin/magento setup:upgrade --keep-generated
         * bin/magento cache:flush
         */

        // http://m23cevmw.local/myroute/demo/action/p1/v1/p2/v2
        $params = $this->getRequest()->getParams();
        var_dump($params);

        $p2 = $this->getRequest()->getParam('p2', 'custom');
        var_dump($p2);
    }
}