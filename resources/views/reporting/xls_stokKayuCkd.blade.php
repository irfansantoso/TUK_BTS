<div class="card">
  <!-- /.card-header -->      
  <div class="card-body" >
    <h2>PT. CKD</h2>
    <h4>Stock Kayu Tahun Produksi Sampai {{ $thn_produksi }}</h4>
    <h5>Per Tgl : {{ $tgl_laporan }}</h5>    
    <table id="tb1" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">Jns Log</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0;border: 1px solid #000000;">TPN USP</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">TPK 21</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0;border: 1px solid #000000;">LP. BERE drt</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">LP. BERE air</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0;border: 1px solid #000000;">LP. TEMPUNAK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">LP. TAYAN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0;border: 1px solid #000000;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">M3</th>        
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="border: 1px solid #000000;">Meranti Kuning</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0100') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0100') +             
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0100') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0100') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">Meranti Merah</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0101') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0101') +             
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0101') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0101') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">Meranti Putih</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0102') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0102') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0102') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0102') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0102') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0102') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0102') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0102') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0102') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0102') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0102') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0102') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0102') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0102') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0102') +             
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0102') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0102') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0102') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0102'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">Meranti Batu</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0120') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0120') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0120') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0120') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0120') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0120') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0120') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0120') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0120') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0120') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0120') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0120') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0120') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0120') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0120') +             
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0120') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0120') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0120') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0120'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">Keruing</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0200') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0200') +             
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0200') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0200') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr style="background-color: #9cd48d;">
          <td style="background-color: #9cd48d;border: 1px solid #000000;">Bangkirai</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0300') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0300') +             
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0300') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0300') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr style="background-color: #9cd48d;border: 1px solid #000000;">
          <td style="background-color: #9cd48d;border: 1px solid #000000;">Pelepek</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0301') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0301') +             
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0301') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301') != 0)
          <td style="background-color: #9cd48d;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0301') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301'); }}</td>
          @else
          <td style="background-color: #9cd48d;border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">Kapur</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0400') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0400') +             
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0400') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0400') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">Nyatoh</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0500') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0500') +             
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0500') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0500') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">Mersawa</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0600') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0600') +             
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0600') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0600') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr>
          <td style="border: 1px solid #000000;">Rimba Campuran</td>                            
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="border: 1px solid #000000;">{{ App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0900') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0900') +             
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0900') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0900') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="border: 1px solid #000000;">-</td>
          @endif
        </tr>
        <tr style="background-color:#C0c1c0;">
          <td style="background-color:#C0c1c0;border: 1px solid #000000;">Grand Total</td>
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') + App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') + App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0102') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') + App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0102') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') + App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0120') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0600') + App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0120') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0600') + App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0120') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0600') + App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0120') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0600') + App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif              
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0120') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') + App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0120') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') + App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0120') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') + App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0120') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') + App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0120') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') + App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0120') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') + App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0120') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') + App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0120') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') + App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0120') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') + App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0120') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') + App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0120') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') + App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0120') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') + App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0120') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600') + App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0120') +
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600') + App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0120') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600') + App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0120') +
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600') + App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
          
          @if(App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0100') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0101') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0102') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0102') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0120') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0120') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0200') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0300') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0301') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0400') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0500') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0600') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0900') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0100') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0100') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0101') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0101') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0102') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0102') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0102') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0120') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0120') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0120') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0200') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0200') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0300') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0300') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0301') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0301') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0400') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0400') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0500') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0500') + 
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0600') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0600') +
          App\Http\Controllers\UserController::getQtyKayuTpn($hph,$tgl_laporan,'001','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'609','0900') +               
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'711','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getQtyKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
          @if(App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0100') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0101') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0102') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0102') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0120') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0200') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0300') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0301') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0400') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0500') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0600') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0900') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900') != 0)
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">
          {{ 
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0100') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0100') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0100') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0101') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0101') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0101') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0102') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0102') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0102') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0120') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0120') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0120') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0200') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0200') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0200') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0300') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0300') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0300') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0301') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0301') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0301') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0400') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0400') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0400') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0500') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0500') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0500') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0600') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0600') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0600') +
          App\Http\Controllers\UserController::getVolKayuTpn($hph,$tgl_laporan,'001','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'609','0900') +               
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'710','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'711','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'720','0900') + 
          App\Http\Controllers\UserController::getVolKayu($hph,$tgl_laporan,'740','0900'); }}</td>
          @else
          <td style="background-color:#Dcdedb;border: 1px solid #000000;">-</td>
          @endif
        </tr>
      </tbody>
    </table>

    <h2>PT. CKD</h2>
    <h4>Stock Kayu Tahun Produksi Sampai {{ $thn_produksi }}</h4> 
    <h5>Per Tgl : {{ $tgl_laporan }}</h5>    
    <table id="tiga" class="table table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">Status Kayu</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0;border: 1px solid #000000;">TPN CKD</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">TPK 21</th>          
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0;border: 1px solid #000000;">LP. BERE drt</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">LP. BERE air</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0;border: 1px solid #000000;">LP. TEMPUNAK</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;border: 1px solid #000000;">LP. TAYAN</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0;border: 1px solid #000000;">TOTAL</th>
        </tr>
        <tr>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>          
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">M3</th>
          <th style="border: 1px solid #000000;">Btg</th>
          <th style="border: 1px solid #000000;">M3</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">Btg</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">M3</th>
        </tr>
      </thead>
      <tbody>            
        @php 
          $getSelDt = $arr0; 

          $sum_tpnQty = 0;
          $sum_tpnVol = 0;
          $sum_tpk21Qty = 0;
          $sum_tpk21Vol = 0;
          $sum_tpkLbdQty = 0;
          $sum_tpkLbdVol = 0;
          $sum_tpkLbaQty = 0;
          $sum_tpkLbaVol = 0;
          $sum_tpkTmpQty = 0;
          $sum_tpkTmpVol = 0;
          $sum_tpkTynQty = 0;
          $sum_tpkTynVol = 0;
          $sum_totalQty = 0;
          $sum_totalVol = 0;
        @endphp
        @foreach ($getSelDt as $jsnx)

        <tr>              
            <td style="border: 1px solid #000000;">Total Kayu CKD {{ $jsnx['thnprod'] }}</td>
            @if($jsnx['tpnQty'] != 0)
              <td style="border: 1px solid #000000;">{{ $jsnx['tpnQty'] }}</td>
              <td style="border: 1px solid #000000;">{{ round($jsnx['tpnVol']) }}</td>
            @else
              <td style="border: 1px solid #000000;">-</td>
              <td style="border: 1px solid #000000;">-</td>
            @endif
            @if($jsnx['tpk21Qty'] != 0)
              <td style="border: 1px solid #000000;">{{ $jsnx['tpk21Qty'] }}</td>
              <td style="border: 1px solid #000000;">{{ round($jsnx['tpk21Vol']) }}</td>
            @else
              <td style="border: 1px solid #000000;">-</td>
              <td style="border: 1px solid #000000;">-</td>
            @endif
            @if($jsnx['tpkLbdQty'] != 0)
              <td style="border: 1px solid #000000;">{{ $jsnx['tpkLbdQty'] }}</td>
              <td style="border: 1px solid #000000;">{{ round($jsnx['tpkLbdVol']) }}</td>
            @else
              <td style="border: 1px solid #000000;">-</td>
              <td style="border: 1px solid #000000;">-</td>
            @endif
            @if($jsnx['tpkLbaQty'] != 0)
              <td style="border: 1px solid #000000;">{{ $jsnx['tpkLbaQty'] }}</td>
              <td style="border: 1px solid #000000;">{{ round($jsnx['tpkLbaVol']) }}</td>
            @else
              <td style="border: 1px solid #000000;">-</td>
              <td style="border: 1px solid #000000;">-</td>
            @endif
            @if($jsnx['tpkTmpQty'] != 0)
              <td style="border: 1px solid #000000;">{{ $jsnx['tpkTmpQty'] }}</td>
              <td style="border: 1px solid #000000;">{{ round($jsnx['tpkTmpVol']) }}</td>
            @else
              <td style="border: 1px solid #000000;">-</td>
              <td style="border: 1px solid #000000;">-</td>
            @endif
            @if($jsnx['tpkTynQty'] != 0)
              <td style="border: 1px solid #000000;">{{ $jsnx['tpkTynQty'] }}</td>
              <td style="border: 1px solid #000000;">{{ round($jsnx['tpkTynVol']) }}</td>
            @else
              <td style="border: 1px solid #000000;">-</td>
              <td style="border: 1px solid #000000;">-</td>
            @endif
            @if($jsnx['totalQty'] != 0)
              <td style="border: 1px solid #000000;">{{ $jsnx['totalQty'] }}</td>
              <td style="border: 1px solid #000000;">{{ round($jsnx['totalVol']) }}</td>
            @else
              <td style="border: 1px solid #000000;">-</td>
              <td style="border: 1px solid #000000;">-</td>
            @endif
        </tr>
        @php
          $sum_tpnQty += $jsnx['tpnQty'];
          $sum_tpnVol += $jsnx['tpnVol'];
          $sum_tpk21Qty += $jsnx['tpk21Qty'];
          $sum_tpk21Vol += $jsnx['tpk21Vol'];
          $sum_tpkLbdQty += $jsnx['tpkLbdQty'];
          $sum_tpkLbdVol += $jsnx['tpkLbdVol'];
          $sum_tpkLbaQty += $jsnx['tpkLbaQty'];
          $sum_tpkLbaVol += $jsnx['tpkLbaVol'];
          $sum_tpkTmpQty += $jsnx['tpkTmpQty'];
          $sum_tpkTmpVol += $jsnx['tpkTmpVol'];
          $sum_tpkTynQty += $jsnx['tpkTynQty'];
          $sum_tpkTynVol += $jsnx['tpkTynVol'];
          $sum_totalQty += $jsnx['totalQty'];
          $sum_totalVol += $jsnx['totalVol'];
        @endphp
        @endforeach                     
      </tbody>
      <tfoot>
        <tr>
          <th style="background-color: #C0c1c0;border: 1px solid #000000;">Grand Total</th>
          @if($sum_tpnQty != 0)
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpnQty }}</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_tpnVol) }}</th>
          @else
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
          @endif
          @if($sum_tpk21Qty != 0)
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpk21Qty }}</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_tpk21Vol) }}</th>
          @else
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
          @endif
          @if($sum_tpkLbdQty != 0)
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpkLbdQty }}</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_tpkLbdVol) }}</th>
          @else
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
          @endif
          @if($sum_tpkLbaQty != 0)
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpkLbaQty }}</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_tpkLbaVol) }}</th>
          @else
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
          @endif
          @if($sum_tpkTmpQty != 0)
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpkTmpQty }}</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_tpkTmpVol) }}</th>
          @else
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
          @endif
          @if($sum_tpkTynQty != 0)
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_tpkTynQty }}</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_tpkTynVol) }}</th>
          @else
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
          @endif
          @if($sum_totalQty != 0)
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ $sum_totalQty }}</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">{{ round($sum_totalVol) }}</th>
          @else
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
            <th style="background-color: #Dcdedb;border: 1px solid #000000;">-</th>
          @endif
        </tr>
      </tfoot>
    </table>

    
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->