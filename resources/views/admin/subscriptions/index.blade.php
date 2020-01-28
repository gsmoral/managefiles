@extends('admin.layouts.app')

@section('page', 'Mis suscripciones')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12 table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Nombre</th>
						<th scope="col">ID Stripe</th>
						<th scope="col">Creada</th>
						<th scope="col">Finalizará</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@forelse($subscriptions as $subscription)
						<tr>

							<th scope="row">{{ $subscription->name }}</th>
							<th scope="row">{{ $subscription->stripe_id }}</th>
							<th scope="row">{{ $subscription->created_at->DiffForHumans() }}</th>

							<th scope="row">
								{{ $subscription->ends_at ? $subscription->ends_at->DiffForHumans() : 'La suscripción está activa' }}
							</th>
							
							<th scope="row">
								@if($subscription->ends_at)
									<form action="{{ route('subscriptions.resume') }}" method="POST">
										@csrf
										<input type="hidden" name="plan_name" value="{{ $subscription->name }}">
										<button class="btn btn-success">Suscribirme</button>
									</form>
								@else
									<form action="{{ route('subscriptions.cancel') }}" method="POST">
										@csrf
										<input type="hidden" name="plan_name" value="{{ $subscription->name }}">
										<button class="btn btn-danger">Cancelar</button>
									</form>
								@endif
							
							</th>
						</tr>
					</tbody>
					@empty
						<div class="container mb-5">
					      <div class="alert alert-warning" role="alert">
					         <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
					         <strong>¡Atención!</strong> No se encontraron suscripciones
					      </div>
					   </div>
					@endforelse
				</table>
			</div>
	</div>
</div>

<!-- Modal -->
	@include('admin.partials.modals.files')

@endsection

@section('scripts')
	@include('admin.partials.js.deleteModal')
@endsection