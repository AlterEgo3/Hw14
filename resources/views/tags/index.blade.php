@extends('layout')

@section('title', 'Теги')

@section('body')
    <h1 style="font-weight: bold; color: blue; margin-left: 500px">TAGS</h1>
    <div>
        <a href="tags/create/" class="btn btn-primary" style="margin-top: 10px; font-size: larger; font-weight: bold">Add</a>
        <a href="/" class="btn btn-danger" style="margin-top: 10px; font-size: larger; font-weight: bold">Back</a>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tagsC)
                <tr>
                    <th scope="row">{{$tagsC->id}}</th>
                    <td>{{$tagsC->title}}</td>
                    <td>{{$tagsC->slug}}</td>
                    <td>{{$tagsC->created_at}}</td>
                    <td>{{$tagsC->updated_at}}</td>
                    <td>
                        <a href="/tags/update/{{$tagsC->id}}" class="btn btn-success">Edit</a>
                        <a href="/tags/delete/{{$tagsC->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
