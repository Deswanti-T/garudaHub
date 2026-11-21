<?php

namespace Database\Seeders;

use App\Models\Bid;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class GarudaSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['Admin Garuda', 'admin@example.com', 'admin'],
            ['Budi Santoso', 'budi@example.com', 'klien'],
            ['Siti Rahayu', 'siti@example.com', 'klien'],
            ['Agus Wijaya', 'agus@example.com', 'klien'],
            ['Dewi Lestari', 'dewi@example.com', 'developer'],
            ['Eko Prasetyo', 'eko@example.com', 'developer'],
            ['Fitri Handayani', 'fitri@example.com', 'developer'],
            ['Gilang Ramadhan', 'gilang@example.com', 'developer'],
        ];

        foreach ($users as [$nama, $email, $role]) {
            User::create([
                'nama' => $nama,
                'email' => $email,
                'password' => 'password123',
                'role' => $role,
            ]);
        }

        $projects = [
            [2, 'Website Toko Batik Online', 'Toko online dengan katalog, keranjang, dan halaman kontak.', 'Web', 5000000, 10000000, '2027-12-31', 'terbuka'],
            [2, 'Aplikasi Kasir Android', 'Aplikasi kasir sederhana untuk warung.', 'Mobile', 8000000, 15000000, '2027-11-30', 'terbuka'],
            [3, 'Redesain Logo dan UI Kit', 'Redesain identitas visual startup kuliner.', 'Desain', 2000000, 4000000, '2026-09-01', 'ditutup'],
            [3, 'Dashboard Analitik Penjualan', 'Dashboard grafik penjualan bulanan dari CSV.', 'Data', 6000000, 12000000, '2027-10-15', 'terbuka'],
        ];

        foreach ($projects as [$client, $judul, $desk, $kat, $min, $max, $batas, $status]) {
            Project::create([
                'client_id' => $client,
                'judul' => $judul,
                'deskripsi' => $desk,
                'kategori' => $kat,
                'budget_min' => $min,
                'budget_max' => $max,
                'batas_lelang' => $batas,
                'status' => $status,
            ]);
        }

        $bids = [
            [1, 5, 8500000, 30, 'Dibangun dengan PHP dan MySQL, lengkap panel admin.', false],
            [1, 6, 7000000, 40, 'Pengalaman 3 tahun membuat toko online.', false],
            [2, 5, 12000000, 45, 'Aplikasi native Kotlin, printer Bluetooth termasuk.', false],
            [3, 6, 3000000, 14, 'Tiga konsep logo dan UI kit di Figma.', true],
            [4, 8, 9000000, 35, 'Dashboard dengan Chart dan ekspor PDF.', false],
        ];

        foreach ($bids as [$project, $dev, $harga, $durasi, $proposal, $winner]) {
            Bid::create([
                'project_id' => $project,
                'developer_id' => $dev,
                'harga' => $harga,
                'durasi' => $durasi,
                'proposal' => $proposal,
                'is_winner' => $winner,
            ]);
        }
    }
}