<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Menampilkan daftar mahasiswa (Bisa diakses Admin & User)
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->paginate(10);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    // Form tambah data (Khusus Admin)
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Menyimpan data baru (Khusus Admin)
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required|string|max:255',
            'program_studi' => 'required|string',
            'email' => 'required|email|unique:mahasiswas,email',
            'angkatan' => 'required|numeric',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    // Form edit data (Khusus Admin)
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Mengubah data (Khusus Admin)
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'program_studi' => 'required|string',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'angkatan' => 'required|numeric',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    // Menghapus data (Khusus Admin)
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}