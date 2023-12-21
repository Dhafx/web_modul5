<?php

namespace app\Routes ;

include "app/Controller/ProductControtter.php";

use app\Controller\ProductController;

class ProductRoutes
{
    public function handle($method, $path)
    {
        if ($method === "GET" && $path === '/api/product'){
            $controller = new ProductController();
            echo $controller->index();
        }

        if ($method === "GET" )
    }
}