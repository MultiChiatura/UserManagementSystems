<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostRequest;
use App\Services\FileUploadService;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    /**
     * Class constructor.
     */
    public function __construct(private FileUploadService $fileUploadService)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);

        return view('pages.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        DB::beginTransaction();
        try {
            $postData = $request->only('title', 'description', 'text');
            $postData['user_id'] = auth()->id();
            $post = Post::create($postData);

            foreach ($request->imgs as $img) {
                $post->files()->create($this->fileUploadService->fileUpload($img));
            }
            DB::commit();
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with(['error' => 'Something happened. Contact administrator!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
