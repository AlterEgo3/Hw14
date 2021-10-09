@extends('layout')

@section('title', 'Посты')

@section('body')
    <p><h1 style="font-weight: bold; color: blue; margin-left: 500px " >POSTS</h1></p>
    <div>
        <a href="/posts/create" class="btn btn-primary" style="margin-top: 10px; font-size: larger; font-weight: bold">Add</a>
        <a href="/" class="btn btn-danger" style="margin-top: 10px; font-size: larger; font-weight: bold">Back</a>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Slug</th>
                <th scope="col">Category</th>
                <th scope="col">Tags</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
        @foreach($posts as $postsC)
            <tr>
                <th scope="row">{{$postsC->id}}</th>
                <td>{{$postsC->title}}</td>
                <td>{{$postsC->body}}</td>
                <td>{{$postsC->slug}}</td>
                <td>{{ $postsC->category->title }}</td>
                <td>
                    @foreach($postsC->tags as $tag)
                        {{ $tag->title . ' ' }}
                    @endforeach
                </td>
                <td>{{$postsC->created_at}}</td>
                <td>{{$postsC->updated_at}}</td>
                <td>
                    <a href="/posts/update/{{$postsC->id}}" class="btn btn-success">Edit</a>
                    <a href="/posts/delete/{{$postsC->id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </table>
    </div>
@endsection