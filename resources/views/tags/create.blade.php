@extends('layout')

@section('title', 'Теги')

@section('body')
    <h2 style="font-weight: bold; color: blue; margin-left: 500px">Create Tag</h2>
    <form method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug">
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Save" style="margin-top: 20px">
            <a href="/tags/" class="btn btn-danger" style="margin-top: 20px">Back</a>
        </div>
    </form>

@endsection
