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

    <table class="table">
        <thead>
            <th>Fotografía</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>E-mail</th>
            <th>Télefono</th>
        </thead>
        <tbody>
            @foreach($people as $person)
                <tr>
                    <td>{{$person->photo}}</td>
                    <td>{{$person->names}}</td>
                    <td>{{$person->last_name}}</td>
                    <td>{{$person->email}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection

