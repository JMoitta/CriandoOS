<?php
require 'src/config.php';
require_once 'src/loadFiles.php';
require_once 'src/Dao/Config.php';
require_once 'src/system.php';

/*
 * tratar a url se for para pasta public criar uma interface com listagem de arquivos e diretorio
 * caso contrario chama o system
 */


$endereco = $_SERVER ['REQUEST_URI'];
$requisisao = explode('/', $endereco);
$class = "";
$metodo = "";
$parametros = array();
if(!empty($requisisao)){
    $class = strtoupper(substr($requisisao[1], 0, 1)).substr($requisisao[1], 1);
//    $letra = strtoupper(substr($requisisao[1], 0, 1)).substr($requisisao[1], 1);
//    echo $class."<br>";
    if(!empty($requisisao[2])){
        $metodo = $requisisao[2];
        if(!empty($requisisao[3])){
            foreach ($requisisao as $chave => $valor){
                switch ($chave){
                    case 0:
                    case 1:
                    case 2:
                        break;
                    default:
                        if(!empty($valor)){
                            $parametros[] = $valor;
                        }
                }
            } 
        }
    }
}
$system = new System($class, $metodo, $parametros);
$system->executar();