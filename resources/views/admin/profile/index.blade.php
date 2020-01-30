@extends('admin.layouts.app')

@section('page', 'Mi perfil')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-2 my-auto">
				<img src="{{ asset('img/user.svg')}}" class="card-img" alt="{{ Auth::user()->name }}">
			</div>

			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title">{{ Auth::user()->name }}</h5>

					<ul class="list-group list-group-horizontal-sm">
						<li class="list-group-item">
							<i class="fas fa-envelope fa-lg"></i>
							{{ Auth::user()->email }}
						</li>

						<li class="list-group-item">
							<i class="fas fa-at fa-lg"></i>
							{{ Auth::user()->username }}
						</li>

						<li class="list-group-item">
							<i class="fab fa-stripe fa-lg"></i>
							{{ Auth::user()->stripe_id }}
						</li>

						<li class="list-group-item">
							<i class="fab fa-cc-visa fa-lg"></i>
							**** **** **** {{ Auth::user()->card_last_four }}
						</li>
					</ul>

					<p class="card-text">
						<small class="text-muted">
							Miembro desde {{ Auth::user()->created_at->diffForHumans() }}
						</small>
					</p>

				</div>
			</div>

			<div class="col-md-2 text-center my-auto">
				<p style="font-size: 3em;">
					{{ Auth::user()->files->count() }}
				</p>

				<span>Archivos</span>
			</div>

			<div class="col-md-12 text-center">
				<a href="" class="btn btn-outline-dark">Editar mi perfil</a>
			</div>



		</div> <!--/row-->
		
	</div>
@endsection