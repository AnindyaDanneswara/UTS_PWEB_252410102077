<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function getDataMinggu(): array
    {
        return [
            [
                'minggu'    => 13,
                'fase'      => 'Low-Fidelity',
                'status'    => 'Sedang Berjalan',
                'ikon'      => 'bi-pencil-square',
                'deskripsi' => 'Menuangkan ide awal ke dalam sketsa dan alur dasar aplikasi.',
                'tugas'     => ['Sketsa wireframe semua halaman utama', 'Susun user flow', 'Review wireframe bersama tim'],
            ],
            [
                'minggu'    => 14,
                'fase'      => 'High-Fidelity',
                'status'    => 'Akan Datang',
                'ikon'      => 'bi-palette',
                'deskripsi' => 'Mengubah wireframe menjadi desain visual final.',
                'tugas'     => ['Tentukan style guide (warna, font)', 'Buat komponen UI di Figma', 'Desain layar final'],
            ],
            [
                'minggu'    => 15,
                'fase'      => 'Prototyping & Testing',
                'status'    => 'Akan Datang',
                'ikon'      => 'bi-play-circle',
                'deskripsi' => 'Membuat prototype interaktif dan mengujinya ke pengguna.',
                'tugas'     => ['Hubungkan layar jadi prototype', 'Usability testing ke 5 responden', 'Revisi desain dari hasil tes'],
            ],
            [
                'minggu'    => 16,
                'fase'      => 'Presentasi Akhir',
                'status'    => 'Akan Datang',
                'ikon'      => 'bi-easel',
                'deskripsi' => 'Mempresentasikan seluruh proses dan hasil desain.',
                'tugas'     => ['Siapkan slide presentasi', 'Latihan presentasi', 'Presentasi di depan kelas'],
            ],
        ];
    }

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.min'      => 'Username minimal 3 karakter.',
        ]);

        return redirect()->route('dashboard', ['username' => $request->username]);
    }

    public function dashboard(Request $request)
    {
        $username   = $request->query('username', 'Tamu');
        $minggu     = $this->getDataMinggu();
        $aktif      = collect($minggu)->firstWhere('status', 'Sedang Berjalan');
        $totalTugas = collect($minggu)->sum(fn ($m) => count($m['tugas']));
        $progress   = round(($aktif['minggu'] - 12) / count($minggu) * 100);

        return view('dashboard', compact('username', 'minggu', 'aktif', 'totalTugas', 'progress'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username', 'Tamu');
        $minggu   = $this->getDataMinggu();

        return view('pengelolaan', compact('username', 'minggu'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username', 'Tamu');
        $profil   = [
            'Nama'          => 'Anindya Danneswara Prayogi',
            'NIM'           => '252410102077',
            'Program Studi' => 'Teknologi Informasi',
            'Semester'      => '3',
            'Mata Kuliah'   => 'UI/UX Design',
            'Project'       => 'AI Smart Health',
        ];

        return view('profile', compact('username', 'profil'));
    }
}