@extends('layouts.master')
@section('title','register')
@section('style')
<style>
    form {
        margin: 0px auto;
    }
    label {
        font-size: 10pt;
    }
</style>
@endsection
@section('konten')
@yield('form')
@endsection