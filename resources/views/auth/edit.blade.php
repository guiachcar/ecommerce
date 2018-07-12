@extends('layouts.default')
@section('title', 'Editar Usuário')
@section('content')
<div class="row clearfix">
    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            
            <div class="body">
                <fieldset>
                    <legend class="text-center header">Editar Usuário</legend>
                    <div class="form-group form-float">
                        <div class="col-md-12">   

                            <label class="form-label">Imagem</label>                    
                            <form class="form-horizontal text-center" id="upload" enctype="multipart/form-data" method="post" action="/user-image" autocomplete="off">
                                
                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <input type="hidden" name="pst" value="users" />
                              <img class="img-responsive profile-img margin-bottom-20" width="200px" alt="" id="transportadora-logo" src="{{ @$padrao[1]['user']->imagem}}">
                              <input type="file" accept="image/*" class="btn btn-sm btn-danger" value="Editar Image" name="image" id="image">
                          </form>
                      </div>
                  </div>
                  {!! Form::open(['url' => 'profile']) !!}
                  {{ Form::token() }}
                  <input type="hidden" name="id" value="{{ @$padrao[1]['user']->id }}" />
                  <input type="hidden" name="id" value="{{ @$padrao[1]['user']->email }}" />
                  <input type="hidden" id="logo-destino" name="destino" value="{{@$padrao[1]['user']->imagem}}" />
                  <div class="form-group form-float">
                    <div class="col-md-12">
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" value="{{ @$padrao[1]['user']->name }}" required>
                            <label class="form-label">Nome</label>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" minlength="6" placeholder="Nova Senha">
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password_confirmation" minlength="6" placeholder="Confirme a nova senha">
                    </div>
                </div>
                <div class="form-group form-float">
                    <div class="col-md-12">
                        {{ Form::submit('Salvar', array('class' => 'btn btn-success btn-lg')) }}
                        <button class="btn btn-primary btn-lg" onclick="history.back()">Voltar</button>
                    </div>
                </div>
            </fieldset>
        </div>        
    </div>
</div>
</div>

@endsection
