@extends('layouts.admin')

@section('page-title', )
    '#{{$project->id}}: {{$project->title}}'
@endsection

@section('head-cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center rounded rounded-3 bg-light pt-4 pb-5">
            <article class="col-10 mb-4">
                <div class="row justify-content-center">
                    <div class="col-12 mb-4">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                        <h2 class="text-center fw-bold mb-3 p-3"> #{{$project->id}}: {{$project->title}} </h2>
                        <h3 class="fs-5 mb-3">Author: <em>{{$project->user->name}}</em></h3>
                        <div class="mb-2 d-flex justify-content-between align-items-center">
                            @if ($project->type)
                                <a href="{{route('admin.types.show', $project->type)}}" class="d-inline-block mb-3 py-2 px-3 rounded rounded-3 text-white text-decoration-none fs-6" style="background-color: {{$project->type->color}}">{{$project->type->name}}</a>
                            @endif
                            <p>
                            @forelse ($project->technologies as $technology)
                                <span class="badge rounded-pill p-2" style="background-color: {{$technology->color}}">
                                    {{$technology->name}}
                                    {{-- <a class="text-white text-uppercase fw-bold text-decoration-none" href="{{route('admin.types.show', $project->type)}}">{{$technology->name}}</a> --}}
                                </span>
                            @empty
                                ----
                            @endforelse
                            </p>
                        </div>
                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <p class="mb-0">{{$project->date}}</p>
                            <p class="mb-0"> <span><i class="fa-brands fa-github me-2"></i></span> {{$project->github}} </p>
                        </div>
                        <p class="mb-4"> {{$project->description}} </p>
                        <div>
                            @if ($project->add_devs)
                                <p class="mb-0">Dev/s: <br>
                                    {{$project->add_devs}}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </article>
            @if ($project->image)
                <div class="image-wrapper col-10 text-center mb-4 p-3">
                    @if (str_starts_with($project->image, 'http'))
                        <img src="{{$project->image}} " alt=" {{$project->title}} screen">
                    @else
                        <img src="{{asset('storage/' . $project->image)}} " alt=" {{$project->title}} screen">
                    @endif
                </div>
            @endif
            <div class="col-8 d-flex justify-content-between">
                <a href="{{route('admin.projects.index')}}" class="btn btn-info">Back to index</a>
                <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning">Edit</a>
                <form action="{{route('admin.projects.destroy', $project)}}" method="POST" class="d-inline-block delete-form" data-name="{{$project->title}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-secondary ms-1" value="Delete">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    @vite('resources/js/confirm-action/confirm-delete.js')
@endsection
