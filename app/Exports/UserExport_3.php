<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport_3 implements FromView
{    
    function __construct($nm_lok,$array,$hph) {
        $this->nm_lok = $nm_lok;
        $this->arr1 = $array;
        $this->hph = $hph;
    }
    public function view(): View
    {
        return view('reporting/xls_loglist', [
            'nm_lok' => $this->nm_lok,
            'arr1' => $this->arr1,
            'hph' => $this->hph
        ]);        
    }
}
