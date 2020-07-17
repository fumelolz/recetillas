<?php

require_once 'controladores/plantilla.controlador.php';


require_once 'controladores/usuarios.controlador.php';
require_once 'controladores/recetas.controlador.php';

require_once 'modelos/usuarios.modelos.php';
require_once 'modelos/recetas.modelos.php';

$plantilla = new ControladorPlantilla();
$plantilla -> mostrarPlantilla();