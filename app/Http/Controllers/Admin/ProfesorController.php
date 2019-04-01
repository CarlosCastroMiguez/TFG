<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profesor;
use Auth;

class ProfesorController extends Controller
{
    public function getProfesor(){
        
        $profesores = Profesor::all();
        return view('agregarprofesor')->with(compact('profesores'));
    }
    public function postProfesor(Request $request){
        $rules = [
            'nombre' => 'required|min:2|max:15',
            'departamento' => 'required|min:5|max:30',
        ];
        
        $messages = [
            'nombre.required' => 'Es necesario ingresar un nombre de profesor',
            'nombre.min' => 'El nombre debe presentar al menos 2 caracteres', 
            'nombre.max' => 'El nombre debe presentar como máximo 15 caracteres', 
            'departamento.required' => 'Es necesario ingresar un departamento',
            'departamento.min' => 'El departamento debe presentar al menos 5 caracteres', 
            'departamento.max' => 'El departamento debe presentar como máximo 30 caracteres',
        ];
        
        //si la validacion no se cumple no se avanza
        $this->validate($request, $rules, $messages );
        
        //Forma 2 de crear incident:
        $profesor = new Profesor();
        
        $profesor->nombre = $request->input('nombre');
        $profesor->departamento = $request->input('departamento');
            
        $profesor->save();
        
        return back();
    }
    
    public function destroy($id)
    {
        $profesores = Profesor::find($id);
        
        $profesores->delete();
        
        return redirect('agregarprofesor')->with('success', 'Profesor eliminado'); 

        
    }
}
