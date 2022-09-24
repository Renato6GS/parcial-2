<div class="container">
  <h2>Registro de usuarios</h2>
  <form class="pt-4" action="?controller=alumno&&action=save" method="POST">
    <label for="text">Tipo de usuario:</label>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Soy estudiante:
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Estudiante</a>
        <a class="dropdown-item" href="#">Profesor</a>
      </div>
    </div>

    <div class="form-group">
      <label for="text">Carnet:</label>
      <input type="text" class="form-control" id="carnet-1" placeholder="1190" name="carnet-1">
      <input type="text" class="form-control" id="carnet-2" placeholder="19" name="carnet-2">
      <input type="text" class="form-control" id="carnet-3" placeholder="4642" name="carnet-3">
    </div>

    <div class="form-group">
      <label for="text">Nombres:</label>
      <input type="text" class="form-control" id="nombres" placeholder="Ingrese su Nombre" name="nombres">
    </div>

    <div class="form-group">
      <label for="text">Apellidos:</label>
      <input type="text" name="apellidos" class="form-control" placeholder="Ingrese su apellido">
    </div>

    <div class="form-group">
      <label for="text">DPI:</label>
      <input type="text" name="dpi" class="form-control" placeholder="3881819393">
    </div>

    <div class="form-group">
      <label for="text">NIT:</label>
      <input type="text" name="nit" class="form-control" placeholder="413313">
    </div>

    <div class="form-group">
      <label for="text">Email personal:</label>
      <input type="text" name="email" class="form-control" placeholder="correo@gmail.com">
    </div>

    <div class="form-group">
      <label for="text">Teléfono:</label>
      <input type="text" name="telefono" class="form-control" placeholder="8888-3111">
    </div>

    <label for="text">Facultad:</label>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Selecciona una facultad:
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Ingeniería en sistemas</a>
        <a class="dropdown-item" href="#">Medicina</a>
        <a class="dropdown-item" href="#">Psicología</a>
        <a class="dropdown-item" href="#">Administración de empresas</a>
      </div>
    </div>

    <div class="check-box">
      <label>Activo <input type="checkbox" name="estado"> </label>
    </div>

    <button type="submit" class="btn btn-primary">Enviar solicitud</button>

  </form>
</div>