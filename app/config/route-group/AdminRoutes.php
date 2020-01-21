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

        $this->addGet(
            '/edit/{id}',
            [
                'controller' => 'admin',
                'action' => 'edit'
            ]
        );

        $this->addPost(
            '/storeeditdata',
            [
                'controller' => 'admin',
                'action' => 'storeeditdata'
            ]
        );

        $this->addGet(
            '/detail/{id}',
            [
                'controller' => 'admin',
                'action' => 'detail'
            ]
        );

        $this->addGet(
            '/downloadp0/{id}',
            [
                'controller' => 'admin',
                'action' => 'downloadp0'
            ]
        );


        $this->addGet(
            '/downloadp1/{id}',
            [
                'controller' => 'admin',
                'action' => 'downloadp1'
            ]
        );

        $this->addGet(
            '/downloadp6/{id}',
            [
                'controller' => 'admin',
                'action' => 'downloadp6'
            ]
        );


        $this->addGet(
            '/downloadp8/{id}',
            [
                'controller' => 'admin',
                'action' => 'downloadp8'
            ]
        );

        $this->addGet(
            '/downloadkl/{id}',
            [
                'controller' => 'admin',
                'action' => 'downloadkl'
            ]
        );

        $this->addGet(
            '/downloadbast/{id}',
            [
                'controller' => 'admin',
                'action' => 'downloadbast'
            ]
        );








        
    }
}