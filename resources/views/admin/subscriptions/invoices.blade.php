@extends('admin.layouts.app')

@section('page', 'Mis facturas')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12 table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Fecha</th>
						<th scope="col">Importe</th>
						<th scope="col">Facturación</th>
						<th scope="col">Moneda</th>
						<th scope="col">Soporte</th>
						<th scope="col">Descargar</th>
					</tr>
				</thead>

				<tbody>
					@forelse($invoices as $bill)
						<tr>

							<th scope="row">{{ $bill->id }}</th>
							<th scope="row">{{ $bill->date()->toFormattedDateString() }}</th>
							{{-- <th scope="row">${{ substr($bill->total, 0, -2) }}</th> --}}
							<th scope="row">{{ $bill->total() }}</th>
							<th scope="row">Automática</th>

							<th scope="row" class="text-uppercase">{{ $bill->currency }}</th>
							<th scope="row">
								<a href="{{ $bill->hosted_invoice_url }}" target="_blank" class="btn btn-success"><i class="fas fa-eye"></i> Ver</a>
							</th>

							<th scope="row">
								<a href="{{ route('invoices.show', $bill->id) }}" target="_blank" class="btn btn-success"><i class="fas fa-download"></i> Descargar</a>
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