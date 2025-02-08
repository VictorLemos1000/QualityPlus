<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QualityPlus</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <div class="logo"><span class="green">Quality</span><span class="blue">Plus+</span></div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Contato</a></li>
                <li><a href="{{ route('login') }}" class="btn-header">Entrar</a></li>
            </ul>
        </nav>
    </header>

    <!-- Seção Principal -->
    <section class="hero">
        <div class="content-box">
            <h2>Cresça seu negócio com <strong>QualityPlus</strong></h2>
            <p>Junte-se a nós para explorar e divulgar o potencial do seu negócio, fazendo-o crescer com a gente.</p>
            <div class="buttons">
                <a href="{{ route('login') }}" class="btn-primary">Entrar</a>
                <a href="#" class="btn-secondary">Mais</a>
            </div>
        </div>
        <div class="image-box">
            <img src="{{ asset('images/business.png') }}" alt="Ilustração de negócios">
        </div>
    </section>

</body>
</html>
