<?php
    require_once'models/producto.php';
    class carritoController{

        public function index(){
            $carrito = $_SESSION['carrito'];
            require_once'view/carrito/index.php';
        }

        public function add(){
            if(isset($_GET['id'])){
                $producto_id = $_GET['id'];
            }else{
                header('location:'.base_url);
            }

            if(isset($_SESSION['carrito'])){
                $counter = 0;
                foreach($_SESSION['carrito'] as $indice => $elemento){
                    if($elemento['id_producto'] == $producto_id){
                        $_SESSION['carrito'][$indice]['unidades']++;
                        $counter++;
                    }
                }

            }
                if(!isset($counter) || $counter == 0){
                //conseguir producto
                $producto = new producto();
                $producto->setId($producto_id);
                $producto = $producto->getOne();

                /*añadir al carrito */
                if(is_object($producto)){
                    $_SESSION['carrito'][] = array(
                        "id_producto"=> $producto->id,
                        "precio"=> $producto->precio,
                        "unidades" => 1,
                        "producto" => $producto
                    );
                }   
            }
            header('location:'.base_url."carrito/index");
        }
        
        public function remove(){
            echo "controlador pedidos, accion index";
        }

        public function delete(){
            unset($_SESSION['carrito']);
            header('location:'.base_url."carrito/index");
        }
        
    }
?>