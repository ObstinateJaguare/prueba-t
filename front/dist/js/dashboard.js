
$(document).ready(function () {
    roles();
    area();
});
const base_url = "http://127.0.0.1:8000/api/empleado/";
let detalle_roles = "";
let detalle_select = "";
let miCheckbox = document.getElementById('boletin');

let rolesadd = new Array()

//cargar la informacion de los roles 
function roles() {
    $.ajax({
        url: base_url + 'roles',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $('#check-ajax').empty();
            response.forEach(e => {
                detalle_roles = '<div class="checkbox">' +
                    '<label><input class="add_rol" type="checkbox" name="rol_empleado" id="rol_empleado" value="' + e.id + '" data-id="' + e.id + '"> <strong>' + e.nombre + '</strong></label>' +
                    '</div>';
                $('#check-ajax').append(detalle_roles);
            });


        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        }
    });
}

function area() {
    $.ajax({
        url: base_url + 'area',
        type: 'GET',
        dataType: 'json',
        success: function (response) {

            response.forEach(e => {
                let htmlarea = '<option value="' + e.id + '">' + e.nombre + '</option>';
                detalle_select += htmlarea;
            });
            $('#area').append(detalle_select);
        },
        error: function (xhr) {
            alert('Disculpe, existió un problema');
        }
    });
}
miCheckbox.addEventListener('click', function () {
    if (miCheckbox.checked) {
        $("#boletin").val(1);
    } else {
        $("#boletin").val(0);
    }
});


$(document).on('click', '.add_rol', function (e) {
    let checkboxes = document.querySelectorAll('input[name="rol_empleado"]:checked');
    let values = [];
    checkboxes.forEach((checkbox) => {

        values.push(checkbox.value);
    });

    rolesadd.splice(0, rolesadd.length);
    rolesadd = values;

});


$("#crear_empleado").click(function () {
    let nombre = $("#nombre").val();
    let email = $("#email").val();
    let sexo = $("#optradio").val();
    let area_id = $("#area").val();
    let descripcion = $("#descripcion").val();
    let boletin = $("#boletin").val();

    if (nombre == "" || email == "" || sexo == "" || area_id == "" || descripcion == "" || boletin == "") {
        alert("No es permitido enviar campos vacios.");
    } else {
        let data = {
            "nombre": nombre,
            "email": email,
            "sexo": sexo,
            "area_id": area_id,
            "descripcion": descripcion,
            "boletin": boletin,
            "roles_empleado": rolesadd
        }

        $.ajax({
            url: base_url + 'create',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    swal("Excelente!", "Creado con exito!", "success")
                    $("#nombre").val("");
                    $("#email").val("");
                    $("#optradio").val("");
                    $("#area").val("");
                    $("#descripcion").val("");
                    $("#boletin").val("");
                }


            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            }
        });

    }

});

function guardar_roles(id_empleado) {
    rolesadd.forEach(e => {

        $.ajax({
            url: base_url + 'asignar_roles',
            type: 'post',
            data: { "rol_empleado": e.id, "id_empleado": id_empleado },
            dataType: 'json',
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            }
        });
    });

}

function listar() {
    $.ajax({
        url: 'listar.php',
        method: "POST",
        success: function (response) {
            $(".template").html(response);
            get_empleados();
            roles();
            area();
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        }
    });
}

function get_empleados() {
    $.ajax({
        url: base_url + 'get_empleados',
        type: 'get',
        dataType: 'json',
        success: function (response) {
            response.forEach(e => {
                if (e.boletin == 1) {
                    var boletin = "Si";
                } else {
                    var boletin = "No";
                }
                let btn_m = '<button class="btn btn-default btn-sm editar" data-id="' + e.id + '" data-toggle="modal" data-target="#modaledt">' +
                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>' +
                    '</button>';
                let btn_delete = '<button class="btn btn-default btn-sm eliminar" data-id="' + e.id + '">' +
                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/></svg>' +
                    '</button>';
                let detalle = '<tr style="cursor:pointer;"> ' +
                    '<td style="text-align:center;"  >' + e.nombre + '</td>' +
                    '<td style="text-align:center;"  >' + e.email + '</td>' +
                    '<td style="text-align:center;"  >' + e.sexo + '</td>' +
                    '<td style="text-align:center;"  >' + e.area.nombre + '</td>' +
                    '<td style="text-align:center;"  >' + boletin + '</td>' +
                    '<td style="text-align:center;"  >' + btn_m + '</td>' +
                    '<td style="text-align:center;"  >' + btn_delete + '</td>' + '</tr>';
                $('#tbl_empleados tbody').append(detalle);

            });
            $('#tbl_empleados').dataTable();
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        }
    });
}
$(document).on('click', '.editar', function (e) {
    let id_empleado = $(this).data("id");
    $.ajax({
        url: base_url + 'read_empleado',
        type: 'post',
        data: { "id": id_empleado },
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $("#nombre_m").val(response.nombre);
            $("#email").val(response.email);
            $("#optradio_m").val(response.sexo);
            $("#area").val(response.area_id);
            $("#descripcion_m").val(response.descripcion);
            $("#boletin_m").val(response.boletin);
            $("#id_empleado").val(id_empleado);


        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        }
    });
});

$(document).on('click', '.eliminar', function (e) {
   let id= $(this).data("id");
   let data={
       "id":id
   }
    $.ajax({
        url: base_url + 'delete',
        type: 'post',
        data: data,
        dataType: 'json',
        success: function (response) {

        
           
                swal("Excelente!", "Eliminado con exito!", "success")
                listar();

            

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        }
    });

});

$(document).on('click', '.guardar_edt', function (e) {
    let nombre = $("#nombre_m").val();
    let email = $("#email").val();
    let sexo = $("#optradio_m").val();
    let area_id = $("#area").val();
    let descripcion = $("#descripcion_m").val();
    let boletin = $("#boletin_m").val();
    let id_empleado = $("#id_empleado").val();
    if (nombre == "" || email == "" || sexo == "" || area_id == "" || descripcion == "" || boletin == "") {
        alert("No es permitido enviar campos vacios.");
    } else {
        let data = {
            "nombre": nombre,
            "email": email,
            "sexo": sexo,
            "area_id": area_id,
            "descripcion": descripcion,
            "boletin": boletin,
            "roles_empleado": rolesadd,
            "id": id_empleado
        }
        
        $.ajax({
            url: base_url + 'update',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function (response) {

                $("modaledt").modal("toggle");
                $('.fade').remove();

                $('body').removeClass('modal-open');
                if (response.status == 200) {
                    swal("Excelente!", "Actualizado con exito!", "success")
                    listar();

                }

            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            }
        });

    }

});
