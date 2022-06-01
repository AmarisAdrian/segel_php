<?php
    class ChartJson{
        public static function ChartPie()
        {
            $Sp = spData::GetAllCantidadVotosByPuesto();
            echo json_encode($Sp);
            echo '<script language="javascript">alert("entro cv");</script>';
        }
    }

?>