<?php
include_once('./app/middleware/auth.php');
include_once('./config/database.php');
include_once('./app/DocsController/search_files_with_user_id.php')
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Arquivos TXT</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-zinc-900 text-zinc-200">
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold">Gerenciador de Arquivos TXT</h1>
            <!-- Link de Logout -->
            <a href="./app/LoginController/logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                Logout
            </a>
        </div>

        <!-- Link para criar novo arquivo -->
        <div class="flex text-center my-8">
            <a href="./views/docs/create.php" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition mr-3">Criar Novo Arquivo</a>
            <a href="./views/docs/upload.php" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition">Upload de um Arquivo</a>
        </div>

        <!-- Exibição dos arquivos do usuário -->
        <?php if (count($files) > 0): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php foreach ($files as $fileName): ?>
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
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-xl">Nenhum arquivo foi criado ainda.</p>
        <?php endif; ?>
    </div>
</body>

</html>