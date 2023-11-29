@extends('layouts.innerFront')
@section('content')
    <section class="s-content">

        <div class="row">
            <div class="column large-12">

                <article class="s-content__entry format-standard">

                    <div class="s-content__media">
                        <div class="s-content__post-thumb text-center">
                            <img src="{{ asset('images/' . $post->image) }}" alt="">
                        </div>
                    </div> <!-- end s-content__media -->

                    <div class="s-content__entry-header">
                        <h1 class="s-content__title s-content__title--post">{{ $post->title }}</h1>
                    </div> <!-- end s-content__entry-header -->

                    <div class="s-content__primary">

                        <div class="s-content__entry-content">

                            <p class="lead">
                                {{ $post->body }}
                            </p>


                        </div> <!-- end s-entry__entry-content -->

                        <div class="s-content__entry-meta">

                            <div class="entry-author meta-blk">
                                <div class="byline">
                                    <span class="bytext">Posted By</span>
                                    <a href="#0">{{ $post->user->name }}</a>
                                </div>
                            </div>
                            <div class="meta-bottom">
                                @if ($post->categories->first())
                                    <div class="entry-tags meta-blk">
                                        <span class="tagtext">Category</span>
                                        <a href="{{ route('categories.view', $post->categories->first()->id) }}">
                                            {{ $post->categories->first()->title }}
                                        </a>
                                    </div>
                                @endif

                            </div>

                        </div> <!-- s-content__entry-meta -->

                        <div class="s-content__pagenav">
                            @if ($post->previousPost())
                                <div class="prev-nav">
                                    <a href="#" rel="prev">
                                        <span>Previous</span>
                                        {{ $post->previousPost()->title }}
                                    </a>
                                </div>
                            @endif
                            @if ($post->nextPost())
                                <div class="next-nav">
                                    <a href="#" rel="next">
                                        <span>Next</span>
                                        {{ $post->nextPost()->title }}
                                    </a>
                                </div>
                            @endif
                        </div> <!-- end s-content__pagenav -->

                    </div> <!-- end s-content__primary -->
                </article> <!-- end entry -->

            </div> <!-- end column -->
        </div> <!-- end row -->
    </section> <!-- end s-content -->
@endsection
