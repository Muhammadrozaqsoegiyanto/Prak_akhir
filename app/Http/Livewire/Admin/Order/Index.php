<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use App\Models\DailySlot;
use Carbon\Carbon;

class OrderIndex extends Component
{
    use WithPagination;

    public $dailySlot = [];
    
    public $filterStatus;
    public $filterSlot;

    public function mount()
    {
        //QUERY INI KITA BUAT DIDALAM MOUNT KARENA DATANYA HANYA PERLU DI-LOAD SEKALI SAJA
        $this->dailySlot = DailySlot::orderBy('id', 'ASC')->get();
    }

    public function render()
    {
        //MEMBUAT QUERY UNTUK MENGAMBIL DATA PASIEN SECARA LENGKAP
        $orders = Order::with(['daily_slot'])
            ->when($this->filterStatus != '', function($query) {
                //JIKA FILTER STATUS TIDAK KOSONG, MAKA KITA BUAT QUERY FILTER BERDASARKAN STATUS YANG INGIN DILIHAT OLEH USER
                $query->where('status', $this->filterStatus);
            })
            ->when($this->filterSlot != '', function($query) {
                $query->where('daily_slot_id', $this->filterSlot);
            })
            //KEMUDIAN KITA URUTKAN BERDASARKAN DATA TERBARU
            ->orderBy('created_at', 'DESC')
            ->paginate(10); 

        //QUERY UNTUK MENGAMBIL TOTAL DATA, FUNGSI QUERY INI HAMPIR SAMA DENGAN QUERY YANG KITA BUAT PADA ARTIKEL SEBELUMNYA
        $totalOrder = Order::where('day', Carbon::now()->format('Y-m-d'))->whereIn('status', [0, 1, 2, 3])->count();
        $onProgress = Order::where('day', Carbon::now()->format('Y-m-d'))->whereIn('status', [0, 1])->count();
        $complete = Order::where('day', Carbon::now()->format('Y-m-d'))->whereIn('status', [2])->count();
      
        return view('livewire.admin.order.order_index', compact('orders', 'totalOrder', 'onProgress', 'complete'))->layout('layouts.app');
        //KITA GUNAKAN FUNGSI LAYOUT() UNTUK MENENTUKAN MASTER TEMPLATE MANA YANG AKAN KITA GUNAKAN
    }
}

