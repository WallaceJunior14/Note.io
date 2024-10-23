<?php
include('../../app/meadleware/auth.php');
include('../../app/DocsController/edit.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Arquivo - <?php echo htmlspecialchars($fileName); ?></title>

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-zinc-900 ">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold mb-8 text-center text-zinc-200">Editar Arquivo: <?= htmlspecialchars($fileName); ?></h1>

        <form action="../../app/DocsController/update.php" method="POST" class="bg-zinc-800 p-6 rounded-lg shadow-lg">
            <input type="hidden" name="file-name" value="<?php echo htmlspecialchars($fileName); ?>">
            <label for="content" class="block text-lg mb-2 text-zinc-200">Conteúdo:</label>
            <textarea name="content" id="content" rows="10" class="w-full p-4 bg-zinc-900 rounded-lg text-zinc-900"><?= htmlspecialchars($content); ?></textarea>
            <br><br>
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition">Salvar Alterações</button>
        </form>

        <div class="text-center mt-8">
            <a href="../../index.php" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition">Voltar</a>
        </div>
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