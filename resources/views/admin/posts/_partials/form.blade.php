

@if($errors->any())
    <ul>
        @foreach($errors->all() as $errors)
        <li> {{$errors}} </li>
        @endforeach
    </ul>
@endif

        @csrf
        <input type="text" name="title" id="title" placeholder="Titulo" value="{{ $post->title ?? old('title') }}">
        <textarea name="content" id="content" cols="30" rows="5" placeholder="Conteudo">{{$post->content ?? old('content') }}</textarea>
        <button type="submit">Enviar</button>
