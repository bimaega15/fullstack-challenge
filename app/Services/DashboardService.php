<?php

namespace App\Services;

use App\Interfaces\DashboardInterface;
use App\Models\Barang;
use App\Models\SatuanBarang;

class DashboardService implements DashboardInterface
{
    public function indexData()
    {
        //
        $totalBagus = SatuanBarang::where('status_sbarang', 'bagus')->count();
        $totalRusak = SatuanBarang::where('status_sbarang', 'rusak')->count();
        $totalPerluPerbaikan = SatuanBarang::where('status_sbarang', 'perlu perbaikan')->count();
        $totalDalamPerbaikan = SatuanBarang::where('status_sbarang', 'dalam perbaikan')->count();

        $totalStatusCard = [
            'bagus' => $totalBagus,
            'rusak' => $totalRusak,
            'perluPerbaikan' => $totalPerluPerbaikan,
            'dalamPerbaikan' => $totalDalamPerbaikan,
        ];

        // Mengambil data untuk pie chart
        $categories = Barang::with('kategoriBarang')->get();
        $statusCounts = [
            'bagus' => [],
            'rusak' => [],
            'perlu perbaikan' => [],
            'dalam perbaikan' => []
        ];
        foreach ($categories as $category) {
            $statusCounts['bagus'][$category->kategoriBarang->nama_kbarang][$category->id] = $category->satuanBarang()->where('status_sbarang', 'bagus')->count();
            $statusCounts['rusak'][$category->kategoriBarang->nama_kbarang][$category->id] = $category->satuanBarang()->where('status_sbarang', 'rusak')->count();
            $statusCounts['perluPerbaikan'][$category->kategoriBarang->nama_kbarang][$category->id] = $category->satuanBarang()->where('status_sbarang', 'perlu perbaikan')->count();
            $statusCounts['dalamPerbaikan'][$category->kategoriBarang->nama_kbarang][$category->id] = $category->satuanBarang()->where('status_sbarang', 'dalam perbaikan')->count();
        }
        $sumStatusCounts = [];
        foreach ($statusCounts as $status => $category) {
            foreach ($category as $nama_kategori => $nama_barang) {
                $sumStatusCounts[$status][$nama_kategori] = array_sum($nama_barang);
            }
        }

        return [
            'total_status' => $totalStatusCard,
            'status_grafik' => json_encode($sumStatusCounts)
        ];
    }
}
