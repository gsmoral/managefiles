@extends('admin.layouts.app')

@section('page', 'Documentos')

@section('content')

<div class="container">
    <div class="row">

        

        <div class="col-sm-12 table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Subidos</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($documents as $document)
                        <tr>
                            <th scope="row">
                                @if($document->extension == 'pdf' || $document->extension == 'PDF')
                                    <img class="img-responsive" src="{{ asset('img/files/pdf.svg') }}" alt="" width="50">
                                @endif
                                @if($document->extension == 'doc' || $document->extension == 'DOC' || $document->extension == 'docx' || $document->extension == 'DOCX')
                                    <img class="img-responsive" src="{{ asset('img/files/word.svg') }}" alt="" width="50">
                                @endif
                                @if($document->extension == 'xls' || $document->extension == 'XLS' || $document->extension == 'xlsx' || $document->extension == 'XLSX')
                                    <img class="img-responsive" src="{{ asset('img/files/excel.svg') }}" alt="" width="50">
                                @endif
                                @if($document->extension == 'ppt' || $document->extension == 'PPT' || $document->extension == 'pptx' || $document->extension == 'PPTX')
                                    <img class="img-responsive" src="{{ asset('img/files/powerpoint.svg') }}" alt="" width="50">
                                @endif                            
                            </th>
                            <th scope="row">{{ $document->name }}</th>
                            <th scope="row">{{ $document->created_at->DiffForHumans() }}</th>
                            <th scope="row">
                                @if($document->extension == 'pdf' || $document->extension == 'PDF')
                                <a class="btn btn-primary" style="width: 60%;" target="_blanck" href="{{ asset('storage') }}/{{ $folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i class="fas fa-eye"></i> Ver</a>
                                @else
                                <a class="btn btn-success" style="width: 60%;" target="_blanck" href="{{ asset('storage') }}/{{ $folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i class="fas fa-download"></i> Descargar</a>
                                @endif
                                
                                
                            </th>
                            <th scope="row">
                                <form action="{{ route('file.destroy', $document->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
                                </form>
                            </th>
                        </tr>
                    @empty
                        <div class="container">
                            <div class="alert alert-warning mb-3" role="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
                            <strong>¡Atención!</strong> No tienes ningún archivo
                            </div>
                        </div>  
                    @endforelse    
                </tbody>
                    
            </table>
        </div>

    </div>
   
</div>
   

@endsection