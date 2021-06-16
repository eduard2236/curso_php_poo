<?php
class producto
{

    private $id;
    private $categorias_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;



    public function __construct()
    {
        $this->db = Database::connect();
    }



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of categorias_id
     */
    public function getCategoriasId()
    {
        return $this->categorias_id;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Get the value of oferta
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of categorias_id
     *
     * @return  self
     */
    public function setCategoriasId($categorias_id)
    {
        $this->categorias_id = $this->db->real_escape_string($categorias_id);

        return $this;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

        return $this;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */
    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);

        return $this;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);

        return $this;
    }

    /**
     * Set the value of oferta
     *
     * @return  self
     */
    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);

        return $this;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */
    public function setImagen($imagen)
    {
        $this->imagen = $this->db->real_escape_string($imagen);

        return $this;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;   
    }

    public function getOne(){
        $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }

    public function getRandon($limit){
        $producto = $this->db->query("SELECT * FROM productos WHERE stock > 0 ORDER BY RAND() LIMIT $limit");
        return $producto;
    }

    public function save(){
    
        $sql = "INSERT INTO productos VALUES(NULL,{$this->getCategoriasId()},'{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},NULL,CURDATE(),'{$this->getImagen()}')";
        $save = $this->db->query($sql); 
        $result= false;
        if($save){
            $result= true;
        }
        return $result;
    }

    public function update(){
    
        $sql = "UPDATE productos SET categorias_id={$this->getCategoriasId()}, nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()},stock={$this->getStock()},fecha=CURDATE()";
        if($this->getImagen() != null){
            $sql .= ",imagen='{$this->getImagen()}' WHERE id = {$this->getId()}";
        }else{
            $sql .="WHERE id = {$this->getId()}";
        }
        $save = $this->db->query($sql); 
        $result= false;
        if($save){
            $result= true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE from productos where id = {$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }

}
