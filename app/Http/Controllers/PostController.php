<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $request = request();

        $categories = Category::all();

        $tags = Tag::all();

        if ($request->method() == 'POST') {
            $post = Post::create([
                'title' => $request->get('title'),
                'body' => $request->get('body'),
                'slug' => $request->get('slug'),
                'category_id' => $request->get('category_id'),
            ]);


            if (!empty($tags = $_POST['tags'])) {
                $post->tags()->sync($tags);
            }

            return redirect('/posts');
        }

        return view('posts.create', ['categories' => $categories, 'tags' => $tags]);
    }

    public function update()
    {
        $request = request();

        $data = [];

        $categories = Category::all();
        $tags = Tag::all();

        if ($request->method() == 'POST') {
            $post = Post::find($_POST['id']);
            $post->update(
                [
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                    'body' => $request->get('body'),
                    'category_id' => $request->get('category_id'),
                ]);

            if (!empty($tags = $request->get('tags'))) {
                $post->tags()->sync($tags);
            }

            return redirect('/posts');
        }

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['post'] = Post::find($id);
        }

        return view('posts.update', $data, ['categories' => $categories, 'tags' => $tags]);
    }

    public function delete()
    {
        $request = request();

        $category = Post::find($request->route()->parameter('id'));
        $category->delete();

        return redirect('/posts');
    }
}
