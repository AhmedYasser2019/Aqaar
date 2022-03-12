<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\File;
use App\Repositories\PostRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Response;

class PostController extends AppBaseController
{
    /** @var PostRepository $postRepository*/
    private $postRepository;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepository = $postRepo;
    }

    /**
     * Display a listing of the Post.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $posts = $this->postRepository->all();

        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        return view('posts.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return Response
     */
    public function store(CreatePostRequest $request)
    {
        $input = $request->except('token','image');
        $post = $this->postRepository->create($input);
        if ($request['image']) {
            $destinationPath = public_path('upload/posts/');
            $file = $request['image'];
            $filename = Str::random(5) . '.' . $file->getClientOriginalName();
            $stored = 'upload/'. 'posts/'.  $filename;
            $this->postRepository->update(['image' => $stored], $post->id);
            $file->move($destinationPath, $filename);
        }
        Flash::success(__('messages.saved', ['model' => __('models/posts.singular')]));

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified Post.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            Flash::error(__('messages.not_found', ['model' => __('models/posts.singular')]));

            return redirect(route('posts.index'));
        }

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            Flash::error(__('messages.not_found', ['model' => __('models/posts.singular')]));

            return redirect(route('posts.index'));
        }
        $categories = Category::pluck('name', 'id')->toArray();

        return view('posts.edit', ['post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param int $id
     * @param UpdatePostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostRequest $request)
    {
        $input = $request->except('token','image');

        $post = $this->postRepository->find($id);

        if (empty($post)) {
            Flash::error(__('messages.not_found', ['model' => __('models/posts.singular')]));

            return redirect(route('posts.index'));
        }

        $post = $this->postRepository->update($input, $id);
        if ($request['image']) {
            $destinationPath = public_path('upload/posts/');
            $file = $request['image'];
            $filename = Str::random(5) . '.' . $file->getClientOriginalName();
            $stored = 'upload/'. 'posts/'.  $filename;
            $this->postRepository->update(['image' => $stored], $id);
            $file->move($destinationPath, $filename);
        }
        Flash::success(__('messages.updated', ['model' => __('models/posts.singular')]));

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            Flash::error(__('messages.not_found', ['model' => __('models/posts.singular')]));

            return redirect(route('posts.index'));
        }

        $this->postRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/posts.singular')]));

        return redirect(route('posts.index'));
    }
    public function upload(UploadedFile $file, string $type = null, string $folder = null, $fileName = null, $reference = null, $duration = null): File
    {
        $data['type'] = $type;
        // Get extension
        $data['ext'] = $file->extension();
        // Get mime type
        $data['mime'] = $file->getMimeType();

        $data['name'] = $fileName;

        $data['url'] = 'upload/'. $folder. '/'. $fileName;

        // Save new file object to DB
        return File::create($data);
    }
}
