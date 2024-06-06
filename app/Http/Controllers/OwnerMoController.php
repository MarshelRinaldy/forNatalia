<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Income;
use App\Models\BahanBaku;
use Illuminate\Http\Request;

class OwnerMoController extends Controller
{
    public function laporan_penjualan(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        
        if (!$startDate || !$endDate) {
            $startDate = Carbon::now()->startOfYear()->toDateString();
            $endDate = Carbon::now()->endOfYear()->toDateString();
        }

        $incomes = Income::whereBetween('tanggal', [$startDate, $endDate])
                    ->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->tanggal)->format('F');
                    });

        $months = [
            'January', 'February', 'March', 'April', 'May', 'June', 
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $report = [];
        foreach ($months as $month) {
            if (isset($incomes[$month])) {
                $transactions = $incomes[$month]->count();
                $totalAmount = $incomes[$month]->sum('income');
            } else {
                $transactions = 0;
                $totalAmount = 0;
            }
            $report[$month] = [
                'transactions' => $transactions,
                'amount' => $totalAmount,
            ];
        }

        return view('mo.laporanPemasukan', compact('report', 'startDate', 'endDate'));
    }


   public function laporan_bahan_baku_digunakan(Request $request)
{
    // Set default start and end dates to cover all periods
    $defaultStartDate = '2024-01-01'; // Atur ke tanggal awal yang Anda inginkan
     $defaultEndDate = Carbon::now()->addDay()->format('Y-m-d');

    // Get the start and end dates from the request, or use default values
    $startDate = $request->input('startDate', $defaultStartDate);
    $endDate = $request->input('endDate', $defaultEndDate);

    // Validate date inputs
    if ($startDate && $endDate) {
        // Fetch the report data within the date range
        $report = BahanBaku::whereBetween('created_at', [$startDate, $endDate])
            ->select('nama', 'satuan', 'totalPemakaian')
            ->get()
            ->toArray();
    } else {
        
        $report = [];
    }

    
    return view('mo.laporanBahanBaku', compact('startDate', 'endDate', 'report'));
}


}
