@extends('layouts.app')

@section('template_title')
    {{ $cancione->name ?? 'Show Cancione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cancione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('canciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cancione->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cantante Id:</strong>
                            {{ $cancione->cantante_id }}
                        </div>
                        <div class="form-group">
                            <strong>Playlist Id:</strong>
                            {{ $cancione->playlist_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
