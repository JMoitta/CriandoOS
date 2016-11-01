<?php
//namespace App\Controller;
//echo 'teste';
class Controlador extends Src\Controller{
    
    public function __construct() {
        parent::__construct();
    }
    public function index($params = NULL) {
        $this->view->title = "cadastro";
        echo '<pre>';
        var_dump($params);
        echo '</pre>';
        echo 'teste';
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

