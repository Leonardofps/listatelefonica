<?php

namespace App\Http\Controllers\Agenda;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use App\Models\Categoria;
use App\Models\Empresa;
use App\Http\Requests\PessoaStoreUpdateFormRequest;

class PessoaController extends Controller
{
    private $pessoa;
    protected $totalPage = 4;

    public function __construct(Pessoa $pessoa, Categoria $categorias, Empresa $empresa){
        $this->pessoa = $pessoa;
        $this->categorias = $categorias; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pessoa $pessoas)
    {
        $title = 'Agenda - Funcex';
       
        $pessoas = Pessoa::with('categorias')
        ->orderBy('nome', 'asc')
        ->paginate(5);
                    
       // $pessoas = DB::table('pessoas')->orderBy('nome', 'ASC')->paginate(5);
        
        return view ('pessoa.novaPessoa.list', compact('title', 'pessoas', 'categorias'));
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

        $empresa = new Empresa();
        $empresa->cnpj = $request->get('cnpj');
        $empresa->razao_social = $request->get('razao_social');
        $empresa->telefone1 = $request->get('telefone1');
        $empresa->celular = $request->get('celular');
        $empresa->save();
        $empresa_id = $empresa->id;

        $pessoa = new Pessoa();
        $pessoa->nome = $request->get('nome');
        $pessoa->cargo = $request->get('cargo');
        $pessoa->emails = $request->get('emails');
        $pessoa->telefone = $request->get('telefone');
        $pessoa->celular = $request->get('celular');
        $pessoa->nome_secretaria = $request->get('nome_secretaria');
        $pessoa->empresa_id = $empresa_id;
        $pessoa->save();

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
        $pessoas = Pessoa::with('categorias');
        $pessoa = $this->pessoa->find($id);
        if(!$pessoa)
            return redirect()->back();
        
        $title = "Visualizar pessoa: {$pessoa->nome}";

        return view('pessoa.novaPessoa.show', compact('title', 'pessoa', 'pessoas'));
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
    public function update(PessoaStoreUpdateFormRequest $request, $id)
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
