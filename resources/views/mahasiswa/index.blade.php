<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold">Data Mahasiswa</h3>
                    
                    {{-- Tombol Tambah hanya muncul untuk Admin --}}
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('mahasiswa.create') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                            + Tambah Mahasiswa
                        </a>
                    @endif
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="py-2 px-4 text-left">NIM</th>
                                <th class="py-2 px-4 text-left">Nama</th>
                                <th class="py-2 px-4 text-left">Program Studi</th>
                                <th class="py-2 px-4 text-left">Email</th>
                                <th class="py-2 px-4 text-left">Angkatan</th>
                                @if(auth()->user()->role === 'admin')
                                    <th class="py-2 px-4 text-center">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mahasiswa as $mhs)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4">{{ $mhs->nim }}</td>
                                    <td class="py-2 px-4">{{ $mhs->nama }}</td>
                                    <td class="py-2 px-4">{{ $mhs->program_studi }}</td>
                                    <td class="py-2 px-4">{{ $mhs->email }}</td>
                                    <td class="py-2 px-4">{{ $mhs->angkatan }}</td>
                                    
                                    @if(auth()->user()->role === 'admin')
                                        <td class="py-2 px-4 text-center flex justify-center space-x-2">
                                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="px-3 py-1 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600">
                                                Edit
                                            </a>
                                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data mahasiswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $mahasiswa->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>