@extends('admin.layouts.app')

@section('page', 'Imagenes')

@section('content')

<div class="container">
    <div class="row">

        @forelse ($images as $image)

            <div class="col-sm-6 col-md-4 mt-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}" alt="{{ $image->name }}">
                    <div class="card-body">
                        <a href="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}" target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i> Ver </a>
            
                        <a class="btn btn-danger pull-right text-white" data-toggle="modal" data-target="#deleteModal" data-file-id={{ $image->id }}><i class="fas fa-trash"></i> Eliminar</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="container">
                <div class="alert alert-warning mb-3" role="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
                <strong>¡Atención!</strong> No tienes ningún archivo
                </div>
            </div>  
        @endforelse

    </div>
   
</div>
   
<!-- Modal -->
@include('admin.partials.modals.files')

@endsection

@section('scripts')
    @include('admin.partials.js.deleteModal')
@endsection