<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    //
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = (new Contacto())->find($id);
        return view("contactos.edit",[
            "contacto"=>$contacto
        ]);
    }

    public function update(Request $request)
    {
        try{
            if( empty($request->telefone) && empty($request->email) ){
                return redirect()->back()->with("error","Contacto não alterado");
                
            }else{
            $contacto = (new Contacto())->find($request->id);
            
            $contacto->telefone = $request->telefone;
            $contacto->email = $request->email;
            $contacto->update();
            // dd($request);
            return redirect()->back()->with("sucess","Contacto alterado com sucesso");
            }
        }catch(\Exception $ex)
        {
            return redirect()->back()->with("error","Contacto nao alterdo ");
        }
    }
    public function delete($id)
    {
        try{

            $contacto = (new Contacto())->find($id);
            $contacto->delete();
            return redirect()->back()->with("sucess","Contacto removido com sucesso");
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with("error","Erro ao remover contacto ");
        }
    }
    
}
