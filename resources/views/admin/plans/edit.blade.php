@extends('admin.layouts.app')

@section('page', 'Editar datos del plan')

@section('content')
	
<form class="was-validated" action="{{ route('plan.update', $plan->id) }}" method="POST">
	@csrf
	@method('PATCH')

	<div class="form-row">
		<div class="col-sm-6 mb-3">
			<label for="PlanName">Nombre del plan</label>
		<input type="text" name="plan_name" class="form-control is-valid" id="PlanName" value="{{ $plan->plan_name }}" required>
			<div class="invalid-feedback">¡Debes agregar un nombre al plan!</div>
		</div>
		<div class="col-sm-6 mb-3">
			<label for="PlanDetails">Detalles del plan</label>
			<textarea name="plan_description" class="form-control is-valid" id="PlanDetails" rows="7" required>{{ $plan->plan_description }}</textarea>
			<div class="invalid-feedback">¡Debes agregar los detalles del plan!</div>
		</div>
		<div class="col-sm-6 mb-3">
			<label for="PlanPrice">Precio del plan</label>
			<input type="text" name="plan_price" class="form-control is-valid" id="PlanPrice" value="{{ $plan->plan_price }}" required>
			<div class="invalid-feedback">¡Debes agregar un precio al plan!</div>
		</div>
		<div class="col-sm-6 mb-3">
			<label for="PlanType">Tipo de plan</label>
			<input type="text" name="plan_type" class="form-control is-valid" id="PlanType" value="{{ $plan->plan_type }}" required>
			<div class="invalid-feedback">¡Debes agregar un tipo al plan!</div>
		</div>

		<hr>

		<div class="col-sm-6 mb-3">
			<label for="ModalName">Nombre del modal</label>
			<input type="text" name="name" class="form-control is-valid" id="ModalName" value="{{ $plan->name }}" required>
			<div class="invalid-feedback">¡Debes agregar un nombre al modal!</div>
		</div>
		<div class="col-sm-6 mb-3">
			<label for="ModalDescription">Descripción del modal</label>
			<input type="text" name="description" class="form-control is-valid" id="ModalDescription" value="{{ $plan->description }}" required>
			<div class="invalid-feedback">¡Debes agregar una descripción al plan!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="btnText">Texto del botón</label>
			<input type="text" name="btn_label" class="form-control is-valid" id="btnText" value="{{ $plan->btn_label }}" required>
			<div class="invalid-feedback">¡Debes agregar un texto al botón!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="btnAmount">Precio a cobrar</label>
			<input type="text" name="amount" class="form-control is-valid" id="btnAmount" value="{{ $plan->amount }}" required>
			<div class="invalid-feedback">¡Debes agregar un precio al plan!</div>
		</div>
	</div>

	<button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Actualizar</button>
	
</form>

@endsection