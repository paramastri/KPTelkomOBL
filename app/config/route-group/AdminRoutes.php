<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class AdminRoutes extends RouterGroup
{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'admin',
        ]);

        $this->setPrefix('/admin');

        $this->addGet(
            '/register',
            [
                'controller' => 'admin',
                'action' => 'register'
            ]
        );

        $this->addPost(
            '/register',
            [
                'controller' => 'admin',
                'action' => 'storeregister'
            ]
        );

        

        $this->addGet(
            '/berkas/{id}',
            [
                'controller' => 'admin',
                'action' => 'berkas'
            ]
        );

        $this->addPost(
            '/berkasp0',
            [
                'controller' => 'admin',
                'action' => 'berkasp0'
            ]
        );

        $this->addPost(
            '/berkasp1',
            [
                'controller' => 'admin',
                'action' => 'berkasp1'
            ]
        );

        $this->addPost(
            '/berkasp6',
            [
                'controller' => 'admin',
                'action' => 'berkasp6'
            ]
        );

        $this->addPost(
            '/berkasp8',
            [
                'controller' => 'admin',
                'action' => 'berkasp8'
            ]
        );

        $this->addPost(
            '/berkaskl',
            [
                'controller' => 'admin',
                'action' => 'berkaskl'
            ]
        );

        $this->addPost(
            '/berkasbast',
            [
                'controller' => 'admin',
                'action' => 'berkasbast'
            ]
        );

        $this->addGet(
            '/data',
            [
                'controller' => 'admin',
                'action' => 'data'
            ]
        );

        $this->addGet(
            '/list',
            [
                'controller' => 'admin',
                'action' => 'list'
            ]
        );


        $this->addGet(
            '/listview/{id}',
            [
                'controller' => 'admin',
                'action' => 'listview'
            ]
        );




        
    }
}