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


    public function berkasAction($id)
    {
        $this->view->data = $id;
    }

    public function dataAction()
    {

    }

    public function berkasp0Action()
    {
        $berkas = new file();
        $id_obl = $this->request->getPost('id_obl');
        $status_p0 = $this->request->getPost('status_p0');
        $keterangan_p0 = $this->request->getPost('keterangan_p0');
        // echo $keterangan_p0;
        // die();
        $val2 = new FileValidation();
        $messages2 = $val2->validate($_FILES);
        if (count($messages2)) {
            $this->flashSession->error("GAGAL UPLOAD. Pastikan format file .pdf dan ukuran tidak melebihi 5 MB");
            return $this->response->redirect('admin/berkas' . '/' . $id_obl);

        }
        else
        {   
            $obl = obl::findFirst("id='$id_obl'");
            // $penomoran = (explode('/',$surat->no_surat,4));
            // $nomorsaja = (explode('.',$penomoran[0],2));
            if (true == $this->request->hasFiles() && $this->request->isPost()) {
                $upload_dir = __DIR__ . '/../../public/uploads/';
          
                if (!is_dir($upload_dir)) {
                  mkdir($upload_dir, 0755);
                }
                foreach ($this->request->getUploadedFiles() as $file_p0) {
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $file_p0->moveTo($upload_dir . $file->getName());
                    $lama = $upload_dir.$file_p0->getName();
                    $baru = $upload_dir.$obl->nama_cc.'-p1'.end($temp);
                    rename($lama, $baru); 
                }
            }

            // $berkas->nama_pengupload = $this->session->get('user')['username'];
            $berkas->id_obl = $id_obl;
            $berkas->file_p0 = $berkas->nama_cc.'-p1'.end($temp);
            $berkas->status_p0 = $status_p0;
            $berkas->keterangan_p0 = $keterangan_p0;
            echo $berkas->keterangan_p0;

            $this->response->redirect('admin/berkas'.'/'.$id_obl);
        }
        
    }

}