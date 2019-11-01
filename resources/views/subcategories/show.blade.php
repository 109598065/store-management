@extends('layout')

@section('content')
    <h1 class="title">{{ $subcategory->id }}</h1>

    {{-- @can('update', $project)
        <a href="">Update</a>
    @endcan --}}

    <div>
        <p>{{ $subcategory->category->number }}</p>

        <p>{{ $subcategory->category->name }}</p>

        <p>{{ $subcategory->name }}</p>

        <p>
            <a href="/subcategories/{{ $subcategory->id }}/edit">Edit</a>
        </p>
    </div>

@endsection
