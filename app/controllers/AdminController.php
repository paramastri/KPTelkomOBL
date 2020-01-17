<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use App\Validation\FileValidation;

class AdminController extends Controller
{

    public function registerAction()
    {   
        $id = $this->session->get('admin')['tipe'];
        if ($id == NULL) {
            // echo "berhasil login";
            // die();
        (new Response())->redirect('user/login')->send();          
        }
    }

    public function storeregisterAction(){

        $admin = new admin();
        $admin->username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // echo $password;
        // die();
        $admin->password = $this->security->hash($password);
        $user = admin::findFirst("username = '$admin->username'");
        if ($user) { 
            $this->flashSession->error("Gagal register. Username telah digunakan.");
            return $this->response->redirect('admin/register');
        }
        else
        {
            $admin->save();
            $this->response->redirect('admin/list');

        }
        
    }

   
    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect();
    }


    public function berkasAction()
    {
    }

    public function dataAction()
    {
    }

   

}