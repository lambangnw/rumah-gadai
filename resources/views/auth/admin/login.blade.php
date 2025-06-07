<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Rumah Gadai</title>
    
    <!-- Styles -->
    @vite(['resources/css/app.css'])
    
    <!-- Material Design Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full">
            <!-- Logo -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-orange-600">Rumah Gadai</h1>
                <p class="text-gray-600 mt-2">Portal Admin</p>
            </div>

            <!-- Login Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Login</h2>

                <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="admin@example.com"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               value="password"
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                        <span class="mdi mdi-login mr-2"></span>
                        Login
                    </button>
                </form>
            </div>

            <!-- Help -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Butuh bantuan? 
                    <a href="#" class="text-blue-600 hover:text-blue-700">
                        Hubungi Support
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</body>
</html> 