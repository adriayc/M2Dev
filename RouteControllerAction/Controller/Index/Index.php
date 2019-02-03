<?php

namespace M2Dev\RouteControllerAction\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{

    // http://m23cevmw.local/myroute/index/index
    // http://m23cevmw.local/myroute/index
    // http://m23cevmw.local/myroute
    public function execute()
    {
        echo "Default controller and action!";
    }
}