<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-zinc-900 text-zinc-200">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold mb-8 text-center">Cadastro de Usuário</h1>

        <!-- Formulário de Cadastro -->
        <div class="max-w-md mx-auto bg-zinc-800 p-6 rounded-lg shadow-lg">
            <form action="../../app/UserController/storage.php" method="POST" class="space-y-6">
                <!-- Campo Nome -->
                <div>
                    <label for="name" class="block text-sm font-medium text-zinc-200">Nome</label>
                    <input type="text" id="name" name="name" required class="mt-1 block h-10 p-2 w-full bg-zinc-700 text-zinc-200 border-none rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                </div>

                <!-- Campo Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-zinc-200">Email</label>
                    <input type="email" id="email" name="email" required class="mt-1 block h-10 p-2 w-full bg-zinc-700 text-zinc-200 border-none rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                </div>

                <!-- Campo Senha -->
                <div>
                    <label for="password" class="block text-sm font-medium text-zinc-200">Senha</label>
                    <input type="password" id="password" name="password" required class="mt-1 block h-10 p-2         w-full bg-zinc-700 text-zinc-200 border-none rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                </div>

                <!-- Botão de Cadastro -->
                <div class="text-center">
                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>

        <!-- Link para voltar à página inicial -->
        <div class="text-center mt-6">
            <a href="./login.php" class="text-orange-500 hover:text-orange-600 transition">Voltar para o login</a>
        </div>
    </div>
</body>

</html>
