@extends('layout')

@section('title', 'Главная страница')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col">
                <p>
                <h1 style="font-weight: bold; color: blue; margin-left: 500px">CRUD</h1>
                <hr>
                </p>
                <p>
                    <a class="btn btn-primary" style="font-weight: bold; margin-left: 20px" href="categories/">CATEGORIES</a>
                <hr>
                </p>
                <p>
                    <a class="btn btn-primary" style="font-weight: bold; margin-left: 20px" href="posts/">POSTS</a>
                <hr>
                </p>
                <p>
                    <a class="btn btn-primary" style="font-weight: bold; margin-left: 20px" href="tags/">TAGS</a>
                <hr>
                </p>
            </div>
        </div>
    </div>
@endsection