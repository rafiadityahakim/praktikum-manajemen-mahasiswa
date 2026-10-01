<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">
                    Selamat Datang, {{ auth()->user()->name }}!
                </h3>
                <p class="text-gray-600 mb-6">
                    Anda login sebagai: 
                    <span class="px-2 py-1 bg-indigo-100 text-indigo-700 font-bold rounded-md uppercase text-sm">
                        {{ auth()->user()->role }}
                    </span>
                </p>

                <hr class="my-4 border-gray-200">

                <!-- Kartu Tombol Menuju Data Mahasiswa -->
                <div class="mt-6 p-6 bg-indigo-50 border border-indigo-200 rounded-lg max-w-md">
                    <h4 class="font-semibold text-lg text-indigo-900 mb-2">Kelola Data Mahasiswa</h4>
                    <p class="text-sm text-indigo-700 mb-4">
                        Klik tombol di bawah ini untuk melihat {{ auth()->user()->role === 'admin' ? 'dan mengelola' : 'daftar' }} data mahasiswa.
                    </p>
                    <a href="{{ route('mahasiswa.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 transition duration-150">
                        Lihat Data Mahasiswa &rarr;
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>