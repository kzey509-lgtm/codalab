<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodaLab | The Future of Coding</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        brand: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            400: '#2dd4bf',
                            500: '#14b8a6',
                            600: '#0d9488',
                            glow: '#00f0ff',
                            purple: '#bd00ff'
                        },
                        dark: {
                            bg: '#0f172a',
                            surface: '#1e293b',
                            border: '#334155'
                        }
                    },
                    animation: {
                        'gradient-x': 'gradient-x 15s ease infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        'gradient-x': {
                            '0%, 100%': {
                                'background-size': '200% 200%',
                                'background-position': 'left center'
                            },
                            '50%': {
                                'background-size': '200% 200%',
                                'background-position': 'right center'
                            },
                        },
                        'float': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom Styles for Glassmorphism and Utilities */
        body {
            background-color: #0f172a;
            color: #f8fafc;
            overflow-x: hidden;
        }

        /* Glassmorphism */
        .glass {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        
        .glass-panel {
            background: rgba(15, 23, 42, 0.95);
            border: 1px solid rgba(148, 163, 184, 0.1);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0f172a; 
        }
        ::-webkit-scrollbar-thumb {
            background: #334155; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #475569; 
        }

        /* Editor Line Numbers */
        .editor-container {
            position: relative;
            font-family: 'JetBrains Mono', monospace;
            font-size: 14px;
            line-height: 1.6;
        }
        
        textarea.code-input {
            background: transparent;
            color: transparent;
            caret-color: white;
            z-index: 2;
            resize: none;
            outline: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 16px;
            padding-left: 50px; /* space for line numbers */
            white-space: pre;
            overflow: auto;
        }

        .code-highlight {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 16px;
            padding-left: 50px;
            pointer-events: none;
            z-index: 1;
            white-space: pre;
            overflow: hidden;
        }

        .line-numbers {
            position: absolute;
            top: 0;
            left: 0;
            width: 40px;
            height: 100%;
            background: #1e293b;
            border-right: 1px solid #334155;
            color: #64748b;
            padding: 16px 0;
            text-align: right;
            padding-right: 8px;
            z-index: 3;
            overflow: hidden;
            user-select: none;
        }

        /* Neon Glows */
        .neon-text {
            text-shadow: 0 0 10px rgba(45, 212, 191, 0.5);
        }
        .neon-border {
            box-shadow: 0 0 10px rgba(45, 212, 191, 0.2);
        }

        /* Hero Animation Background */
        .hero-bg {
            background: linear-gradient(-45deg, #0f172a, #1e1b4b, #0f172a, #111827);
            background-size: 400% 400%;
            animation: gradient-x 15s ease infinite;
        }

        /* Hide generic pages initially */
        .page-section {
            display: none;
            animation: fadeIn 0.3s ease-in-out;
        }
        .page-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Toast Notification */
        #toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .toast {
            transform: translateX(100%);
            transition: transform 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }
        .toast.show {
            transform: translateX(0);
        }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col">

    <!-- Navigation -->
    <nav class="glass sticky top-0 z-50 w-full border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center cursor-pointer" onclick="router.navigate('home')">
                    <i class="fa-solid fa-code text-brand-400 text-2xl mr-2"></i>
                    <span class="font-bold text-xl tracking-tight text-white">Coda<span class="text-brand-400">Lab</span></span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <button onclick="router.navigate('home')" class="nav-link text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">Home</button>
                        <button onclick="router.navigate('tutorials')" class="nav-link text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">Tutorials</button>
                        <button onclick="router.navigate('codalab')" class="nav-link text-brand-400 bg-brand-900/20 hover:bg-brand-900/40 px-3 py-2 rounded-md text-sm font-medium transition-colors neon-border">
                            <i class="fa-solid fa-flask mr-1"></i> CodaLab
                        </button>
                        <button onclick="router.navigate('projects')" class="nav-link text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">Projects</button>
                        <button onclick="router.navigate('shop')" class="nav-link text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">Shop</button>
                        <button onclick="router.navigate('chat')" class="nav-link text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            <i class="fa-solid fa-comments mr-1"></i> Chat <span class="bg-red-500 text-white text-[10px] px-1 rounded-full">3</span>
                        </button>
                    </div>
                </div>

                <!-- Right Side Actions -->
                <div class="hidden md:flex items-center gap-4">
                    <button onclick="router.navigate('admin')" class="text-gray-400 hover:text-white transition"><i class="fa-solid fa-shield-halved"></i></button>
                    <button onclick="router.navigate('dashboard')" class="text-gray-400 hover:text-white transition"><i class="fa-solid fa-chart-pie"></i></button>
                    <button onclick="router.navigate('login')" class="bg-brand-600 hover:bg-brand-500 text-white px-4 py-2 rounded-md text-sm font-medium transition shadow-lg shadow-brand-500/20">Sign In</button>
                </div>

                <!-- Mobile menu button -->
                <div class="-mr-2 flex md:hidden">
                    <button onclick="toggleMobileMenu()" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden md:hidden glass border-t border-white/5">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <button onclick="router.navigate('home')" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium w-full text-left">Home</button>
                <button onclick="router.navigate('codalab')" class="text-brand-400 block px-3 py-2 rounded-md text-base font-medium w-full text-left">CodaLab IDE</button>
                <button onclick="router.navigate('tutorials')" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium w-full text-left">Tutorials</button>
                <button onclick="router.navigate('login')" class="text-brand-400 block px-3 py-2 rounded-md text-base font-medium w-full text-left mt-4">Login / Register</button>
            </div>
        </div>
    </nav>

    <!-- Main Content Container -->
    <main id="app" class="flex-grow relative">
        
        <!-- PAGE 1: LANDING -->
        <section id="home" class="page-section active">
            <!-- Hero -->
            <div class="hero-bg relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 relative z-10 text-center">
                    <div class="inline-block mb-4 px-4 py-1 rounded-full border border-brand-500/30 bg-brand-500/10 backdrop-blur-sm">
                        <span class="text-brand-400 text-sm font-medium tracking-wide uppercase">v2.0 Now Available</span>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 tracking-tight">
                        Code. Compile. <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 to-brand-purple neon-text">Conquer.</span>
                    </h1>
                    <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-400">
                        The ultimate futuristic environment for fullstack development. Build, learn, and collaborate in a next-gen cloud IDE.
                    </p>
                    <div class="mt-10 flex justify-center gap-4">
                        <button onclick="router.navigate('codalab')" class="bg-brand-600 hover:bg-brand-500 text-white px-8 py-3 rounded-lg font-semibold transition shadow-lg shadow-brand-500/25 flex items-center">
                            <i class="fa-solid fa-rocket mr-2"></i> Launch IDE
                        </button>
                        <button onclick="router.navigate('tutorials')" class="glass hover:bg-white/10 text-white px-8 py-3 rounded-lg font-semibold transition flex items-center">
                            Start Learning
                        </button>
                    </div>
                    
                    <!-- Preview Image (Abstract UI) -->
                    <div class="mt-16 animate-float">
                        <div class="glass rounded-xl border border-white/10 shadow-2xl overflow-hidden mx-auto max-w-5xl">
                            <div class="bg-gray-900 px-4 py-2 flex items-center gap-2 border-b border-white/5">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                <span class="ml-4 text-xs text-gray-500 font-mono">main.py — CodaLab IDE</span>
                            </div>
                            <div class="p-4 bg-[#0d1117] h-64 md:h-80 flex items-center justify-center relative">
                                <div class="absolute inset-0 grid grid-cols-12 gap-4 opacity-20 pointer-events-none">
                                    <div class="col-span-3 border-r border-white/10"></div>
                                    <div class="col-span-6 border-r border-white/10"></div>
                                </div>
                                <div class="text-center z-10">
                                    <i class="fa-solid fa-terminal text-4xl text-brand-400 mb-4"></i>
                                    <p class="font-mono text-brand-300">> Building the future...</p>
                                    <p class="font-mono text-gray-500">Process finished with exit code 0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="bg-dark-bg py-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-white">Everything you need</h2>
                        <p class="text-gray-400 mt-2">From prototype to deployment</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Feature 1 -->
                        <div class="glass p-8 rounded-xl hover:border-brand-500/50 transition duration-300 group">
                            <div class="w-12 h-12 bg-brand-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:bg-brand-500/20 transition">
                                <i class="fa-solid fa-bolt text-brand-400 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Real-time Execution</h3>
                            <p class="text-gray-400">Run PHP, Python, and JavaScript instantly in our cloud environment. No setup required.</p>
                        </div>
                        <!-- Feature 2 -->
                        <div class="glass p-8 rounded-xl hover:border-brand-purple/50 transition duration-300 group">
                            <div class="w-12 h-12 bg-purple-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:bg-purple-500/20 transition">
                                <i class="fa-solid fa-users text-brand-purple text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Community Driven</h3>
                            <p class="text-gray-400">Join thousands of developers in our chat rooms. Share code, get help, and grow together.</p>
                        </div>
                        <!-- Feature 3 -->
                        <div class="glass p-8 rounded-xl hover:border-pink-500/50 transition duration-300 group">
                            <div class="w-12 h-12 bg-pink-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:bg-pink-500/20 transition">
                                <i class="fa-solid fa-graduation-cap text-pink-400 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Learn by Doing</h3>
                            <p class="text-gray-400">Interactive tutorials and challenges that help you master fullstack development.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pricing -->
            <div class="glass border-t border-white/5 py-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-white">Simple Pricing</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Free -->
                        <div class="glass-panel p-8 rounded-xl border border-white/5">
                            <h3 class="text-lg font-medium text-gray-300">Starter</h3>
                            <div class="mt-4 flex items-baseline text-white">
                                <span class="text-4xl font-bold">$0</span>
                                <span class="ml-1 text-gray-500">/mo</span>
                            </div>
                            <ul class="mt-6 space-y-4 text-gray-400 text-sm">
                                <li class="flex"><i class="fa-solid fa-check text-green-500 mr-2"></i> Access to CodaLab Basic</li>
                                <li class="flex"><i class="fa-solid fa-check text-green-500 mr-2"></i> Community Chat</li>
                                <li class="flex"><i class="fa-solid fa-check text-green-500 mr-2"></i> 3 Public Projects</li>
                            </ul>
                        </div>
                        <!-- Pro -->
                        <div class="glass-panel p-8 rounded-xl border border-brand-500 relative transform scale-105 shadow-lg shadow-brand-500/10">
                            <div class="absolute top-0 right-0 bg-brand-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">POPULAR</div>
                            <h3 class="text-lg font-medium text-white">Pro Developer</h3>
                            <div class="mt-4 flex items-baseline text-white">
                                <span class="text-4xl font-bold">$19</span>
                                <span class="ml-1 text-gray-500">/mo</span>
                            </div>
                            <ul class="mt-6 space-y-4 text-gray-300 text-sm">
                                <li class="flex"><i class="fa-solid fa-check text-brand-400 mr-2"></i> Unlimited Private Projects</li>
                                <li class="flex"><i class="fa-solid fa-check text-brand-400 mr-2"></i> Full Database Access</li>
                                <li class="flex"><i class="fa-solid fa-check text-brand-400 mr-2"></i> Priority Support</li>
                                <li class="flex"><i class="fa-solid fa-check text-brand-400 mr-2"></i> AI Assistant</li>
                            </ul>
                            <button onclick="router.navigate('shop')" class="mt-8 w-full bg-brand-600 hover:bg-brand-500 text-white py-2 rounded-lg font-medium transition">Get Started</button>
                        </div>
                        <!-- Team -->
                        <div class="glass-panel p-8 rounded-xl border border-white/5">
                            <h3 class="text-lg font-medium text-gray-300">Team</h3>
                            <div class="mt-4 flex items-baseline text-white">
                                <span class="text-4xl font-bold">$49</span>
                                <span class="ml-1 text-gray-500">/mo</span>
                            </div>
                            <ul class="mt-6 space-y-4 text-gray-400 text-sm">
                                <li class="flex"><i class="fa-solid fa-check text-green-500 mr-2"></i> Everything in Pro</li>
                                <li class="flex"><i class="fa-solid fa-check text-green-500 mr-2"></i> Team Collaboration</li>
                                <li class="flex"><i class="fa-solid fa-check text-green-500 mr-2"></i> Role Management</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PAGE 2: LOGIN / REGISTER -->
        <section id="login" class="page-section">
            <div class="min-h-[calc(100vh-64px)] flex items-center justify-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-brand-900/20 to-purple-900/20"></div>
                <div class="glass p-8 rounded-2xl w-full max-w-md relative z-10 mx-4 border border-white/10 shadow-2xl">
                    <h2 class="text-2xl font-bold text-white mb-6 text-center">Welcome Back</h2>
                    
                    <!-- Social Login -->
                    <div class="flex gap-4 mb-6">
                        <button class="flex-1 bg-white/5 hover:bg-white/10 py-2 rounded-lg transition text-gray-300 border border-white/5">
                            <i class="fa-brands fa-github"></i>
                        </button>
                        <button class="flex-1 bg-white/5 hover:bg-white/10 py-2 rounded-lg transition text-gray-300 border border-white/5">
                            <i class="fa-brands fa-google"></i>
                        </button>
                    </div>

                    <div class="relative mb-6">
                        <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-white/10"></div></div>
                        <div class="relative flex justify-center text-sm"><span class="px-2 bg-[#162032] text-gray-500">Or continue with email</span></div>
                    </div>

                    <form onsubmit="event.preventDefault(); handleLogin();" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Email</label>
                            <input type="email" value="demo@codalab.io" class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-brand-500 transition" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Password</label>
                            <input type="password" value="password" class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-brand-500 transition" required>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <label class="flex items-center text-gray-400">
                                <input type="checkbox" class="mr-2 bg-black/20 border-white/10 rounded"> Remember me
                            </label>
                            <a href="#" class="text-brand-400 hover:text-brand-300">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full bg-brand-600 hover:bg-brand-500 text-white font-bold py-2 rounded-lg transition shadow-lg shadow-brand-500/20">Sign In</button>
                    </form>
                    <p class="mt-6 text-center text-sm text-gray-400">
                        Don't have an account? <a href="#" class="text-brand-400 hover:underline">Register</a>
                    </p>
                </div>
            </div>
        </section>

        <!-- PAGE 3: DASHBOARD -->
        <section id="dashboard" class="page-section">
            <div class="flex h-[calc(100vh-64px)]">
                <!-- Sidebar -->
                <div class="w-64 glass border-r border-white/5 hidden md:block">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-400 to-purple-500 flex items-center justify-center text-white font-bold">D</div>
                            <div>
                                <h4 class="font-bold text-white">Dev User</h4>
                                <span class="text-xs text-brand-400">Pro Plan</span>
                            </div>
                        </div>
                        <nav class="space-y-2">
                            <a href="#" class="flex items-center gap-3 px-4 py-2 bg-white/10 text-white rounded-lg">
                                <i class="fa-solid fa-house w-5"></i> Overview
                            </a>
                            <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-400 hover:bg-white/5 hover:text-white rounded-lg transition">
                                <i class="fa-solid fa-folder w-5"></i> My Projects
                            </a>
                            <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-400 hover:bg-white/5 hover:text-white rounded-lg transition">
                                <i class="fa-solid fa-bookmark w-5"></i> Saved Tutorials
                            </a>
                            <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-400 hover:bg-white/5 hover:text-white rounded-lg transition">
                                <i class="fa-solid fa-gear w-5"></i> Settings
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 overflow-y-auto p-8 bg-dark-bg">
                    <h2 class="text-2xl font-bold text-white mb-6">Dashboard Overview</h2>
                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div class="glass p-6 rounded-xl border border-white/5">
                            <div class="text-gray-400 text-sm mb-1">Total Projects</div>
                            <div class="text-3xl font-bold text-white">12</div>
                            <div class="text-green-400 text-xs mt-2"><i class="fa-solid fa-arrow-up"></i> 2 this week</div>
                        </div>
                        <div class="glass p-6 rounded-xl border border-white/5">
                            <div class="text-gray-400 text-sm mb-1">Code Runs</div>
                            <div class="text-3xl font-bold text-white">1,402</div>
                            <div class="text-green-400 text-xs mt-2"><i class="fa-solid fa-arrow-up"></i> 12% increase</div>
                        </div>
                        <div class="glass p-6 rounded-xl border border-white/5">
                            <div class="text-gray-400 text-sm mb-1">Community Likes</div>
                            <div class="text-3xl font-bold text-white">845</div>
                            <div class="text-gray-500 text-xs mt-2">Top 10% of users</div>
                        </div>
                        <div class="glass p-6 rounded-xl border border-white/5">
                            <div class="text-gray-400 text-sm mb-1">Hours Learned</div>
                            <div class="text-3xl font-bold text-white">34.5</div>
                            <div class="text-brand-400 text-xs mt-2">Intermediate Level</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PAGE 4: TUTORIALS -->
        <section id="tutorials" class="page-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <h2 class="text-3xl font-bold text-white mb-8">Learning Paths</h2>
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Filters -->
                    <aside class="w-full md:w-64 space-y-8">
                        <div>
                            <h3 class="text-white font-bold mb-4">Categories</h3>
                            <ul class="space-y-2 text-sm text-gray-400">
                                <li class="cursor-pointer text-brand-400 font-medium">Fullstack Development</li>
                                <li class="cursor-pointer hover:text-white transition">Frontend (React/Vue)</li>
                                <li class="cursor-pointer hover:text-white transition">Backend (Node/Laravel)</li>
                                <li class="cursor-pointer hover:text-white transition">DevOps</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <!-- PAGE 5: CODALAB IDE (The Core Feature) -->
        <section id="codalab" class="page-section">
            <div class="h-[calc(100vh-64px)] flex flex-col bg-[#0d1117] text-gray-300">
                <!-- Toolbar -->
                <div class="h-10 bg-[#161b22] border-b border-white/5 flex items-center px-4 justify-between">
                    <div class="flex items-center gap-4 text-sm">
                        <span class="text-gray-500 font-mono text-xs">CodaLab Workspace</span>
                        <div class="flex gap-2">
                            <button class="hover:bg-white/5 px-2 py-1 rounded text-xs">File</button>
                            <button class="hover:bg-white/5 px-2 py-1 rounded text-xs">Edit</button>
                            <button class="hover:bg-white/5 px-2 py-1 rounded text-xs">View</button>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="flex items-center bg-[#0d1117] border border-white/10 rounded text-xs">
                            <button id="tab-index" onclick="switchFile('index.php')" class="px-3 py-1 bg-[#21262d] text-white border-r border-white/10 rounded-l">index.php</button>
                            <button id="tab-style" onclick="switchFile('style.css')" class="px-3 py-1 hover:bg-[#21262d] text-gray-400 rounded-r">style.css</button>
                        </div>
                        <button onclick="runCode()" class="bg-green-600 hover:bg-green-500 text-white px-3 py-1 rounded text-xs font-bold flex items-center gap-1">
                            <i class="fa-solid fa-play"></i> Run
                        </button>
                    </div>
                </div>
                <!-- Main Workspace -->
                <div class="flex-1 flex overflow-hidden">
                    <!-- File Explorer -->
                    <div class="w-56 bg-[#161b22] border-r border-white/5 flex flex-col">
                        <div class="p-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Explorer</div>
                        <div class="flex-1 overflow-y-auto text-sm">
                            <div class="px-2 py-1 hover:bg-[#21262d] cursor-pointer text-white"><i class="fa-solid fa-chevron-down text-[10px] mr-1"></i> project-root</div>
                            <div class="pl-4">
                                <div onclick="switchFile('index.php')" class="px-2 py-1 hover:bg-[#21262d] cursor-pointer flex items-center gap-2 text-brand-400 bg-[#1f242c]">
                                    <i class="fa-brands fa-php"></i> index.php
                                </div>
                                <div onclick="switchFile('style.css')" class="px-2 py-1 hover:bg-[#21262d] cursor-pointer flex items-center gap-2 text-blue-400">
                                    <i class="fa-brands fa-css3-alt"></i> style.css
                                </div>
                                <div class="px-2 py-1 hover:bg-[#21262d] cursor-pointer flex items-center gap-2 text-yellow-400">
                                    <i class="fa-brands fa-js"></i> app.js
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Editor Area -->
                    <div class="flex-1 flex flex-col relative">
                        <!-- Editor -->
                        <div class="flex-1 relative editor-container" id="editor-wrapper">
                            <div class="line-numbers font-mono text-sm" id="line-numbers">1</div>
                            <!-- Highlight Layer -->
                            <pre class="code-highlight font-mono text-sm" id="code-highlight"></pre>
                            <!-- Input Layer -->
                            <textarea id="code-input" class="code-input" spellcheck="false" oninput="updateEditor(this); syncScroll(this);" onscroll="syncScroll(this);" onkeydown="handleTab(event)"></textarea>
                        </div>

                        <!-- Terminal / Console -->
                        <div class="h-48 bg-[#0d1117] border-t border-white/10 flex flex-col">
                            <div class="flex bg-[#161b22] border-b border-white/5">
                                <button class="px-4 py-1 text-xs text-white border-b-2 border-brand-500">Console</button>
                                <button class="px-4 py-1 text-xs text-gray-500 hover:text-white">Terminal</button>
                                <button class="px-4 py-1 text-xs text-gray-500 hover:text-white">Problems</button>
                                <button class="px-4 py-1 text-xs text-gray-500 hover:text-white">Output</button>
                            </div>
                            <div class="flex-1 p-4 font-mono text-sm overflow-y-auto" id="console-output">
                                <div class="text-gray-500">CodaLab Environment v1.0.2 ready.</div>
                                <div class="text-gray-500">Type code above and hit Run...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="glass border-t border-white/5 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <span class="font-bold text-xl text-white">Coda<span class="text-brand-400">Lab</span></span>
                    <p class="text-gray-500 mt-4 text-sm">Building the future of developer education and tools.</p>
                </div>
            </div>
            <div class="border-t border-white/5 mt-12 pt-8 text-center text-sm text-gray-600">
                &copy; 2023 CodaLab Inc. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Toast Container -->
    <div id="toast-container"></div>

    <script>
        // --- Router System ---
        const router = {
            current: 'home',
            navigate: function(pageId) {
                // Hide all sections
                document.querySelectorAll('.page-section').forEach(el => {
                    el.classList.remove('active');
                });
                // Show target
                const target = document.getElementById(pageId);
                if(target) {
                    target.classList.add('active');
                    this.current = pageId;
                    window.scrollTo(0,0);
                    
                    // Special init for IDE
                    if(pageId === 'codalab') {
                        initEditor();
                    }
                }
                // Close mobile menu if open
                document.getElementById('mobile-menu').classList.add('hidden');
            }
        };

        // --- Toast System ---
        function showToast(message, type = 'info') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            
            const colors = {
                success: 'border-green-500 bg-green-900/80 text-green-100',
                info: 'border-brand-500 bg-brand-900/80 text-brand-100',
                error: 'border-red-500 bg-red-900/80 text-red-100'
            };

            toast.className = `toast glass border-l-4 p-4 rounded shadow-lg min-w-[250px] flex items-center justify-between ${colors[type] || colors.info}`;
            toast.innerHTML = `
                <span>${message}</span>
                <button onclick="this.parentElement.remove()" class="ml-4 hover:opacity-75"><i class="fa-solid fa-xmark"></i></button>
            `;

            container.appendChild(toast);
            
            // Animate in
            requestAnimationFrame(() => {
                toast.classList.add('show');
            });

            // Remove after 3s
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // --- Auth Logic ---
        function handleLogin() {
            showToast('Authenticating...', 'info');
            setTimeout(() => {
                showToast('Welcome back, Developer!', 'success');
                router.navigate('dashboard');
            }, 1000);
        }

        // --- IDE Logic ---
        const files = {
            'index.php': `<?php\n\nrequire_once 'vendor/autoload.php';\n\n$app = new App();\n\n// Initialize Database\n$db = new Database(\n    getenv('DB_HOST'),\n    getenv('DB_NAME'),\n    getenv('DB_USER'),\n    getenv('DB_PASS')\n);\n\n// Get Users\n$users = $db->query('SELECT * FROM users');\n\nforeach ($users as $user) {\n    echo "User: " . $user['name'] . "\\n";\n}\n\n?>`,
            'style.css': `/* Global Styles */\n:root {\n    --primary-color: #0d9488;\n    --bg-color: #0f172a;\n}\n\nbody {\n    background-color: var(--bg-color);\n    color: white;\n    font-family: 'Inter', sans-serif;\n}\n\n.container {\n    max-width: 1200px;\n    margin: 0 auto;\n    padding: 20px;\n}\n\n.btn {\n    background: var(--primary-color);\n    padding: 10px 20px;\n    border-radius: 8px;\n    color: white;\n}`
        };

        let currentFile = 'index.php';

        function switchFile(filename) {
            currentFile = filename;
            document.getElementById('code-input').value = files[filename];
            updateEditor(document.getElementById('code-input'));
        }

        function initEditor() {
            switchFile('index.php');
        }

        function updateEditor(textarea) {
            const code = textarea.value;
            files[currentFile] = code; // Save to memory
            
            // Update Line Numbers
            const lines = code.split('\n').length;
            document.getElementById('line-numbers').innerHTML = Array(lines).fill(0).map((_, i) => i + 1).join('<br>');
            
            // Basic Highlighting (Regex replacement for visuals)
            let highlighted = code
                .replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;") // Escape HTML
                .replace(/(\/\/.*)/g, '<span class="text-gray-500">$1</span>') // Comments
                .replace(/\b(function|echo|require_once|return|if|else|foreach|new|class|public)\b/g, '<span class="text-purple-400">$1</span>') // Keywords
                .replace(/(\$[a-zA-Z0-9_]+)/g, '<span class="text-yellow-400">$1</span>'); // Vars (PHP)

            document.getElementById('code-highlight').innerHTML = highlighted;
        }

        function syncScroll(el) {
            document.getElementById('line-numbers').scrollTop = el.scrollTop;
            document.getElementById('code-highlight').scrollTop = el.scrollTop;
            document.getElementById('code-highlight').scrollLeft = el.scrollLeft;
        }

        function handleTab(e) {
            if (e.key == 'Tab') {
                e.preventDefault();
                var start = e.target.selectionStart;
                var end = e.target.selectionEnd;
                e.target.value = e.target.value.substring(0, start) + "    " + e.target.value.substring(end);
                e.target.selectionStart = e.target.selectionEnd = start + 4;
                updateEditor(e.target);
            }
        }

        function runCode() {
            const consoleDiv = document.getElementById('console-output');
            consoleDiv.innerHTML += `<div class="text-brand-400 mt-2">> Running ${currentFile}...</div>`;
            
            setTimeout(() => {
                consoleDiv.innerHTML += `
                    <div class="text-green-400 mt-2 mb-2">Process finished with exit code 0</div>
                `;
                consoleDiv.scrollTop = consoleDiv.scrollHeight;
                showToast('Code executed successfully', 'success');
            }, 800);
        }

        function toggleMobileMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }

        // Initial Load
        window.addEventListener('DOMContentLoaded', () => {
            router.navigate('home');
        });
    </script>
</body>
</html>
