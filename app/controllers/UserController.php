<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use App\Validation\FileValidation;

class UserController extends Controller{

    public function storeregisterAction(){

	    $user = new user();
	    $user->username = $this->request->getPost('username');
	    $password = $this->request->getPost('password');
	    $user->password = $this->security->hash($password);
	    $usernames = user::findFirst("username = '$user->username'");
	    // echo $user->username;
	    // echo $user->password;
	    // die();
	    if($usernames){
	        $this->flashSession->error("Gagal register. Username telah digunakan.");

	        return $this->response->redirect('user/register');

	        return $this->response->redirect('register');

	    }
	    else{

	        $user->save();
            $this->response->redirect('user/login');
	    }
	}

	public function storeloginAction()
    {
        $username = $this->request->getPost('username');
        $pass = $this->request->getPost('password');
        // echo $pass;
        // die();
        if($this->request->getPost('tipe')=="admin")
        {
	        $user = admin::findFirst("username = '$username'");
	        // echo $user->password;
	        // die();
	        if ($user){
	            if($this->security->checkHash($pass, $user->password)){
	                $this->session->set(
	                    'admin',
	                    [
	                        'id' => $user->id,
	                        'username' => $user->username,
	                        'tipe' => '1'
	                    ]
	                );

	                (new Response())->redirect('admin/data')->send();
	            }
	            else{
	                $this->flashSession->error("Gagal masuk sebagai admin. Silakan cek kembali username dan password anda.");
	                $this->response->redirect('user/login');
	            }
	        }
	        else{
	            $this->flashSession->error("Gagal masuk sebagai admin. Silakan cek kembali username dan password anda.");
	                $this->response->redirect('user/login');
	        }
        }

        elseif($this->request->getPost('tipe')=="user")
        {
	        // $user = user::findFirst(
	        // 	[	
	        // 		'columns' =>'*',
	        // 		'conditions' =>'username = ?1 AND status = ?2',
	        // 	]

	        // 	'bind' => [
	        // 		1 => $username,
	        // 		2 => '1',
	        // 	]

	        // );
	        $user = user::findFirst("username = '$username'");
	        if ($user){
	        	// if($user->status == 1 ){
		            if($this->security->checkHash($pass, $user->password)){
		                $this->session->set(
		                    'user',
		                    [
		                        'id' => $user->id,
		                        'username' => $user->username,
		                        'tipe' => '2',
		                    ]
		                );

		                (new Response())->redirect('user/datauser')->send();
		            }
		            else{
		                $this->flashSession->error("Gagal masuk sebagai user. Silakan cek kembali username dan password anda.");
		                $this->response->redirect('user/login');
		            }
		        //}
		        // else {
		        // 	// echo"belum verifikasi";
		        // 	// die();
		        // 	$this->flashSession->error("Gagal masuk sebagai user. Belum diverifikasi, silakan hubungi admin.");
		            
		        //     $this->response->redirect('user/login');
		        // }
	       }
	        else{
	            $this->flashSession->error("Gagal masuk sebagai user. Silakan cek kembali username dan password anda.");
	            $this->response->redirect('user/login');
	        }

        }




    }

    public function loginAction()
    {
    	$_isAdmin = $this->session->get('admin')['tipe'];
        $_isUser = $this->session->get('user')['tipe'];
        if ($_isAdmin == 1) {
            $this->response->redirect('admin/data');
        }
        if($_isUser)
        {
            $this->response->redirect('user/datauser');
        }

	}
	
	public function registerAction()
    {
    	$_isAdmin = $this->session->get('admin')['tipe'];
        $_isUser = $this->session->get('user')['tipe'];
        if ($_isAdmin == 1) {
            $this->response->redirect('admin/data');
        }
        if($_isUser)
        {
            $this->response->redirect('user/datauser');
        }

    }

    
    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect("user/login");
    }

    public function datauserAction()
    {
        $_isUser = $this->session->get('user');
        if (!$_isUser)
        {
            $this->response->redirect('user/login');
        }
    }

    public function listdatauserAction()
    {
    	$listdatas = obl::find();
        $data = array();

        foreach ($listdatas as $listdata)
        {

            if($listdata->p0 == 1)
            {
                $status_p0 = "true";
            }
            elseif ($listdata->p0 == 2)
            {
                $status_p0 = "false";
            }
            else
            {
                $status_p0 = "";
            }

            if ($listdata->p1 == 1) 
            {
                $status_p1 = "true";
            }
            elseif ($listdata->p1 == 2) 
            {
                $status_p1 = "false";
            }
            else
            {
                $status_p1 = "";
            }


            if ($listdata->p6 == 1) 
            {
                $status_p6 = "true";
            }
            elseif ($listdata->p6 == 2) 
            {
                $status_p6 = "false";
            }
            else
            {
                $status_p6 = "";
            }


            if ($listdata->p8 == 1) 
            {
                $status_p8 = "true";
            }
            elseif ($listdata->p8 == 2) 
            {
                $status_p8 = "false";
            }
            else
            {
                $status_p8 = "";
            }


            if ($listdata->kl == 1) 
            {
                $status_kl = "true";
            }
            elseif ($listdata->kl == 2) 
            {
                $status_kl = "false";
            }
            else
            {
                $status_kl = "";
            }

            
            if ($listdata->bast == 1) 
            {
                $status_bast = "true";
            }
            elseif ($listdata->bast == 2) 
            {
                $status_bast = "false";
            }
            else
            {
                $status_bast = "";
            }


            $data[] = array(
                'nama_cc' => $listdata->nama_cc,
                'nama_mitra' => $listdata->nama_mitra,
                'nama_pekerjaan' => $listdata->nama_pekerjaan,
                'pic_mitra' => $listdata->pic_mitra,
                'p0' => $status_p0,
                'p1' => $status_p1,
                'p6' => $status_p6,
                'p8' => $status_p8,
                'kl' => $status_kl,
                'bast' => $status_bast,
                'link' => $listdata->id,
            );
        }

        $content = json_encode($data);
        return $this->response->setContent($content);
    }

    public function listdatauserviewAction($id)
    {
    	$this->view->data = $array;

        $_isUser = $this->session->get('user');
        if (!$_isUser)
        {
            $this->response->redirect('user/login');
        }
    }

    public function detailuserAction($id)
    {
    	 $data = obl::findFirst("id='$id'");
        $this->view->data = $data;

        $keterangan_p0 = keterangan::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '1',
            ]
        ]);
        $this->view->keterangan_p0 = $keterangan_p0;

        $keterangan_p1 = keterangan::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '2',
            ]
        ]);
        $this->view->keterangan_p1 = $keterangan_p1;

        $keterangan_p6 = keterangan::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '3',
            ]
        ]);
        $this->view->keterangan_p6 = $keterangan_p6;

        $keterangan_p8 = keterangan::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '4',
            ]
        ]);
        $this->view->keterangan_p8 = $keterangan_p8;

        $keterangan_kl = keterangan::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '5',
            ]
        ]);
        $this->view->keterangan_kl = $keterangan_kl;

        $keterangan_bast = keterangan::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '6',
            ]
        ]);
        $this->view->keterangan_bast = $keterangan_bast;

        $dokumen_p0 = file::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '1',
            ]
        ]);
        $this->view->dokumen_p0 = $dokumen_p0;

        $dokumen_p1 = file::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '2',
            ]
        ]);
        $this->view->dokumen_p1 = $dokumen_p1;

        $dokumen_p6 = file::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '3',
            ]
        ]);
        $this->view->dokumen_p6 = $dokumen_p6;

        $dokumen_p8 = file::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '4',
            ]
        ]);
        $this->view->dokumen_p8 = $dokumen_p8;

        $dokumen_kl = file::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '5',
            ]
        ]);
        $this->view->dokumen_kl = $dokumen_kl;

        $dokumen_bast = file::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '6',
            ]
        ]);
        $this->view->dokumen_bast = $dokumen_bast;

        $_isUser = $this->session->get('user');
        if (!$_isUser)
        {
            $this->response->redirect('user/login');
        }
    }
}