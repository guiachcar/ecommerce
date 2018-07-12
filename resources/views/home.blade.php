@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-9">
			@foreach($produtos as $produto)
			<div class="col m4">
				<div class="card">
					<div class="card-header">{{$produto->nome}}</div>

					<div class="card-body">
						{{$produto->valor}}
						<a href="{{route('comprar',$produto->id)}}" class="btn right" >Comprar</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="col-md-3">
			<div class="card">
				<div class="card-header">Lista</div>
					<div class="card-body">
						<ul>
							@if(!empty(@$carrinho_produtos))
								<?php $total = 0?>
								@foreach($carrinho_produtos as $produto)
								<?php $total = $total + $produto->produtos->valor ?>
								<li> {{ $produto->produtos->nome }} - R${{ $produto->produtos->valor }}</li>
								@endforeach
							@endif
						</ul>
						<h5>Valor: R${{$total}}</h5>
						<a href="{{route('finalizar')}}" class="btn center" >Finalizar Compra</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
