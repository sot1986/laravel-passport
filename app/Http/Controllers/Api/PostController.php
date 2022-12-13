<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Http\Requests\Post\{StorePostRequest, UpdatePostRequest, IndexPostRequest};

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexPostRequest $request)
    {
        return PostResource::collection(Post::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        return $request->user()->posts()->create($request->validated());  // ['title' => $title, 'content' => $content]
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return PostResource::make($post->loadMissing('user')); // return new PostResource($post)
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return PostResource::make($post->loadMissing('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
