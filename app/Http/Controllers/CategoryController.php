<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }

    public function form()
    {
        $request = request();

        $data = [];

        if ($request->method() == 'POST') {
            if(!$request->has('id')) {
                Category::create([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                ]);
            } else {
                $category = Category::find($_POST['id']);
                $category->update([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                ]);
            }

            return redirect('/categories');
        }

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['category'] = Category::find($id);
        }

        return view('categories.form', $data);
    }

    public function delete()
    {
        $category = Category::find(request()->route()->parameter('id'));
        $category->delete();

        return redirect('/categories');
    }
}
