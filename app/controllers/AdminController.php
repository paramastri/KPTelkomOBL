<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use App\Validation\FileValidation;

class AdminController extends Controller
{

    public function registerAction()
    {   
        // $id = $this->session->get('admin')['tipe'];
        // if ($id == NULL) {
        //     // echo "berhasil login";
        //     // die();
        // (new Response())->redirect('user/login')->send();          
        // }
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
    }

    public function dataAction()
    {

    }

    public function berkasp0Action()
    {   
        $p0 = $this->request->getPost('status_p0');
        $keterangan_p0 = $this->request->getPost('keterangan_p0');
        $id_obl = $this->request->getPost('id_obl');
        $obl = obl::findFirst("id='$id_obl'");
        $obl->p0 = $p0;
        // echo $obl->p0;
        // die();
        $obl->save();

        if($keterangan_p0)
        {
            $keterangan = keterangan::findFirst([
                'id_obl = :id_obl: AND id_tipe = :id_tipe:',
                'bind' => [
                    'id_obl' => $id_obl,
                    'id_tipe' => '1',
                ]
            ]);

            if($keterangan)
            {
                $keterangan->keterangan = $keterangan_p0;
                $keterangan->save();

            }
            else{
                $newketerangan = new keterangan();
                $newketerangan->id_tipe = 1;
                $newketerangan->id_obl = $id_obl;
                $newketerangan->keterangan = $keterangan_p0;
                $newketerangan->save();
            }
        }

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
                // echo("punya file"); die();
                if (!is_dir($upload_dir)) {
                  mkdir($upload_dir, 0755);
                //   echo("punya file"); die();
                }
                foreach ($this->request->getUploadedFiles() as $file_p0) {
                    $temp = explode(".", $_FILES["file"]["name"]);

                    $file_p0->moveTo($upload_dir . $file_p0->getName());
                    $lama = $upload_dir.$file_p0->getName();
                    $baru = $upload_dir.$obl->nama_cc.'-p0.'.end($temp);
                    rename($lama, $baru); 
                }
            }
            // $berkas->nama_pengupload = $this->session->get('user')['username'];
            $cekfile = file::findFirst([
                'id_obl = :id_obl: AND id_tipe = :id_tipe:',
                'bind' => [
                    'id_obl' => $id_obl,
                    'id_tipe' => '1',
                ]
            ]);

            if($cekfile)
            {
                $cekfile->file = $obl->nama_cc.'-p0.'.end($temp);
                $cekfile->save();

            }
            else{
                $berkas = new file();
                $berkas->id_obl = $id_obl;
                $berkas->id_tipe = 1;
                $berkas->file = $obl->nama_cc.'-p0.'.end($temp);
                $berkas->save();
            }
            
            // $this->response->redirect('admin/berkas'.'/'.$id_obl);
        }


        $this->response->redirect('admin/berkas'.'/'.$id_obl);
    }

    public function berkasp1Action()
    {   
        $p1 = $this->request->getPost('status_p1');
        $keterangan_p1 = $this->request->getPost('keterangan_p1');
        $id_obl = $this->request->getPost('id_obl');
        $obl = obl::findFirst("id='$id_obl'");
        // var_dump($obl);
        // die();
        $obl->p1 = $p1;
        // echo $obl->p1;
        // die();
        $obl->save();
        $val2 = new FileValidation();
        $messages2 = $val2->validate($_FILES);

        // if($keterangan_p1){
        //     $keterangan = new keterangan();
        //     // $keterangan->id_tipe = $this->request->getPost('1');
        //     $keterangan->id_tipe = 2;
        //     // echo $keterangan->id_tipe;
        //     // die();
        //     $keterangan->id_obl = $id_obl;
        //     $keterangan->keterangan = $keterangan_p1;
        //     $keterangan->save();
        // }

        if($keterangan_p1)
        {
            $keterangan = keterangan::findFirst([
                'id_obl = :id_obl: AND id_tipe = :id_tipe:',
                'bind' => [
                    'id_obl' => $id_obl,
                    'id_tipe' => '2',
                ]
            ]);

            if($keterangan)
            {
                $keterangan->keterangan = $keterangan_p1;
                $keterangan->save();

            }
            else{
                $newketerangan = new keterangan();
                $newketerangan->id_tipe = 2;
                $newketerangan->id_obl = $id_obl;
                $newketerangan->keterangan = $keterangan_p1;
                $newketerangan->save();
            }
        }

        if (count($messages2)) {
            $this->flashSession->error("GAGAL UPLOAD. Pastikan format file .pdf dan ukuran tidak melebihi 5 MB");
            return $this->response->redirect('admin/berkas' . '/' . $id_obl);

        }
        else
        {   


            $obl = obl::findFirst("id='$id_obl'");
            //var_dump($obl); die();

            

            if (true == $this->request->hasFiles() && $this->request->isPost()) {
                // echo("punya file"); die();
                $upload_dir = __DIR__ . '/../../public/uploads/';
            
                if (!is_dir($upload_dir)) {
                  mkdir($upload_dir, 0755);
                  // echo("punya file"); die();
                }
                foreach ($this->request->getUploadedFiles() as $file_p1) {
                    $temp = explode(".", $_FILES["file"]["name"]);

                    $file_p1->moveTo($upload_dir . $file_p1->getName());
                    $lama = $upload_dir.$file_p1->getName();
                    $baru = $upload_dir.$obl->nama_cc.'-p1.'.end($temp);
                    rename($lama, $baru); 
                }
            }
            // $berkas->nama_pengupload = $this->session->get('user')['username'];
            $cekfile = file::findFirst([
                'id_obl = :id_obl: AND id_tipe = :id_tipe:',
                'bind' => [
                    'id_obl' => $id_obl,
                    'id_tipe' => '2',
                ]
            ]);

            if($cekfile)
            {
                $cekfile->file = $obl->nama_cc.'-p1.'.end($temp);
                $cekfile->save();

            }
            else{
                $berkas = new file();
                $berkas->id_obl = $id_obl;
                $berkas->id_tipe = 2;
                $berkas->file = $obl->nama_cc.'-p1.'.end($temp);
                $berkas->save();
            }
        }
        $this->response->redirect('admin/berkas'.'/'.$id_obl);
    }

    public function berkasp6Action()
    {   
        $p6 = $this->request->getPost('status_p6');
        $keterangan_p6 = $this->request->getPost('keterangan_p6');
        $id_obl = $this->request->getPost('id_obl');
        $obl = obl::findFirst("id='$id_obl'");
        $obl->p6 = $p6;
        // echo $obl->p0;
        // die();
        $obl->save();
        $val2 = new FileValidation();
        $messages2 = $val2->validate($_FILES);

        // if($keterangan_p6){
        //     $keterangan = new keterangan();
        //     // $keterangan->id_tipe = $this->request->getPost('1');
        //     $keterangan->id_tipe = 3;
        //     $keterangan->id_obl = $id_obl;
        //     $keterangan->keterangan = $keterangan_p6;
        //     $keterangan->save();
        // }

        if($keterangan_p6)
        {
            $keterangan = keterangan::findFirst([
                'id_obl = :id_obl: AND id_tipe = :id_tipe:',
                'bind' => [
                    'id_obl' => $id_obl,
                    'id_tipe' => '3',
                ]
            ]);

            if($keterangan)
            {
                $keterangan->keterangan = $keterangan_p6;
                $keterangan->save();

            }
            else{
                $newketerangan = new keterangan();
                $newketerangan->id_tipe = 3;
                $newketerangan->id_obl = $id_obl;
                $newketerangan->keterangan = $keterangan_p6;
                $newketerangan->save();
            }
        }

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
                // echo("punya file"); die();
                if (!is_dir($upload_dir)) {
                  mkdir($upload_dir, 0755);
                  echo("punya file"); die();
                }
                foreach ($this->request->getUploadedFiles() as $file_p6) {
                    $temp = explode(".", $_FILES["file"]["name"]);

                    $file_p6->moveTo($upload_dir . $file_p6->getName());
                    $lama = $upload_dir.$file_p6->getName();
                    $baru = $upload_dir.$obl->nama_cc.'-p6.'.end($temp);
                    rename($lama, $baru); 
                }
            }
            // $berkas->nama_pengupload = $this->session->get('user')['username'];
            $cekfile = file::findFirst([
                'id_obl = :id_obl: AND id_tipe = :id_tipe:',
                'bind' => [
                    'id_obl' => $id_obl,
                    'id_tipe' => '3',
                ]
            ]);

            if($cekfile)
            {
                $cekfile->file = $obl->nama_cc.'-p6.'.end($temp);
                $cekfile->save();

            }
            else{
                $berkas = new file();
                $berkas->id_obl = $id_obl;
                $berkas->id_tipe = 3;
                $berkas->file = $obl->nama_cc.'-p6.'.end($temp);
                $berkas->save();
            }
        }
        $this->response->redirect('admin/berkas'.'/'.$id_obl);
    }

    public function berkasp8Action()
    {   
        $p8 = $this->request->getPost('status_p8');
        $keterangan_p8 = $this->request->getPost('keterangan_p8');
        $id_obl = $this->request->getPost('id_obl');
        $obl = obl::findFirst("id='$id_obl'");
        $obl->p8 = $p8;
        // echo $obl->p0;
        // die();
        $obl->save();
        $val2 = new FileValidation();
        $messages2 = $val2->validate($_FILES);

        // if($keterangan_p8){
        //     $keterangan = new keterangan();
        //     // $keterangan->id_tipe = $this->request->getPost('1');
        //     $keterangan->id_tipe = 4;
        //     $keterangan->id_obl = $id_obl;
        //     $keterangan->keterangan = $keterangan_p8;
        //     $keterangan->save();
        // }

        if($keterangan_p8)
        {
            $keterangan = keterangan::findFirst([
                'id_obl = :id_obl: AND id_tipe = :id_tipe:',
                'bind' => [
                    'id_obl' => $id_obl,
                    'id_tipe' => '4',
                ]
            ]);

            if($keterangan)
            {
                $keterangan->keterangan = $keterangan_p8;
                $keterangan->save();

            }
            else{
                $newketerangan = new keterangan();
                $newketerangan->id_tipe = 4;
                $newketerangan->id_obl = $id_obl;
                $newketerangan->keterangan = $keterangan_p8;
                $newketerangan->save();
            }
        }

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
                // echo("punya file"); die();
                if (!is_dir($upload_dir)) {
                  mkdir($upload_dir, 0755);
                  echo("punya file"); die();
                }
                foreach ($this->request->getUploadedFiles() as $file_p8) {
                    $temp = explode(".", $_FILES["file"]["name"]);

                    $file_p8->moveTo($upload_dir . $file_p8->getName());
                    $lama = $upload_dir.$file_p8->getName();
                    $baru = $upload_dir.$obl->nama_cc.'-p8.'.end($temp);
                    rename($lama, $baru); 
                }
            }
            // $berkas->nama_pengupload = $this->session->get('user')['username'];
            $cekfile = file::findFirst([
                'id_obl = :id_obl: AND id_tipe = :id_tipe:',
                'bind' => [
                    'id_obl' => $id_obl,
                    'id_tipe' => '4',
                ]
            ]);

            if($cekfile)
            {
                $cekfile->file = $obl->nama_cc.'-p8.'.end($temp);
                $cekfile->save();

            }
            else{
                $berkas = new file();
                $berkas->id_obl = $id_obl;
                $berkas->id_tipe = 4;
                $berkas->file = $obl->nama_cc.'-p8.'.end($temp);
                $berkas->save();
            }
        }
        $this->response->redirect('admin/berkas'.'/'.$id_obl);
    }


    public function berkasklAction()
    {   
        $kl = $this->request->getPost('status_kl');
        $keterangan_kl = $this->request->getPost('keterangan_kl');
        $id_obl = $this->request->getPost('id_obl');
        $obl = obl::findFirst("id='$id_obl'");
        $obl->kl = $kl;
        // echo $obl->p0;
        // die();
        $obl->save();
        $val2 = new FileValidation();
        $messages2 = $val2->validate($_FILES);

        // if($keterangan_kl){
        //     $keterangan = new keterangan();
        //     // $keterangan->id_tipe = $this->request->getPost('1');
        //     $keterangan->id_tipe = 5;
        //     $keterangan->id_obl = $id_obl;
        //     $keterangan->keterangan = $keterangan_kl;
        //     $keterangan->save();
        // }

        if($keterangan_kl)
        {
            $keterangan = keterangan::findFirst([
                'id_obl = :id_obl: AND id_tipe = :id_tipe:',
                'bind' => [
                    'id_obl' => $id_obl,
                    'id_tipe' => '5',
                ]
            ]);

            if($keterangan)
            {
                $keterangan->keterangan = $keterangan_kl;
                $keterangan->save();

            }
            else{
                $newketerangan = new keterangan();
                $newketerangan->id_tipe = 5;
                $newketerangan->id_obl = $id_obl;
                $newketerangan->keterangan = $keterangan_kl;
                $newketerangan->save();
            }
        }

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
                // echo("punya file"); die();
                if (!is_dir($upload_dir)) {
                  mkdir($upload_dir, 0755);
                  echo("punya file"); die();
                }
                foreach ($this->request->getUploadedFiles() as $file_kl) {
                    $temp = explode(".", $_FILES["file"]["name"]);

                    $file_kl->moveTo($upload_dir . $file_kl->getName());
                    $lama = $upload_dir.$file_kl->getName();
                    $baru = $upload_dir.$obl->nama_cc.'-kl.'.end($temp);
                    rename($lama, $baru); 
                }
            }
            // $berkas->nama_pengupload = $this->session->get('user')['username'];
            $cekfile = file::findFirst([
                'id_obl = :id_obl: AND id_tipe = :id_tipe:',
                'bind' => [
                    'id_obl' => $id_obl,
                    'id_tipe' => '5',
                ]
            ]);

            if($cekfile)
            {
                $cekfile->file = $obl->nama_cc.'-kl.'.end($temp);
                $cekfile->save();

            }
            else{
                $berkas = new file();
                $berkas->id_obl = $id_obl;
                $berkas->id_tipe = 5;
                $berkas->file = $obl->nama_cc.'-kl.'.end($temp);
                $berkas->save();
            }
        }
        $this->response->redirect('admin/berkas'.'/'.$id_obl);
    }

    public function berkasbastAction()
    {   
        $bast = $this->request->getPost('status_bast');
        $keterangan_bast = $this->request->getPost('keterangan_bast');
        $id_obl = $this->request->getPost('id_obl');
        $obl = obl::findFirst("id='$id_obl'");
        $obl->bast = $bast;
        // echo $obl->p0;
        // die();
        $obl->save();
        $val2 = new FileValidation();
        $messages2 = $val2->validate($_FILES);

        // if($keterangan_bast){
        //     $keterangan = new keterangan();
        //     // $keterangan->id_tipe = $this->request->getPost('1');
        //     $keterangan->id_tipe = 6;
        //     $keterangan->id_obl = $id_obl;
        //     $keterangan->keterangan = $keterangan_bast;
        //     $keterangan->save();
        // }

        if($keterangan_bast)
        {
            $keterangan = keterangan::findFirst([
                'id_obl = :id_obl: AND id_tipe = :id_tipe:',
                'bind' => [
                    'id_obl' => $id_obl,
                    'id_tipe' => '6',
                ]
            ]);

            if($keterangan)
            {
                $keterangan->keterangan = $keterangan_bast;
                $keterangan->save();

            }
            else{
                $newketerangan = new keterangan();
                $newketerangan->id_tipe = 6;
                $newketerangan->id_obl = $id_obl;
                $newketerangan->keterangan = $keterangan_bast;
                $newketerangan->save();
            }
        }

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
                // echo("punya file"); die();
                if (!is_dir($upload_dir)) {
                  mkdir($upload_dir, 0755);
                  echo("punya file"); die();
                }
                foreach ($this->request->getUploadedFiles() as $file_bast) {
                    $temp = explode(".", $_FILES["file"]["name"]);

                    $file_bast->moveTo($upload_dir . $file_bast->getName());
                    $lama = $upload_dir.$file_bast->getName();
                    $baru = $upload_dir.$obl->nama_cc.'-bast.'.end($temp);
                    rename($lama, $baru); 
                }
            }
            // $berkas->nama_pengupload = $this->session->get('user')['username'];
            $cekfile = file::findFirst([
                'id_obl = :id_obl: AND id_tipe = :id_tipe:',
                'bind' => [
                    'id_obl' => $id_obl,
                    'id_tipe' => '6',
                ]
            ]);

            if($cekfile)
            {
                $cekfile->file = $obl->nama_cc.'-bast.'.end($temp);
                $cekfile->save();

            }
            else{
                $berkas = new file();
                $berkas->id_obl = $id_obl;
                $berkas->id_tipe = 6;
                $berkas->file = $obl->nama_cc.'-bast.'.end($temp);
                $berkas->save();
            }
        }
        $this->response->redirect('admin/berkas'.'/'.$id_obl);
    }

    public function downloadp0Action($id)
    { 

        $file_p0 = file::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '1',
            ]
        ]);

            if($file_p0->file)
            {
                $upload_dir = __DIR__ . '/../../public/uploads/';
                $path = $upload_dir.$file_p0->file;
                $filetype = filetype($path);
                $filesize = filesize($path);
                // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                // header('Content-Description: File Download');
                header('Content-type: '.$filetype);
                header('Content-length: ' . $filesize);
                header('Content-Transfer-Encoding: binary');
                header('Accept-Ranges: bytes');
                header('Content-Disposition: attachment; filename="'.$file_p0->file.'"');
                readfile($path);

            }
            else
            {
                return $this->response->redirect('admin/detail'.'/'.$id);
            }
        }


    public function downloadp1Action($id)
    { 
        // echo $id;
        // die();
        $file_p1 = file::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '2',
            ]
        ]);
        // echo $file_p1->file;
        // die();

        // var_dump($file_p1);
        // die();
        
        if($file_p1->file)
        {
            // echo $file_p1;
            // die();
            $upload_dir = __DIR__ . '/../../public/uploads/';
            $path = $upload_dir.$file_p1->file;
            $filetype = filetype($path);
            $filesize = filesize($path);
            // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            // header('Content-Description: File Download');
            header('Content-type: '.$filetype);
            header('Content-length: ' . $filesize);
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            header('Content-Disposition: attachment; filename="'.$file_p1->file.'"');
            readfile($path);

        }
        else
        {
            return $this->response->redirect('admin/detail'.'/'.$id);
        }
    }


    public function downloadp6Action($id)
    { 
        // echo $id;
        // die();
        $file_p6 = file::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '3',
            ]
        ]);
        // echo $file_p1->file;
        // die();

        // var_dump($file_p1);
        // die();
        
        if($file_p6->file)
        {
            // echo $file_p1;
            // die();
            $upload_dir = __DIR__ . '/../../public/uploads/';
            $path = $upload_dir.$file_p6->file;
            $filetype = filetype($path);
            $filesize = filesize($path);
            // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            // header('Content-Description: File Download');
            header('Content-type: '.$filetype);
            header('Content-length: ' . $filesize);
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            header('Content-Disposition: attachment; filename="'.$file_p6->file.'"');
            readfile($path);

        }
        else
        {
            return $this->response->redirect('admin/detail'.'/'.$id);
        }
    }

    public function downloadp8Action($id)
    { 
        // echo $id;
        // die();
        $file_p8 = file::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '4',
            ]
        ]);
        // echo $file_p1->file;
        // die();

        // var_dump($file_p1);
        // die();
        
        if($file_p8->file)
        {
            // echo $file_p1;
            // die();
            $upload_dir = __DIR__ . '/../../public/uploads/';
            $path = $upload_dir.$file_p8->file;
            $filetype = filetype($path);
            $filesize = filesize($path);
            // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            // header('Content-Description: File Download');
            header('Content-type: '.$filetype);
            header('Content-length: ' . $filesize);
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            header('Content-Disposition: attachment; filename="'.$file_p8->file.'"');
            readfile($path);

        }
        else
        {
            return $this->response->redirect('admin/detail'.'/'.$id);
        }
    }


    public function downloadklAction($id)
    { 
        // echo $id;
        // die();
        $file_kl = file::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '5',
            ]
        ]);
        // echo $file_p1->file;
        // die();

        // var_dump($file_p1);
        // die();
        
        if($file_kl->file)
        {
            // echo $file_p1;
            // die();
            $upload_dir = __DIR__ . '/../../public/uploads/';
            $path = $upload_dir.$file_kl->file;
            $filetype = filetype($path);
            $filesize = filesize($path);
            // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            // header('Content-Description: File Download');
            header('Content-type: '.$filetype);
            header('Content-length: ' . $filesize);
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            header('Content-Disposition: attachment; filename="'.$file_kl->file.'"');
            readfile($path);

        }
        else
        {
            return $this->response->redirect('admin/detail'.'/'.$id);
        }
    }

    public function downloadbastAction($id)
    { 
        // echo $id;
        // die();
        $file_bast = file::findFirst([
            'id_obl = :id_obl: AND id_tipe = :id_tipe:',
            'bind' => [
                'id_obl' => $id,
                'id_tipe' => '5',
            ]
        ]);
        // echo $file_p1->file;
        // die();

        // var_dump($file_p1);
        // die();
        
        if($file_bast->file)
        {
            // echo $file_p1;
            // die();
            $upload_dir = __DIR__ . '/../../public/uploads/';
            $path = $upload_dir.$file_bast->file;
            $filetype = filetype($path);
            $filesize = filesize($path);
            // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            // header('Content-Description: File Download');
            header('Content-type: '.$filetype);
            header('Content-length: ' . $filesize);
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            header('Content-Disposition: attachment; filename="'.$file_bast->file.'"');
            readfile($path);

        }
        else
        {
            return $this->response->redirect('admin/detail'.'/'.$id);
        }
    }

    public function listAction()
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

    public function listviewAction($id)
    {
        $this->view->data = $array;
    }

    public function editAction($id)
    {
        $data = obl::findFirst("id='$id'");
        $this->view->data = $data;
    }

    public function storeeditdataAction()
    {
        $id_obl = $this->request->getPost('id_obl');
        $nama_cc = $this->request->getPost('nama_cc');
        $nama_mitra = $this->request->getPost('nama_mitra');
        $nama_pekerjaan = $this->request->getPost('nama_pekerjaan');
        $pic_mitra = $this->request->getPost('pic_mitra');

        $obl = obl::findFirst("id='$id_obl'");
        $obl->nama_cc = $nama_cc;
        $obl->nama_mitra = $nama_mitra;
        $obl->nama_pekerjaan = $nama_pekerjaan;
        $obl->pic_mitra = $pic_mitra;
        // echo $obl->nama_cc;
        // die();
        $obl->save();
        $this->response->redirect('admin/berkas'.'/'.$id_obl);
    }

    public function detailAction($id)
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
    }
}
