@extends('layouts.projectForm')

@section('back-arrow-href-route')
    {{route('admin.projects.index')}}
@endsection

{{-- <--Title --}}
@section('page-title', 'Add project')

{{-- <-- Form --}}
@section('form-action', )
    {{ route('admin.projects.store')}}
@endsection

@section('form-classes', 'col-6 create-form')

{{-- <-- Button --}}
@section('button-classes', 'btn-info')
@section('button-value', 'Add')

{{-- <-- Script --}}
@section('custom-script')
    @vite('resources/js/confirm-action/confirm-create.js')
    @vite('resources/js/projects/form-image-input.js')
@endsection
