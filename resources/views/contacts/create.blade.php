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



    {!! Form::open(['route' => 'contacts.store', 'method' => 'POST', 'class' => '', 'files' => true]) !!}
        @include('contacts.form')
    {!! Form::close() !!}

@endsection
