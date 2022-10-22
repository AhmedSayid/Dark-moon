<?php

namespace App\Repositories;

use App\Models\Blog;
use GuzzleHttp\Psr7\Request;
use App\Http\Services\UploaderService;
class BlogsRepository
{
    protected $uploaderService ;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function getBlogs()
    {
        $Blog = Blog::query();

        return $Blog;
    }

    public function storeOrUpdate($request, $blogs = null)
    {
        if(!$blogs ){
            $blogs = new Blog();
        }

        if($request->file('image')){
            $image = $this->uploaderService->upload($request->file('image'), 'Blogs_images');
            $blogs->image = $image;
        }
        $blogs->fill($request->only('title','detail'));
        $blogs->save();
        return $blogs;
    }
}
