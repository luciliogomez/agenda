<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePessoaRequest;
use App\Models\Contacto;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PessoaController extends Controller
{

    protected $repository;

    public function __construct( Pessoa $pessoa)
    {
        $this->repository = $pessoa;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Storage::disk('public')->put('example2.txt', 'Contents');
        // exit;
        $pessoas = (new Pessoa)->orderBy('id','desc')->get();
        
        return view("contactos.index",[
            "pessoas" => $pessoas
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
        return view("pessoas.create",[
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePessoaRequest $request)
    {
        DB::beginTransaction();
        try{

            if ($request->hasFile('foto')) {
                $foto = $request->file("foto");

                if( !(in_array(strtolower($foto->extension()),['jpg','png'] )) )
                {
                    return redirect()->back()->with("error","Formato de imagem não suportado");
                }

                $path = $foto->store('images',"public");
            }
            
            $id = DB::table('pessoas')->insertGetId(
                [
                    'nome' => $request->nome,
                    'endereco' => $request->endereco,
                    'foto' => $path??'img/1.jpg'
                ]
            );

            $contacto = new Contacto();
            $contacto->telefone = $request->telefone;
            $contacto->email = $request->email;
            $contacto->id_pessoa = $id;

            $contacto->save();
            
            DB::commit();
            return redirect()->back()->with("sucess","Contacto cadastrado");
        }catch(\Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with("error","Contacto não cadastrado[{$e->getMessage()}]");
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
        $pessoa = (new Pessoa())->find($id);
        $contactos = Contacto::where("id_pessoa",$id)->get();
        // var_dump($contactos);
        return view("contactos.show",[
            "pessoa" => $pessoa,
            "contactos"=>$contactos
        ]);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createContacto($id)
    {
        //
        
        return view("contactos.create",[
            "id"=>$id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeContacto(Request $request)
    {
        try{

            if( empty($request->telefone) && empty($request->email) ){
                return redirect()->back()->with("error","Contacto não adicionado");
                
            }else{
                $contacto = new Contacto();
                $contacto->telefone = $request->telefone;
                $contacto->email = $request->email;
                $contacto->id_pessoa = $request->id_pessoa;

                $contacto->save();
                
                return redirect()->back()->with("sucess","Contacto adicionado");
            }
        }catch(\Exception $e)
        {
            return redirect()->back()->with("error","Contacto não adicionado[{$e->getMessage()}]");
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
