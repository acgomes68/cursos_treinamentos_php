@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            
                <ol class="breadcrumb card-header">
                		<li><a href="{{ route('cliente.index' )}}" >Clientes</a></li>
                		<li>&nbsp;/&nbsp;</li>
                		<li><a href="{{ route('cliente.detalhe', $cliente->id )}}" >Detalhe</a></li>
                		<li>&nbsp;/&nbsp;</li>
                		<li class="active">Adicionar Telefone</li>
                </ol>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p><b>Cliente: </b>{{ $cliente->nome }}</p>
                    
                    <form action="{{ route('telefone.salvar', $cliente->id) }}" method="post">
                    		{{ csrf_field() }}
                    		<div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                    			<label for="nome">Título</label>
                    			<input type="text" name="titulo" class="form-control" placeholder="Título do telefone" />
                    			@if($errors->has('titulo'))
                    				<span class="help-block">
                    					<strong>{{ $errors->first('titulo') }}</strong>
                    				</span>
                    			@endif()
                    		</div>
                    		<div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
                    			<label for="nome">Número</label>
                    			<input type="text" name="numero" class="form-control" placeholder="Número do telefone" />
                    			@if($errors->has('numero'))
                    				<span class="help-block">
                    					<strong>{{ $errors->first('numero') }}</strong>
                    				</span>
                    			@endif()
                    		</div>
                    		<button class="btn btn-info">Adicionar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
