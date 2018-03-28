<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
  public function index(Request $request)
  {
    $posts = Post::with('category')->Popular()->where('date_init', 'like', '%'.$request->search.'%')->get();
    $categories = Category::all();
    return view('Frontend.posts', compact('posts', 'categories'));
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
                  'image' => base64_encode(file_get_contents($request->file('image')->getRealPath()))
              ],
          ]);
          $link = json_decode($response->getBody()->getContents(), true);

        $post = new Post;
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->date_init = date('Y-m-d', strtotime($request->date_init));
        $post->hour = $request->hour;
        $post->place = $request->place;
        $post->price = $request->price;
        $post->entrytype = $request->entrytype;
        $post->webfacebook = $request->webfacebook;
        $post->email = $request->email;
        $post->image = $link['data']['link'];
        $post->save();

        return redirect('/')->with('message', 'Se ha cargado tu evento correctamente, una vez aprobado se cargara en el listado de la web.');
  }


}
