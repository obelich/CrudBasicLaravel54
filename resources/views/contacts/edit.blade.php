<?php
/**
 * Created by IntelliJ IDEA.
 * User: obelich
 * Date: 16/05/17
 * Time: 08:48 AM
 */
?>



@extends('layouts.app')

@section('content')

    {!! Form::model($person, ['route' => ['contacts.update', $person->id], 'method' => 'PUT', 'class' => '', 'files' => true]) !!}
        @include('contacts.form')
    {!! Form::close() !!}

@endsection
