<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //
    public function index()
	{
		$page = array();
    $post = Post::where('stat','published')->orderBy('created_at', 'desc')->first();
    $category = Category::orderBy('created_at', 'desc')->first();
        $post['url'] = url('/sitemap/posts');
        $page['url'] = url('/sitemap/pages');
        $category['url'] = url('/sitemap/categories');
        $page['created_at'] = '2021-01-19T20:29:02+00:00';
            return response()->view('sitemap.index', [
                'post' => $post,
                'page' => $page,
                'category' => $category
            ])->header('Content-Type', 'text/xml');
    }
    
    public function posts()
    {
      $posts = Post::where('stat','published')->orderBy('updated_at', 'desc')->get();
   
      return response()->view('sitemap.posts', [
         'posts' => $posts
      ])->header('Content-Type', 'text/xml');
    }
    public function pages()
    {
      $pages = array();
        $pages[0]["url"] = url("/search");
        $pages[1]["url"] = url("/aboutus");
        $pages[2]["url"] = url("/sharewithus");
        $pages[3]["url"] = url("/contact");
        $pages[4]["url"] = url("/");
        $pages[4]["url"] = url("/team");

      return response()->view('sitemap.pages', [
         'pages' => $pages,
      ])->header('Content-Type', 'text/xml');
    }
    public function categories()
    {
     
      $categories = Category::orderBy('updated_at', 'desc')->get();
      return response()->view('sitemap.categories', [
         'categories' => $categories
      ])->header('Content-Type', 'text/xml');
    }



}
