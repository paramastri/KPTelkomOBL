<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use App\Validation\FileValidation;

class IndexController extends Controller
{
    public function indexAction()
    {
        $_isAdmin = $this->session->get('admin')['tipe'];
        $_isUser = $this->session->get('user')['tipe'];
        // if ($_isAdmin == 1) {
        //     $this->response->redirect('admin/list');
        // }
        if (!$_isAdmin)
        {
            $this->response->redirect('user/login');
        }
        
        // $this->view->datas = jenis_surat::find();
    }

    public function storedataAction()
    {
        $obl = new obl();
        $nama_cc = $this->request->getPost('nama_cc');
        $nama_mitra = $this->request->getPost('nama_mitra');
        $nama_pekerjaan = $this->request->getPost('nama_pekerjaan');
        $pic_mitra = $this->request->getPost('pic_mitra');

        $obl->nama_cc = $nama_cc;
        $obl->nama_mitra = $nama_mitra;
        $obl->nama_pekerjaan = $nama_pekerjaan;
        $obl->pic_mitra = $pic_mitra;
        // echo $obl->nama_cc;
        // die();
        $obl->save();
        $max = obl::maximum(
            [
                'column' => 'id',
            ]
        );
        $this->response->redirect('admin/berkas'.'/'.$max);
    }

    public function show404Action()
    {
        
    }

    
}