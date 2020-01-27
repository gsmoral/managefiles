@extends('admin.layouts.app')

@section('page', 'Detalles del plan')

@section('content')

	<div class="col-sm-6 mb-3">
		<label for="PlanName">Nombre del plan</label>
		<input type="text" name="plan_name" class="form-control is-valid" id="PlanName" value="{{ $plan->plan_name }}" disabled>
		<div class="invalid-feedback">¡Debes agregar un nombre al plan!</div>
	</div>

	<div class="col-sm-6 mb-3">
		<label for="details">Detalles del plan</label>
		<textarea name="plan_description" class="form-control is-valid" id="details" rows="7" placeholder="{{ $plan->plan_description }}" disabled></textarea>
		<div class="invalid-feedback">¡Debes agregar los detalles del plan!</div>
	</div>

	<div class="col-sm-6 mb-3">
		<label for="PlanPrice">Precio del plan</label>
		<input type="text" name="plan_price" class="form-control is-valid" id="PlanPrice" value="{{ $plan->plan_price }}" disabled>
		<div class="invalid-feedback">¡Debes agregar un precio al plan!</div>
	</div>

	<div class="col-sm-6 mb-3">
		<label for="PlanType">Tipo de plan</label>
		<input type="text" name="plan_type" class="form-control is-valid" id="PlanType" value="{{ $plan->plan_type }}" disabled>
		<div class="invalid-feedback">¡Debes agregar un tipo de plan!</div>
	</div>

	<hr>

	<div class="col-sm-6 mb-3">
		<label for="ModalName">Nombre del modal</label>
		<input type="text" name="name" class="form-control is-valid" id="ModalName" value="{{ $plan->name }}" disabled>
		<div class="invalid-feedback">¡Debes agregar un nombre al modal!</div>
	</div>

	<div class="col-sm-6 mb-3">
		<label for="ModalDescription">Descripción del plan</label>
		<input type="text" name="description" class="form-control is-valid" id="ModalDescription" value="{{ $plan->description }}" disabled>
		<div class="invalid-feedback">¡Debes agregar una descripción al plan!</div>
	</div>

	<div class="col-sm-6 mb-3">
		<label for="btnText">Texto del botón</label>
		<input type="text" name="btn_label" class="form-control is-valid" id="btnText" value="{{ $plan->btn_label }}" disabled>
		<div class="invalid-feedback">¡Debes agregar un texto al botón!</div>
	</div>

	<div class="col-sm-6 mb-3">
		<label for="btnAmount">Monto a cobrar</label>
		<input type="text" name="amount" class="form-control is-valid" id="btnAmount" value="{{ $plan->amount }}" disabled>
		<div class="invalid-feedback">¡Debes agregar un monto!</div>
	</div>


	<a class="btn btn-outline-success" href="{{ route('plan.index') }}"><i class="fas fa-arrow-circle-left"></i> Volver</a>

@endsection