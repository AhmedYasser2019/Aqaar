<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\PostsResource;
use App\Models\Category;
use App\Models\Post;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    use ApiResponse;

    public function getAllCategories()
    {
        $resources = Category::all();
        return $this->apiResponse(
            __('success'),
            200,
            CategoryResource::collection($resources)
        );
    }
    public function getArticlesByCategoryID(Request $request)
    {
        if ($request->category_id) {
            $resources = Post::where('category_id', $request->category_id)->get();
            return $this->apiResponse(
                __('success'),
                200,
                $resources ? PostsResource::collection($resources) : []
            );
        } else {
            return $this->apiResponse(
                __('Not Found'),
                404,
                null
            );
        }
    }
    public function updateArticleViewNumber(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "post_id" => "required",
        ]);
        if ($validation->fails()) {
            $data = $validation->errors()->first();
            return $this->apiResponse($data, 422, null);
        }
        $post = Post::find($request->post_id);
        if ($post) {
            $post->update([
                'views' => $post->views + 1
            ]);
            $resources = Post::where('category_id', $request->category_id)->get();
            return $this->apiResponse(
                __('success'),
                200,
                new PostsResource($post)
            );
        } else {
            return $this->apiResponse(
                __('Not Found'),
                404,
                null
            );
        }
    }

}
