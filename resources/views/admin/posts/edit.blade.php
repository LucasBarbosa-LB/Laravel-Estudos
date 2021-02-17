
@extends('admin.layout.app')

@section('title', 'Editar os Posts')
@section('content')


<h1>Detalhes do Post {{$post->title}}  </h1>

<form action=" {{route('posts.update', $post->id )}}" method="POST">
        @method('PUT')
        @include('admin.posts._partials.form')
</form>

@endsection
