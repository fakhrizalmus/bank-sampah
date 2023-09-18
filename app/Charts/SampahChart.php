<?php

namespace App\Charts;

use App\Models\Transaksi;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SampahChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $sampah = Transaksi::get();
        // dd($sampah);
        for ($i = 0; $i < count($sampah); $i++) {
            // dd($sampah[$i]->sampah_id);
            $jumlahSampah = Transaksi::where('sampah_id', $sampah[$i]->sampah_id)->count();
            $label = $sampah[$i]->jenis_transaksi;
        }
        // dd($jumlahSampah);
        return $this->chart->barChart()
            ->setTitle('Tren Sampah.')
            ->setSubtitle('Wins during season 2021.')
            ->addData($jumlahSampah)
            // ->addData('Boston', [7, 3, 8, 2, 6, 4])
            ->setLabels($label);
        // ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
