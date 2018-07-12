@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
            @if(!empty(@$cpm_user))
			@foreach($cpm_user as $cupom)
			<div class="col m4">
				<div class="card">
					<div class="card-header">{{$cupom->nome}}</div>

					<div class="card-body">
						{{$cupom->valor}}
					</div>
				</div>
			</div>
			@endforeach
            @else
            <div class="col m12">
				<div class="card">
					<div class="card-header">{{\Auth::user()->name}}</div>

					<div class="card-body">
						Você não possui cupons
					</div>
				</div>
			</div>
            @endif
		</div>
	</div>
</div>

@endsection
