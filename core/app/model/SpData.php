<?php
    class SpData{
        public function __construct(){
            $this->id = "";
            $this->estado = "";
        }
        public static function GetRankingLider(){
            $sql ="call rankinglider();";
            $query = executor::doit($sql);
            return Model::many($query[0],new SpData());
        }
        public static function GetHistorialVotanteById($id){
            $sql ="call FiltrarHistorialVotante('.$id.');";
            $query = executor::doit($sql);
            return Model::one($query[0],new SpData());
        }
        public static function GetHistorialRegistroById($id){
            $sql ="call FiltrarHistorialRegistro('.$id.');";
            $query = executor::doit($sql);
            return Model::one($query[0],new SpData());
        }
        public static function GetHistorialUsuarioById($id){
            $sql ="call FiltrarHistorialUsuario('.$id.');";
            $query = executor::doit($sql);
            return Model::one($query[0],new SpData());
        }
        public static function GetVotanteById($id){
            $sql ="call FiltrarVotante('.$id.');";
            $query = executor::doit($sql);
            return Model::one($query[0],new SpData());
        }
        public static function GetPuestoVotacion($id){
            $sql ="call filtrarpuestovotacion('.$id.');";
            $query = executor::doit($sql);
            return Model::many($query[0],new SpData());
        }
        public static function GetPuestoVotante($id){
            $sql ="call FiltrarPuestoVotante('.$id.');";
            $query = executor::doit($sql);
            return Model::one($query[0],new SpData());
        }
        public static function GetAllVotanteInscrito(){
            $sql ="call votanteinscrito();";
            $query = executor::doit($sql);
            return Model::many($query[0],new SpData());
        }
        public static function GetAllVotanteNoInscrito(){
            $sql ="call votantenoinscrito();";
            $query = executor::doit($sql);
            return Model::many($query[0],new SpData());
        }
        public static function GetAllVotanteNoInscritoById($id){
            $sql ="call votantenoinscritobyid('.$id.');";
            $query = executor::doit($sql);
            return Model::many($query[0],new SpData());
        }
        public static function GetAllVotanteInscritoByUsuario($id){
            $sql ="call votantenoinscritobyUsuario('.$id.');";
            $query = executor::doit($sql);
            return Model::many($query[0],new SpData());
        }
        public static function GetAllCantidadVotosByPuesto(){
            $sql = "call PuestosMayorVotos();";
            $query = executor::doit($sql);
            return Model::many($query[0],new SpData());
        }
        public static function GetEstadisticasByPuesto()
        {
            $sql = "call EstadisticasPorPuestos();";
            $query = executor::doit($sql);
            return Model::many($query[0], new SpData());
        }
        public static function GetListadoByPuesto($id)
        {
            $sql = "call ListadoByPuesto('.$id.');";
            $query = executor::doit($sql);
            return Model::many($query[0], new SpData());
        }
}
?>