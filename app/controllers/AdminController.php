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
            $berkas = new file();

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
            $berkas->id_obl = $id_obl;
            $berkas->id_tipe = 1;
            $berkas->file = $obl->nama_cc.'-p0.'.end($temp);
            $berkas->save();
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

            $berkas = new file();

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
            $berkas->id_obl = $id_obl;
            $berkas->id_tipe = 2;
            $berkas->file = $obl->nama_cc.'-p1.'.end($temp);
            $berkas->save();
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
            $berkas = new file();

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
            $berkas->id_obl = $id_obl;
            $berkas->id_tipe = 3;
            $berkas->file = $obl->nama_cc.'-p6.'.end($temp);
            $berkas->save();
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
            $berkas = new file();

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
            $berkas->id_obl = $id_obl;
            $berkas->id_tipe = 4;
            $berkas->file = $obl->nama_cc.'-p8.'.end($temp);
            $berkas->save();
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
            $berkas = new file();

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
            $berkas->id_obl = $id_obl;
            $berkas->id_tipe = 5;
            $berkas->file = $obl->nama_cc.'-kl.'.end($temp);
            $berkas->save();
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
            $berkas = new file();

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
            $berkas->id_obl = $id_obl;
            $berkas->id_tipe = 6;
            $berkas->file = $obl->nama_cc.'-bast.'.end($temp);
            $berkas->save();
        }
        $this->response->redirect('admin/berkas'.'/'.$id_obl);
    }


    public function listAction()
    {
        $listdatas = obl::find();
        $data = array();

        foreach ($listdatas as $listdata)
        {

            if($listdata->p0 == 1)
            {
                $status_p0 = "OK";
            }
            elseif ($listdata->p0 == 2)
            {
                $status_p0 = "BELUM OK";
            }

            if ($listdata->p1 == 1) 
            {
                $status_p1 = "OK";
            }
            elseif ($listdata->p1 == 2) 
            {
                $status_p1 = "BELUM OK";
            }

            if ($listdata->p6 == 1) 
            {
                $status_p6 = "OK";
            }
            elseif ($listdata->p6 == 2) 
            {
                $status_p6 = "BELUM OK";
            }

            if ($listdata->p8 == 1) 
            {
                $status_p8 = "OK";
            }
            elseif ($listdata->p8 == 2) 
            {
                $status_p8 = "BELUM OK";
            }

            if ($listdata->kl == 1) 
            {
                $status_kl = "OK";
            }
            elseif ($listdata->kl == 2) 
            {
                $status_kl = "BELUM OK";
            }
            
            if ($listdata->bast == 1) 
            {
                $status_bast = "OK";
            }
            elseif ($listdata->bast == 2) 
            {
                $status_bast = "BELUM OK";
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
}
