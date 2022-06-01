<?php
class RegistroVotanteData{
    public static $Tablename = "registro_votante";
    public function __construct(){
        $this->id = "";
        $this->idVotante = "";
        $this->idPuesto = "";
        $this->mesa = "";
        $this->comentario = "";
    }
    public function Add(){
        $sql = "insert into ".self::$Tablename."(idVotante,idPuesto,mesa,comentario)";
        $sql .= "value(\"$this->idVotante\",\"$this->idPuesto\",\"$this->mesa\",\"$this->comentario\")";
        Executor::doit($sql);
    }
    public function Update(){
        $sql = "update ".self::$Tablename." set idVotante=\"$this->idVotante\",idPuesto=\"$this->idPuesto\",mesa=\"$this->mesa\",comentario=\"$this->comentario\" where id=$this->id";
        Executor::doit($sql);
    }
    public function Delete(){
		$sql = "delete from ".self::$Tablename." where id=$this->id";
		Executor::doit($sql);
	}
    public static function DeleteById($id){
		$sql = "delete from ".self::$Tablename." where id=".$id;
		Executor::doit($sql);
	}
    public static function GetById($id){
       $sql = "select * from ".self::$Tablename." where id=".$id;
       $query = executor::doit($sql);
       return Model::one($query[0],new RegistroVotanteData());
    }
    public static function GetByVotante($id){
        $sql = "select * from ".self::$Tablename." where idVotante=".$id;
        $query = executor::doit($sql);
        return Model::one($query[0],new RegistroVotanteData());
     }
     public static function GetByUsuario($id){
        $sql = "select * from ".self::$Tablename." where idUsuario=".$id;
        $query = executor::doit($sql);
        return Model::many($query[0],new RegistroVotanteData());
     }
     /**
	*   Busqueda, paginacion y ordenamiento
	*   @method RegistroVotanteData::Search
    *   @param {string} q - palabra a consultar
    *   @param {string} limit - Cantidad a limitar consulta
    *   @param {string} offset - Numero de fila por el cual va a empezar la consulta
    *   @param {string} sort - Columna a ordenar
    *   @param {string} order - Tipo de orden
	*   @access public
	*   @returns {array} - Resultado de consulta
	*/
    public static function Search($q = "", $limit = 8,  $offset = 0, $sort = "nombre", $order = "ASC" ){
        $sql ="select * from ".self::$Tablename;
        $sort = $sort == "" ? "nombre" : $sort;
        // agregar parametro where en caso de ser positivo la busqueda
        if($q != ""){
            $sql .= " where nombre like '%$q%'";
        }
        $sql .= " ORDER BY $sort $order";
        $sql .= " LIMIT $limit OFFSET $offset";
        //echo $sql."</br>";
        $query = executor::doit($sql);
        //var_dump($query);die;
        return Model::many($query[0],new RegistroVotanteData());
    }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new RegistroVotanteData());
    }
    public function GetLike($q){
        $sql ="select * from ".self::$Tablename."where nombre like '%$q%'";
        $query = executor::doit($sql);
        return Model::many($query[0],new RegistroVotanteData());
    }
   }
?>