<?php


//require_once './tools/';
class System {
    
    private $class;
    private $method;
    private $params;

    public function __construct($class, $method, $params) {
        if($class == null){
            $this->class = "Index";
            $this->method = "";
        } else {
            $this->class = $class;
            $this->method = $method;
            $this->params = $params;
        }
    }
    public function executar (){
        $aplicacao;
//        var_dump(CONTROLLER.$this->class.'.php');
        if (is_file(CONTROLLER.$this->class.'.php')){
            
//            echo $this->class;
//            var_dump(is_file(CONTROLLER.$this->class.'.php'));
//            echo "<br>".VIEW.$this->class.'/<br>';
//            var_dump(is_dir(VIEW.$this->class.'/'));
            if(is_dir(VIEW.$this->class.'/')){
//                var_dump(is_dir(VIEW.$this->class.'/'));
                $aplicacao = new $this->class();
//                var_dump($aplicacao);
                if(!empty($this->method)){
                    if(method_exists($aplicacao, $this->method)){
                        $aplicacao->inicializar();
                        if (!empty($this->params)){
                            $aplicacao->{$this->method}($this->params);
                        } else {
                            $aplicacao->{$this->method}();
                        }
                        $aplicacao->terminar();
                    } else {
                        // o metodo informado pelo usuario nao encontrado error 404
                        $aplicacao = new Error404();
                        $aplicacao->inicializar();
                    }
                } else {
                    // o usuario esta penas acecando ao controlador tentar executar o metodo indexAcao
                    $aplicacao->inicializar();
                    if(method_exists($aplicacao, "indexAction")){
                        $aplicacao->indexAction();
                    }
                    $aplicacao->terminar();
                }
            } else {
                // A pagina da classe nao encontrada para visualização
            }
        } else {
            // 404
            $aplicacao = new Error404();
            $aplicacao->inicializar();
        }
    }
}

/*
 * if(is_file("app/controller/$this->class.php")){
            if (is_dir("app/view/$this->class/")){
                require_once "app/controller/$this->class.php";
                $aplicacao;
                try {
                    $aplicacao = new $this->class();
                } catch (Exception $ex) {
                    echo $ex->getCode().$ex->getMessage();
                }
                if (!empty($this->method)){
                    
                    if (method_exists($aplicacao, $this->method)){
                        $aplicacao->{$this->method}();
                    } else {
                        echo '404';
                    }
                } else {
                    if (method_exists($aplicacao, 'indexAcao')){
                    $aplicacao->{$this->method}();
                }
            }   
            } else {
                echo "nao foi encontrado o diretorio html da pagina $this->class";
            }
        } else {
            echo "404";
            
        }
 */