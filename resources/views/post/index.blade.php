@extends('layouts.app')
@section('content')



<!-- page d'accueil  -->
<div class="creer"><a href="{{ route('posts.create') }}">Créer un post</a></div>

<div class="creer"><a href="{{ route('dashboard') }}">Dashboard</a></div>

<div class="galerie">

  @foreach ($posts as $post)

  @if(session('success'))
  <div>
    {{ session('success') }}
  </div>
  @endif <div class="item">

    <a href="{{ route('posts.show', $post)}}"><img src="{{ asset('storage/' . $post->image)}}" class="cardimg" alt="..."></a>

    <div class="c-body">
      <h5 class="c-title">{{ $post->nom_objet}}</h5>
      <p class="c-text">
        {{ Str::limit($post->description, 50)}}
      </p>
      <p class="c-text">
        mettre le user
      </p>
      <p class="c-text">
        {{ $post->created_at->format('d N Y')}}
      </p>
      <a href="{{ route('posts.show', $post)}}" class="btn btn-primary">Voir</a>
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
    URL::asset('/image/k77.jpg')-->