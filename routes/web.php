<?php

$this->group(['prefix'=> 'agenda', 'namespace' => 'Agenda'],function() {
  
    $this->resource('/pessoa', 'PessoaController');
    
    $this->any('search', 'PessoaController@search')->name('pessoa.search'); 

    $this->get('create', 'PessoaController@create'); 

    //-----------------------------------------------------------------------------------------------------------   
    
    $this->resource('/empresa', 'EmpresaController');

    $this->get('create', 'EmpresaController@create');

    $this->any('/empresa/search', 'EmpresaController@search')->name('empresa.search');

    $this->get('list', 'EmpresaController@index');

});

$this->get('/', 'Agenda\PessoaController@index')->name('panel');

$this->group(['prefix'=> 'agenda', 'namespace' => 'Agenda'], function(){
  
});


