@extends('frontend.layouts.app')

@section('content')
    <h1>{{ __('news.all_news') }}</h1>

    @if ($articles->isNotEmpty())
        <ul>
            @foreach ($articles as $article)
                <li>
                    <a href="{{ route('frontend.articles.show', $article->slug) }}">{{ $article->title }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>{{ __('news.no_news') }}</p>
    @endif
@endsection
