<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Lista os Posts
    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    //Cria um post
    public function create()
    {
        $posts = Post::get();
        return view('admin.posts.create', compact('posts'));
    }

    public function store(StoreUpdatePost $request)
    {
        Post::create($request->all());

        return redirect()
        ->route('posts.index')
        ->with('message', 'Post Atualizado');

    }

    //Exibe as informações do post
    public function show($id)
    {
        // Post::where('id', $id)->first();
    $post = Post::find($id);

    if (!$post){
        return redirect()->route('posts.index');
    }
        return view('admin.posts.show', compact('post'));
    }

    //deleta as informações
    public function destroy($id)
    {

    if (!$post = Post::find($id)){
        return redirect()->route('posts.index');
    }
       $post->delete();

       return redirect()->route('posts.index')
                        ->with('message', 'Post Deletado');
    }

    //Edita as informações
    public function edit($id)
    {

    if (!$post = Post::find($id)){
        return redirect()->back();
    }
       return view('admin.posts.edit', compact('post'));
    }

    //atualiza as informações do Post
    public function update(StoreUpdatePost $request, $id)
    {

    if (!$post = Post::find($id)){
        return redirect()->back();
    }
        $post->update($request->all());

        return redirect()
                        ->route('posts.index')
                        ->with('message', 'Post Atualizado');
    }

    //Filtragem
    public function search(Request $request)
    {

    $filters = $request->except('_token');

    $posts = Post::where('title', 'LIKE',"%{$request->search}%")
                    ->orWhere('content', 'LIKE', "%{$request->search}%")
                    ->paginate(1);

        return view('admin.posts.index', compact('posts', 'filters'));

    }
}
