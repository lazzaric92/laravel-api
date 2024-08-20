@extends('layouts.typeForm')

{{-- <--Title --}}
@section('page-title', 'Add type')

{{-- <-- Form --}}
@section('form-action', )
    {{ route('admin.types.store')}}
@endsection

@section('form-classes', 'col-6 create-form')

{{-- <-- Button --}}
@section('button-classes', 'btn-info')
@section('button-value', 'Add')

{{-- <-- Script --}}
@section('custom-script')
    @vite('resources/js/confirm-action/confirm-create.js')
@endsection
