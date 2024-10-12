@extends('layouts.plantilla')
@livewireStyles
@section('title', 'registro de usuario')
@section('activeUsuarios', 'active')
@section('contend')
    @livewire('show-users')
    @livewireScripts
@endsection
