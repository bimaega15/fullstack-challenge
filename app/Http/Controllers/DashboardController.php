<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Models\SatuanBarang;
use App\Services\DashboardService;
use Illuminate\Support\Facades\Config;

class DashboardController extends Controller
{

    public $statusSBarang;
    public $dashboardService;
    public function __construct(DashboardService $dashboardService)
    {
        $this->statusSBarang = Config::get('datastatis.status_sbarang');
        $this->dashboardService = $dashboardService;
    }
    public function index()
    {
        $data = $this->dashboardService->indexData();
        return view('dashboard.index', $data);
    }
}
