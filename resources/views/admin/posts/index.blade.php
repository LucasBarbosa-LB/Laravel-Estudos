@extends('admin.layout.app')

@section('title', 'Listagem dos Posts')
@section('content')

<h1>index de post</h1>
<button>
<a href="{{route('posts.create')}}">
Novo Post
</a>
</button>
<hr>

<form action="{{ route('posts.search')}} " method="post">
    @csrf
    <input type="text" name="search" placeholder="Pesquisar">
    <button type="submit"> Pesquisar </button>
</form>


@foreach($posts as $post)
<h2> {{ $post->title }}
    [
        <a href=" {{route('posts.show', $post->id)}} "> Ver</a> |
        <a href=" {{route('posts.edit', $post->id)}} "> Editar</a>

    ]
</h2>

<form action=" {{route('posts.destroy', $post->id )}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar post: {{$post->title}} </button>
</form>

@endforeach
<hr>

@if (isset($filters))
{{ $posts->appends($filters)->links() }}

@else
{{$posts->links()}}

@endif


@endsection
