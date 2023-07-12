<?php
class mysqlconex
{
    public function conex()
    {
        $enlace = mysqli_connect("localhost", "root", "", "tipos_datos");
        return $enlace;
    }
}
?>