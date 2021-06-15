<?php
class pedido
{

    private $id;
    private $usuarios_id;
    private $pais;
    private $estado;
    private $direccion;
    private $coste;
    private $situacion;
    private $fecha;
    private $hora;
    private $db;
    
    public function getId()
    {
        return $this->id;
    }

    public function getUsuarios_id()
    {
        return $this->usuarios_id;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getCoste()
    {
        return $this->coste;
    }

    public function getSituacion()
    {
        return $this->situacion;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setUsuarios_id($usuarios_id)
    {
        $this->usuarios_id = $usuarios_id;
        return $this;
    }

    public function setPais($pais)
    {
        $this->pais = $this->db->real_escape_string($pais);
        return $this;
    }

    public function setEstado($estado)
    {
        $this->estado = $this->db->real_escape_string($estado);
        return $this;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
        return $this;
    }

    public function setCoste($coste)
    {
        $this->coste = $coste;
        return $this;
    }

    public function setSituacion($situacion)
    {
        $this->situacion = $situacion;
        return $this;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
        return $this;
    }

    public function __construct()
    {
        $this->db = Database::connect();
    }





    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;
    }

    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }

    public function getOneByuser()
    {
        $sql = "SELECT p.id, p.coste FROM pedidos p WHERE p.usuarios_id = {$this->getUsuarios_id()} ORDER BY id DESC LIMIT 1";
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }

    public function getProductosByPedido($id)
    {
        //$sql = "SELECT * FROM productos WHERE id IN (SELECT producto_id FROM pedidos_productos WHERE pedido_id = {$id});";
        $sql = "SELECT pr.*, pp.unidades FROM productos pr INNER JOIN pedidos_productos pp ON pr.id = pp.productos_id WHERE pp.pedidos_id={$id}";
        $productos = $this->db->query($sql);
        return $productos;
    }


    public function save()
    {

        $sql = "INSERT INTO pedidos VALUES(NULL,{$this->getUsuarios_id()},'{$this->getPais()}','{$this->getEstado()}','{$this->getDireccion()}','{$this->getCoste()}','confirm',CURDATE(),CURTIME())";
        //var_dump($sql);
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function save_pivot(){
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach($_SESSION['carrito'] as $elemento){
            $producto = $elemento['producto'];

            $insert = "INSERT INTO pedidos_productos VALUES(NULL,{$pedido_id},{$producto->id},{$elemento['unidades']})";
            $save = $this->db->query($insert);
        }

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
}
