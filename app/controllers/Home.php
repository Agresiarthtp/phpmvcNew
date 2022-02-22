<?php

class Home extends Controller{
    //method index
    public function index()
    {   //memanggil view yang berada di folder home yaitu index.php
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}