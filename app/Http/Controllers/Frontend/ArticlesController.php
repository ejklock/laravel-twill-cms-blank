<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;

class ArticlesController extends Controller
{
    public function __construct(protected readonly ArticleRepository $articleRepository)
    {
    }

    public function index()
    {
        return view('frontend.articles.index', [
            'articles' => $this->articleRepository->getBaseModel()->published()->get(),
        ]);
    }

    public function show($slug)
    {
        return view('frontend.articles.show', [
            'article' => $this->articleRepository->forSlug($slug),
        ]);
    }
}
