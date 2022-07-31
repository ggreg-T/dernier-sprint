@extends('layouts.app')
@section('content')

<button id="btnprim" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
</button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel"><strong>Objet d'une époque</strong></h5>
        <button class="fermeture" type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <!-- menu déroulant  -->
    <div class="offcanvas-body">

        <p>Ravivez la flamme de vos souvenirs.</p>

        <ul>
            <li class="liSidebar">
                <a href="{{ route('posts.index') }}">Visiter </a>
            </li>
            <li class="liSidebar">
                <a href="#">À propos</a>
            </li>
            <li class="liSidebar">
                <a href="{{ route('login') }}">Se connecter</a>
            </li>
            <li class="liSidebar">
                <a href="{{ route('register') }}">S'enregistrer</a>
            </li>
        </ul>

    </div>
</div>

<!-- Citation  -->
<div class="body">
    <div class="citation">
        <p class="phrase"> NOS RICHESSES, CE SONT NOS SOUVENIRS.</p>
            <hr style="width:50%">          
                                 <p class="auteur">   François HERTEL
        </p>
    </div>
</div>
<!-- fin citation  -->
@endsection