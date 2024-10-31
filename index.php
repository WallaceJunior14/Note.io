<?php
include_once('./app/meadleware/auth.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Arquivos TXT</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-zinc-900 text-zinc-200">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold mb-8 text-center">Gerenciador de Arquivos TXT</h1>

        <!-- Link para criar novo arquivo -->
        <div class="text-center my-8">
            <a href="./views/docs/create.php" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition">Criar Novo Arquivo</a>
            <a href="./views/docs/upload.php" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition">Upload de um Arquivo</a>
        </div>

        <!-- Verificar se há arquivos na pasta -->
        <?php
        $directory = './uploads/files/';
        $files = glob($directory . "*.txt");

        if (count($files) > 0) {
            echo '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">';
            foreach ($files as $file) {
                $fileName = basename($file);
        ?>
                <div class="bg-zinc-800 p-6 rounded-lg shadow-lg transition transform hover:scale-105 hover:bg-zinc-700">
                    <h2 class="text-xl font-semibold mb-4"><?php echo htmlspecialchars($fileName); ?></h2>
                    <div class="flex justify-between">
                        <a href="./views/docs/edit.php?file=<?php echo urlencode($fileName); ?>" class="text-orange-500 hover:text-orange-600 transition">Editar</a>
                        <form action="./app/DocsController/destroy.php" method="POST" class="inline">
                            <input type="hidden" name="file" value="<?php echo htmlspecialchars($fileName); ?>">
                            <button type="submit" class="text-red-500 hover:text-red-600 transition">Excluir</button>
                        </form>
                    </div>
                </div>
        <?php
            }
            echo '</div>';
        } else {
            echo '<p class="text-center text-xl">Nenhum arquivo foi criado ainda.</p>';
        }
        ?>


    </div>
</body>

</html>