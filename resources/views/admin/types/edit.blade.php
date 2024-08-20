@extends('layouts.typeForm')

{{-- <--Title --}}
@section('page-title')
    Editing {{$type->name}}
@endsection

{{-- <-- Form --}}
@section('form-action')
    {{route('admin.types.update', $type)}}
@endsection

@section('form-method')
    @method('PUT')
@endsection

@section('form-classes', 'col-6 edit-form')

{{-- <-- Button --}}
@section('button-classes', 'btn-warning')
@section('button-value', 'Edit')

{{-- <-- Script --}}
@section('custom-script')
    @vite('resources/js/confirm-action/confirm-edit.js')
@endsection
