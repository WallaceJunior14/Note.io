<?php
include('../../app/meadleware/auth.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />

    <title>Criar Documento</title>
</head>

<body class="bg-zinc-900">
    <div class="container mx-auto mt-10 px-4">
        <form action="../../app/DocsController/storage.php" method="post" class="bg-zinc-800 p-6 rounded-lg shadow-lg">
            <!-- Nome do arquivo -->
            <div class="mb-4">
                <label for="file-name" class="block text-gray-300 font-semibold mb-2">Nome do arquivo</label>
                <input type="text" id="file-name" name="file-name" class="w-full p-2 border border-zinc-700 bg-zinc-900 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-orange-500 transition duration-300">
            </div>

            <!-- CKEditor para conteúdo do documento -->
            <div class="mb-4">
                <label for="content" class="block text-gray-300 font-semibold mb-2">Conteúdo</label>
                <textarea name="content" id="content" class=""></textarea>
            </div>

            <!-- Linha horizontal -->
            <hr class="my-6 border-zinc-700">

            <!-- Botão de Enviar -->
            <div class="flex justify-end">
                <button type="submit" class="bg-white text-black hover:bg-orange-500 hover:text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                    Salvar
                </button>
            </div>
        </form>
    </div>

    <script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/"
        }
    }
    </script>


    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#content'), {
                plugins: [Essentials, Bold, Italic, Font, Paragraph],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then( /* ... */ )
            .catch( /* ... */ );
    </script>
</body>

</html>