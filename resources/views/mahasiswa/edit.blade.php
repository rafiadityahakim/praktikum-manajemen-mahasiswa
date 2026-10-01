<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700">NIM</label>
                        <input type="text" name="nim" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nim', $mahasiswa->nim) }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Nama</label>
                        <input type="text" name="nama" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nama', $mahasiswa->nama) }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Program Studi</label>
                        <input type="text" name="program_studi" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('program_studi', $mahasiswa->program_studi) }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('email', $mahasiswa->email) }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Angkatan</label>
                        <input type="number" name="angkatan" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('angkatan', $mahasiswa->angkatan) }}" required>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('mahasiswa.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-md">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>