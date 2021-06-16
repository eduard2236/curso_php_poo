<?php
    class categoria{
        private $id;
        private $nombre;
        private $db;

        public function __construct(){
            $this->db = Database::connect();
        }

        public function getId(){
            return $this->id;
         }
 
         public function getNombre(){
             return $this->nombre;
         }

         public function setId($id){
            $this->id= $id;
        }

        public function setNombre($nombre){
            $this->nombre = $this->db->real_escape_string($nombre);
        }

        public function getAll(){
            $categorias = $this->db->query("SELECT * from categorias ORDER BY id DESC");
            return $categorias;
        }

        public function save(){
            $sql = "INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}')";
            $save = $this->db->query($sql); 
            $result= false;
            if($save){
                $result= true;
                return $result;
            }
        }

        public function getCategoria(){
            $producto = $this->db->query("SELECT p.nombre, p.precio, p.imagen, p.id , c.nombre as 'categoria' FROM productos p INNER JOIN categorias c on p.categorias_id = c.id where c.id= '{$this->getId()}' AND p.stock > 0 ");
            return $producto;
        }

        public function getOne(){
            $categoria = $this->db->query("SELECT nombre FROM categorias WHERE id = {$this->getId()}");
            return $categoria->fetch_object();
        }

    }
?>