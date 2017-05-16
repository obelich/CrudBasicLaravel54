<?php
/**
 * Created by IntelliJ IDEA.
 * User: obelich
 * Date: 16/05/17
 * Time: 09:07 AM
 */
?>

@if (count($errors) > 0 )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="col-md-2">
    {{ Form::label('photo', 'Fotografía del contacto')  }}
{{ Form::file('photo') }}
</div>
<div class="clearfix">
</div>

<div class="col-md-4">
    {{ Form::label('names', 'Nombres')  }}
    {{ Form::text('names', null, ['class' => 'form-control', 'placeholder' => '']) }}
</div>

<div class="col-md-4">
    {{ Form::label('last_name', 'Apellidos')  }}
    {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => '']) }}
</div>

<div class="col-md-6">
    {{ Form::label('email', 'Email')  }}
    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => '']) }}
</div>

<div class="col-md-8 row">
    <label for="">Teléfono</label>
    <br />
    <div class="col-md-4">
        {{ Form::select('telephones[type]', ['Local' => 'Local', 'Mobile' => 'Mobile'], ((isset($person->telephones)) ? $person->telephones->first()->type : null) , ['id'=>'', 'class' => 'form-control'] ) }}
    </div>
    @if (isset($person->telephones))
        <input type="hidden" name="telephones[id]" value="{{$person->telephones->first()->id}}">

    @endif
    <div class="col-md-4">
        {{ Form::text('telephones[number]', ((isset($person->telephones)) ? $person->telephones->first()->number : null), ['class' => 'form-control', 'placeholder' => '']) }}
    </div>

</div>


<div class="col-md-12" style="margin-top: 2em;">
    <div class="form-group">
        <?php echo Form::submit('Guardar', ['class' => 'btn btn-primary']);?>
    </div>
</div>
