# QualityPlus

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1 x-text=".alt">QualityPlus+</h1>
    <br>
    <h4>
        A plataforma QualityPlus+ foi idealizada para que usuários e 
        Micro Empreededores Individuais(MEIs) cadastrem-se e entrem no sistema,
        afim de terem uma melhor relação para melhorar a qualidade dos serviços
        prestados, qualidade dos produtos e qualidade dos preços dos itens ofertados
        por estes estabelecimentos.
    </h4>
    
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f9; /* Cor de fundo suave */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        /* Estilos para o título h1 */
        h1 {
            color: #4CAF50; /* Cor verde para o título */
            font-size: 2.5em;
            text-align: center;
            opacity: 0;
            animation: fadeIn 2s forwards; /* Animação para o título */
        }

        /* Estilos para o subtítulo h4 */
        h4 {
            font-size: 1.2em;
            text-align: center;
            width: 80%;
            margin: 20px auto;
            line-height: 1.6;
            opacity: 0;
            animation: fadeIn 2s 1s forwards; /* Animação com atraso */
            color: #555; /* Cor mais suave para o texto */
        }

        /* Definição da animação de fade-in */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Efeito de hover em links ou botões */
        a, button {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover, button:hover {
            background-color: #45a049; /* Efeito hover */
        }

          /* Definindo o estilo do corpo */
          body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Estilo para o h1 (Logo) */
        h1 {
            font-size: 4em; /* Tamanho maior para o logo */
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: 0;
        }

        /* Cor do texto verde para "Quality" */
        .quality {
            color: #4CAF50;
        }

        /* Cor do texto azul para "Plus" */
        .plus {
            color: #2196F3;
        }

        /* Cor do texto branco para "+" */
        .plus-sign {
            color: white;
            background-color: #2196F3; /* Fundo azul para o "+" */
            padding: 0 8px;
            border-radius: 4px;
        }
    </style>
</body>
</html>
