<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Twitter</title>
    <link rel="stylesheet" href="css/loginPage.css">
</head>

<body>
    <header class="container">
        <div class="logo">
            <img src="images/twitter-logo.png" alt="Logo do Twitter">
        </div>
    </header>

    <main class="container">
        <h1>Logar</h1>
        <div class="container">
            <form action="methods/login.php" method="post" enctype="multipart/form-data" class="">
                <div class="inputs">
                    <label class="user" for="usuario">Email</label><br>
                    <input type="text" id="email" name="email">
                </div>
                <div class="inputs">
                    <label class="senha" for="senha">Senha</label><br>
                    <input type="password" id="password" name="password">
                </div>
                <br>
                <button class="button" type="submit">Entrar</button>
            </form>
            <div class="links container">
                <a href="signup.php">Registre-se</a>
            </div>
        </div>
    </main>
</body>

</html>