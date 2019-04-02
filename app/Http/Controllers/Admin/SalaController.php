<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sala;
use App\TipoSala;

use Auth;

class SalaController extends Controller
{
    public function getSala(){
        
        $salas = Sala::all();
        $tipos_sala = TipoSala::all();
        return view('agregarsala')->with(compact('salas', 'tipos_sala'));
    }
    public function postSala(Request $request){
        $rules = [
                'tipo' => 'required|in:Consulta,Simulación Compleja,Task Training,Hospitalización,Farmacia,Quirófano,Farmacia Comunitaria,Ambulancia',
                'capacidad' => 'required|integer|between:2,75',
        ];
        
        $messages = [
            'capacidad.between' => 'La capacidad introducida debe ser mayor que 1 y menor que 76.',
            'capacidad.required' => 'Es necesario ingresar un valor para la capacidad de la sala.',
            'capacidad.integer' => 'El valor introducido en la capacidad debe de ser un número',
            'tipo.in' => 'El tipo introducido ha de ser uno de los de la lista',
        ];
        
        //si la validacion no se cumple no se avanza
        $this->validate($request, $rules, $messages );
        
        //Forma 2 de crear incident:
        $sala = new Sala();
        $sala->tipo = $request->input('tipo');
        $sala->capacidad = $request->input('capacidad');
            
        $sala->save();
        
        return back()->with('success', 'Sala añadida');

    }
    
    public function destroy($id)
    {
        $salas = Sala::find($id);
        
        $salas->delete();
        
        return back()->with('fail', 'Sala eliminada'); 

        
    }
}
