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

        $this->addGet(
            '/data',
            [
                'controller' => 'admin',
                'action' => 'data'
            ]
        );




        
    }
}