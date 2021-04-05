<?php
    class usuario{

        private $id;
        private $nombre;
        private $apellidos;
        private $email;
        private $password;
        private $rol;
        private $imagen;

        public function getId(){
           return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getApellidos(){
            return $this->apellidos;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getRol(){
            return $this->rol;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function setId($id){
            $this->id= $id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setApellido($apellidos){
            $this->apellidos= $apellidos;
        }

        public function setEmail($email){
            $this->email= $email;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function setRol($rol){
            $this->rol= $rol;
        }

        public function setImagen($imagen){
            $this->imagen= $imagen;
        }

    }

?>