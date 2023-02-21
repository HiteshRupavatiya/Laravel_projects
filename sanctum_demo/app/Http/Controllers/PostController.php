<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return response([
            ['status' => true, 'posts' => PostResource::collection($posts), 'message' => 'Data Retrieved Successfully']
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validateData = Validator::make($data, [
            'title' => 'required|max:50|unique:posts,title',
            'description' => 'required|string'
        ]);

        if ($validateData->fails()) {
            return response(['status' => false, 'errors' => $validateData->errors()], 401);
        }

        $post = Post::create($data);

        return response(['post' => new PostResource($post), 'message' => 'Post Created Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response(['post' => new PostResource($post), 'message' => 'Single Post Data Fetched Successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $validateData = Validator::make($data, [
            'title' => 'required|max:50|unique:posts,title',
            'description' => 'required|string'
        ]);

        if ($validateData->fails()) {
            return response(['error' => $validateData->errors()], 401);
        }

        $post->update($data);

        return response(['post' => new PostResource($post), 'message' => 'Post Data Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return response(['status' => true, 'message' => 'Post Deleted Successfully']);
        } else {
            return response(['status' => false, 'message' => 'Post Data Not Found']);
        }
    }
}
