<?php

namespace App\Http\Controllers\Agenda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    private $empresa;
    protected $totalPage = 4;
   
    public function __construct(Empresa $empresa){
        $this->empresa = $empresa;
    }

    public function index(Empresa $empresa)
    {
        $title = 'Lista de empresas';

        $empresas = $this->empresa->paginate();

        return view('empresa.novaEmpresa.list', compact('title', 'empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nova Empresa';
        return view('empresa.novaEmpresa.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Empresa $empresa)
    {
        $dataForm = $request->all();

        $inserir = $empresa -> create($dataForm);

        if($inserir)
            return redirect()->route('empresa.index')->with('sucess', 'Empresa cadastrada com sucesso');
        else 
            return redirect()->back()->with('error', 'Falha ao cadastrar');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = $this->empresa->find($id);
        if(!$empresa)
            return redirect()->back();
        
        $title = "Visualizar empresa: {$empresa->nome}";

        return view('empresa.novaEmpresa.show', compact('title', 'empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = $this->empresa->find($id);
        if(!$empresa)
            return redirect()->back();

        $title = "Editar empresa: {$empresa->nome}";

        return view('empresa.novaEmpresa.create-edit', compact('title', 'empresa'));
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
        $empresa = $this->empresa->find($id);
        if(!$empresa)
            return redirect()->back();

        $update = $empresa->update($request->all());

        if($update)
            return redirect()
                             ->route('empresa.index')
                             ->with('success', 'Empresa atualizada com sucesso !');
        else 
            return redirect()
                             ->back()
                             ->with('error', 'Falha ao atualizar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = $this->empresa->find($id);
        if(!$empresa) 
            return redirect()->back();
            
        if($empresa->delete())
            return redirect()
                ->route('empresa.index')
                ->with('success', 'Empresa deletada com sucesso !');
        else 
        return redirect()
                ->back()
                ->with('error', 'Falha ao deletar');
    }

    public function search(Request $request){

        $dataForm = $request->except('_token');

        $empresas = $this->empresa->search($request->key_search);

        $title = "Empresas, filtros para: {$request->key_search}";

        return view ('empresa.novaEmpresa.list', compact('title', 'empresas', 'dataForm'));
        }

}
