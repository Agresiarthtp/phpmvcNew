<?php

class Controller {
   public function view($view, $data = [])
   {    //memanggil view controller
       require_once '../app/views/' . $view . '.php';
   }
}