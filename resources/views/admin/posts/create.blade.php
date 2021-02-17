
@extends('admin.layout.app')

@section('title', 'Cria os Posts')
@section('content')

<h1>New Post</h1>

<form action="{{ route('posts.store') }}" method="post">
        @include('admin.posts._partials.form')
</form>
@endsection
