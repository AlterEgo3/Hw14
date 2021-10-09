<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', ['tags' => $tags]);
    }

    public function create()
    {
        $request = request();

        if ($request->method() == 'POST') {
            Tag::create([
                'title' => $request->get('title'),
                'slug' => $request->get('slug'),
            ]);

            return redirect('/tags');
        }

        return view('tags.create', []);
    }

    public function update()
    {
        $request = request();

        if ($request->method() == 'POST') {
            $tag = Tag::find($_POST['id']);
            $tag->update(
                [
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug')
                ]);

            return redirect('/tags');
        }

        $data = [];

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['tag'] = Tag::find($id);
        }

        return view('tags.update', $data);
    }

    public function delete()
    {
        $request = request();

        $tag = Tag::find($request->route()->parameter('id'));
        $tag->delete();

        return redirect('/tags');
    }
}
