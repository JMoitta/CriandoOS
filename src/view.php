<?php
namespace Src;

class View {
    public $dir;
    public $header;
    public $index;
    public $footer;
    public $title;
    function __construct($dir) {
        $this->dir = $dir;
        if(is_file($dir.'header.phtml')){
            $this->header = $dir.'header.phtml';
        } else {
            $this->header = VIEW.'header.phtml';
        }
        if(is_file($dir.'footer.phtml')){
            $this->footer = $dir.'footer.phtml';
        } else {
            $this->footer = VIEW.'footer.phtml';
        }
        //var_dump($this->dir);
        
        if(is_file($dir.'index.phtml')){
            $this->index = $dir.'index.phtml';
        }
        $titulo = explode("/", $dir);
//        var_dump($titulo);
        $this->title = $titulo[2];
        //echo $this->header.'<br>';
        //echo $this->index.'<br>';
        //echo $this->footer.'<br>';
    }

}