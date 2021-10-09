@extends('layout')

@section('title', 'Категории')

@section('body')
    <p><h1 style="font-weight: bold; color: blue; margin-left: 500px">CATEGORIES</h1></p>
    <a href="/categories/create" class="btn btn-primary" style="margin-top: 10px; font-size: larger; font-weight: bold">Add</a>
    <a href="/" class="btn btn-danger" style="margin-top: 10px; font-size: larger; font-weight: bold">Back</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->title }}</td>
            <td>{{ $category->slug }}</td>
            <td>
                <a href="/categories/update/{{ $category->id }}" class="btn btn-success">Edit</a>
                <a href="/categories/delete/{{ $category->id }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection