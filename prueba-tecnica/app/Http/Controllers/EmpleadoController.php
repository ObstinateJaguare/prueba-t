<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roles;
use App\Models\area;
use App\Models\Empleado;
use App\Models\empleado_rol;
// use Illuminate\Foundation\Validation\ValidatesRequests;

class EmpleadoController extends Controller
{
    public function index()
    {
        return "Hola mundo";
    }
    public function roles()
    {
        $roles =  roles::all();
        try {
            return response()->json($roles, 200);
        } catch (\Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }
    public function area()
    {
        $area =  area::all();
        try {
            return response()->json($area, 200);
        } catch (\Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function create(Request $request)
    {
        try {

            $request->validateWithBag('post', [
                'nombre' => 'required',
                'email' => 'required',
                'sexo' => 'required',
                'area_id' => 'required',
                'descripcion' => 'required',
                'boletin' => 'required',
                'roles_empleado' => 'required'

            ]);

            $empleado = new Empleado;
            $verify = Empleado::where('email', 'like', "%{$request->email}%")->exists();
            if ($verify) return response()->json('exist', 200);

            $empleado->nombre = $request->nombre;
            $empleado->email = $request->email;
            $empleado->sexo = $request->sexo;
            $empleado->area_id = $request->area_id;
            $empleado->descripcion = $request->descripcion;
            $empleado->boletin = $request->boletin;


            $empleado->save();

            foreach ($request->roles_empleado as $value) {
                $roles =  new empleado_rol;
                $roles->rol_id = $value;
                $roles->empleado_id = $empleado->id;
                $roles->save();
            }

            $response = array(
                "empleado" => $empleado,
                "roles" => $roles,
                "status" => 200
            );

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }
    public function roles_empleado(Request $request)
    {

        try {
            $request->validateWithBag('post', [
                'id_empleado' => 'required',
                'rol_empleado' => 'required'

            ]);
            $roles =  new empleado_rol;

            $roles->rol_id = $request->rol_empleado;
            $roles->empleado_id = $request->id_empleado;
            $roles->save();
        } catch (\Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function get_empleados()
    {
        $empleados =  Empleado::with('area')->orderBy('id', 'ASC')->get();
        try {
            return response()->json($empleados, 200);
        } catch (\Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }
    public function read_empleado(Request $request)
    {
        try {
            $request->validateWithBag('post', [
                'id' => 'required'
            ]);
            $search = Empleado::where('id', $request->id)->first();
            return response()->json($search, 200);
        } catch (\Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }
    public function update(Request $request)
    {
        try {

            $request->validateWithBag('post', [

                'id' => 'required'
            ]);

            $empleado = new Empleado;

            $empleado = empleado::find($request->id);

            $empleado->nombre = $request->nombre;
            $empleado->email = $request->email;
            $empleado->sexo = $request->sexo;
            $empleado->area_id = $request->area_id;
            $empleado->descripcion = $request->descripcion;
            $empleado->boletin = $request->boletin;


            $empleado->save();

            foreach ($request->roles_empleado as $value) {
                $roles =  new empleado_rol;
                $roles->rol_id = $value;
                $roles->empleado_id = $request->id;
                $roles->save();
            }

            $response = array(
                "empleado" => $empleado,
                "roles" => $roles,
                "status" => 200
            );

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }
    public function delete(Request $request){

        try {
            $request->validateWithBag('post', [
                'id' => 'required'
            ]);
            $empleado = new Empleado;
            $empleado=empleado::where('id', $request->id)->delete();

            return response()->json($empleado, 200);
        } catch (\Exception $e) {
            return " Error: " . $e->getMessage();
        }

    }
}
