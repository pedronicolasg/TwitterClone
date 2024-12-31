<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <title>Twitter Clone | Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
</head>

<body class="bg-white dark:bg-black text-black dark:text-white min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-sm">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <svg viewBox="0 0 24 24" class="h-8 w-8 text-blue-500">
                <path fill="currentColor" d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"></path>
            </svg>
        </div>

        <!-- Login Form -->
        <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-lg">
            <h1 class="text-2xl font-bold mb-8 text-center">Sign up to Twitter</h1>

            <form method="POST" action="methods/handlers/register.php" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300" for="username">
                        Username
                    </label>
                    <input
                        type="name"
                        name="name"
                        id="name"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors"
                        placeholder="Enter your username"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300" for="email">
                        Email
                    </label>
                    <input
                        name="email"
                        type="email"
                        id="email"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors"
                        placeholder="Enter your email"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300" for="password">
                        Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors"
                        placeholder="Enter your password"
                        required>
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 rounded-lg transition-colors">
                    Sign Up
                </button>
            </form>

            <div class="my-6 flex items-center justify-between">
                <div class="w-full border-t border-gray-300 dark:border-gray-700"></div>
                <span class="px-4 text-gray-500 dark:text-gray-400 text-sm">or</span>
                <div class="w-full border-t border-gray-300 dark:border-gray-700"></div>
            </div>

            <div class="text-center">
                <span class="text-gray-600 dark:text-gray-400">Have an account?</span>
                <a href="signin.php" class="text-blue-500 hover:text-blue-600 ml-1">
                    Sign in
                </a>
            </div>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>

</html>