<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>CodeLab</title>
</head>
<body class="bg-gray-950 text-white">

    <!-- Navbar -->
    <nav class="bg-gray-900 border-b border-gray-800">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-2xl font-bold text-cyan-400">
                CodeLab
            </h1>

            <ul class="flex gap-6 text-sm font-semibold">

                <li>
                    <a href="/dashboard" class="hover:text-cyan-400">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="/tutorial" class="hover:text-cyan-400">
                        Tutorial
                    </a>
                </li>

                <li>
                    <a href="/about" class="hover:text-cyan-400">
                        About
                    </a>
                </li>

                <li>
                    <a href="/shop" class="hover:text-cyan-400">
                        Shop
                    </a>
                </li>

                <li>
                    <a href="/chat" class="hover:text-cyan-400">
                        Chat
                    </a>
                </li>

                <li>
                    <a href="/demo" class="hover:text-cyan-400">
                        Demo
                    </a>
                </li>

                <li>
                    <a href="/codalab" class="hover:text-cyan-400">
                        CodaLab
                    </a>
                </li>

            </ul>

        </div>
    </nav>

    <!-- Content -->
    <main class="container mx-auto px-6 py-10">
        @yield('content')
    </main>

</body>
</html>
