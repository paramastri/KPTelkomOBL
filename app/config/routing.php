<?php

$di->set(
    'router',
    function () {
        $router = new \Phalcon\Mvc\Router(false);

        $router->mount(
            new AdminRoutes()
        );



        $router->mount(
            new UserRoutes()
        );

        $router->addGet(
            '/',
            [
                'controller' => 'index',
                'action' => 'index'
            ]
        );

        $router->addPost(
            '/storedata',
            [
                'controller' => 'index',
                'action' => 'storedata'
            ]
        );

        $router->notFound([
            'controller' => 'index',
            'action' => 'show404'
        ]);
        
        return $router;
    }
);