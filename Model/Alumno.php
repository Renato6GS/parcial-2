<?php

/**
 * 
 */
class Alumno
{
	private $dpi;
	private $nombres;
	private $apellidos;
	private $nit;
	private $email;
	private $estado;

	//CONSTRUCTOR DE LA CLASE ALUMNO
	function __construct($dpi, $nombres, $apellidos, $estado, $nit, $email)
	{
		$this->setDpi($dpi);
		$this->setNombres($nombres);
		$this->setApellidos($apellidos);
		$this->setEstado($estado);
		$this->setNit($nit);
		$this->setEmail($email);
	}

	// getters and setters
	public function getDpi()
	{
		return $this->dpi;
	}

	public function setDpi($dpi)
	{
		$this->dpi = $dpi;
	}

	public function getNombres()
	{
		return $this->nombres;
	}

	public function setNombres($nombres)
	{
		$this->nombres = $nombres;
	}

	public function getApellidos()
	{
		return $this->apellidos;
	}

	public function setApellidos($apellidos)
	{
		$this->apellidos = $apellidos;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function getNit()
	{
		return $this->nit;
	}

	public function setNit($nit)
	{
		$this->nit = $nit;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}


	public function setEstado($estado)
	{

		if (strcmp($estado, 'on') == 0) {
			$this->estado = 1;
		} elseif (strcmp($estado, '1') == 0) {
			$this->estado = 'checked';
		} elseif (strcmp($estado, '0') == 0) {
			$this->estado = 'of';
		} else {
			$this->estado = 0;
		}
	}

	public static function save($alumno)
	{
		$db = Db::getConnect(); // Nos conectamos a la base de datos. El :: es como ->, pero para métodos estáticos.
		//var_dump($alumno);   // ESTO SIRVE PARA VER LAS VARIABLES EN EL NAVEGADOR
		//die();  // PARA TERMINAR CON  LA CONEXION

		//ESTE ES UN METODO PARA INGRESAR LOS DATOS DEL ALUMNOS

		$insert = $db->prepare('INSERT INTO alumno VALUES (NULL, :nombres,:apellidos,:estado)');
		//utilizamos binvalue para evitar  ingreso anomalo de datos como xss o sql injection

		$insert->bindValue('nombres', $alumno->getNombres());
		$insert->bindValue('apellidos', $alumno->getApellidos());
		$insert->bindValue('estado', $alumno->getEstado());
		$insert->execute();  //mketodo encargado de realizar la operacion 
	}

	//funcion encargada de retornar todos los datos de los alumnos
	public static function all()
	{
		$db = Db::getConnect();

		//arreglo en php 
		$listaAlumnos = [];
		//hacemos una consulta sql a la base de datos
		$consulta = $db->query('SELECT * 
			FROM tbl_personas as per 
			INNER JOIN tbl_usuarios as usu 
			ON usu.dpi_persona = per.dpi_persona 
			INNER JOIN tbl_factulades as fac ON fac.id_facultad = usu.id_facultad 
			order by per.dpi_persona');

		foreach ($consulta->fetchAll() as $alumno) {
			$listaAlumnos[] = new Alumno($alumno['id'], $alumno['nombres'], $alumno['apellidos'], $alumno['estado']);
		}
		return $listaAlumnos;
	}

	//funcion encargadda de buscar por id

	public static function searchById($id)
	{
		$db = Db::getConnect();
		$select = $db->prepare('SELECT * 
			FROM tbl_personas as per 
			INNER JOIN tbl_usuarios as usu 
			ON usu.dpi_persona = per.dpi_persona 
			INNER JOIN tbl_factulades as fac ON fac.id_facultad = usu.id_facultad 
			WHERE per.dpi_persona = :dpi_persona');
		$select->bindValue('id', $id);
		$select->execute();

		$alumnoDb = $select->fetch();  //devuelve el registro de la busqueda

		//lo pasamos a la clase alumno para manejarlo mas facil
		$alumno = new Alumno($alumnoDb['id'], $alumnoDb['nombres'], $alumnoDb['apellidos'], $alumnoDb['estado']);
		//var_dump($alumno); Mostrar mensajes en pantalla para debugear, devuelve un arreglo con los datos del alumno
		//die();
		//retornamos el alumno
		return $alumno; // Solo devolvemos 1 alumno

	}

	public static function update($alumno)
	{
		$db = Db::getConnect();
		$update = $db->prepare('UPDATE alumno SET nombres=:nombres, apellidos=:apellidos, estado=:estado WHERE id=:id');
		$update->bindValue('nombres', $alumno->getNombres());
		$update->bindValue('apellidos', $alumno->getApellidos());
		$update->bindValue('estado', $alumno->getEstado());
		$update->bindValue('id', $alumno->getId());
		$update->execute();
	}

	//esta funcion es necesario validarla de forma correcta debido a que eliminar un objeto puede causar problemas con el sistema

	public static function delete($id)
	{
		$db = Db::getConnect();
		$delete = $db->prepare('DELETE  FROM alumno WHERE id=:id');
		$delete->bindValue('id', $id);
		$delete->execute();
	}
}