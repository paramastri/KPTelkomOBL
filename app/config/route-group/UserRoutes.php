<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class UserRoutes extends RouterGroup{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'user',
        ]);

        $this->setPrefix('/user');

        $this->addPost(
            '/login',
            [
                'controller'=>'user',
                'action'=>'storelogin'
            ]
        );
    
        $this->addGet(
            '/login',
            [
                'controller' => 'user',
                'action' => 'login'
            ]
        );

        $this->addPost(
            '/register',
            [
                'controller'=>'user',
                'action'=>'storeregister'
            ]
        );
    
        $this->addGet(
            '/register',
            [
                'controller' => 'user',
                'action' => 'register'
            ]
        );
        $this->addGet(
            '/logout',
            [
                'controller' => 'user',
                'action' => 'logout'
            ]
        );
        $this->addGet(
            '/datauser',
            [
                'controller' => 'user',
                'action' => 'datauser'
            ]
        );

        $this->addGet(
            '/listdatauser',
            [
                'controller' => 'user',
                'action' => 'listdatauser'
            ]
        );

        $this->addGet(
            '/listdatauserview/{id}',
            [
                'controller' => 'user',
                'action' => 'listdatauserview'
            ]
        );

        $this->addGet(
            '/detailuser/{id}',
            [
                'controller' => 'user',
                'action' => 'detailuser'
            ]
        );




    }
    
}