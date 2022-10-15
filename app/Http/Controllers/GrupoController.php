<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $grupos = (new Grupo())->all();

        return view("grupos.index",[
            "grupos" => $grupos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("grupos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{

            if( empty($request->nome)  ){
                return redirect()->back()->with("error","Nome do grupo é obrigatório");
                
            }else{
                if ($request->hasFile('foto')) {
                    $foto = $request->file("foto");
    
                    if( !(in_array(strtolower($foto->extension()),['jpg','png'] )) )
                    {
                        return redirect()->back()->with("error","Formato de imagem não suportado");
                    }
    
                    $path = $foto->store('images',"public");
                }

                $grupo = new Grupo();
                $grupo->nome = $request->nome;
                $grupo->foto = $path??'';

                $grupo->save();
                
                return redirect()->back()->with("sucess","Grupo adicionado");
            }
        }catch(\Exception $e)
        {
            return redirect()->back()->with("error","Grupo não adicionado");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $grupo = (new Grupo())->find($id);
        $pessoas = DB::table("grupos_pessoas")
                            ->join("pessoas","grupos_pessoas.id_pessoa","=","pessoas.id")
                            ->where("grupos_pessoas.id_grupo","=",$id)
                            ->select("pessoas.*","grupos_pessoas.id as id_grupo_pessoa")
                            ->get();

        return view("grupos.show",[
            "grupo" => $grupo,
            "pessoas"=>$pessoas
        ]);
    }

    public function addContacto($id)
    {
        //
        $grupo = (new Grupo())->find($id);
        $members =  DB::table("grupos_pessoas")
        ->join("pessoas","grupos_pessoas.id_pessoa","=","pessoas.id")
        ->where("grupos_pessoas.id_grupo","=",$id)
        ->select("pessoas.*")
        ->get();
        $ids = [];
        foreach($members as $member)
        {
            $ids[] = $member->id;
        }
        $pessoas = DB::table("pessoas")->whereNotIn("id",$ids)
                                        ->select()
                                        ->orderBy("nome")
                                        ->get();
       

        return view("grupos.add-contacto",[
            "grupo" => $grupo,
            "pessoas"=>$pessoas
        ]);
    }

    public function storeContacto($id,Request $request)
    {
        $idsOfPersons = $request->except("_token");
        try{
            foreach($idsOfPersons as $key=>$value)
            {   
                
                DB::table("grupos_pessoas")->insert([
                    "id_grupo"=>$id,
                    "id_pessoa"=>$key
                ]);
            }
            return redirect()->back()->with("sucess","Membros Adicionados");
        }catch(\Exception $e)
        {
            return redirect()->back()->with("error","Ocorreu um erro. Tente Novamente");
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $grupo = (new Grupo())->find($id);
        if($grupo){
            return view("grupos.edit",[
                "grupo"=>$grupo
            ]);
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $grupo = (new Grupo())->find($id);
        if(!$grupo){
            return redirect()->back()->with("error","Falha ao salvar dados");
        }
        try{

            if( empty($request->nome)  ){
                return redirect()->back()->with("error","Nome do grupo é obrigatório");
                
            }else{
                if ($request->hasFile('foto')) {
                    $foto = $request->file("foto");
    
                    if( !(in_array(strtolower($foto->extension()),['jpg','png'] )) )
                    {
                        return redirect()->back()->with("error","Formato de imagem não suportado");
                    }
    
                    $path = $foto->store('images',"public");
                }

                // $grupo = new Grupo();
                $grupo->nome = $request->nome;
                $grupo->foto = $path??$grupo->foto;

                $grupo->update();
                
                return redirect()->back()->with("sucess","Alterações salvas ");
            }
        }catch(\Exception $e)
        {
            return redirect()->back()->with("error","Alterações não salvas [{$e->getMessage()}]");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
            
        try{

            $pessoas = DB::table("grupos_pessoas")
            ->where("grupos_pessoas.id_grupo","=",$id)->get();
            
            foreach($pessoas as $pessoa)
            {
                
                 $affected = DB::table("grupos_pessoas")
                 ->where("grupos_pessoas.id","=",$pessoa->id)
                 ->delete();     
                 
            }
            $affected = DB::table("grupos")->where("id","=",$id)->delete();
            DB::commit();
            return redirect()->route("grupos.index")->with("sucess","Grupo eliminado");

        }catch(\Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with("error","Falha ao eliminar grupo");
            
        }

    }

    /**
     * Remove the specified Contact from group.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeContacto($id)
    {
        //
        $affected = DB::table("grupos_pessoas")
                    ->where("grupos_pessoas.id","=",$id)
                    ->delete();
        if($affected)
        {
            return redirect()->back()->with("sucess","Contacto removido do grupo");
        }else{
            return redirect()->back()->with("sucess","Falha ao remover contacto do grupo");
        }
        
    }

    public function search(Request $request)
    {
        $searchString = $request->search ?? '';
        $grupos = (new Grupo)->where("nome","LIKE","%{$searchString}%")->orderBy('nome','asc')->get();
        
        return view("grupos.index",[
            "grupos" => $grupos,
            "search"  => $searchString
        ]);
        
    }
}
