<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Asignatura;
use Auth;

class AsignaturaController extends Controller
{
    public function getAsignatura(){
        
        $asignaturas = Asignatura::all();
        return view('agregarasignatura')->with(compact('asignaturas'));
    }
    public function postAsignatura(Request $request){
        $rules = [
            'nombre' => 'required|min:5|max:150',
            'codigo' => 'required|integer|digits_between:1,10',
            'grado' => 'required|min:5|max:150',
            'curso' => 'required|integer|between:1,6',
            'grupo' => 'required|min:3|max:3',
            
        ];
        
        $messages = [
            
            'nombre.required' => 'Es necesario ingresar un nombre de asignatura',
            'codigo.required' => 'Es necesario ingresar un codigo de asignatura',
            'grado.required' => 'Es necesario ingresar un grado para la asignatura',
            'curso.required' => 'Es necesario ingresar un curso para la asignatura',
            'grupo.required' => 'Es necesario ingresar un grupo para la asignatura',
            
            'nombre.min' => 'El nombre debe presentar al menos 5 caracteres', 
            'nombre.max' => 'El nombre debe presentar como máximo 150 caracteres',
            
            'codigo.integer' => 'El codigo debe ser un numero entero', 
            'codigo.digits_between' => 'El codigo debe tener una longitud de entre 1 y 10 números.',
            
            'grado.min' => 'El grado debe presentar al menos 5 caracteres', 
            'grado.max' => 'El grado debe presentar como máximo 150 caracteres',
            
            'curso.integer' => 'El curso debe ser un numero entero', 
            'curso.between' => 'El curso debe estar entre 1 y 6',
            
            'grupo.min' => 'El grupo debe estar compuesto por 3 caracteres', 
            'grupo.max' => 'El grupo debe estar compuesto por 3 caracteres',
            
        ];
        
        //si la validacion no se cumple no se avanza
        $this->validate($request, $rules, $messages );
        
        //Forma 2 de crear incident:
        $asignatura = new Asignatura();
        
        $asignatura->nombre = $request->input('nombre');
        $asignatura->codigo = $request->input('codigo');
        $asignatura->grado = $request->input('grado');
        $asignatura->curso = $request->input('curso');
        $asignatura->grupo = $request->input('grupo');
            
        $asignatura->save();
        
        return back()->with('success', 'Asignatura añadida');
    }
    
    public function destroy($id)
    {
        $asignaturas = Asignatura::find($id);
        
        $asignaturas->delete();
        
        return back()->with('fail', 'Asignatura eliminada'); 

        
    }
}
