@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-center text-white mb-2 p-3">@yield('page-title')</h1>

            <form action=" @yield('form-action') " class="@yield('form-classes', 'col-6')" method="POST" data-name="{{$type->name}}">
                @csrf
                @yield('form-method')

                <div class="mb-4">
                    <label for="name" class="form-label text-white">Type name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $type->name)}}">
                    @error('name')
                        <p class="mt-1 p-1 px-2 rounded">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="color" class="form-label text-white">Hex color</label>
                    <input type="color" class="form-control" id="color" name="color" value="{{old('color', $type->color)}}">
                    @error('color')
                        <p class="mt-1 p-1 px-2 rounded">{{$message}}</p>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn @yield('button-classes')">@yield('button-value')</button>
                    <input type="reset" value="Reset" class="btn btn-light">
                </div>
            </form>
        </div>
    </div>
@endsection
