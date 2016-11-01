<?php

require_once 'src/controller.php';

class Index extends \Src\Controller {
    function indexAction($param = null) {
        echo "indexAction<br>";
    }
}