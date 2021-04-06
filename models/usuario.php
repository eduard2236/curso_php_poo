<?php
    class usuario{

        private $id;
        private $nombre;
        private $apellidos;
        private $email;
        private $password;
        private $rol;
        private $imagen;
        private $db;

        public function __construct(){
            $this->db= Database::connect();
        }

        public function getId(){
           return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getApellidos(){
            return  $this->apellidos;
        }

        public function getEmail(){
            return  $this->email;
        }

        public function getPassword(){
            return  $this->password;
        }

        public function getRol(){
            return  $this->rol;
        }

        public function getImagen(){
            return  $this->imagen;
        }

        public function setId($id){
            $this->id= $id;
        }

        public function setNombre($nombre){
            $this->nombre = $this->db->real_escape_string($nombre);
        }

        public function setApellido($apellidos){
            $this->apellidos= $this->db->real_escape_string($apellidos);
        }

        public function setEmail($email){
            $this->email= $this->db->real_escape_string($email);
        }

        public function setPassword($password){
            $this->password = password_hash($this->db->real_escape_string($password),PASSWORD_BCRYPT,['cost'=> 4]);
        }

        public function setRol($rol){
            $this->rol= $rol;
        }

        public function setImagen($imagen){
            $this->imagen= $imagen;
        }

        public function save(){
            $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user',NULL)";
            $save = $this->db->query($sql); 
            $result= false;
            if($save){
                $result= true;
                return $result;
            }
        }

    }

?>