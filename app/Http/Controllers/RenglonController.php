<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Renglon;
use App\Http\Requests\PlanillaRequest;
use Illuminate\Support\Facades\Auth;

class RenglonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    // public function index(Request $request)
    // {
    //     $planillas=Planilla::get();
    //     return view('planilla/lista',compact('planillas'));
    // }
  
    public function create()
    {
        if(Auth::user()->admin){
          return view('renglon/alta');
        }
        return view('auth/alerta');
    }
  
    // public function edit($id)
    // {
    //     if(Auth::user()->admin){
    //       $planilla=Planilla::findorfail($id);
    //       return view('planilla/editar',compact('planilla'));
    //     }
    //     return view('auth/alerta');
    // }
  
    // public function destroy($id)
    // {
    //   if(Auth::user()->admin){
    //     $planilla=Planilla::find($id);
    //     $planilla->delete();
    //     return redirect()->route('planilla.index');
    //   }
    //   return view('auth/alerta');
    // }
  
    // public function update(PlanillaRequest  $data, $id)
    // {
    //   if(Auth::user()->admin){
    //     $planilla=$data->all();
    //     Planilla::find($id)->update($planilla);
    //     return redirect()->route('planilla.index');
    //   }
    //   return view('auth/alerta');
    // }
  
    public function store(RenglonRequest  $data)
    {
      if(Auth::user()->admin){
        $renglon=$data->all();
        Planilla::create($renglon);
        return redirect()->route('planilla.index');
      }
      return view('auth/alerta');
    }
  
}
