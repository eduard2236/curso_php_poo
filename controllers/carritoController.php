<?php
    require_once'models/producto.php';
    class carritoController{

        public function index(){
            var_dump($_SESSION['carrito']);
            echo "controlador pedidos, accion index";
        }

        public function add(){
            if(isset($_GET['id'])){
                $producto_id = $_GET['id'];
            }else{
                header('location:'.base_url);
            }

            if(isset($_SESSION['carrito'])){

            }else{
                //conseguir producto
                $producto = new producto();
                $producto->setId($producto_id);
                $producto = $producto->getOne();
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