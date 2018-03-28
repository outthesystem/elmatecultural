<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notify;

class PostController extends Controller
{
  public function index()
  {
      $posts = Post::with('category')->get();
      $categories = Category::all();

      return view('post.index', compact('posts', 'categories'));
  }

  public function store(Request $request)
  {
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'https://api.imgur.com/3/image', [
            'headers' => [
                'authorization' => 'Client-ID ' . '0f1eb0c5a21b47e',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
    'form_params' => [
                'image' => base64_encode(file_get_contents($request->file('image')))
            ],
        ]);

        $link = json_decode($response->getBody()->getContents(), true);

    $post = new Post;
    $post->category_id = $request->category_id;
    $post->title = $request->title;
    $post->description = $request->description;
    $post->date_init = date('Y-m-d', strtotime($request->date_init));
    $post->hour = $request->hour;
    $post->place = $request->place;
    $post->entrytype = $request->entrytype;
    $post->price = $request->price;
    $post->email = $request->email;
    $post->webfacebook = $request->webfacebook;
    $post->image = $link['data']['link'];
    $post->approved = $request->approved;
    $post->sticky = $request->sticky;
    $post->save();

    Notify::success('', $title = 'Publicacion creada correctamente', $options = []);

    return redirect('/posts');
  }

  public function create(Request $request)
  {

    $categories = Category::all();

    return view('post.create', compact('categories'));
  }

  public function edit(Post $post, Request $request)
  {

    $categories = Category::all();

    return view('post.edit', compact('post', 'categories'));
  }

  public function update(Post $post, Request $request)
  {
    $this->validate($request, [
        'name'=>'required|max:40',
    ]);

    $response = $client->request('POST', 'https://api.imgur.com/3/image', [
            'headers' => [
                'authorization' => 'Client-ID ' . '0f1eb0c5a21b47e',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
    'form_params' => [
                'image' => base64_encode(file_get_contents($request->file('image')->getRealPath()))
            ],
        ]);
        $link = json_decode($response->getBody()->getContents(), true);

    $post->category_id = $request->category_id;
    $post->title = $request->title;
    $post->description = $request->description;
    $post->date_init = date('Y-m-d', strtotime($request->date_init));
    $post->hour = $request->hour;
    $post->place = $request->place;
    $post->entrytype = $request->entrytype;
    $post->price = $request->price;
    $post->webfacebook = $request->webfacebook;
    $post->image = $link['data']['link'];
    $post->approved = $request->approved;
    $post->sticky = $request->sticky;
    $post->save();

    Notify::success('', $title = 'Publicacion editada correctamente', $options = []);

    return redirect('/posts');
  }
  public function delete(Post $post, Request $request)
  {
    $post->delete();

    Notify::success('', $title = 'Datos eliminados correctamente', $options = []);
    return redirect('/posts');
  }
}
