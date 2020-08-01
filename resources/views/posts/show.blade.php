@extends('app')

@section('head')
  <meta property="og:type" content="article">
  <meta property="og:title" content="{{ $post->title }}">
  <meta property="og:description" content="{{ trim(str_limit(strip_tags(markdown($post->content)), 200)) }}">
  <meta property="og:url" content="{{ route('posts.show', $post) }}">

  <meta property="article:published_time" content="{{ $post->published_at->toIso8601String() }}">
  <meta property="article:modified_time" content="{{ $post->updated_at->toIso8601String() }}">
  @foreach($post->tags as $tag)
    <meta property="article:tag" property="{{ $tag->name }}">
  @endforeach

  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@dwightconrad">
  <meta name="twitter:title" content="{{ $post->title }}">
  <meta name="twitter:description" content="{{ trim(str_limit(strip_tags(markdown($post->content)), 200)) }}">
@stop

@section('content')
  <div class="page-header">
    <h3>{{ $post->title }} </h3>
    <p class="post-published">
      Posted {{ $post->published_at->diffForHumans() }}
      @if ($post->series)
        in <a href="{{ route('series.show', $post->series) }}">{{ $post->series->name }}</a>
      @endif
    </p>
  </div>

  <div class="post">
    {{ markdown($post->content) }}

    @if ($post->tags->count())
      <div class="post-tags">
        @foreach ($post->tags as $tag)
          <a href="{{ route('tags.show', $tag) }}">{{ $tag->hashtag }}</a>
        @endforeach
      </div>
    @endif
  </div>

  <div class="comments">
    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES * * */
        var disqus_shortname = 'neontsunami';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
  </div>

  <a href="{{ route('posts.index') }}">&larr; See more posts</a>
@stop
