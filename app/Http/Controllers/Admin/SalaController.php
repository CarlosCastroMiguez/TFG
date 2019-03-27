<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sala;
use Auth;

class SalaController extends Controller
{
    public function getSala(){
        
        $salas = Sala::all();
        return view('agregarsala')->with(compact('salas'));
    }
    public function postSala(Request $request){
        $rules = [
                'tipo' => 'required|in:Consulta,SimulacionCompleja:TaskTraining,Hospitalizacion,Farmacia,Quirófano,FarmaciaComunitaria,Ambulancia',
                'capacidad' => 'required|integer|between:2,75',
        ];
        
        $messages = [
            'capacidad.between' => 'La capacidad introducida debe ser mayor que 1 y menor que 76.',
            'capacidad.required' => 'Es necesario ingresar un valor para la capacidad de la sala.',
            'capacidad.integer' => 'El valor introducido en la capacidad debe de ser un número',
        ];
        
        //si la validacion no se cumple no se avanza
        $this->validate($request, $rules, $messages );
        
        //Forma 2 de crear incident:
        $sala = new Sala();
        $sala->tipo = $request->input('tipo');
        $sala->capacidad = $request->input('capacidad');
            
        $sala->save();
        
        return back();
    }
    
    public function destroy($id)
    {
        $salas = Sala::find($id);
        dd($salas);
        $salas->delete();
        
        return redirect('agregarsala')->with('success', 'Sala eliminada'); 

        
    }
}
