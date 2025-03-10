<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comparador de preços</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QualityPlus+ - Comparador</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-teal-500 to-blue-500 min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-teal-600">Quality<span class="text-blue-600">Plus+</span></h1>
        <nav>
            <ul class="flex space-x-6 text-gray-700 font-medium">
                <li><a href="#" class="hover:text-blue-600">Home</a></li>
                <li><a href="#" class="hover:text-blue-600">Sobre</a></li>
                <li><a href="#" class="hover:text-blue-600">Contato</a></li>
            </ul>
        </nav>
        <div class="text-blue-600 text-2xl">
            <i class="fas fa-user-circle"></i>
        </div>
    </header>

    <!-- Comparador de Preços -->
    <main class="flex-1 flex justify-center items-center">
        <div class="bg-white p-6 rounded-2xl shadow-lg max-w-5xl w-full">
            <div class="grid grid-cols-3 gap-6">

                <!-- 1° Melhor Escolha -->
                <div class="p-4 border rounded-lg shadow-lg bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800 text-center">1° Melhor Escolha</h2>
                    <div class="flex flex-col items-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/15/Mix_Mateus_Logo.png" class="w-28" alt="Mix Mateus">
                        <p class="text-gray-700 font-medium mt-2">Mix Mateus</p>
                        <p class="text-yellow-500 text-lg">⭐⭐⭐⭐☆ 4.5</p>
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415682.png" class="w-20 mt-3" alt="Maçã">
                        <p class="text-lg font-semibold mt-2">Maçã</p>
                        <p class="text-green-600 font-bold text-lg">R$ 3.00</p>
                    </div>
                </div>

                <!-- 2° Melhor Escolha -->
                <div class="p-4 border rounded-lg shadow-lg bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800 text-center">2° Melhor Escolha</h2>
                    <div class="flex flex-col items-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415682.png" class="w-20 mt-3" alt="Maçã">
                        <p class="text-lg font-semibold mt-2">Maçã</p>
                        <p class="text-green-600 font-bold text-lg">R$ 4.20</p>
                    </div>
                </div>

                <!-- Melhor Escolha Favorita -->
                <div class="p-4 border rounded-lg shadow-lg bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800 text-center">Melhor Escolha Favorita</h2>
                    <div class="flex flex-col items-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415682.png" class="w-20 mt-3" alt="Maçã">
                        <p class="text-lg font-semibold mt-2">Maçã</p>
                        <p class="text-green-600 font-bold text-lg">R$ 4.00</p>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>

</body>
</html>
