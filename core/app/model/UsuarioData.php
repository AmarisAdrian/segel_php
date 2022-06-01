<?php
class UsuarioData{
    public static $Tablename = "usuario";
    public function __construct(){
        $this->id = "";
        $this->idTipoDocumento = "";
        $this->idTipoUsuario = "";
        $this->idEstadoUsuario = "";
        $this->noDocumento = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->password = "";
        $this->idGenero = "";
        $this->telefono = "";
        $this->movil = "";
        $this->email = "";
        $this->direccion = "";
        $this->idDepartamento = "";
        $this->idCiudad = "";

    }
    public function Add(){
        $sql = "insert into ".self::$Tablename."(idTipoDocumento,idTipoUsuario,idEstadoUsuario,noDocumento,nombre,apellido,password,idGenero,telefono,movil,email,direccion,idDepartamento,idCiudad)";
        $sql .= "value(\"$this->idTipoDocumento\",\"$this->idTipoUsuario\",\"$this->idEstadoUsuario\",\"$this->noDocumento\",\"$this->nombre\",\"$this->apellido\",\"$this->password\",\"$this->idGenero\",\"$this->telefono\",\"$this->movil\",\"$this->email\",\"$this->direccion\",\"$this->idDepartamento\",\"$this->idCiudad\")";
        Executor::doit($sql);
    }
    public function Update(){
        $sql = "update ".self::$Tablename." set idTipoDocumento=\"$this->idTipoDocumento\",idTipoUsuario=\"$this->idTipoUsuario\",idEstadoUsuario=\"$this->idEstadoUsuario\",noDocumento=\"$this->noDocumento\",nombre=\"$this->nombre\",apellido=\"$this->apellido\",password=\"$this->password\",idGenero=\"$this->idGenero\",telefono=\"$this->telefono\",movil=\"$this->movil\",email=\"$this->email\",direccion=\"$this->direccion\",idDepartamento=\"$this->idDepartamento\",idCiudad=\"$this->idCiudad\" where id=$this->id";
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
    public static function GetByDocumento($noDocumento){
        $sql = "select * from ".self::$Tablename." where noDocumento=".$noDocumento;
        $query = executor::doit($sql);
        return Model::one($query[0],new UsuarioData());
     }
    public static function GetById($id){
       $sql = "select * from ".self::$Tablename." where id=".$id;
       $query = executor::doit($sql);
       return Model::one($query[0],new UsuarioData());
    }
    public static function GetTypeUser(){
        $sql = "select * from ".self::$Tablename." where idTipoUsuario=3";
        $query = executor::doit($sql);
        return Model::many($query[0],new UsuarioData());
     }
     public static function GetUserLogin($usuario,$password){
        $sql = "select * from ".self::$Tablename." where noDocumento=\"$usuario\" and password=\"$password\"";
        $query = executor::doit($sql);
        return Model::one($query[0],new UsuarioData());
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
	*   @method UsuarioData::Search
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
        return Model::many($query[0],new UsuarioData());
    }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new UsuarioData());
    }
    public function GetLike($q){
        $sql ="select * from ".self::$Tablename."where nombre like '%$q%'";
        $query = executor::doit($sql);
        return Model::many($query[0],new UsuarioData());
    }
   }
?>
