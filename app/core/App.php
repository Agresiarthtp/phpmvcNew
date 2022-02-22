<?php

class App {
    //properti untuk menentukan controller, method dan parameter defaultnya
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {   //lalu constructnya kita panggil
        $url = $this->parseURL();

        //CONTROLLER
        if($url ==NULL)
        {
            $url = [$this->controller];
        }
        //ada ga file controller dlm app yg ekstensinya .php? klo ada, unset(jgn tampilkan)
        if( file_exists('../app/controllers/' . $url[0] . '.php') )
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        //memanggil controller
        require_once '../app/controllers/' .$this->controller . '.php';
        $this->controller = new $this->controller;

        //METHOD
        //mengecek ada ga methodnya, klo ada maka unset, klo engga secara default nantinya
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1]))
            $this->method = $url[1];
            unset($url[1]);
        }

        //PARAMETER 
        //mengecek ada gak parameternya, 
        if( !empty($url) ){
            $this-> params = array_values($url);
        }

        //jalankan controller dan method, serta kirimkan params/parameter jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        //jika ada URL yg dikirimkan 
        if(isset ($_GET['url'])){
            //kita ambil URLnya kita isi dgn URL nya
            //rtrim berfungsi untuk menghapus yg ada pada url
            $url  = rtrim($_GET['url'], '/');
            //supaya url kita bersih dari karakter2 aneh
            $url  = filter_var($url, FILTER_SANITIZE_URL);
            //kita pecah berdasarkan tanda / menggunakan fungsi explode
            $url  = explode('/', $url);
            //lalu kita return aja
            return $url;
        }
    }
}

