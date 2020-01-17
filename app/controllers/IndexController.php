<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use App\Events\AdminProtectController;


// use App\Events\UserProtectController;

class IndexController extends Controller
{
	public function indexAction()
    {
        
    }

    public function berkasAction()
    {
        
    }


    public function dataAction()
    {
        
    }

    public function loginAction()
    {
        
    }

    // public function storeloginAction(){
    //     $username = $this->request->getPost('username');
    //     $pass = $this->request->getPost('password');
    //     // echo $pass;
    //     // die();
    //         $user = user::findFirst("username = '$username'");
    //         // echo $user->password;
    //         // die();
    //         if ($user){
    //             if($this->security->checkHash($pass, $user->password)){
    //                 $this->session->set(
    //                     'admin',
    //                     [
    //                         'id' => $user->id,
    //                         'username' => $user->username,
    //                     ]
    //                 );

    //                 (new Response())->redirect('indexbaru')->send();
    //             }
    //             else{
    //                 $this->flashSession->error("Gagal masuk sebagai admin. Silakan cek kembali username dan password anda.");
    //                 $this->response->redirect('login');
    //             }
    //         }
    //         else{
    //             $this->flashSession->error("Gagal masuk sebagai admin. Silakan cek kembali username dan password anda.");
    //                 $this->response->redirect('login');
    //         }
    // }

    public function registerAction()
    {
        
    }

    // public function storeregisterAction(){
    //     $user = new user();
    //     $user->username = $this->request->getPost('username');
    //     $password = $this->request->getPost('password');
    //     $user->password = $this->security->hash($password);
    //     $usernames = user::findFirst("username = '$user->username'");
    //     if($usernames){
    //         $this->flashSession->error("Gagal register. Username telah digunakan.");
    //         return $this->response->redirect('register');
    //     }
    //     else{

    //         $user->save();
    //         $this->response->redirect('login');
    //     }
    // }
   

}