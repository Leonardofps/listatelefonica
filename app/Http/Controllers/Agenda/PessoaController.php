<?php

namespace App\Http\Controllers\Agenda;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use App\Models\Categoria;

class PessoaController extends Controller
{
    private $pessoa;
    protected $totalPage = 4;

    public function __construct(Pessoa $pessoa, Categoria $categorias){
        $this->pessoa = $pessoa;
        $this->categorias = $categorias; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Agenda - Funcex';
       
        $pessoas = Pessoa::with('categorias')->orderBy('nome', 'asc')->paginate(5);
                    
       // $pessoas = DB::table('pessoas')->orderBy('nome', 'ASC')->paginate(5);
        
        return view ('pessoa.novaPessoa.list', compact('title', 'pessoas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::get();
        $title = 'Novo contato';
        return view ('pessoa.novaPessoa.create-edit', compact('title', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $pessoa = Pessoa::create($request->all());
        $pessoa->categorias()->attach($request->categorias);

            return redirect()
                             ->route('pessoa.index')
                             ->with('success', 'Contato cadastrado com sucesso !');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = $this->pessoa->find($id);
        if(!$pessoa)
            return redirect()->back();
        
        $title = "Visualizar pessoa: {$pessoa->nome}";

        return view('pessoa.novaPessoa.show', compact('title', 'pessoa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pessoa = $this->pessoa->find($id);
        if(!$pessoa)
            return redirect()->back();

        $categorias = Categoria::get();

        $title = "Editar pessoa: {$pessoa->nome}";

        return view('pessoa.novaPessoa.create-edit', compact('title', 'pessoa', 'categorias'));
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
        $pessoa = $this->pessoa->find($id);
        $pessoa->categorias()->sync($request->categorias);

        if(!$pessoa)
            return redirect()->back();

        $update = $pessoa->update($request->all());

        if($update)
            return redirect()
                             ->route('pessoa.index')
                             ->with('success', 'Contato atualizado com sucesso !');
        else 
            return redirect()
                             ->back()
                             ->with('error', 'Falha ao atualizar');

    }

    public function destroy(Request $request, $id)
    {
        $pessoa = $this->pessoa->find($id);
        if(!$pessoa) 
            return redirect()->back();
                
        if($pessoa->delete())
            return redirect()
                ->route('pessoa.index')
                ->with('success', 'Contato deletado com sucesso !');
        else 
        return redirect()
                ->back()
                ->with('error', 'Falha ao deletar');
        
        }

    public function search(Request $request){

        $dataForm = $request->except('_token');

        $pessoas = $this->pessoa->search($request->key_search);

        $title = "Pessoas, filtros para: {$request->key_search}";

        return view ('pessoa.novaPessoa.list', compact('title', 'pessoas', 'dataForm'));
        }
    }
