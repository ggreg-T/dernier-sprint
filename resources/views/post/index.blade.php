@extends('layouts.app')
@section('content')



<!-- page d'accueil -->
<div class="boutonMenu">
<div class="creer"><a class="aindex" href="{{ route('posts.create') }}">Créer un post</a></div>

<div class="creer"><a  class="aindex" href="{{ route('dashboard') }}">Dashboard</a></div>
</div>
<div class="galerie">

<div class="mx-5 my-2">
        @if (session('success'))
            <p class="alert alert-success mt-3">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="alert alert-danger mt-3">{{ session('error') }}</p>
        @endif
    </div>

  @foreach ($posts as $post)

    <a href="{{ route('posts.show', $post) }}"><img src="{{ URL::asset('/image/k77.jpg') }}" class="cardimg"></a>
    <!-- alt="{{URL::asset('/image/antique.jpg')}}" -->

    <div class="c-body">
      <h5 class="c-title">{{ $post->nom_objet}}</h5>

      <p class="c-text">
        {{ Str::limit($post->description, 50)}}
      </p>

      <p class="c-text">
        Par {{ $post->user->name }} le {{ $post->created_at->format('d N Y')}}
      </p>
 
      <a href="{{ route('posts.show', $post)}}" class="btn btn-primary">Voir</a>

      <a href="{{ route('deletPost', $post->id)}}">
        Supprimmer
      </a>
    </div>

  </div>
  @endforeach

</div>
@include('layouts.footer')
@endsection

<!-- name : ggreg
    mail : greg@mail.com
    password : 11111111 
    {{ Auth::user()->name }} ;
    {{ asset('storage/' . $post->image)}}
    URL::asset('/image/k77.jpg')-->