<?php


$controllers = array(
	'alumno' => ['index', 'register', 'save', 'show', 'updateshow', 'update', 'delete', 'search', 'error']
);

// El controller se está seteando en el index.php
if (array_key_exists($controller,  $controllers)) { // Aquí valida controller=alumno
	if (in_array($action, $controllers[$controller])) { // Aquí valida action=value
		call($controller, $action);
	} else {
		call('alumno', 'error');
	}
} else {
	call('alumno', 'error');
}

function call($controller, $action)
{
	require_once('Controllers/' . $controller . 'Controller.php'); // Controllers/AlumnoController.php

	switch ($controller) {
		case 'alumno':
			require_once('Model/Alumno.php');
			$controller = new UsuarioController();
			break;
		default:
			# code...
			break;
	}
	$controller->{$action}(); // Por ejemplo, si llamaos a register, ejecuta $controller->register();
}