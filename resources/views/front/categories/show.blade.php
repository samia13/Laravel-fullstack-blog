@extends('layouts.innerFront')
@section('content')
    <section class="s-content">

        <div class="s-pageheader">
            <div class="row">
                <div class="column large-12">
                    <h1 class="page-title">
                        <span class="page-title__small-type">Category</span>
                        {{ $category->title }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="s-bricks s-bricks--half-top-padding">

            <div class="masonry">
                <div class="bricks-wrapper h-group">

                    <div class="grid-sizer"></div>
                    {{-- <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div> --}}
                    @foreach ($category->posts as $post)

                    @endforeach
                    <article class="brick entry" data-aos="fade-up">

                        <div class="entry__thumb">
                            <a href="{{ route('posts.view', $post->id) }}" class="thumb-link">
                                <img src="{{ asset('images/' . $post->image) }}" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->

                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a
                                        href="{{ route('posts.view', $post->id) }}">{{ $post->title }}</a></h1>

                                <div class="entry__meta">
                                    <span class="byline">By:
                                        <span class='author'>
                                            <a href="#">{{ $post->user->name }}</a>
                                        </span>
                                    </span>
                                    <span class="cat-links">
                                        <a href="#">{{ $category->title }}</a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                    {{ $post->excerpt }}
                                </p>
                            </div>
                            <a class="entry__more-link" href="{{ route('posts.view', $post->id) }}">Learn More</a>
                        </div> <!-- end entry__text -->

                    </article> <!-- end article -->

                </div> <!-- end brick-wrapper -->

            </div> <!-- end masonry -->

        </div> <!-- end s-bricks -->

    </section>
@endsection
