@extends('admin.layouts.app')

@section('page', 'Audios')

@section('content')

<div class="container">
    <div class="row">

        @forelse ($audios as $audio)

            <div class="col-sm-12 col-md-4 pb-4">
                <audio src="{{ asset('storage') }}/{{ $folder }}/audio/{{ $audio->name }}.{{ $audio->extension }}" alt="{{ $audio->name }}" controls></audio>

                <a class="btn btn-danger pull-right text-white" data-toggle="modal" data-target="#deleteModal" data-file-id={{ $audio->id }}><i class="fas fa-trash"></i> Eliminar</a>

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