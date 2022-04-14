<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/bootstrap/css/dataTables.min.css">
    <script src="dist/bootstrap/js/jquery.min.js"></script>
    <script src="dist/bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/bootstrap/js/dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Registro de usuario</title>
</head>

<body>
    <!-- Inicio navbar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Bienvenido</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active" ><a href="#" onclick="location.reload()">Registro</a></li>
                <li><a  onclick="listar()" href="#">Listar</a></li>
            </ul>

        </div>
    </nav>
    <!-- fin navbar -->
    <div class="container-fluid">
        <div class="template">
            <h2>Crear Empleado</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info">
                        Los campos con <strong>(*)</strong> son obligatorios.
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre">Nombre completo* :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre completo del empleado" name="nombre">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Correo electronico* :</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" placeholder="Correo electronico" name="email">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sexo">Sexo* :</label>
                        <div class="col-sm-6">
                            <div class="radio">
                                <label><input type="radio" name="optradio" id="optradio" value="M">Masculino</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio" id="optradio" value="F">Femenino</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Area* :</label>
                        <div class="col-sm-6">
                            <select name="area" class="form-control" id="area">

                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="desc">Descripcion* :</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="boletin"></label>
                        <div class="col-sm-6">
                            <div class="checkbox">
                                <label><input type="checkbox" id="boletin" value="1">Deseo recibir boletin informativo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="roles">Roles* :</label>
                        <div class="col-sm-6" id="check-ajax">

                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="margin-left: 10px;" for=""></label>
                        <div class="col-sm-6">
                            <button class="btn btn-primary btn-block" id="crear_empleado">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="dist/js/dashboard.js"></script>

</html>