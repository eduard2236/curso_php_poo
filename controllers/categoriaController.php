<?php
    require_once'models/categoria.php';
    class categoriaController{
        public function index(){
            utils::isAdmin();
            $categoria = new categoria();
            $categorias = $categoria->getAll();

            require_once'view/categorias/index.php';
        }

        public function crear(){
            utils::isAdmin();
            require_once'view/categorias/crear.php';
        }

        public function save(){
            utils::isAdmin();
            $errores = array();
            $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
            //guardar categoria
            
                if(isset($_POST) && isset($_POST['nombre']) && !is_numeric($_POST['nombre']) && preg_match($patron_texto, $_POST['nombre'])){
                $nombre_validado = true;
                    }else{
                        $nombre_validado = false;
                        $errores['nombre'] = "el nombre no es valido no debe contener numeros";
                        $_SESSION['categoria'] = "failed_num";
                        header("location:".base_url."categoria/crear");
                        die;
                    }
                if(count($errores) == 0 ){
                    $categoria = new categoria();
                    $categoria->setNombre($_POST['nombre']);
                    $categoria->save();
                    if ($categoria){
                        $_SESSION['categoria'] = "complete";
                        }else{
                            $_SESSION['categoria'] = "failed";
                        }
            
                    }else{
                        $_SESSION['categoria'] = "failed";
                }
            

            header("location:".base_url."categoria/index");

        }
    }
?>