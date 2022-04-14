<div class="container">

    <!-- Modal -->
    <div class="modal fade" id="modaledt" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar empleado</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" id="nombre_m">
                            <input type="hidden" id="id_empleado">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Correo electronico</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">sexo</label>
                            <div class="radio">
                                <label><input type="radio" name="optradio_m" id="optradio_m" value="M">Masculino</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio_m" id="optradio_m" value="F">Femenino</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">area</label>
                            <select name="area" class="form-control" id="area">

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Descripcion</label>
                            <textarea class="form-control" name="descripcion_m" id="descripcion_m" cols="10" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for=""></label>
                            <div class="checkbox">
                                <label><input type="checkbox" id="boletin_m" value="1">Deseo recibir boletin informativo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Roles</label>
                            <div class="col-sm-6 " id="check-ajax">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success guardar_edt" >Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

</div>