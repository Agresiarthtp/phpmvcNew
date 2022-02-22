<?php
//membuat controller about di folder controllers
class About extends Controller {
    //membuat method index
    public function index($nama = 'Agresia', $status = 'Mahasiswa', $umur = 20)
    {   
        $data['nama'] = $nama;
        $data['status'] = $status;
        $data['umur'] = $umur;
        $data['judul'] = 'About Me';
        //isi method
        $this->view('templates/header', $data);
        $this->view ('about/index', $data);
        $this->view('templates/footer');
    }
    //method page
    public function page()
    {   
        $data ['judul'] = 'Page Me';
        $this->view ('templates/header', $data);
        $this->view ('about/page');
        $this->view ('templates/footer');
    }
}