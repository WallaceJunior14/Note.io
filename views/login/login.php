<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="../../resource/css/login.css">

    <title>Login | Fake Docs</title>
</head>
<body>
    <section class="w-full h-screen flex justify-center items-center">
        <div class="p-[3rem] bg-stone-50 drop-shadow-md rounded-lg">
            <div>
                <?php 
                    if (isset($_GET["error"]) == "login") 
                        echo "<p class='text-red-600 mb-5'>Login ou senha inválidos.</p>"
                ?>
            </div>
            <form action="../../app/LoginController/verify_login.php" method="POST" class="flex flex-col w-[25rem]">
                <label for="email" class="font-bold text-lg mb-2">Email</label>
                <input type="email" name="email" id="email" class="h-[3rem] rounded-lg px-3 mb-5">
                <label for="password" class="font-bold text-lg mb-3">Password</label>
                <input type="password" name="password" id="password" class="h-[3rem] rounded-lg px-3 mb-5">
                <button type="submit" class="self-end h-[3rem] w-[10rem] bg-slate-100 hover:bg-slate-300 rounded-lg transition-shadow font-bold">Login</button>
            </form>
            
            <!-- Link para a tela de cadastro -->
            <div class="mt-5 text-center">
                <p class="text-sm text-gray-700">
                    Não tem uma conta? 
                    <a href="./cadastro_usuario.php" class="text-orange-500 hover:underline">Cadastre-se</a>
                </p>
            </div>
        </div>
    </section>
</body>
</html>
