<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PalmAdmin - Manajemen Perkebunan Sawit</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">

    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-green-700 tracking-tight">Palm<span
                            class="text-emerald-500">Admin</span></span>
                </div>
                <div class="hidden md:flex space-x-8 font-medium">
                    <a href="#fitur" class="hover:text-green-600 transition">Fitur</a>
                    <a href="#tentang" class="hover:text-green-600 transition">Tentang Kami</a>
                </div>
                <div>
                    <a href="/login"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg font-semibold transition shadow-lg shadow-green-200">
                        Masuk Sistem
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center">
                <div class="lg:w-1/2">
                    <h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 leading-tight">
                        Digitalkan Manajemen <span
                            class="text-green-600 text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-500">Kebun
                            Sawit</span> Anda.
                    </h1>
                    <p class="mt-6 text-lg text-slate-600 max-w-xl">
                        Pantau hasil panen, manajemen pupuk, hingga laporan keuangan operasional dalam satu dashboard
                        terintegrasi. Lebih akurat, lebih produktif.
                    </p>
                    <div class="mt-10 flex space-x-4">
                        <button
                            class="bg-slate-900 text-white px-8 py-3 rounded-xl font-bold hover:bg-slate-800 transition">Mulai
                            Sekarang</button>
                        <button
                            class="border border-slate-300 px-8 py-3 rounded-xl font-bold hover:bg-white transition">Pelajari
                            Fitur</button>
                    </div>
                </div>
                <div class="hidden lg:block lg:w-1/2 mt-12 lg:mt-0 pl-10">
                    <div class="bg-gradient-to-br from-green-100 to-emerald-100 rounded-3xl p-8 shadow-inner rotate-3">
                        <div class="bg-white rounded-xl shadow-2xl p-4 -rotate-3">
                            <div
                                class="h-64 w-full bg-slate-200 rounded-lg animate-pulse flex items-center justify-center">
                                <span class="text-slate-400 italic">Preview Dashboard Preview</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900">Kenapa Memilih PalmAdmin?</h2>
                <div class="h-1 w-20 bg-green-500 mx-auto mt-4"></div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 bg-slate-50 rounded-2xl hover:shadow-xl transition border border-slate-100">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Monitoring Hasil Panen</h3>
                    <p class="text-slate-600">Catat berat TBS setiap blok secara real-time dan pantau grafik
                        produktivitasnya.</p>
                </div>
                <div class="p-8 bg-slate-50 rounded-2xl hover:shadow-xl transition border border-slate-100">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Manajemen Biaya</h3>
                    <p class="text-slate-600">Kontrol pengeluaran untuk pupuk, perawatan, hingga upah pekerja agar
                        cashflow terjaga.</p>
                </div>
                <div class="p-8 bg-slate-50 rounded-2xl hover:shadow-xl transition border border-slate-100">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Pemetaan Blok</h3>
                    <p class="text-slate-600">Kelola data tanaman berdasarkan blok dan tahun tanam secara sistematis.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-slate-400 py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2026 PalmAdmin Sistem Informasi Perkebunan. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
