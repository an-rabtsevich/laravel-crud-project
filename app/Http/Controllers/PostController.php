<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Cache::remember('posts-page-'.request('page', 1), 60*3, function(){
        //     return $posts = Post::with('category')->paginate(5);
        // });

        $posts = Post::with('category')->paginate(5);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        $categories = Category::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $request->validate([
            'image' => ['required', 'max:2048', 'image'],
            'title' => ['required', 'max:225'],
            'category_id' => ['required', 'integer'],
            'description' => ['required']
        ]);

        $fileName = time().'_'.$request->image->getClientOriginalName();
        $filePath = $request->image->storeAs('uploads', $fileName);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->image = 'storage/'.$filePath;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);

        $categories = Category::all();
        return view('edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);

        $request->validate([
            'title' => ['required', 'max:225'],
            'category_id' => ['required', 'integer'],
            'description' => ['required']
        ]);

        if($request->hasFile('image'))
        {
            $request->validate([
                'image' => ['required', 'max:2048', 'image']
            ]);

            File::delete(public_path($post->image));

            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('uploads', $fileName);

            $post->image = 'storage/'.$filePath;
        }
        
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('trashed', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->back();
    }

    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->forceDelete();
        File::delete(public_path($post->image));

        return redirect()->back();
    }
}
