<?php

//ESTE ARQUIVO CONTEM UMA FUNCAO QUE RECEBE UM DIRETORIO VALIDO E CARREGA TODOS ARQUIVO PHP DO DIRETORIO
//spl_autoload_register(function ($class) {
// 
//    $nome = $class . '.php';
//    echo '<br>'.$nome.'<br>';
//    //echo getcwd();
//    //echo '<br>'.HOME.'<br>';
//    //var_dump(file_exists(HOME.$nome));
//    if( file_exists(HOSTINGER.CONTROLLER.$nome) ){
//        //echo HOME.$nome;
//        require_once HOSTINGER.CONTROLLER .$nome;
//    } else {
//        
//        if (file_exists(HOSTINGER.MODELS.$nome)){
//            require_once HOSTINGER.MODELS.$nome;
//        } else {
//            
//            if(is_array(explode('\\', $nome))){
//                $newName = explode('\\', $nome);
//                $n = "";
//                foreach ($newName as $value) {
//                    $n .= $value.'/';
//                }
//                $nome = substr($n, 0, -1);
//            }
//            echo HOSTINGER.$nome;
//            if (file_exists(HOSTINGER.$nome)){
//                require_once HOSTINGER.$nome;
//            }
//        }
//    }
//});
spl_autoload_register(function ($class) {
    $nome = $class . '.php';
    //echo '<br>'.$nome.'<br>';
    if( file_exists($nome) ){
        //echo $nome;
        require_once $nome;
    } else {
        //echo '<br>arquivo nao encotrado';
    }
});
function carregar($nome, $lista, $prefixo = null) {
    if(is_null($prefixo)){
        $prefixo = "";
    }
    
    foreach ($lista as $diretorio){
//        echo $prefixo.$diretorio.$nome." ";
//        var_dump(is_file($prefixo.$diretorio.$nome));
//        echo "<br>";
        if(is_file($prefixo.$diretorio.$nome)){
            require_once $prefixo.$diretorio.$nome;
            break;
        }
    }
}
function carregarSrc($caminho) {
    
}
spl_autoload_register(function ($class) {
    $caminho = str_replace('\\', '/', $class);
    $caixabaixa = explode('/', $caminho);
    $nome = $caminho . '.php';
    if(!empty($caixabaixa[1])){
        $novoCaminho = strtolower($caminho);
        $nome = $novoCaminho . ".php";
    }
    $lista = array(
        "app/controller/",
        "app/models/",
        "app/view/",
        "src/",
        ""
    );
    carregar($nome, $lista, null);
//    carregar($nome, $lista, HOSTINGER);
});