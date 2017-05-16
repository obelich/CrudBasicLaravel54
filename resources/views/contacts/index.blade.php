<?php
/**
 * Created by IntelliJ IDEA.
 * User: obelich
 * Date: 15/05/17
 * Time: 03:55 PM
 */
?>

@extends('layouts.app')
@section('content')

    <p>
        <a href="{{ route('contacts.create') }}" class="">Nuevo</a>
    </p>

    <table class="table">
        <thead>
            <th>Fotografía</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>E-mail</th>
            <th>Télefono</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($people as $person)
                <tr>
                    <td>
                        @if($person->photo)
                            <img src="{{$person->photo}}" alt="" height="80" width="80">
                        @endif

                    </td>
                    <td>{{$person->names}}</td>
                    <td>{{$person->last_name}}</td>
                    <td>{{$person->email}}</td>
                    <td>
                        @foreach($person->telephones as $telephone)
                            {{ $telephone->type }} - {{ $telephone->number }}<br />
                        @endforeach
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['contacts.destroy', $person->id]]) !!}
                        <a class="btn btn-info" href="{{ route('contacts.edit', $person->id) }}" role="button">Edit</a>
                        <input type="hidden" name="id" value="{{ $person->id }}">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro de borrar el departamento?')" role="button">
                            Borrar
                        </button>
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>

@endsection

