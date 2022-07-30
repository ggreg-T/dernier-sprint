@extends('layouts.main')
@section('content')


<button id="btnprim" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"> <label for="check">
        <i class="fas fa-bars" id="btno"></i>

    </label>
</button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Objet d'une époque</h5>
        <button class="fermeture" type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <!-- menu déroulant  -->
    <div class="offcanvas-body">

        <p>Ravivez la flamme des souvenirs.</p>

        <ul>
            <li>
                <a href="{{ route('posts.index') }}">Visiter </a>
            </li>
            <li>
                <a href="#">À propos</a>
            </li>
            <li>
                <a href="{{ route('login') }}">Se connecter</a>
            </li>
            <li>
                <a href="{{ route('register') }}">S'enregistrer</a>
            </li>
        </ul>
       
    </div>
</div>
<!-- Début sidebar  -->
<section class="body">
    <!-- <input type="checkbox" id="check">
    <div class="sidebar">
        <header>Objet d'une époque</header>
        <ul>
            <li><a href="#">Visiter</a></li>
            <li><a href="#">Audit</a></li>
            <li><a href="#">Se connecter</a></li>
            <li><a href="#">S'enregistrer</a></li>
        </ul>
    </div> -->
</section>

<!-- Fin sidebar -->