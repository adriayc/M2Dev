<?php

namespace M2Dev\RouteControllerAction\Controller\Demo;

use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Framework\App\Action\Action
{

    // http://m23cevmw.local/myroute/demo/index
    // http://m23cevmw.local/myroute/demo
    public function execute()
    {
        echo "Default action!";
    }
}