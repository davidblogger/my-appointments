<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Specialty;
use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{
    //Listar Especialidades
    public function index()
    {
    	$specialties = Specialty::all();
    	return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
    	return view('specialties.create');
    }

    //Funcion para validar formulario
    private function performValidation(Request $request)
    {
        //Validar Formulario
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required'
        ];
        $messages = [
            'name.required' => 'El campo Nombre no puede quedar vacio',
            'name.min' => 'Como minimo el nombre debe tener 3 caracteres',
            'description.required' => 'El campo Descripción no puede quedar vacio'
        ];
        $this->validate($request, $rules, $messages);
    }

    //Crear Especialidad
    public function store(Request $request)
    {
    	//dd($request->all());
        $this->performValidation($request);

    	$specialty = new Specialty();
    	$specialty->name = $request->input('name');
    	$specialty->description = $request->input('description');
    	$specialty->save(); //INSERT en la base de datos

        $notification = 'La especialidad se ha creado correctamente';
        return redirect('/specialties')->with(compact('notification'));
    }

    //Editar espacialidad
    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    //Actualizar especialidad
    public function update(Request $request, Specialty $specialty)
    {
        //dd($request->all());
        $this->performValidation($request);

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); //UPDATE en la base de datos

        $notification = 'La especialidad '.$specialty->name.' se ha actualizado correctamente';
        return redirect('/specialties')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        $notification = 'La especialidad '.$specialty->name.' se ha borrado correctamente';
        return redirect('/specialties')->with(compact('notification'));
    }
}


