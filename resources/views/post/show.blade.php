@extends('layouts.main')
@section('content')
<img src="{{ URL::asset('/image/antique.jpg') }}">
    <img src="{{ Storage::url($post->image)}}"
 class="cardimg" alt="...">
  
        <h2 class="font-semibold tex-xl text-gray-800 " >
            {{ $post->name }}
        </h2>
 
    <p class="c-text">
    Date de parution du post le :{{ $post->created_at->format('d N Y')}}
    </p>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
        <img src="{{ asset('storage/').$post->image }}" alt="chat">
        <div>
            {{ $post->description }}  
        </div>
        <img src="url({{ $post->image }}) " alt="JARDINERIE">
        <!-- supprimer  -->
        <div class="inputBx">
                        <a href="{{ route('posts.destroy', $post)}}"><input type="submit" value="Supprimer"></a>
                    </div>
    </div>
