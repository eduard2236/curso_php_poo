<?php
    require_once'models/producto.php';

    class productosController{
        public function index(){
            $producto = new producto();
            $productos = $producto->getRandon(6);
            //renderizar vista
            include'view/productos/destacados.php';
        }

        public function gestion(){
            utils::isAdmin();
            $producto = new producto();
            $productos = $producto->getAll();
            require_once'view/productos/gestion.php';
        }

        public function crear(){
            utils::isAdmin();
            require_once'view/productos/crear.php';
        }

        public function save(){
            utils::isAdmin();
           
            if(isset($_POST)){
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
                $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
                $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
                //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
                
                if($nombre && $descripcion && $precio && $stock && $categoria){
                    $producto = new producto();
                    $producto->setNombre($nombre);
                    $producto->setDescripcion($descripcion);
                    $producto->setPrecio($precio);
                    $producto->setStock($stock);
                    $producto->setCategoriasId($categoria);
                    //guardar la imagen
                    if(isset($_FILES['imagen'])){
                    $file = $_FILES['imagen'];
                    $filename = $_FILES['imagen']['name'];
                    $mimetype = $_FILES['imagen']['type'];
                    

                    if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' ||$mimetype == 'image/jpeg' ||$mimetype == 'image/gif'){
                        
                        if(!is_dir('uploads/images')){
                            mkdir('uploads/images',0777,true);
                        }
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                        $producto->setImagen($filename);
                    }
                }
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $save = $producto->setId($id);
                        $producto->update();
                    }else{
                    $save = $producto->save();
                    }
                    if($save){
                        $_SESSION['producto'] = "complete";
                    }else{
                        $_SESSION['producto'] = "failed";
                    }
                }else{
                    $_SESSION['producto'] = "failed";
                }
                
            }else{
                $_SESSION['producto'] = "failed";
            }
            header("location:".base_url.'productos/gestion');
        }

        public function edit(){
            utils::isAdmin();
            if(isset($_GET['id'])){
                $edit = true; 
                $id = $_GET['id'];

                $producto = new producto();
                $producto->setId($id);
                $pro = $producto->getOne();
            require_once'view/productos/crear.php';;

            }else{
                header("location:".base_url."productos/gestion");  
            }
            
        }

        public function eliminar(){
            utils::isAdmin();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $producto = new producto();
                $producto->setId($id);

                $delete = $producto->delete();
                if($delete){
                    $_SESSION['producto'] = "exitoso";
                }else{
                    $_SESSION['producto'] = "fallido";
                }
            }else{
                $_SESSION['producto'] = "fallido";
            }
            header("location:".base_url."productos/gestion");
        }

    }
