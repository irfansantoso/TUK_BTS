<?php

namespace App\Exports;

use App\Models\TrHeaderTpn;
use App\Models\TrDetailTpn;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{    
    function __construct($hph,$tgl_laporan,$thn_produksi,$arrayCkd,$array,$arrayGab) {
        $this->hph = $hph;
        $this->tgl_laporan = $tgl_laporan;
        $this->thn_produksi = $thn_produksi;
        $this->arr0 = $arrayCkd;
        $this->arr1 = $array;
        $this->arr2 = $arrayGab;
    }
    public function view(): View
    {
        //export adalah file export.blade.php yang ada di folder views
        if($this->hph == "CKD"){
            return view('reporting/xls_stokKayuCkd', [
                'hph' => $this->hph,
                'tgl_laporan' => $this->tgl_laporan,
                'thn_produksi' => $this->thn_produksi,
                'arr0' => $this->arr0
            ]);
        }elseif($this->hph == "USP"){
            return view('reporting/xls_stokKayuUsp', [
                'hph' => $this->hph,
                'tgl_laporan' => $this->tgl_laporan,
                'thn_produksi' => $this->thn_produksi,
                'arr1' => $this->arr1
            ]);
        }elseif($this->hph == "ALL"){
            return view('reporting/xls_stokKayuAll', [
                'hph' => $this->hph,
                'tgl_laporan' => $this->tgl_laporan,
                'thn_produksi' => $this->thn_produksi,
                'arr2' => $this->arr2
            ]);
        }
    }
}
