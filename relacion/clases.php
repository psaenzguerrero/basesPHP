<?php

    class cliente{
        private $bd;
        private $nif;
        private $nombre;
        private $edad;
        private $usuario;
        private $pass;

        public function __construct(mysqli &$bd, String $n="", String $nom="", int $e=0 ,String $u="",String $p=""){
            $this->bd=$bd;
            $this->nif=$n;
            $this->nombre=$nom;
            $this->edad=$e;
            $this->usuario=$u;
            $this->pass=$p;
        }
        public function get_datos(){
            $sent ="SELECT * FROM cliente;";
            $cons = $this->bd->prepare($sent);

            $cons->bind_result($this->nif,$this->nombre,$this->edad,$this->usuario,$this->pass);

            $cons->execute();

            while ($cons->fetch()) {
                echo $this;
            }

            $cons->close();
        }
        

        public function __toString(){
            $str = "<br> NIF: ".$this->nif."<br> NOMBRE: ".$this->nombre."<br> EDAD: ".$this->edad."<br> USUARIO: ".$this->usuario."<br>";
            return $str;
        }

        public function __destruct(){
            $this->bd->close();
        }
    }
    class venta{
        private $bd;
        private $cliente;
        private $producto;
        private $fecha;
        private $cantidad;
        private $estado;

        public function __construct(mysqli &$bd, String $cli="", int $p=0, date $f="1/1/2000" , float $cant=0.0, String $e=""){
            $this->bd=$bd;
            $this->cliente=$cli;
            $this->producto=$p;
            $this->fecha=$f;
            $this->cantidad=$cant;
            $this->estado=$e;
        }
        public function get_datos(){
            $sent = "SELECT producto.descripcion FROM producto, venta WHERE producto.cod=venta.producto;";

            $cons = $this->bd->prepare($sent);
            $cons->bind_result($this->producto);
            $cons->execute();

            while ($cons->fetch()) {
                echo $this;
            }
            $cons->close();

            $sent2 = "SELECT cliente.nombre FROM cliente, venta WHERE venta.cliente=cliente.nif;";
            $cons2 = $this->bd->prepare($sent2);
            $cons2->bind_result($this->cliente);
            $cons2->execute();

            while ($cons2->fetch()) {
                echo $this;
            }
            $cons2->close();
        }
    }

    class producto{
        private $bd;
        private $cod;
        private $descripcion;
        private $precio;
        public function __construct(mysqli &$bd, int $c=0, String $d="", float $p=0.0){
            $this->bd=$bd;
            $this->cod=$c;
            $this->descripcion=$d;
            $this->precio=$p;

        }

    }
?>