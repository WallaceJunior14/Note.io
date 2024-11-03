<?php
include('../../app/middleware/auth.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />

    <title>Upload de Documento</title>
</head>

<body class="bg-zinc-900">
    <div class="container mx-auto mt-10 px-4">
        <div class="bg-zinc-800 p-8 rounded-xl shadow-lg max-w-lg mx-auto">
            <h2 class="text-2xl font-bold text-orange-500 text-center mb-6">Enviar Documento</h2>

            <form action="../../app/DocsController/upload.php" method="post" enctype="multipart/form-data">
                <!-- Nome do arquivo -->
                <div class="mb-6">
                    <label for="file" class="block text-gray-300 font-semibold mb-3">Selecione o Arquivo</label>
                    <input type="file" id="file" name="file[]" accept=".txt" class="w-full p-3 border border-zinc-700 bg-zinc-900 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-orange-500 transition duration-300 hover:bg-zinc-800">
                </div>

                <!-- Linha horizontal -->
                <hr class="my-6 border-zinc-700">

                <!-- Botão de Enviar -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-orange-500 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:bg-orange-600 transition-all duration-300 transform hover:scale-105 focus:outline-none">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
