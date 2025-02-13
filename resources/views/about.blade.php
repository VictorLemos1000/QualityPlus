@extends('layouts.app')

@section('content')
<div class="container">
    <header class="header">
        <div class="logo"><span class="green">Quality</span><span class="blue">Plus+</span></div>
        <nav>
            <ul class="d-flex list-unstyled m-0">
                <li><a href="{{ route('home') }}" class="text-dark mx-3">Home</a></li>
                <li><a href="{{ route('about') }}" class="text-dark mx-3">Sobre</a></li>
                <li><a href="{{ route('contact') }}" class="text-dark mx-3">Contato</a></li>
            </ul>
        </nav>
    </header>

    <section class="content">
        <h1>Sobre nós</h1>
        <p>QualityPlus+ é uma plataforma criada para aumentar a visibilidade de microempresas, oferecendo ferramentas e recursos para que o seu negócio cresça mais rápido.</p>
    </section>
</div>
@endsection
