<?php
    require_once'models/pedido.php';
    class pedidosController{

        public function hacer(){
          
            require_once'view/pedido/hacer.php';
        }

        public function add(){
           if(isset($_SESSION['identity'])){
               $usuario_id = $_SESSION['identity']->id;
               $pais = isset($_POST['pais']) ? $_POST['pais'] : false;
               $estado = isset($_POST['estado']) ? $_POST['estado'] : false;
               $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
               $stats = Utils::statsCarrito();
               $coste = $stats['total'];
             
            //guardar en la base de datos
            if($pais && $estado && $direccion){
                $pedido = new pedido();
                $pedido->setPais($pais);
                $pedido->setEstado($estado);
                $pedido->setDireccion($direccion);
                $pedido->setUsuarios_id($usuario_id);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                //guardar en tabla pivot
                $save_pivote = $pedido->save_pivot();

                
                if($save && $save_pivote){
                    $_SESSION['pedido'] = 'complete';
                }else{
                    $_SESSION['pedido'] = 'failed';
                }

            }else{
                $_SESSION['pedido'] = 'failed';
            }
            header("location:".base_url.'pedidos/confirmado');
           }else{
               //redirigir al index
               header("location".base_url);
           }
           
        }
        public function confirmado(){
            if(isset($_SESSION['identity'])){
                $identity = $_SESSION['identity'];
                $pedido = new pedido();
                $pedido->setUsuarios_id($identity->id);
                
                $pedido = $pedido->getOneByuser();

                $pedidos_productos = new pedido();
                $productos = $pedidos_productos->getProductosByPedido($pedido->id);
                
            }
            
            require_once'view/pedido/confirmado.php';
        }
    }
?>