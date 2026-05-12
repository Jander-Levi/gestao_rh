<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - G2G Payroll System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .input-field {
            transition: all 0.3s ease;
        }
        .input-field:focus-within {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px -5px rgba(15, 108, 189, 0.1), 0 8px 10px -6px rgba(15, 108, 189, 0.1);
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a',
                        },
                        gold: {
                            400: '#facc15',
                            500: '#eab308',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-slate-50 flex">
    
    <!-- Left Side: Image & Branding -->
    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-slate-900">
        <img src="login_bg.png" alt="G2G Payroll Background" class="absolute inset-0 w-full h-full object-cover opacity-80 mix-blend-overlay">
        <div class="absolute inset-0 bg-gradient-to-t from-brand-900/90 via-brand-900/40 to-transparent"></div>
        
        <div class="relative z-10 flex flex-col justify-between p-16 h-full w-full">
            <div class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-gold-400 to-gold-500 text-white text-2xl shadow-lg">
                    💎
                </div>
                <span class="text-2xl font-bold text-white tracking-tight">G2G Telecom</span>
            </div>
            
            <div class="max-w-md">
                <h1 class="text-4xl font-bold text-white leading-tight mb-4">
                    Gestão inteligente para sua equipe.
                </h1>
                <p class="text-lg text-slate-300">
                    Acompanhe folhas de pagamento, assine documentos e gerencie benefícios em uma plataforma segura e unificada.
                </p>
                
                <div class="mt-8 flex items-center gap-4">
                    <div class="flex -space-x-3">
                        <div class="w-10 h-10 rounded-full border-2 border-brand-900 bg-slate-300"></div>
                        <div class="w-10 h-10 rounded-full border-2 border-brand-900 bg-slate-400"></div>
                        <div class="w-10 h-10 rounded-full border-2 border-brand-900 bg-slate-500"></div>
                    </div>
                    <span class="text-sm font-medium text-slate-300">Mais de 500 colaboradores ativos</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side: Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-16 relative">
        <!-- Decorative Background Elements for Mobile -->
        <div class="absolute top-0 right-0 -m-20 w-64 h-64 bg-brand-500/10 rounded-full blur-3xl lg:hidden"></div>
        <div class="absolute bottom-0 left-0 -m-20 w-64 h-64 bg-gold-500/10 rounded-full blur-3xl lg:hidden"></div>

        <div class="w-full max-w-md relative z-10 glass-panel lg:bg-transparent lg:backdrop-filter-none lg:border-none p-8 lg:p-0 rounded-2xl shadow-xl lg:shadow-none">
            
            <!-- Mobile Logo -->
            <div class="flex items-center gap-3 mb-8 lg:hidden justify-center">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-gold-400 to-gold-500 text-white text-2xl shadow-md">
                    💎
                </div>
                <span class="text-2xl font-bold text-slate-800 tracking-tight">G2G</span>
            </div>

            <div class="text-center lg:text-left mb-8">
                <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Bem-vindo de volta</h2>
                <p class="mt-2 text-slate-500">Insira suas credenciais para acessar sua conta.</p>
            </div>

            <form action="picker.php" method="POST" class="space-y-6">
                <!-- Email Input -->
                <div class="space-y-2 input-field">
                    <label for="email" class="block text-sm font-medium text-slate-700">E-mail corporativo</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <input type="email" name="email" id="email" 
                            class="block w-full pl-10 pr-3 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-colors bg-white shadow-sm placeholder-slate-400"
                            placeholder="nome@g2gtelecom.net" required>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="space-y-2 input-field">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-slate-700">Senha</label>
                        <a href="#" class="text-sm font-medium text-brand-600 hover:text-brand-500 transition-colors">Esqueceu a senha?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="password" name="password" id="password" 
                            class="block w-full pl-10 pr-10 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-colors bg-white shadow-sm placeholder-slate-400"
                            placeholder="••••••••" required>
                        <!-- Optional View Password Icon -->
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer text-slate-400 hover:text-slate-600 transition-colors">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-brand-600 focus:ring-brand-500 border-slate-300 rounded cursor-pointer">
                    <label for="remember-me" class="ml-2 block text-sm text-slate-600 cursor-pointer">
                        Lembrar-me neste dispositivo
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-semibold text-white bg-gradient-to-r from-brand-600 to-brand-700 hover:from-brand-500 hover:to-brand-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                    Entrar no Sistema
                </button>
            </form>

            <div class="mt-8 text-center text-sm text-slate-500">
                Problemas no acesso? <a href="#" class="font-medium text-brand-600 hover:text-brand-500 transition-colors">Fale com o suporte de TI</a>
            </div>
        </div>
    </div>
</body>
</html>
