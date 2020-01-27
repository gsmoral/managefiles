@extends('admin.layouts.app')

@section('page', 'Crear un nuevo plan de suscripción')

@section('content')
	
<form class="was-validated" action="{{ route('plan.store') }}" method="POST">
	@csrf
	<input type="hidden" name="_method" value="PATCH">

	<div class="form-row">
		<div class="col-sm-6 mb-3">
			<label for="PlanName">Nombre del plan</label>
			<input type="text" name="plan_name" class="form-control is-valid" id="PlanName" placeholder="Mensual" required>
			<div class="invalid-feedback">¡Debes agregar un nombre al plan!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="details">Detalles del plan</label>
			<textarea name="plan_description" class="form-control is-valid" id="details" rows="3" required></textarea>
			<div class="invalid-feedback">¡Debes agregar los detalles del plan!</div>
		</div>

		<div class="col-sm-12 mb-3">
			<div class="alert alert-warning">
				El siguiente código es un ejemplo para los detalles del plan.
			</div>
		</div>

		<div class="col-sm-12 mb-3">
			<div class="container">
				<code>&ltli&gt&lti class="fas fa-headset"&gt&lti&gt20 GB de almacenamiento&lt/li&gt</code>
			</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="PlanPrice">Precio del plan</label>
			<input type="text" name="plan_price" class="form-control is-valid" id="PlanPrice" placeholder="19" required>
			<div class="invalid-feedback">¡Debes agregar un precio al plan!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="PlanType">Tipo de plan</label>
			<input type="text" name="plan_type" class="form-control is-valid" id="PlanType" placeholder="MFMonthly" required>
			<div class="invalid-feedback">¡Debes agregar un tipo de plan!</div>
		</div>

		<hr>

		<div class="col-sm-6 mb-3">
			<label for="ModalName">Nombre del modal</label>
			<input type="text" name="name" class="form-control is-valid" id="ModalName" placeholder="Manage Files" required>
			<div class="invalid-feedback">¡Debes agregar un nombre al modal!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="ModalDescription">Descripción del plan</label>
			<input type="text" name="description" class="form-control is-valid" id="ModalDescription" placeholder="Plan mensual" required>
			<div class="invalid-feedback">¡Debes agregar una descripción al plan!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="btnText">Texto del botón</label>
			<input type="text" name="btn_label" class="form-control is-valid" id="btnText" placeholder="Suscribirse" required>
			<div class="invalid-feedback">¡Debes agregar un texto al botón!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="btnAmount">Monto a cobrar</label>
			<input type="text" name="amount" class="form-control is-valid" id="btnAmount" placeholder="9900" required>
			<div class="invalid-feedback">¡Debes agregar un monto!</div>
		</div>	
		

		

		
		
	</div>

	<button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>
	
</form>

@endsection