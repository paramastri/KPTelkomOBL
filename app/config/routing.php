<?php

$di->set(
    'router',
    function () {
        $router = new \Phalcon\Mvc\Router(false);

        // $router->mount(
        //     new AdminRoutes()
        // );

        // $router->mount(
        //     new SuratRoutes()
        // );

        $router->addGet(
            '/',
            [
                'controller' => 'index',
                'action' => 'index'
            ]
        );

        $router->addGet(
            '/berkas',
            [
                'controller' => 'index',
                'action' => 'berkas'
            ]
        );

        $router->addGet(
            '/data',
            [
                'controller' => 'index',
                'action' => 'data'
            ]
        );

        $router->addGet(
            '/login',
            [
                'controller' => 'index',
                'action' => 'login'
            ]
        );

        $router->addGet(
            '/register',
            [
                'controller' => 'index',
                'action' => 'register'
            ]
        );
       return $router;
    }
);