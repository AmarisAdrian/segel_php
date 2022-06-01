<?php
class DepartamentoData{
    public static $Tablename = "departamento";
    public function __construct(){
        $this->id = "";
        $this->nombre = "";
    }
    public function Add(){
        $row = false;
        $sql = "insert into ".self::$Tablename."(id,nombre)";
        $sql .= "value(\"$this->id\",\"$this->nombre\")";
        $query = executor::doit($sql);
        if($query[1]){
            $row = true;
        }        
        return $query[1];
    }
    public function Update(){
        $sql = "update ".self::$Tablename." set nombre=\"$this->nombre\" where id=$this->id";
        $query = Executor::doit($sql);
        return $query[1];
    }
    public function Delete(){
        $sw = false;
		$sql = "delete from ".self::$Tablename." where id=$this->id";
        $query = executor::doit($sql);
        return $query[1];
	}
    public static function DeleteById($id){
        $sql = "delete from ".self::$Tablename." where id=$id";
        // Class Executor retorna un array donde el objeto 0 es la información de la consulta y  el objeto 1 el numero de columnas afectadas
		$query = executor::doit($sql);
        return $query[1];
    }
    public static function GetById($id){
       $sql = "select * from ".self::$Tablename." where id=$id";
       $query = executor::doit($sql);
       return Model::one($query[0],new DepartamentoData());
    }

    /**
	*   Total filas para una consulta
	*   @method DepartamentoData::CountAll
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
	*   @method DepartamentoData::Search
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
        $query = executor::doit($sql);
        return Model::many($query[0],new DepartamentoData());
    }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new DepartamentoData());
    }
    public static function GetLatest(){
        $sql ="select id from ".self::$Tablename." where id=(select MAX(id)from ".self::$Tablename." )";
        $query = executor::doit($sql);
        return Model::one($query[0],new DepartamentoData());
    }
    public function GetLike($q){
        $sql ="select * from ".self::$Tablename." where nombre like '%$q%'";
        $query = executor::doit($sql);
        return Model::many($query[0],new DepartamentoData());
    }
   }
?>