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
                //actualiza el stock en la tabla productos
                $bajar = $pedido->bajar_stok();

                //guardar en tabla pivot
                $save_pivote = $pedido->save_pivot();

                
                if($save && $save_pivote && $bajar){
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

        public function mis_pedidos(){
            utils::isIdentity();
            $usuario_id = $_SESSION['identity']->id;
            //sacar los pedidos del usuario

            $pedido = new pedido();
            $pedido->setUsuarios_id($usuario_id);
            $pedidos = $pedido->getAllByuser();
            require_once'view/pedido/mis_pedidos.php';
        }

        public function detalle(){
            utils::isIdentity();
            if(isset($_GET['id'])){
                //sacar el pedido
                $id = $_GET['id'];
                $pedido = new pedido();
                $pedido->setId($id);
                $pedido = $pedido->getOne();
                //sacar usuario 
                $usuario = new pedido();
                $usuarios = $usuario->DateUsuarios($id);
                //sacar los productos
                $pedidos_productos = new pedido();
                $productos = $pedidos_productos->getProductosByPedido($id);
                

                require_once'view/pedido/detalle.php';
            }else{
                header('Location:'.base_url.'pedidos/mis_pedidos');
            }
            
        }

        public function gestion(){
            utils::isAdmin();
            $gestion = true;
            $pedido = new pedido();
            $pedidos = $pedido->getAll();
            require_once'view/pedido/mis_pedidos.php';
        }

        public function estado(){
            Utils::isAdmin();
            if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
                //recoger los datos del pedido
                $id = $_POST['pedido_id'];
                $estado = $_POST['estado'];
                //Actualizacion del estado del pedido
                $pedido = new pedido();
                $pedido->setId($id);
                $pedido->setSituacion($estado);
                $pedido->updateStatus();
                
                header('Location:'.base_url.'pedidos/detalle&id='.$id);
            }else{
                header('Location:'.base_url);
            }
        }

    }
?>