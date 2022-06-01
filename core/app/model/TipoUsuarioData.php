<?php
class TipoUsuarioData{
    public static $Tablename = "tipo_usuario";
    public function __construct(){
        $this->id = "";
        $this->nombre = "";
    }
    public function Add(){
        $sql = "insert into ".self::$Tablename."(id,nombre)";
        $sql .= "value(\"$this->id\",\"$this->nombre\")";
        Executor::doit($sql);
    }
    public function Update(){
        $sql = "update ".self::$Tablename." set nombre=\"$this->nombre\" where id=$this->id";
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
       return Model::one($query[0],new TipoUsuarioData());
    }
      /**
	*   Busqueda, paginacion y ordenamiento
	*   @method TipoUsuarioData::Search
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
        return Model::many($query[0],new TipoUsuarioData());
    }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new TipoUsuarioData());
    }
    public function GetLike($q){
        $sql ="select * from ".self::$Tablename."where nombre like '%$q%'";
        $query = executor::doit($sql);
        return Model::many($query[0],new TipoUsuarioData());
    }
   }
?>