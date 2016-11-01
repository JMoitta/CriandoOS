<?php

namespace Src;

class Controller {
    public $view;
    public function __construct() {
        //echo '<br>'.get_called_class().'<br>';
        $this->view = new \Src\view(VIEW.get_called_class().'/');
    }
    public function inicializar() {
        require_once $this->view->header;
        if (!empty($param)) {
            get_called_class().$param();
        }
        //echo '<br>'.$this->view->index.'<br>';
        //echo '<br>'.$this->view->footer.'<br>';
//        require_once $this->view->index;
//        require_once $this->view->footer;
    }
    public function terminar() {
        require_once $this->view->index;
        require_once $this->view->footer;
    }
}

