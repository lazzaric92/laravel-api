@extends('layouts.admin')

@section('page-title', 'Types Index')

@section('content')
    <div class="container">
        <h1 class="text-center text-white fw-bold mb-4">Types</h1>

        @if (session('message'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
        @endif

        <table class="table table-hover table-striped text-center mb-4">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Hex color</th>
                    <th scope="col">Number of projects</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td> {{$type->id}} </td>
                        <td><strong> {{$type->name}} </strong></td>
                        <td><span class="fw-bold" style="color: {{$type->color}}">{{$type->color}}</span> </td>
                        <td> {{count($type->projects)}} </td>
                        <td>
                            <a href=" {{route('admin.types.show', $type)}} " class="btn btn-info btn-sm ms-1 mb-1">Info</a>
                            <a href="{{route('admin.types.edit', $type)}}" class="btn btn-warning btn-sm ms-1 mb-1">Edit</a>
                            <form action="{{route('admin.types.destroy', $type)}}" method="POST" class="d-inline-block delete-form" data-name="{{$type->name}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-secondary btn-sm ms-1 mb-1" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $types->links() }}
    </div>
@endsection

@section('custom-script')
    @vite('resources/js/confirm-action/confirm-delete.js')
@endsection
