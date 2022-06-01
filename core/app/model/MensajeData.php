<?php
class MensajeData{
    public static $Tablename = "mensaje";
    public function __construct(){
        $this->id = "";
        $this->asunto = "";
        $this->idUsuarioEm = "";
        $this->idUsuarioRec = "";
        $this->estado = "";
        $this->mensaje = "";
        $this->fecha = "";
    }
    public function Add(){
        $sql = "insert into ".self::$Tablename."(asunto,idUsuarioEm,idUsuarioRec,estado,mensaje,fecha)";
        $sql .= "value(\"$this->asunto\",\"$this->idUsuarioEm\",\"$this->idUsuarioRec\",\"$this->estado\",\"$this->mensaje\",\"$this->fecha\")";
        $query = Executor::doit($sql);
        return $query[1];
    }
    public function Update(){
        $sql = "update ".self::$Tablename." set asunto=\"$this->asunto\",idUsuarioRec=\"$this->idUsuarioRec\",estado=\"$this->estado\",mensaje=\"$this->mensaje\",fecha=\"$this->fecha\" where id=$this->id";
        $query = Executor::doit($sql);
        return $query[1];
    }
    public function UpdateEstadoById(){
        $sql = "update ".self::$Tablename." set estado=1 where id=$this->id";
        $query = Executor::doit($sql);
        return $query[1];
    }
    public function Delete(){
		$sql = "delete from ".self::$Tablename." where id=$this->id";
        $query = Executor::doit($sql);
        return $query[1];
	}
    public static function DeleteById($id){
		$sql = "delete from ".self::$Tablename." where id=".$id;
        $query = Executor::doit($sql);
        return $query[1];
	}
    public static function GetById($id){
       $sql = "select * from ".self::$Tablename." where id=".$id;
       $query = executor::doit($sql);
       return Model::one($query[0],new MensajeData());
    }
    public static function GetByUsuario($id){
        $sql = "select * from ".self::$Tablename." where idUsuarioRec=".$id;
        $query = executor::doit($sql);
        return Model::many($query[0],new MensajeData());
     }
     public static function GetByMensajeEnviado($idUsuarioEm){
        $sql = "select * from ".self::$Tablename." where idUsuarioEm=".$idUsuarioEm;
        $query = executor::doit($sql);
        return Model::many($query[0],new MensajeData());
     }
     public static function GetByUsuarioNoLeido($idUsuarioRec){
        $sql = "select * from ".self::$Tablename." where estado=0 and idUsuarioRec=".$idUsuarioRec;
        $query = executor::doit($sql);
        return Model::one($query[0],new MensajeData());
     }
     public static function GetByUsuarioLeido($idUsuarioRec){
        $sql = "select * from ".self::$Tablename." where estado=1 and idUsuarioRec=".$idUsuarioRec;
        $query = executor::doit($sql);
        return Model::many($query[0],new MensajeData());
     }
           /**
	*   Total filas para una consulta
	*   @method CiudadData::CountAll
	*   @param {string} q - palabra a consultar
	*   @access public
	*   @returns {int} - Cantidad total de filas
	*/
    public static function CountAll($q = ""){
        $sql ="select COUNT(*) from ".self::$Tablename;
        if($q != ""){
            $sql .= " where nombre like '%$q%'";
        }
        $query = executor::doit($sql);
        $row = $query[0]->fetch_array();
        return $row[0];
    }

    /**
	*   Busqueda, paginacion y ordenamiento
	*   @method AnexoUsuarioData::Search
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
        return Model::many($query[0],new MensajeData());
    }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new MensajeData());
    }
    public function GetLike($q){
        $sql ="select * from ".self::$Tablename."where nombre like '%$q%'";
        $query = executor::doit($sql);
        return Model::many($query[0],new MensajeData());
    }
   }
?>