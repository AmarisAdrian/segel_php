<?php
class VotanteData{
    public static $Tablename = "votante";
    public function __construct(){
        $this->id = "";
        $this->idTipoDocumento = "";
        $this->idEstadoUsuario = "";
        $this->idUsuario = "";
        $this->noDocumento = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->idGenero = "";
        $this->movil = "";
        $this->fijo ="";
        $this->direccion = "";
        $this->idDepartamento = "";
        $this->idCiudad = "";
        $this->firma = "";
    }
    public function Add(){
        try
            {
            $row = false;
            $sql = "insert into ".self::$Tablename."(idTipoDocumento,idEstadoUsuario,idUsuario,noDocumento,nombre,apellido,idGenero,movil,fijo,direccion,idDepartamento,idCiudad,firma)";
            $sql .= "value(\"$this->idTipoDocumento\",\"$this->idEstadoUsuario\",\"$this->idUsuario\",\"$this->noDocumento\",\"$this->nombre\",\"$this->apellido\",\"$this->idGenero\",\"$this->movil\",\"$this->fijo\",\"$this->direccion\",\"$this->idDepartamento\",\"$this->idCiudad\",\"$this->firma\")";
            $query = executor::doit($sql);
            if($query[1]){
                $row = true;
            } 
        }catch(MySQLException $ex){
           throw ex;
           $row = false;
        }
        return $row;
    }
    public function Update(){
        $sql = "update ".self::$Tablename." set idTipoDocumento=\"$this->idTipoDocumento\",idEstadoUsuario=\"$this->idEstadoUsuario\",idUsuario=\"$this->idUsuario\",noDocumento=\"$this->noDocumento\",nombre=\"$this->nombre\",apellido=\"$this->apellido\",idGenero=\"$this->idGenero\",movil=\"$this->movil\",fijo=\"$this->fijo\",direccion=\"$this->direccion\",idDepartamento=\"$this->idDepartamento\",idCiudad=\"$this->idCiudad\",firma=\"$this->firma\" where id=$this->id";
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
       return Model::one($query[0],new VotanteData());
    }
    public static function GetByNoDoc($noDocumento){
        $sql = "select * from ".self::$Tablename." where noDocumento=".$noDocumento;
        $query = executor::doit($sql);
        return Model::one($query[0],new VotanteData());
     }
     public static function GetUserById($idUsuario){
        $sql = "select * from ".self::$Tablename." where idUsuario=".$idUsuario;
        $query = executor::doit($sql);
        return Model::many($query[0],new VotanteData());
     }
     /**
	*   Total filas para una consulta
	*   @method VotanteData::CountAll
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
	*   @method VotanteData::Search
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
        return Model::many($query[0],new VotanteData());
    }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new VotanteData());
    }
    public function GetLike($q){
        $sql ="select * from ".self::$Tablename."where nombre like '%$q%'";
        $query = executor::doit($sql);
        return Model::many($query[0],new VotanteData());
    }
   }
?>
