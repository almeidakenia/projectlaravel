<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $cancione->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantante_id') }}
            {{ Form::select('cantante_id', $cantantes, $cancione->cantante_id, ['class' => 'form-control' . ($errors->has('cantante_id') ? ' is-invalid' : ''), 'placeholder' => 'Cantante']) }}
            {!! $errors->first('cantante_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('playlist_id') }}
            {{ Form::select('playlist_id', $playlists, $cancione->playlist_id, ['class' => 'form-control' . ($errors->has('playlist_id') ? ' is-invalid' : ''), 'placeholder' => 'Playlist']) }}
            {!! $errors->first('playlist_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
