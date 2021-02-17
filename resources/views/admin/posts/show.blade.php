
@extends('admin.layout.app')

@section('title', 'Conteudo dos Posts')
@section('content')

<h1>Detalhes do Post {{$post->title}}  </h1>

<ul>
<li> <strong> Titulo: </strong> {{$post->title}} </li>
<li> <strong> Conteudo: </strong> {{$post->content}} </li>
</ul>

<form action=" {{route('posts.destroy', $post->id )}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar post: {{$post->title}} </button>
</form>
@endsection
