<?php
class mysqlconex
{
  public function conex()
  {
    $enlace = mysqli_connect("localhost", "root", "", "siste_reportes");
    return $enlace;
  }
}
