<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lokasi;
use App\Models\Tongkang;
use App\Models\Kayu;
use App\Models\Driver;
use App\Models\UnitAlat;
use App\Models\Chainsaw;
use App\Models\Kupas;
use App\Models\HelperMstr;
use App\Models\Keperluan;
use App\Models\PeriodeOperasional;
use App\Models\TrHeaderTpn;
use App\Models\TrDetailTpn;
use App\Models\TrHeaderTpnOut;
use App\Models\TrHistory;
use App\Models\TrDetailPosition;
use App\Exports\UserExport;
use App\Exports\UserExport_2;
use App\Exports\UserExport_3;
use App\Exports\UserExport_4;
use App\Exports\UserExport_5;
use App\Exports\UserExport_6;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Session;


class UserController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect('home');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function home()
    {
        if (Auth::check()) {
            $data['title'] = 'Home';
            return view('home', $data);
        }else{
            return redirect('login');
        }
    }

    public function register()
    {
        $data['title'] = '';
        return view('user/register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }

    public function users()
    {
        $user =  User::all();

        $data['title'] = 'Register User';
        return view('master/users', $data, compact('user'));
    }

    public function users_add(Request $request)
    {
        // echo $request;
        // exit();
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'level' => 'required',
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);
        $user->save();

        return redirect()->route('users')->with('success', 'Tambah data sukses!');
    }

    public function profile()
    {
        $user =  User::all();

        $data['title'] = 'Profile';
        return view('master/profile', $data, compact('user'));
    }

    public function profile_edit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo_img.*' => 'mimes:jpg,jpeg,png|max:2000',
        ]);

        if ($request->hasfile('photo_img')) {

            $image_path = public_path() . "/photos/".Auth::user()->photo_img; 
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $photo_img = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('photo_img')->getClientOriginalName());
            $request->file('photo_img')->move(public_path('photos'), $photo_img);
            if($request->password != '')
            {
                User::where('username', Auth::user()->username)
                      ->update(['name' => $request->name,
                                'password' => Hash::make($request->password),
                                'level' => $request->level,
                                'photo_img' => $photo_img,
                                'updated_at' => date('Y-m-d H:i:s'),
                                    ]);      
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/');
            }else{
                User::where('username', Auth::user()->username)
                  ->update(['name' => $request->name,
                            'level' => $request->level,                            
                            'photo_img' => $photo_img,
                            'updated_at' => date('Y-m-d H:i:s'),
                                ]);      
            return redirect()->route('profile')->with('success', 'Ubah data sukses!');    
            }
        }else{
            if($request->password != '')
            {
                User::where('username', Auth::user()->username)
                      ->update(['name' => $request->name,
                                'password' => Hash::make($request->password),
                                'level' => $request->level, 
                                'updated_at' => date('Y-m-d H:i:s'),
                                    ]);      
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/');
            }else{
                User::where('username', Auth::user()->username)
                      ->update(['name' => $request->name,
                                'level' => $request->level, 
                                'updated_at' => date('Y-m-d H:i:s'),
                                    ]);      
                return redirect()->route('profile')->with('success', 'Ubah data sukses!');
            }
        }
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function lokasi()
    {
        $lokasi =  Lokasi::all();

        $data['title'] = 'Master Lokasi';
        return view('master/lokasi', $data, compact('lokasi'));
    }

    public function lokasi_add(Request $request)
    {
        $request->validate([
            'kode_lokasi' => 'required|unique:mstr_lokasi',
            'nama_lokasi' => 'required',
        ]);

        $lokasi = new Lokasi([
            'kode_lokasi' => $request->kode_lokasi,
            'nama_lokasi' => $request->nama_lokasi,
        ]);
        $lokasi->save();        
        return redirect()->route('lokasi')->with('success', 'Tambah data sukses!');
    }    

    public function tongkang()
    {
        $tongkang =  Tongkang::all();

        $data['title'] = 'Master Tongkang';
        return view('master/tongkang', $data, compact('tongkang'));
    }

    public function tongkang_add(Request $request)
    {
        $request->validate([
            'kode_tongkang' => 'required|unique:mstr_tongkang',
            'nama_tongkang' => 'required',
        ]);

        $tongkang = new Tongkang([
            'kode_tongkang' => $request->kode_tongkang,
            'nama_tongkang' => $request->nama_tongkang,
        ]);
        $tongkang->save();        
        return redirect()->route('tongkang')->with('success', 'Tambah data sukses!');
    }

    public function kayu()
    {
        $kayu =  Kayu::all();

        $data['title'] = 'Master Kayu';
        return view('master/kayu', $data, compact('kayu'));
    }

    public function kayu_add(Request $request)
    {
        $request->validate([
            'kode_kayu' => 'required|unique:mstr_kayu',
            'nama_kayu' => 'required',
            's_kayu' => 'required',
        ]);

        $kayu = new Kayu([
            'kode_kayu' => $request->kode_kayu,
            'nama_kayu' => $request->nama_kayu,
            's_kayu' => $request->s_kayu,
        ]);
        $kayu->save();        
        return redirect()->route('kayu')->with('success', 'Tambah data sukses!');
    }

    public function driver()
    {
        $driver =  Driver::all();

        $data['title'] = 'Master Driver';
        return view('master/driver', $data, compact('driver'));
    }

    public function driver_add(Request $request)
    {
        $request->validate([
            'kode_driver' => 'required|unique:mstr_driver',
            'nama_driver' => 'required',
            'kode_alat_d' => '',
        ]);

        $driver = new Driver([
            'kode_driver' => $request->kode_driver,
            'nama_driver' => $request->nama_driver,
            'kode_alat_d' => $request->kode_alat_d,
        ]);
        $driver->save();
        return redirect()->route('driver')->with('success', 'Tambah data sukses!');
    }

    public function unitAlat()
    {
        $unitAlat = UnitAlat::all();

        $data['title'] = 'Master Unit Alat';
        return view('master/unitAlat', $data, compact('unitAlat'));
    }

    public function unitAlat_add(Request $request)
    {
        $request->validate([
            'kode_unit_a' => 'required|unique:mstr_unit_alat',
            'nomor_pintu' => '',
            'merk_unit_a' => '',
        ]);

        $unitAlat = new UnitAlat([
            'kode_unit_a' => $request->kode_unit_a,
            'nomor_pintu' => $request->nomor_pintu,
            'merk_unit_a' => $request->merk_unit_a,
        ]);
        $unitAlat->save();
        return redirect()->route('unitAlat')->with('success', 'Tambah data sukses!');
    }

    public function chainsaw()
    {
        $chainsaw = Chainsaw::all();

        $data['title'] = 'Master Chainsaw';
        return view('master/chainsaw', $data, compact('chainsaw'));
    }

    public function chainsaw_add(Request $request)
    {
        $request->validate([
            'kode_chainsaw' => 'required|unique:mstr_chainsaw',
            'nama_chainsaw' => '',
        ]);

        $chainsaw = new Chainsaw([
            'kode_chainsaw' => $request->kode_chainsaw,
            'nama_chainsaw' => $request->nama_chainsaw,
        ]);
        $chainsaw->save();
        return redirect()->route('chainsaw')->with('success', 'Tambah data sukses!');
    }

    public function kupas()
    {
        $kupas = Kupas::all();

        $data['title'] = 'Master Kupas';
        return view('master/kupas', $data, compact('kupas'));
    }

    public function kupas_add(Request $request)
    {
        $request->validate([
            'kode_kupas' => 'required|unique:mstr_kupas',
            'nama_kupas' => '',
        ]);

        $kupas = new Kupas([
            'kode_kupas' => $request->kode_kupas,
            'nama_kupas' => $request->nama_kupas,
        ]);
        $kupas->save();
        return redirect()->route('kupas')->with('success', 'Tambah data sukses!');
    }

    public function keperluan()
    {
        $keperluan = Keperluan::all();

        $data['title'] = 'Master Keperluan';
        return view('master/keperluan', $data, compact('keperluan'));
    }

    public function keperluan_add(Request $request)
    {
        $request->validate([
            'kode_keperluan' => 'required|unique:mstr_keperluan',
            'kep_keterangan' => '',
        ]);

        $keperluan = new Keperluan([
            'kode_keperluan' => $request->kode_keperluan,
            'kep_keterangan' => $request->kep_keterangan,
        ]);
        $keperluan->save();
        return redirect()->route('keperluan')->with('success', 'Tambah data sukses!');
    }

    public function helper()
    {
        $helper = HelperMstr::all();

        $data['title'] = 'Master Helper';
        return view('master/helper', $data, compact('helper'));
    }

    public function helper_add(Request $request)
    {
        $request->validate([
            'kode_helper' => 'required|unique:mstr_helper',
            'nama_helper' => '',
        ]);

        $helper = new HelperMstr([
            'kode_helper' => $request->kode_helper,
            'nama_helper' => $request->nama_helper,
        ]);
        $helper->save();
        return redirect()->route('helper')->with('success', 'Tambah data sukses!');
    }

    // =================== History : ============================================================= //

    public function trHistory_data(Request $request)
    {
        $data = TrHistory::leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_history.lokasi_tpn')
                        ->leftJoin('mstr_kayu', 'mstr_kayu.kode_kayu', '=', 'tr_history.jns_kayu')
                        ->orderBy('tr_history.lokasi_tpn','asc')
                        ->get(['tr_history.no_tpn','tr_history.lokasi_tpn','tr_history.no_btg','mstr_kayu.nama_kayu','tr_history.vol','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                        ->setTotalRecords(100)// ini untuk filter data agar lebih cepat, hapus jika tambah lambat
                        ->make(true);
    }    

    public function trHistory(Request $request)
    {
        $data['title'] = 'Transaksi History';
        return view('transaction/trHistory', $data);
    }

    // =================== Periode Operasional : ==================================================== //

    public function periodeOperasional()
    {
        // $periodeOperasional = PeriodeOperasional::all();
        $periodeOperasional = PeriodeOperasional::orderBy('no_periode')->get();

        $data['title'] = 'Periode Operasional';
        return view('transaction/periodeOperasional', $data, compact('periodeOperasional'));
    }

    public function periodeOperasional_add(Request $request)
    {
        $request->validate([
            'tahun_periode' => 'required',
            'no_periode' => 'required',
            'awal_tgl' => 'required',
            'akhir_tgl' => 'required',
            'kode_periode' => 'required',
        ]);

        $periodeOperasional = new PeriodeOperasional([
            'tahun_periode' => $request->tahun_periode,
            'no_periode' => $request->no_periode,
            'awal_tgl' => $request->awal_tgl,
            'akhir_tgl' => $request->akhir_tgl,
            'kode_periode' => $request->kode_periode,            
        ]);
        $periodeOperasional->save();
        return redirect()->route('periodeOperasional')->with('success', 'Tambah data sukses!');
    }
    public function periodeOperasional_actived($id_periode)
    {
        // $po = PeriodeOperasional::all();
        // $po->status_periode    = 0;
        // $po->save();

        $affected = DB::table('periode_operasional')
              ->where('status_periode', 1)
              ->update(['status_periode' => 0]);

        $po = PeriodeOperasional::find($id_periode);
        $po->status_periode    = 1;
        $po->save();
        return redirect()->route('periodeOperasional');
    }

    public static function getNewNoTpn($ko_loc)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_tpn_in')
                        ->select('no_tpn')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('lokasi_tpn','=',$ko_loc)
                        ->orderBy('no_tpn','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_tpn'], 13, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public static function getNewNoTpnOut($ko_loc)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_tpn_out')
                        ->select('no_tpn_out')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('lokasi_tpn','=',$ko_loc)
                        ->orderBy('no_tpn_out','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_tpn_out'], 13, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public static function getNewNoTpkOut($ko_loc)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_tpn_out')
                        ->select('no_tpn_out')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('lokasi_tpn','=',$ko_loc)
                        ->orderBy('no_tpn_out','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_tpn_out'], 13, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public static function getNewNoTkg($ko_loc)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_tpn_out')
                        ->select('no_loglist')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('tujuan','=',$ko_loc)
                        ->orderBy('no_loglist','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_loglist'], 13, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public static function getKodePeriodeOperasional()
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);
        return $jsonx[0]['kode_periode'];
    }

    public static function getTahunPeriodeOperasional()
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('tahun_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);        
        return $jsonx[0]['tahun_periode'];
    }

    // =================== TPN CKD IN : ============================================================= //

    public function trHeaderTpnCkd_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // $data = TrHeaderTpn::all();
        $data = TrHeaderTpn::where('kode_periode','=',$jsonx[0]['kode_periode'])
                            ->where('lokasi_tpn','=','001')
                            ->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpnCkd').'/'.$data->id_header_tpn_in.'" class="edit btn btn-primary btn-sm">Detail</a>';

                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_in.'" data-kode="'.$data->no_tpn.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }    

    public function trHeaderTpnCkd(Request $request)
    {

        $data['title'] = 'TPN CKD - IN';
        return view('transaction/trHeaderTpnCkd', $data);
    }

    public function trHeaderTpnCkd_add(Request $request)
    {        
        $request->validate([
            'no_tpn' => 'required|unique:tr_header_tpn_in',
            'tgl_input_tpn' => 'required',
            'thn_produksi_tpn' => 'required',
            'lokasi_tpn' => '',
            'kode_periode' => '',
            'user_created_tpn' => '',
        ]);

        $trHeaderTpnCkd = new TrHeaderTpn([
            'no_tpn' => $request->no_tpn,
            'tgl_input_tpn' => $request->tgl_input_tpn,
            'thn_produksi_tpn' => $request->thn_produksi_tpn,
            'lokasi_tpn' => $request->lokasi_tpn,
            'kode_periode' => $request->kode_periode,
            'user_created_tpn' => Auth::user()->name,
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        if($request->tgl_input_tpn < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderTpnCkd')->with('error', 'Tanggal tidak sesuai dengan tahun periode!'); 
        }
        // exit();

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpnCkd->save();
            return redirect()->route('trHeaderTpnCkd')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpnCkdDestroy_del(Request $request)
    {
        TrHeaderTpn::find($request->del_id)->delete();
        TrDetailTpn::where('id_header_tpn_in', $request->del_id)->delete();
        TrHistory::where('id_header_tpn_in', $request->del_id)->delete();

        return back()->with('success',' Data deleted successfully');
    }

    public function trDetailTpnCkd($id_header_tpn_in)
    {
        $getHeaderTpn = TrHeaderTpn::find($id_header_tpn_in);
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpn->lokasi_tpn)->get();        
        $kayu =  Kayu::all();
        $chainsaw = Chainsaw::all();
        $kupas = Kupas::all();
        $driver = Driver::where('kode_driver','>=',014)
                        ->where('kode_driver','<=',050)
                        ->get();
        $getDetTpn =  TrDetailTpn::leftJoin('mstr_chainsaw as mc', 'mc.kode_chainsaw','=','tr_detail_tpn_in.kode_chainsaw')
                                    ->leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_detail_tpn_in.kode_driver')
                                    ->leftJoin('mstr_kupas as kps', 'kps.kode_kupas','=','tr_detail_tpn_in.kode_kupas')
                                    ->where('tr_detail_tpn_in.id_header_tpn_in','=',$id_header_tpn_in)
                                    ->get(['tr_detail_tpn_in.*','mc.nama_chainsaw as mc','md.nama_driver as md','kps.nama_kupas as kps']);  
        // echo $getDetTpn;
        // exit();     
        $data['title'] = 'TPN CKD Detail - IN';
        return view('transaction/trDetailTpnCkd', $data, compact('getHeaderTpn','getLoc','kayu','chainsaw','kupas','driver','getDetTpn'));
        
    }

    public function trDetailTpnCkd_add(Request $request)
    {
        $request->validate([
            'no_tpn' => 'required',
            'tgl_input_tpn' => 'required',
            'thn_produksi_tpn' => 'required',
            'jns_kayu' => 'required',
            'no_btg' => 'required|unique:tr_detail_tpn_in',
        ]);

        $trDetailTpnCkd = new TrDetailTpn([
            'id_header_tpn_in' => $request->id_header_tpn_in,
            'no_tpn' => $request->no_tpn,
            'hph' => $request->hph,
            'tgl_input_tpn' => $request->tgl_input_tpn,
            'thn_produksi_tpn' => $request->thn_produksi_tpn,
            'lokasi_tpn' => $request->lokasi_tpn,
            'thn_rkt' => $request->thn_rkt,
            'no_btg' => $request->no_btg,
            'tgl_ukur' => $request->tgl_ukur,
            'jns_kayu' => $request->jns_kayu,
            'kode_chainsaw' => $request->kode_chainsaw,
            'kode_driver' => $request->kode_driver,
            'kode_kupas' => $request->kode_kupas,
            'pjg' => $request->pjg,
            'pkl' => $request->pkl,
            'ujg' => $request->ujg,
            'rt2' => $request->rt2,
            'vol' => $request->vol,
            'cct' => $request->cct,
            'pcct' => $request->pcct,
            'petak' => $request->petak,
            'kelas' => $request->kelas,
            'timbul' => $request->timbul,
            'position' => "current",
            'user_created_tpn' => Auth::user()->name,
            'createdAt' => date('Y-m-d H:i:s'),
        ]);

        $trHistory = new TrHistory([
            'id_header_tpn_in' => $request->id_header_tpn_in,
            'no_tpn' => $request->no_tpn,
            'hph' => $request->hph,
            'tgl_input_tpn' => $request->tgl_input_tpn,
            'thn_produksi_tpn' => $request->thn_produksi_tpn,
            'lokasi_tpn' => $request->lokasi_tpn,
            'thn_rkt' => $request->thn_rkt,
            'no_btg' => $request->nobtgx,
            'tgl_ukur' => $request->tgl_ukur,
            'jns_kayu' => $request->jns_kayu,
            'vol' => $request->vol,
            'petak' => $request->petak,
            'kelas' => $request->kelas,
            'timbul' => $request->timbul,
            'position' => "IN",
            'createdAt' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trDetailTpnCkd->save();
            $trHistory->save();
            return redirect()->route('trDetailTpnCkd',[$request->id_header_tpn_in])->with('success', 'Tambah data sukses!');
        }
    }

    public function trDetailTpnCkd_edit(Request $request)
    {
        
        TrDetailTpn::where('no_btg', $request->no_btg)
                  ->update(['thn_rkt' => $request->thn_rkt, 
                            'tgl_ukur' => $request->tgl_ukur,
                            'jns_kayu' => $request->jns_kayu,
                            'kode_chainsaw' => $request->kode_chainsaw,
                            'kode_driver' => $request->kode_driver,
                            'kode_kupas' => $request->kode_kupas,
                            'pjg' => $request->pjg,
                            'pkl' => $request->pkl,
                            'ujg' => $request->ujg,
                            'rt2' => $request->rt2,
                            'cct' => $request->cct,
                            'pcct' => $request->pcct,
                            'vol' => $request->vol,
                            'petak' => $request->petak,
                            'kelas' => $request->kelas,
                            'timbul' => $request->timbul,
                            'user_updated_tpn' => Auth::user()->name,
                            'updatedAt' => date('Y-m-d H:i:s'),
                            ]);
        TrHistory::where('no_btg', $request->no_btg)
                  ->update(['thn_rkt' => $request->thn_rkt, 
                            'tgl_ukur' => $request->tgl_ukur,
                            'jns_kayu' => $request->jns_kayu,                            
                            'vol' => $request->vol,
                            'petak' => $request->petak,
                            'kelas' => $request->kelas,
                            'timbul' => $request->timbul,
                            ]);
        return redirect()->route('trDetailTpnCkd',[$request->id_header_tpn_in])->with('success', 'Edit data sukses!');
    }

    public function trDetailTpnCkd_del(Request $request)
    {

        TrDetailTpn::where('no_btg', $request->del_id)->delete();
        TrHistory::where('no_btg', $request->del_id)->delete();

        return back()->with('success',' Data deleted successfully');
    }

    // =================== TPN CKD OUT : ============================================================= //

    public function trHeaderTpnCkdOut(Request $request)
    {

        $driver =  Driver::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'TPN CKD - OUT >> TPK 21';
        return view('transaction/trHeaderTpnCkdOut', $data, compact('driver','unitAlat'));
    }

    public function trHeaderTpnCkdOut_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // $data = TrHeaderTpnOut::where('kode_periode','=',$jsonx[0]['kode_periode'])->get();
        $data = TrHeaderTpnOut::join('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->join('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->join('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->join('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->join('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->join('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.tujuan','=','609')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpnCkdOut').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTpnCkdOut_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $trHeaderTpnCkdOut = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'optBongkar' => $request->optBongkar,
            'bongkarUnit' => $request->bongkarUnit,
            'optAngkut' => $request->optAngkut,
            'angkutUnit' => $request->angkutUnit,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpnCkdOut->save();
            return redirect()->route('trHeaderTpnCkdOut')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpnCkdOutDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTpnCkdOut($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::join('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->join('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->join('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->join('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->join('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->join('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->join('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        // $getHeaderTpnOut = TrHeaderTpnOut::find($id_header_tpn_out);
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        // $getNoBtg =  TrDetailTpn::where('lokasi_tpn','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get(['no_btg']);
        $getNoBtg =  TrDetailTpn::leftJoin('tr_detail_position', 'tr_detail_position.no_btg', '=', 'tr_detail_tpn_in.no_btg')
                                ->where('tr_detail_tpn_in.lokasi_tpn','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                ->whereNull('tr_detail_position.no_btg')
                                ->get(['tr_detail_tpn_in.no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->join('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'TPN CKD Detail - OUT';
        return view('transaction/trDetailTpnCkdOut', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTpnCkdOut_add(Request $request)
    {     

        DB::beginTransaction();
        try
        {
            TrDetailTpn::where('no_btg', $request->no_btg)
                      ->update(['position' => "passed"]);

            $getIdTpnIn =  TrDetailTpn::where('no_btg','=',$request->no_btg)
                                        ->get(['id_detail_tpn_in']);

            $trDetailTpnCkdOut = new TrDetailPosition([
                'id_header' => $request->id_header_tpn_out,
                'id_detail_tpn_in' => $getIdTpnIn[0]['id_detail_tpn_in'],
                'no_tpn_tpk' => $request->no_tpn_out,
                'hph' => $request->hph,
                'tgl_input' => $request->tgl_input_tpn_out,
                'from_lokasi' => $request->lokasi_tpn,
                'to_lokasi' => $request->lokasi_tujuan,
                'no_btg' => $request->no_btg,
                'position' => "current",
                'user_created' => Auth::user()->name,
                'createdAt' => date('Y-m-d H:i:s'),
            ]);

            $trHistory = new TrHistory([
                'no_tpn' => $request->no_tpn_out,
                'hph' => $request->hph,
                'tgl_input_tpn' => $request->tgl_input_tpn_out,
                'lokasi_tpn' => $request->lokasi_tujuan,
                'no_btg' => $request->no_btg,
                'position' => "IN",
                'createdAt' => date('Y-m-d H:i:s'),
            ]);

            if (Auth::user()->username == null or Auth::user()->username == "") {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/');
            }else{
                $trDetailTpnCkdOut->save();
                $trHistory->save();
                DB::commit();
                return redirect()->route('trDetailTpnCkdOut',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
            }
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('trDetailTpnCkdOut',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan!');
        }
    }

    public function trDetailTpnCkdOut_del(Request $request)
    {
              
        DB::beginTransaction();
        try
        {

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', '609')
                            ->delete();

            TrDetailTpn::where('no_btg', $request->nobtg_del)
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', '609')
                    ->delete();
            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    // =================== TPN USP IN : ============================================================= //

    public function trHeaderTpnUsp_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // $data = TrHeaderTpn::all();
        $data = TrHeaderTpn::where('kode_periode','=',$jsonx[0]['kode_periode'])
                            ->where('lokasi_tpn','=','002')
                            ->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpnUsp').'/'.$data->id_header_tpn_in.'" class="edit btn btn-primary btn-sm">Detail</a>';

                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_in.'" data-kode="'.$data->no_tpn.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }    

    public function trHeaderTpnUsp(Request $request)
    {

        $data['title'] = 'TPN USP - IN';
        return view('transaction/trHeaderTpnUsp', $data);
    }

    public function trHeaderTpnUsp_add(Request $request)
    {        
        $request->validate([
            'no_tpn' => 'required|unique:tr_header_tpn_in',
            'tgl_input_tpn' => 'required',
            'thn_produksi_tpn' => 'required',
            'lokasi_tpn' => '',
            'kode_periode' => '',
            'user_created_tpn' => '',
        ]);

        $trHeaderTpnUsp = new TrHeaderTpn([
            'no_tpn' => $request->no_tpn,
            'tgl_input_tpn' => $request->tgl_input_tpn,
            'thn_produksi_tpn' => $request->thn_produksi_tpn,
            'lokasi_tpn' => $request->lokasi_tpn,
            'kode_periode' => $request->kode_periode,
            'user_created_tpn' => Auth::user()->name,
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        if($request->tgl_input_tpn < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderTpnUsp')->with('error', 'Tanggal tidak sesuai dengan tahun periode!'); 
        }
        // exit();

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpnUsp->save();
            return redirect()->route('trHeaderTpnUsp')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpnUspDestroy_del(Request $request)
    {
        DB::beginTransaction();
        try
        {
            TrHeaderTpn::find($request->del_id)->delete();
            TrDetailTpn::where('id_header_tpn_in', $request->del_id)->delete();
            TrHistory::where('id_header_tpn_in', $request->del_id)->delete();
            DB::commit();
            return back()->with('success',' Data deleted successfully');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada masalah jaringan!');
        }
    }

    public function trDetailTpnUsp($id_header_tpn_in)
    {
        $getHeaderTpn = TrHeaderTpn::find($id_header_tpn_in);
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpn->lokasi_tpn)->get();        
        $kayu =  Kayu::all();
        $chainsaw = Chainsaw::all();
        $kupas = Kupas::all();
        $driver = Driver::where('kode_driver','>=',014)
                        ->where('kode_driver','<=',050)
                        ->get();
        $getDetTpn = TrDetailTpn::leftJoin('mstr_kayu as mk', 'mk.kode_kayu','=','tr_detail_tpn_in.jns_kayu')
                                ->leftJoin('mstr_chainsaw as mc', 'mc.kode_chainsaw','=','tr_detail_tpn_in.kode_chainsaw')
                                ->leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_detail_tpn_in.kode_driver')
                                ->leftJoin('mstr_kupas as kps', 'kps.kode_kupas','=','tr_detail_tpn_in.kode_kupas')
                                // ->whereNull('tr_detail_tpn_in.kode_kupas')
                                ->where('tr_detail_tpn_in.id_header_tpn_in','=',$id_header_tpn_in)
                                ->get(['tr_detail_tpn_in.*','mk.nama_kayu as mk','mc.nama_chainsaw as mc','md.nama_driver as md','kps.nama_kupas as kps']);
        // echo $id_header_tpn_in;
        // exit();
        
        $data['title'] = 'TPN USP Detail - IN';
        return view('transaction/trDetailTpnUsp', $data, compact('getHeaderTpn','getLoc','kayu','chainsaw','kupas','driver','getDetTpn'));
        
    }

    public function trDetailTpnUsp_add(Request $request)
    {

        $request->validate([
            'no_tpn' => 'required',
            'tgl_input_tpn' => 'required',
            'thn_produksi_tpn' => 'required',
            'jns_kayu' => 'required',
            'no_btg' => 'required|unique:tr_detail_tpn_in',
        ]);

        DB::beginTransaction();
        try{
            $trDetailTpnUsp = new TrDetailTpn([
                'id_header_tpn_in' => $request->id_header_tpn_in,
                'no_tpn' => $request->no_tpn,
                'hph' => $request->hph,
                'tgl_input_tpn' => $request->tgl_input_tpn,
                'thn_produksi_tpn' => $request->thn_produksi_tpn,
                'lokasi_tpn' => $request->lokasi_tpn,
                'thn_rkt' => $request->thn_rkt,
                'no_btg' => $request->no_btg,
                'tgl_ukur' => $request->tgl_ukur,
                'jns_kayu' => $request->jns_kayu,
                'kode_chainsaw' => $request->kode_chainsaw,
                'kode_driver' => $request->kode_driver,
                'kode_kupas' => $request->kode_kupas,
                'pjg' => $request->pjg,
                'pkl' => $request->pkl,
                'ujg' => $request->ujg,
                'rt2' => $request->rt2,
                'vol' => $request->vol,
                'cct' => $request->cct,
                'pcct' => $request->pcct,
                'petak' => $request->petak,
                'kelas' => $request->kelas,
                'timbul' => $request->timbul,
                'position' => "current",
                'user_created_tpn' => Auth::user()->name,
                'createdAt' => date('Y-m-d H:i:s'),
            ]);

            $trHistory = new TrHistory([
                'id_header_tpn_in' => $request->id_header_tpn_in,
                'no_tpn' => $request->no_tpn,
                'hph' => $request->hph,
                'tgl_input_tpn' => $request->tgl_input_tpn,
                'thn_produksi_tpn' => $request->thn_produksi_tpn,
                'lokasi_tpn' => $request->lokasi_tpn,
                'thn_rkt' => $request->thn_rkt,
                'no_btg' => $request->nobtgx,
                'tgl_ukur' => $request->tgl_ukur,
                'jns_kayu' => $request->jns_kayu,
                'vol' => $request->vol,
                'petak' => $request->petak,
                'kelas' => $request->kelas,
                'timbul' => $request->timbul,
                'position' => "IN",
                'createdAt' => date('Y-m-d H:i:s'),
            ]);

            if (Auth::user()->username == null or Auth::user()->username == "") {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/');
            }else{
                $trDetailTpnUsp->save();
                $trHistory->save();
                DB::commit();            
            }
            return redirect()->route('trDetailTpnUsp',[$request->id_header_tpn_in])->with('success', 'Tambah data sukses!');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('trDetailTpnUsp',[$request->id_header_tpn_in])->with('error', 'Ada kesalahan jaringan!');
        }
    }

    public function trDetailTpnUsp_edit(Request $request)
    {
        DB::beginTransaction();
        try{        
            TrDetailTpn::where('no_btg', $request->no_btg)
                      ->update(['thn_rkt' => $request->thn_rkt, 
                                'tgl_ukur' => $request->tgl_ukur,
                                'jns_kayu' => $request->jns_kayu,
                                'kode_chainsaw' => $request->kode_chainsaw,
                                'kode_driver' => $request->kode_driver,
                                'kode_kupas' => $request->kode_kupas,
                                'pjg' => $request->pjg,
                                'pkl' => $request->pkl,
                                'ujg' => $request->ujg,
                                'rt2' => $request->rt2,
                                'cct' => $request->cct,
                                'pcct' => $request->pcct,
                                'vol' => $request->vol,
                                'petak' => $request->petak,
                                'kelas' => $request->kelas,
                                'timbul' => $request->timbul,
                                'user_updated_tpn' => Auth::user()->name,
                                'updatedAt' => date('Y-m-d H:i:s'),
                                ]);
            TrHistory::where('no_btg', $request->no_btg)
                      ->update(['thn_rkt' => $request->thn_rkt, 
                                'tgl_ukur' => $request->tgl_ukur,
                                'jns_kayu' => $request->jns_kayu,                            
                                'vol' => $request->vol,
                                'petak' => $request->petak,
                                'kelas' => $request->kelas,
                                'timbul' => $request->timbul,
                                ]);
            DB::commit();
            return redirect()->route('trDetailTpnUsp',[$request->id_header_tpn_in])->with('success', 'Edit data sukses!');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('trDetailTpnUsp',[$request->id_header_tpn_in])->with('error', 'Ada masalah jaringan!');
        }
    }

    public function trDetailTpnUsp_del(Request $request)
    {
        DB::beginTransaction();
        try{
            TrDetailTpn::where('no_btg', $request->del_id)->delete();
            TrHistory::where('no_btg', $request->del_id)->delete();
            DB::commit();
            return back()->with('success',' Data deleted successfully');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada masalah jaringan!');
        }
    }

    // =================== TPN USP OUT 31 : =========================================================== //
    

    public function trHeaderTpnUspOut(Request $request)
    {

        $driver =  Driver::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'TPN USP - OUT >> TPK 31';
        return view('transaction/trHeaderTpnUspOut', $data, compact('driver','unitAlat'));
    }

    public function trHeaderTpnUspOut_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // $data = TrHeaderTpnOut::where('kode_periode','=',$jsonx[0]['kode_periode'])->get();
        $data = TrHeaderTpnOut::join('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->join('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->join('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->join('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->join('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->join('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.tujuan','=','603')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpnUspOut').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTpnUspOut_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $trHeaderTpnCkdOut = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'optBongkar' => $request->optBongkar,
            'bongkarUnit' => $request->bongkarUnit,
            'optAngkut' => $request->optAngkut,
            'angkutUnit' => $request->angkutUnit,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpnCkdOut->save();
            return redirect()->route('trHeaderTpnUspOut')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpnUspOutDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTpnUspOut($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::join('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->join('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->join('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->join('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->join('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->join('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->join('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        $getNoBtg =  TrDetailTpn::leftJoin('tr_detail_position', 'tr_detail_position.no_btg', '=', 'tr_detail_tpn_in.no_btg')
                                ->where('tr_detail_tpn_in.lokasi_tpn','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                ->whereNull('tr_detail_position.no_btg')
                                ->get(['tr_detail_tpn_in.no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->join('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail TPN USP OUT - TPK 31';
        return view('transaction/trDetailTpnUspOut', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTpnUspOut_add(Request $request)
    {    
        DB::beginTransaction();
        try
        {
            $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpn)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
            if ($cekNoBtg->isEmpty()) 
            { 
                TrDetailTpn::where('no_btg', $request->no_btg)
                              ->update(['position' => "passed"]);

                $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get();                               

                $trDetailTpnUspOut = new TrDetailPosition([
                    'id_header' => $request->id_header_tpn_out,
                    'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                    'no_tpn_tpk' => $request->no_tpn_out,
                    'hph' => $getIdHph[0]['hph'],
                    'tgl_input' => $request->tgl_input_tpn_out,
                    'from_lokasi' => $request->lokasi_tpn,
                    'to_lokasi' => $request->lokasi_tujuan,
                    'no_btg' => $request->no_btg,
                    'position' => "current",
                    'user_created' => Auth::user()->name,
                    'createdAt' => date('Y-m-d H:i:s'),
                ]);

                $trHistory = new TrHistory([
                    'no_tpn' => $request->no_tpn_out,
                    'hph' => $getIdHph[0]['hph'],
                    'tgl_input_tpn' => $request->tgl_input_tpn_out,
                    'lokasi_tpn' => $request->lokasi_tujuan,
                    'no_btg' => $request->no_btg,
                    'position' => "IN",
                    'createdAt' => date('Y-m-d H:i:s'),
                ]);

                if (Auth::user()->username == null or Auth::user()->username == "") {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect('/');
                }else{
                    $trDetailTpnUspOut->save();
                    $trHistory->save();
                    DB::commit();
                    return redirect()->route('trDetailTpnUspOut',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                }
            }else{
                return redirect()->route('trDetailTpnUspOut',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
            }
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('trDetailTpnUspOut',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan!');
        }
    }

    public function trDetailTpnUspOut_del(Request $request)
    {

        DB::beginTransaction();
        try
        {

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', '603')
                            ->delete();

            TrDetailTpn::where('no_btg', $request->nobtg_del)
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', '603')
                    ->delete();
            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    // =================== TPN USP OUT MADI =========================================================== //
    

    public function trHeaderTpnUspOutMadiDrt(Request $request)
    {

        $driver =  Driver::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'TPN USP - OUT >> TPK MADI DRT';
        return view('transaction/trHeaderTpnUspOutMadiDrt', $data, compact('driver','unitAlat'));
    }

    public function trHeaderTpnUspOutMadiDrt_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // $data = TrHeaderTpnOut::where('kode_periode','=',$jsonx[0]['kode_periode'])->get();
        $data = TrHeaderTpnOut::join('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->join('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->join('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->join('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->join('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->join('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.tujuan','=','610')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpnUspOutMadiDrt').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTpnUspOutMadiDrt_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $trHeaderTpnUspOutMadiDrt = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'optBongkar' => $request->optBongkar,
            'bongkarUnit' => $request->bongkarUnit,
            'optAngkut' => $request->optAngkut,
            'angkutUnit' => $request->angkutUnit,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpnUspOutMadiDrt->save();
            return redirect()->route('trHeaderTpnUspOutMadiDrt')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpnUspOutMadiDrtDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTpnUspOutMadiDrt($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::join('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->join('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->join('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->join('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->join('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->join('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->join('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        $getNoBtg =  TrDetailTpn::leftJoin('tr_detail_position', 'tr_detail_position.no_btg', '=', 'tr_detail_tpn_in.no_btg')
                                ->where('tr_detail_tpn_in.lokasi_tpn','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                ->whereNull('tr_detail_position.no_btg')
                                ->get(['tr_detail_tpn_in.no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->join('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'TPN USP Detail - OUT';
        return view('transaction/trDetailTpnUspOutMadiDrt', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTpnUspOutMadiDrt_add(Request $request)
    {    
        DB::beginTransaction();
        try
        {
            $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpn)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
            if ($cekNoBtg->isEmpty()) 
            {
                TrDetailTpn::where('no_btg', $request->no_btg)
                              ->update(['position' => "passed"]);

                $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get(); 

                $trDetailTpnUspOutMadiDrt = new TrDetailPosition([
                    'id_header' => $request->id_header_tpn_out,
                    'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                    'no_tpn_tpk' => $request->no_tpn_out,
                    'hph' => $getIdHph[0]['hph'],
                    'tgl_input' => $request->tgl_input_tpn_out,
                    'from_lokasi' => $request->lokasi_tpn,
                    'to_lokasi' => $request->lokasi_tujuan,
                    'no_btg' => $request->no_btg,
                    'position' => "current",
                    'user_created' => Auth::user()->name,
                    'createdAt' => date('Y-m-d H:i:s'),
                ]);

                $trHistory = new TrHistory([
                    'no_tpn' => $request->no_tpn_out,
                    'hph' => $getIdHph[0]['hph'],
                    'tgl_input_tpn' => $request->tgl_input_tpn_out,
                    'lokasi_tpn' => $request->lokasi_tujuan,
                    'no_btg' => $request->no_btg,
                    'position' => "IN",
                    'createdAt' => date('Y-m-d H:i:s'),
                ]);

                if (Auth::user()->username == null or Auth::user()->username == "") {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect('/');
                }else{
                    $trDetailTpnUspOutMadiDrt->save();
                    $trHistory->save();
                    DB::commit();
                    return redirect()->route('trDetailTpnUspOutMadiDrt',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                }
            }else{
                return redirect()->route('trDetailTpnUspOutMadiDrt',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');      
            }
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('trDetailTpnUspOutMadiDrt',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan!');
        }
    }

    public function trDetailTpnUspOutMadiDrt_del(Request $request)
    {

        DB::beginTransaction();
        try
        {

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', '610')
                            ->delete();

            TrDetailTpn::where('no_btg', $request->nobtg_del)
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', '610')
                    ->delete();
            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    // =================== TPK 21 CKD OUT Logpond Bere Darat ======================================= //
    

    public function trHeaderTpk21CkdOutLBD(Request $request)
    {

        $driver =  Driver::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'Header TPK 21 CKD OUT >> Logpond Bere Drt';
        return view('transaction/trHeaderTpk21CkdOutLBD', $data, compact('driver','unitAlat'));
    }

    public function trHeaderTpk21CkdOutLBD_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::join('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->join('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->join('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->join('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->join('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->join('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.lokasi_tpn','=','609')
                                ->where('tr_header_tpn_out.tujuan','=','710')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpk21CkdOutLBD').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTpk21CkdOutLBD_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);
        
        // Creating timestamp from given date
        $timestamp1 = strtotime($jsonx[0]['awal_tgl']);
        $timestamp2 = strtotime($jsonx[0]['akhir_tgl']);
         
        // Creating new date format from that timestamp
        $new_date1 = date("d-m-Y", $timestamp1);
        $new_date2 = date("d-m-Y", $timestamp2);

        if($request->tgl_input_tpn_out < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn_out > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderTpk21CkdOutLBD')->with('error', 'Tanggal harus sesuai dengan tahun periode! ('.$new_date1.' to '.$new_date2.')'); 
        } 

        // exit();

        $trHeaderTpk21CkdOutLBD = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'optBongkar' => $request->optBongkar,
            'bongkarUnit' => $request->bongkarUnit,
            'optAngkut' => $request->optAngkut,
            'angkutUnit' => $request->angkutUnit,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpk21CkdOutLBD->save();
            return redirect()->route('trHeaderTpk21CkdOutLBD')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpk21CkdOutLBDDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTpk21CkdOutLBD($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::join('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->join('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->join('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->join('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->join('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->join('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->join('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        
        $getNoBtg = TrDetailPosition::where('to_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                    ->where('position','=','current')
                                    ->get(['no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->join('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail TPK 21 CKD OUT - LP Bere Drt';
        return view('transaction/trDetailTpk21CkdOutLBD', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTpk21CkdOutLBD_add(Request $request)
    {    
        if($request->no_btg == ""){
            return redirect()->route('trDetailTpk21CkdOutLBD',[$request->id_header_tpn_out])->with('error', 'Failed, Nomor Btg harus dipilih!');
        }else{

            DB::beginTransaction();
            try
            {
                $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpk)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
                if ($cekNoBtg->isEmpty()) 
                {
                    TrDetailPosition::where('no_btg', $request->no_btg)
                                  ->where('to_lokasi', $request->lokasi_tpk)
                                  ->update(['position' => "passed"]);

                    $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get(); 

                    $trDetailTpk21CkdOutLBD = new TrDetailPosition([
                        'id_header' => $request->id_header_tpn_out,
                        'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                        'no_tpn_tpk' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input' => $request->tgl_input_tpn_out,
                        'from_lokasi' => $request->lokasi_tpk,
                        'to_lokasi' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "current",
                        'user_created' => Auth::user()->name,
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    $trHistory = new TrHistory([
                        'no_tpn' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input_tpn' => $request->tgl_input_tpn_out,
                        'lokasi_tpn' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "IN",
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    if (Auth::user()->username == null or Auth::user()->username == "") {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect('/');
                    }else{
                        $trDetailTpk21CkdOutLBD->save();
                        $trHistory->save();
                        DB::commit();
                        return redirect()->route('trDetailTpk21CkdOutLBD',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                    }
                }else{
                    return redirect()->route('trDetailTpk21CkdOutLBD',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('trDetailTpk21CkdOutLBD',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan!');
            }
        }
    }

    public function trDetailTpk21CkdOutLBD_del(Request $request)
    {
        DB::beginTransaction();
        try
        {

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', '710')
                            ->delete();

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                          ->where('to_lokasi', '609')
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', '710')
                    ->delete();
            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }


    // =================== TPK 31 USP OUT 24 ========================================================= //
    

    public function trHeaderTpkUspOut24(Request $request)
    {

        $driver =  Driver::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'Header TPK 31 USP OUT >> TPK 24';
        return view('transaction/trHeaderTpkUspOut24', $data, compact('driver','unitAlat'));
    }

    public function trHeaderTpkUspOut24_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // $data = TrHeaderTpnOut::where('kode_periode','=',$jsonx[0]['kode_periode'])->get();
        $data = TrHeaderTpnOut::join('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->join('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->join('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->join('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->join('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->join('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.tujuan','=','605')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpkUspOut24').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTpkUspOut24_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);
        
        // Creating timestamp from given date
        $timestamp1 = strtotime($jsonx[0]['awal_tgl']);
        $timestamp2 = strtotime($jsonx[0]['akhir_tgl']);
         
        // Creating new date format from that timestamp
        $new_date1 = date("d-m-Y", $timestamp1);
        $new_date2 = date("d-m-Y", $timestamp2);

        if($request->tgl_input_tpn_out < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn_out > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderTpkUspOut24')->with('error', 'Tanggal harus sesuai dengan tahun periode! ('.$new_date1.' to '.$new_date2.')'); 
        } 

        $trHeaderTpkUspOut24 = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'optBongkar' => $request->optBongkar,
            'bongkarUnit' => $request->bongkarUnit,
            'optAngkut' => $request->optAngkut,
            'angkutUnit' => $request->angkutUnit,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpkUspOut24->save();
            return redirect()->route('trHeaderTpkUspOut24')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpkUspOut24Destroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTpkUspOut24($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::join('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->join('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->join('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->join('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->join('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->join('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->join('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        
        $getNoBtg = TrDetailPosition::where('to_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                    ->where('position','=','current')
                                    ->get(['no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->join('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail TPK 31 USP OUT - TPK 24';
        return view('transaction/trDetailTpkUspOut24', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTpkUspOut24_add(Request $request)
    {    
        if($request->no_btg == ""){
            return redirect()->route('trDetailTpkUspOut24',[$request->id_header_tpn_out])->with('error', 'Failed, Nomor Btg harus dipilih!');
        }else{

            DB::beginTransaction();
            try
            {
                $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpk)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
                if ($cekNoBtg->isEmpty()) 
                {
                    TrDetailPosition::where('no_btg', $request->no_btg)
                                  ->where('to_lokasi', $request->lokasi_tpk)
                                  ->update(['position' => "passed"]);

                    $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get(); 

                    $trDetailTpkUspOut24 = new TrDetailPosition([
                        'id_header' => $request->id_header_tpn_out,
                        'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                        'no_tpn_tpk' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input' => $request->tgl_input_tpn_out,
                        'from_lokasi' => $request->lokasi_tpk,
                        'to_lokasi' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "current",
                        'user_created' => Auth::user()->name,
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    $trHistory = new TrHistory([
                        'no_tpn' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input_tpn' => $request->tgl_input_tpn_out,
                        'lokasi_tpn' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "IN",
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    if (Auth::user()->username == null or Auth::user()->username == "") {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect('/');
                    }else{
                        $trDetailTpkUspOut24->save();
                        $trHistory->save();
                        DB::commit();
                        return redirect()->route('trDetailTpkUspOut24',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                    }
                }else{
                    return redirect()->route('trDetailTpkUspOut24',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('trDetailTpkUspOut24',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan!');
            }
        }
    }

    public function trDetailTpkUspOut24_del(Request $request)
    {

        DB::beginTransaction();
        try
        {

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', '605')
                            ->delete();

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                          ->where('to_lokasi', '603')
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', '605')
                    ->delete();
            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    // =================== TPK 24 USP OUT Logpond Bere Darat ======================================= //
    

    public function trHeaderTpk24UspOutLBD(Request $request)
    {

        $driver =  Driver::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'Header TPK 24 USP OUT >> Logpond Bere Drt';
        return view('transaction/trHeaderTpk24UspOutLBD', $data, compact('driver','unitAlat'));
    }

    public function trHeaderTpk24UspOutLBD_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::join('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->join('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->join('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->join('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->join('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->join('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.lokasi_tpn','=','605')
                                ->where('tr_header_tpn_out.tujuan','=','710')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpk24UspOutLBD').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTpk24UspOutLBD_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);
        
        // Creating timestamp from given date
        $timestamp1 = strtotime($jsonx[0]['awal_tgl']);
        $timestamp2 = strtotime($jsonx[0]['akhir_tgl']);
         
        // Creating new date format from that timestamp
        $new_date1 = date("d-m-Y", $timestamp1);
        $new_date2 = date("d-m-Y", $timestamp2);

        if($request->tgl_input_tpn_out < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn_out > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderTpk24UspOutLBD')->with('error', 'Tanggal harus sesuai dengan tahun periode! ('.$new_date1.' to '.$new_date2.')'); 
        }   

        $trHeaderTpk24UspOutLBD = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'optBongkar' => $request->optBongkar,
            'bongkarUnit' => $request->bongkarUnit,
            'optAngkut' => $request->optAngkut,
            'angkutUnit' => $request->angkutUnit,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpk24UspOutLBD->save();
            return redirect()->route('trHeaderTpk24UspOutLBD')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpk24UspOutLBDDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTpk24UspOutLBD($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::join('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->join('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->join('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->join('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->join('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->join('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->join('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        
        $getNoBtg = TrDetailPosition::where('to_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                    ->where('position','=','current')
                                    ->get(['no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->join('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail TPK 24 USP OUT - LP Bere Drt';
        return view('transaction/trDetailTpk24UspOutLBD', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTpk24UspOutLBD_add(Request $request)
    {    
        if($request->no_btg == ""){
            return redirect()->route('trDetailTpk24UspOutLBD',[$request->id_header_tpn_out])->with('error', 'Failed, Nomor Btg harus dipilih!');
        }else{

            DB::beginTransaction();
            try
            {
                $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpk)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
                if ($cekNoBtg->isEmpty()) 
                {
                    TrDetailPosition::where('no_btg', $request->no_btg)
                                  ->where('to_lokasi', $request->lokasi_tpk)
                                  ->update(['position' => "passed"]);

                    $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get();

                    $trDetailTpk24UspOutLBD = new TrDetailPosition([
                        'id_header' => $request->id_header_tpn_out,
                        'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                        'no_tpn_tpk' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input' => $request->tgl_input_tpn_out,
                        'from_lokasi' => $request->lokasi_tpk,
                        'to_lokasi' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "current",
                        'user_created' => Auth::user()->name,
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    $trHistory = new TrHistory([
                        'no_tpn' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input_tpn' => $request->tgl_input_tpn_out,
                        'lokasi_tpn' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "IN",
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    if (Auth::user()->username == null or Auth::user()->username == "") {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect('/');
                    }else{
                        $trDetailTpk24UspOutLBD->save();
                        $trHistory->save();
                        DB::commit();
                        return redirect()->route('trDetailTpk24UspOutLBD',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                    }
                }else{
                    return redirect()->route('trDetailTpk24UspOutLBD',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('trDetailTpk24UspOutLBD',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan!');
            }
        }
    }

    public function trDetailTpk24UspOutLBD_del(Request $request)
    {
        DB::beginTransaction();
        try
        {

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', '710')
                            ->delete();

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                          ->where('to_lokasi', '605')
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', '710')
                    ->delete();
            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    // =================== TPK MADI DRT USP OUT MADI AIR ======================================= //
    

    public function trHeaderTpkMadiDrtUspOutMadiAir(Request $request)
    {

        $driver =  Driver::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'Header TPK MADI DRT USP OUT >> MADI AIR';
        return view('transaction/trHeaderTpkMadiDrtUspOutMadiAir', $data, compact('driver','unitAlat'));
    }

    public function trHeaderTpkMadiDrtUspOutMadiAir_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->leftJoin('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->leftJoin('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->leftJoin('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.lokasi_tpn','=','610')
                                ->where('tr_header_tpn_out.tujuan','=','611')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpkMadiDrtUspOutMadiAir').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    
                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTpkMadiDrtUspOutMadiAir_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // Creating timestamp from given date
        $timestamp1 = strtotime($jsonx[0]['awal_tgl']);
        $timestamp2 = strtotime($jsonx[0]['akhir_tgl']);
         
        // Creating new date format from that timestamp
        $new_date1 = date("d-m-Y", $timestamp1);
        $new_date2 = date("d-m-Y", $timestamp2);

        if($request->tgl_input_tpn_out < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn_out > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderTpkMadiDrtUspOutMadiAir')->with('error', 'Tanggal harus sesuai dengan tahun periode! ('.$new_date1.' to '.$new_date2.')'); 
        }        

        $trHeaderTpkMadiDrtUspOutMadiAir = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'optBongkar' => $request->optBongkar,
            'bongkarUnit' => $request->bongkarUnit,
            'optAngkut' => $request->optAngkut,
            'angkutUnit' => $request->angkutUnit,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpkMadiDrtUspOutMadiAir->save();
            return redirect()->route('trHeaderTpkMadiDrtUspOutMadiAir')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpkMadiDrtUspOutMadiAirDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTpkMadiDrtUspOutMadiAir($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->leftJoin('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->leftJoin('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->leftJoin('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->leftJoin('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        
        $getNoBtg = TrDetailPosition::where('to_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                    ->where('position','=','current')
                                    ->get(['no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->join('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail TPK Madi Drt USP OUT - Madi Air';
        return view('transaction/trDetailTpkMadiDrtUspOutMadiAir', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTpkMadiDrtUspOutMadiAir_add(Request $request)
    {    
        if($request->no_btg == ""){
            return redirect()->route('trDetailTpkMadiDrtUspOutMadiAir',[$request->id_header_tpn_out])->with('error', 'Failed, Nomor Btg harus dipilih!');
        }else{

            DB::beginTransaction();
            try
            {
                $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpk)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
                if ($cekNoBtg->isEmpty()) 
                {
                    TrDetailPosition::where('no_btg', $request->no_btg)
                                  ->where('to_lokasi', $request->lokasi_tpk)
                                  ->update(['position' => "passed"]);

                    $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get();

                    $trDetailTpkMadiDrtUspOutMadiAir = new TrDetailPosition([
                        'id_header' => $request->id_header_tpn_out,
                        'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                        'no_tpn_tpk' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input' => $request->tgl_input_tpn_out,
                        'from_lokasi' => $request->lokasi_tpk,
                        'to_lokasi' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "current",
                        'user_created' => Auth::user()->name,
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    $trHistory = new TrHistory([
                        'no_tpn' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input_tpn' => $request->tgl_input_tpn_out,
                        'lokasi_tpn' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "IN",
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    if (Auth::user()->username == null or Auth::user()->username == "") {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect('/');
                    }else{
                        $trDetailTpkMadiDrtUspOutMadiAir->save();
                        $trHistory->save();
                        DB::commit();
                        return redirect()->route('trDetailTpkMadiDrtUspOutMadiAir',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                    }
                }else{
                    return redirect()->route('trDetailTpkMadiDrtUspOutMadiAir',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('trDetailTpkMadiDrtUspOutMadiAir',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan!');
            }
        }
    }

    public function trDetailTpkMadiDrtUspOutMadiAir_del(Request $request)
    {
        DB::beginTransaction();
        try
        {

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', $request->tolok_del)
                            ->delete();

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                          ->where('to_lokasi', $request->fromlok_del)
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', $request->tolok_del)
                    ->delete();
            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    // =================== TPK MADI AIR USP OUT Logpond Bere Air =============================== //
    

    public function trHeaderTpkMadiAirUspOutLBA(Request $request)
    {

        $driver =  Driver::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'Header TPK MADI AIR USP OUT >> Logpond Bere Air';
        return view('transaction/trHeaderTpkMadiAirUspOutLBA', $data, compact('driver','unitAlat'));
    }

    public function trHeaderTpkMadiAirUspOutLBA_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->leftJoin('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->leftJoin('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->leftJoin('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.lokasi_tpn','=','611')
                                ->where('tr_header_tpn_out.tujuan','=','711')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpkMadiAirUspOutLBA').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';

                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTpkMadiAirUspOutLBA_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // Creating timestamp from given date
        $timestamp1 = strtotime($jsonx[0]['awal_tgl']);
        $timestamp2 = strtotime($jsonx[0]['akhir_tgl']);
         
        // Creating new date format from that timestamp
        $new_date1 = date("d-m-Y", $timestamp1);
        $new_date2 = date("d-m-Y", $timestamp2);

        if($request->tgl_input_tpn_out < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn_out > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderTpkMadiAirUspOutLBA')->with('error', 'Tanggal harus sesuai dengan tahun periode! ('.$new_date1.' to '.$new_date2.')'); 
        }        

        $trHeaderTpkMadiAirUspOutLBA = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'optBongkar' => $request->optBongkar,
            'bongkarUnit' => $request->bongkarUnit,
            'optAngkut' => $request->optAngkut,
            'angkutUnit' => $request->angkutUnit,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpkMadiAirUspOutLBA->save();
            return redirect()->route('trHeaderTpkMadiAirUspOutLBA')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpkMadiAirUspOutLBADestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTpkMadiAirUspOutLBA($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->leftJoin('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->leftJoin('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->leftJoin('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->leftJoin('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        
        $getNoBtg = TrDetailPosition::where('to_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                    ->where('position','=','current')
                                    ->get(['no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::leftJoin('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->leftJoin('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail TPK Madi USP OUT - LP Bere Air';
        return view('transaction/trDetailTpkMadiAirUspOutLBA', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTpkMadiAirUspOutLBA_add(Request $request)
    {    
        if($request->no_btg == ""){
            return redirect()->route('trDetailTpkMadiAirUspOutLBA',[$request->id_header_tpn_out])->with('error', 'Failed, Nomor Btg harus dipilih!');
        }else{

            DB::beginTransaction();
            try
            {
                $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpk)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
                if ($cekNoBtg->isEmpty()) 
                {
                    TrDetailPosition::where('no_btg', $request->no_btg)
                                  ->where('to_lokasi', $request->lokasi_tpk)
                                  ->update(['position' => "passed"]);

                    $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get();

                    $trDetailTpkMadiAirUspOutLBA = new TrDetailPosition([
                        'id_header' => $request->id_header_tpn_out,
                        'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                        'no_tpn_tpk' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input' => $request->tgl_input_tpn_out,
                        'from_lokasi' => $request->lokasi_tpk,
                        'to_lokasi' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "current",
                        'user_created' => Auth::user()->name,
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    $trHistory = new TrHistory([
                        'no_tpn' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input_tpn' => $request->tgl_input_tpn_out,
                        'lokasi_tpn' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "IN",
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    if (Auth::user()->username == null or Auth::user()->username == "") {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect('/');
                    }else{
                        $trDetailTpkMadiAirUspOutLBA->save();
                        $trHistory->save();
                        DB::commit();
                        return redirect()->route('trDetailTpkMadiAirUspOutLBA',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                    }
                }else{
                    return redirect()->route('trDetailTpkMadiAirUspOutLBA',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('trDetailTpkMadiAirUspOutLBA',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan!');
            }
        }
    }

    public function trDetailTpkMadiAirUspOutLBA_del(Request $request)
    {

        DB::beginTransaction();
        try
        {

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', $request->tolok_del)
                            ->delete();

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', $request->fromlok_del)
                            ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                        ->where('lokasi_tpn', $request->tolok_del)
                        ->delete();

            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    // =================== Logpond Bere Darat OUT Logpond Bere Air ================================= //
    

    public function trHeaderBereDrtOutBereAir(Request $request)
    {

        $driver =  Driver::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'Header Logpond Bere Drt >> Logpond Bere Air';
        return view('transaction/trHeaderBereDrtOutBereAir', $data, compact('driver','unitAlat'));
    }

    public function trHeaderBereDrtOutBereAir_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->leftJoin('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->leftJoin('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->leftJoin('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.lokasi_tpn','=','710')
                                ->where('tr_header_tpn_out.tujuan','=','711')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailBereDrtOutBereAir').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';

                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderBereDrtOutBereAir_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // Creating timestamp from given date
        $timestamp1 = strtotime($jsonx[0]['awal_tgl']);
        $timestamp2 = strtotime($jsonx[0]['akhir_tgl']);
         
        // Creating new date format from that timestamp
        $new_date1 = date("d-m-Y", $timestamp1);
        $new_date2 = date("d-m-Y", $timestamp2);

        if($request->tgl_input_tpn_out < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn_out > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderBereDrtOutBereAir')->with('error', 'Tanggal harus sesuai dengan tahun periode! ('.$new_date1.' to '.$new_date2.')'); 
        }        

        $trHeaderBereDrtOutBereAir = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,            
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderBereDrtOutBereAir->save();
            return redirect()->route('trHeaderBereDrtOutBereAir')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderBereDrtOutBereAirDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailBereDrtOutBereAir($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->leftJoin('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->leftJoin('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->leftJoin('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->leftJoin('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        
        $getNoBtg = TrDetailPosition::where('to_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                    ->where('position','=','current')
                                    ->get(['no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::leftJoin('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->leftJoin('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail LP Bere Drt OUT - LP Bere Air';
        return view('transaction/trDetailBereDrtOutBereAir', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailBereDrtOutBereAir_add(Request $request)
    {    
        if($request->no_btg == ""){
            return redirect()->route('trDetailBereDrtOutBereAir',[$request->id_header_tpn_out])->with('error', 'Failed, Nomor Btg harus dipilih!');
        }else{

            DB::beginTransaction();
            try
            {
                $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpk)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
                if ($cekNoBtg->isEmpty()) 
                {
                    TrDetailPosition::where('no_btg', $request->no_btg)
                                  ->where('to_lokasi', $request->lokasi_tpk)
                                  ->update(['position' => "passed"]);

                    $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get();

                    $trDetailBereDrtOutBereAir = new TrDetailPosition([
                        'id_header' => $request->id_header_tpn_out,
                        'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                        'no_tpn_tpk' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input' => $request->tgl_input_tpn_out,
                        'from_lokasi' => $request->lokasi_tpk,
                        'to_lokasi' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "current",
                        'user_created' => Auth::user()->name,
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    $trHistory = new TrHistory([
                        'no_tpn' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input_tpn' => $request->tgl_input_tpn_out,
                        'lokasi_tpn' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "IN",
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    if (Auth::user()->username == null or Auth::user()->username == "") {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect('/');
                    }else{
                        $trDetailBereDrtOutBereAir->save();
                        $trHistory->save();
                        DB::commit();
                        return redirect()->route('trDetailBereDrtOutBereAir',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                    }
                }else{
                    return redirect()->route('trDetailBereDrtOutBereAir',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('trDetailBereDrtOutBereAir',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan!');
            }
        }
    }

    public function trDetailBereDrtOutBereAir_del(Request $request)
    {
        DB::beginTransaction();
        try
        {

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', '711')
                            ->delete();

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                          ->where('to_lokasi', '710')
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', '711')
                    ->delete();
            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    // =================== Logpond Bere Air OUT Tempunak ================================= //
    

    public function trHeaderBereAirOutTempunak(Request $request)
    {

        $driver =  Driver::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'Header Logpond Bere Air >> Tempunak';
        return view('transaction/trHeaderBereAirOutTempunak', $data, compact('driver','unitAlat'));
    }

    public function trHeaderBereAirOutTempunak_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')                                
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.lokasi_tpn','=','711')
                                ->where('tr_header_tpn_out.tujuan','=','720')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailBereAirOutTempunak').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';

                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderBereAirOutTempunak_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // Creating timestamp from given date
        $timestamp1 = strtotime($jsonx[0]['awal_tgl']);
        $timestamp2 = strtotime($jsonx[0]['akhir_tgl']);
         
        // Creating new date format from that timestamp
        $new_date1 = date("d-m-Y", $timestamp1);
        $new_date2 = date("d-m-Y", $timestamp2);

        if($request->tgl_input_tpn_out < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn_out > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderBereAirOutTempunak')->with('error', 'Tanggal harus sesuai dengan tahun periode! ('.$new_date1.' to '.$new_date2.')'); 
        }        

        $trHeaderBereAirOutTempunak = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,            
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderBereAirOutTempunak->save();
            return redirect()->route('trHeaderBereAirOutTempunak')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderBereAirOutTempunakDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailBereAirOutTempunak($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')                                
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->leftJoin('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        
        $getNoBtg = TrDetailPosition::where('to_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                    ->where('position','=','current')
                                    ->get(['no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::leftJoin('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->leftJoin('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail LP Bere Air OUT - Tempunak';
        return view('transaction/trDetailBereAirOutTempunak', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailBereAirOutTempunak_add(Request $request)
    {    
        
        if($request->no_btg == ""){
            return redirect()->route('trDetailBereAirOutTempunak',[$request->id_header_tpn_out])->with('error', 'Failed, Nomor Btg harus dipilih!');
        }else{

            DB::beginTransaction();
            try
            {
                $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpk)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
                if ($cekNoBtg->isEmpty()) 
                {
                    $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get();

                    TrDetailPosition::where('no_btg', $request->no_btg)
                                  ->where('to_lokasi', $request->lokasi_tpk)
                                  ->update(['position' => "passed"]);                

                    $trDetailBereAirOutTempunak = new TrDetailPosition([
                        'id_header' => $request->id_header_tpn_out,
                        'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                        'no_tpn_tpk' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input' => $request->tgl_input_tpn_out,
                        'from_lokasi' => $request->lokasi_tpk,
                        'to_lokasi' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => 'current',
                        'user_created' => Auth::user()->name,
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    $trHistory = new TrHistory([
                        'no_tpn' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input_tpn' => $request->tgl_input_tpn_out,
                        'lokasi_tpn' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "IN",
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    if (Auth::user()->username == null or Auth::user()->username == "") {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect('/');
                    }else{
                        $trDetailBereAirOutTempunak->save();
                        $trHistory->save();
                        DB::commit();
                        return redirect()->route('trDetailBereAirOutTempunak',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                    }
                }else{
                    return redirect()->route('trDetailBereAirOutTempunak',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('trDetailBereAirOutTempunak',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan / field table ada yg tdk boleh null!');
            }
        }
    }

    public function trDetailBereAirOutTempunak_del(Request $request)
    {

        DB::beginTransaction();
        try
        {            

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', $request->tolok_del)
                            ->delete();

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                          ->where('to_lokasi', $request->fromlok_del)
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', $request->tolok_del)
                    ->delete();

            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    // =================== Logpond Bere Air OUT Tayan ================================= //
    

    public function trHeaderBereAirOutTayan(Request $request)
    {

        $driver =  Driver::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'Header Logpond Bere Air >> Tayan';
        return view('transaction/trHeaderBereAirOutTayan', $data, compact('driver','unitAlat'));
    }

    public function trHeaderBereAirOutTayan_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')                                
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.lokasi_tpn','=','711')
                                ->where('tr_header_tpn_out.tujuan','=','740')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailBereAirOutTayan').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';

                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderBereAirOutTayan_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // Creating timestamp from given date
        $timestamp1 = strtotime($jsonx[0]['awal_tgl']);
        $timestamp2 = strtotime($jsonx[0]['akhir_tgl']);
         
        // Creating new date format from that timestamp
        $new_date1 = date("d-m-Y", $timestamp1);
        $new_date2 = date("d-m-Y", $timestamp2);

        if($request->tgl_input_tpn_out < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn_out > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderBereAirOutTayan')->with('error', 'Tanggal harus sesuai dengan tahun periode! ('.$new_date1.' to '.$new_date2.')'); 
        }        

        $trHeaderBereAirOutTayan = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,            
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderBereAirOutTayan->save();
            return redirect()->route('trHeaderBereAirOutTayan')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderBereAirOutTayanDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailBereAirOutTayan($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')                                
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->leftJoin('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        
        $getNoBtg = TrDetailPosition::where('to_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                    ->where('position','=','current')
                                    ->get(['no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::leftJoin('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->leftJoin('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail LP Bere Air OUT - Tayan';
        return view('transaction/trDetailBereAirOutTayan', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailBereAirOutTayan_add(Request $request)
    {    
        if($request->no_btg == ""){
            return redirect()->route('trDetailBereAirOutTayan',[$request->id_header_tpn_out])->with('error', 'Failed, Nomor Btg harus dipilih!');
        }else{

            DB::beginTransaction();
            try
            {
                $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpk)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
                if ($cekNoBtg->isEmpty()) 
                {
                    TrDetailPosition::where('no_btg', $request->no_btg)
                                  ->where('to_lokasi', $request->lokasi_tpk)
                                  ->update(['position' => "passed"]);

                    $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get();

                    $trDetailBereAirOutTayan = new TrDetailPosition([
                        'id_header' => $request->id_header_tpn_out,
                        'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                        'no_tpn_tpk' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input' => $request->tgl_input_tpn_out,
                        'from_lokasi' => $request->lokasi_tpk,
                        'to_lokasi' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "current",
                        'user_created' => Auth::user()->name,
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    $trHistory = new TrHistory([
                        'no_tpn' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input_tpn' => $request->tgl_input_tpn_out,
                        'lokasi_tpn' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "IN",
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    if (Auth::user()->username == null or Auth::user()->username == "") {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect('/');
                    }else{
                        $trDetailBereAirOutTayan->save();
                        $trHistory->save();
                        DB::commit();
                        return redirect()->route('trDetailBereAirOutTayan',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                    }
                }else{
                    return redirect()->route('trDetailBereAirOutTayan',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('trDetailBereAirOutTayan',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan!');
            }
        }
    }

    public function trDetailBereAirOutTayan_del(Request $request)
    {

        DB::beginTransaction();
        try
        {            

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', $request->tolok_del)
                            ->delete();

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                          ->where('to_lokasi', $request->fromlok_del)
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', $request->tolok_del)
                    ->delete();

            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    // =================== Tempunak OUT Tayan ================================= //
    

    public function trHeaderTempunakOutTayan(Request $request)
    {

        $driver =  Driver::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'Header Tempunak >> Tayan';
        return view('transaction/trHeaderTempunakOutTayan', $data, compact('driver','unitAlat'));
    }

    public function trHeaderTempunakOutTayan_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')                                
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.lokasi_tpn','=','720')
                                ->where('tr_header_tpn_out.tujuan','=','740')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTempunakOutTayan').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';

                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTempunakOutTayan_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // Creating timestamp from given date
        $timestamp1 = strtotime($jsonx[0]['awal_tgl']);
        $timestamp2 = strtotime($jsonx[0]['akhir_tgl']);
         
        // Creating new date format from that timestamp
        $new_date1 = date("d-m-Y", $timestamp1);
        $new_date2 = date("d-m-Y", $timestamp2);

        if($request->tgl_input_tpn_out < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn_out > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderTempunakOutTayan')->with('error', 'Tanggal harus sesuai dengan tahun periode! ('.$new_date1.' to '.$new_date2.')'); 
        }        

        $trHeaderTempunakOutTayan = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,            
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTempunakOutTayan->save();
            return redirect()->route('trHeaderTempunakOutTayan')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTempunakOutTayanDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTempunakOutTayan($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')                                
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->leftJoin('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        
        $getNoBtg = TrDetailPosition::where('to_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                    ->where('position','=','current')
                                    ->get(['no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::leftJoin('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->leftJoin('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail Tempunak - Tayan';
        return view('transaction/trDetailTempunakOutTayan', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTempunakOutTayan_add(Request $request)
    {    
        if($request->no_btg == ""){
            return redirect()->route('trDetailTempunakOutTayan',[$request->id_header_tpn_out])->with('error', 'Failed, Nomor Btg harus dipilih!');
        }else{

            DB::beginTransaction();
            try
            {
                $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpk)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
                if ($cekNoBtg->isEmpty()) 
                {
                    TrDetailPosition::where('no_btg', $request->no_btg)
                                  ->where('to_lokasi', $request->lokasi_tpk)
                                  ->update(['position' => "passed"]);

                    $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get();

                    $trDetailTempunakOutTayan = new TrDetailPosition([
                        'id_header' => $request->id_header_tpn_out,
                        'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                        'no_tpn_tpk' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input' => $request->tgl_input_tpn_out,
                        'from_lokasi' => $request->lokasi_tpk,
                        'to_lokasi' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "current",
                        'user_created' => Auth::user()->name,
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    $trHistory = new TrHistory([
                        'no_tpn' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input_tpn' => $request->tgl_input_tpn_out,
                        'lokasi_tpn' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "IN",
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    if (Auth::user()->username == null or Auth::user()->username == "") {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect('/');
                    }else{
                        $trDetailTempunakOutTayan->save();
                        $trHistory->save();
                        DB::commit();
                        return redirect()->route('trDetailTempunakOutTayan',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                    }
                }else{
                    return redirect()->route('trDetailTempunakOutTayan',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('trDetailTempunakOutTayan',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan!');
            }
        }
    }

    public function trDetailTempunakOutTayan_del(Request $request)
    {

        DB::beginTransaction();
        try
        {            

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', $request->tolok_del)
                            ->delete();

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                          ->where('to_lokasi', $request->fromlok_del)
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', $request->tolok_del)
                    ->delete();

            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    // =================== Tayan OUT Tongkang ================================= //
    

    public function trHeaderTayanOutTongkang(Request $request)
    {

        $driver =  Driver::where('kode_driver','>=',500)->get();
        $tongkang =  Tongkang::all();
        $unitAlat = UnitAlat::all();
        $data['title'] = 'Header Tayan >> Tongkang';
        return view('transaction/trHeaderTayanOutTongkang', $data, compact('driver','tongkang'));
    }

    public function trHeaderTayanOutTongkang_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')                                
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.lokasi_tpn','=','740')
                                ->where('tr_header_tpn_out.tujuan','=','800')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTayanOutTongkang').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';

                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTayanOutTongkang_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // Creating timestamp from given date
        $timestamp1 = strtotime($jsonx[0]['awal_tgl']);
        $timestamp2 = strtotime($jsonx[0]['akhir_tgl']);
         
        // Creating new date format from that timestamp
        $new_date1 = date("d-m-Y", $timestamp1);
        $new_date2 = date("d-m-Y", $timestamp2);

        if($request->tgl_input_tpn_out < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn_out > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderTayanOutTongkang')->with('error', 'Tanggal harus sesuai dengan tahun periode! ('.$new_date1.' to '.$new_date2.')'); 
        }        

        $trHeaderTayanOutTongkang = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'no_loglist' => $request->no_loglist,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTayanOutTongkang->save();
            return redirect()->route('trHeaderTayanOutTongkang')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTayanOutTongkangDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTayanOutTongkang($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')                                
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->leftJoin('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);

        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        
        $getNoBtg = TrDetailPosition::where('to_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                    ->where('position','=','current')
                                    ->get(['no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::leftJoin('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->leftJoin('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail Tayan - Tongkang';
        return view('transaction/trDetailTayanOutTongkang', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTayanOutTongkang_add(Request $request)
    {    
        if($request->no_btg == ""){
            return redirect()->route('trDetailTayanOutTongkang',[$request->id_header_tpn_out])->with('error', 'Failed, Nomor Btg harus dipilih!');
        }else{

            DB::beginTransaction();
            try
            {
                $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpk)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
                if ($cekNoBtg->isEmpty()) 
                {
                    TrDetailPosition::where('no_btg', $request->no_btg)
                                  ->where('to_lokasi', $request->lokasi_tpk)
                                  ->update(['position' => "passed"]);

                    $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get();

                    $trDetailTayanOutTongkang = new TrDetailPosition([
                        'id_header' => $request->id_header_tpn_out,
                        'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                        'no_tpn_tpk' => $request->no_tpn_out,
                        'no_loglist' => $request->no_loglist,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input' => $request->tgl_input_tpn_out,
                        'from_lokasi' => $request->lokasi_tpk,
                        'to_lokasi' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "current",
                        'user_created' => Auth::user()->name,
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    $trHistory = new TrHistory([
                        'no_tpn' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input_tpn' => $request->tgl_input_tpn_out,
                        'lokasi_tpn' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "IN",
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    if (Auth::user()->username == null or Auth::user()->username == "") {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect('/');
                    }else{
                        $trDetailTayanOutTongkang->save();
                        $trHistory->save();
                        DB::commit();
                        return redirect()->route('trDetailTayanOutTongkang',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                    }
                }else{
                    return redirect()->route('trDetailTayanOutTongkang',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('trDetailTayanOutTongkang',[$request->id_header_tpn_out])->with('error', 'Ada kesalahan jaringan!');
            }
        }
    }

    public function trDetailTayanOutTongkang_del(Request $request)
    {

        DB::beginTransaction();
        try
        {            

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', $request->tolok_del)
                            ->delete();

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                          ->where('to_lokasi', $request->fromlok_del)
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', $request->tolok_del)
                    ->delete();

            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    // ------------------- Tongkang ---------------------------//

    public function trTongkang(Request $request)
    {

        $data['title'] = 'Transaksi Tongkang';
        return view('transaction/trTongkang', $data);
    }

    public function trTongkang_data(Request $request)
    {

        $data = TrDetailPosition::leftJoin('tr_detail_tpn_in as tdti','tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.to_lokasi', '=', '800')
                                ->groupBy('tr_detail_position.no_loglist')
                                ->select('tr_detail_position.no_loglist', DB::raw('truncate(sum(tdti.vol),2) as volall'))
                                ->get(['no_loglist','volall']);

        return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($data){

                            $btn = '<a href="'. url('trLogListTkg').'/'.str_replace("/","_",$data->no_loglist).'" class="edit btn btn-primary btn-sm">Detail</a>';
                            
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);        
    }

    public function trLogListTkg($no_loglist)
    {;
        $no_log = str_replace("_","/",$no_loglist);
        Session::put('nologlist', $no_log);
        $data['title'] = 'Detail No Loglist';
        return view('transaction/trLogListTkg', $data);
    }

    public function trLoglistModal_data(Request $request)
    {
        $nolog = Session::get('nologlist');
        $data = TrDetailPosition::leftJoin('tr_detail_tpn_in as tdi', 'tdi.no_btg','=','tr_detail_position.no_btg')
                                ->leftJoin('mstr_kayu as mk', 'mk.kode_kayu','=','tdi.jns_kayu')
                                ->where('tr_detail_position.no_loglist','=',$nolog)
                                ->where('tr_detail_position.to_lokasi','=','800')
                                ->get(['tr_detail_position.no_loglist as nolog','tdi.thn_produksi_tpn as tpt','tdi.thn_rkt as trk','mk.nama_kayu as nk','tdi.petak as ptk','tr_detail_position.no_btg as nobt','tdi.pjg as pj','tdi.ujg as uj','tdi.pkl as pk','tdi.rt2 as rt','tdi.vol as vl','tdi.cct as ct','tdi.pcct as pc']);
        return Datatables::of($data)
                        ->make(true);
    }    

    public function trLoglistModal_edit(Request $request)
    {
        DB::beginTransaction();
        try
        {            
            TrDetailPosition::where('no_loglist', $request->nolog_id)
                            ->where('to_lokasi', '800')
                            ->update(['position' => 'closed']);
            DB::commit();

            return back()->with('success',' Data Closed successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' Ada kesalahan jaringan!');
        }
    }

    public static function getClosedTkg($nolog)
    {        
        $getLastNo = TrDetailPosition::where('no_loglist', $nolog)
                                    ->first(['position']);     

        $newNo = $getLastNo->position;
        
        return $newNo;
              
    }

    // ------------------- Reporting --------------------------//

    public static function getQtyKayuAllHome($hph)
    {

        $getKy = TrDetailPosition::where('hph', $hph)
                                ->where('position','current')
                                ->get(['position']);

        $getKy2 = TrDetailTpn::where('hph', $hph)
                            ->where('position','current')
                            ->get(['position']);

        $gk = count($getKy);
        $gk2 = count($getKy2);

        $gkx = $gk + $gk2;
        if($gkx > 0) {
            return $gkx;
        }else{            
            $gkx = 0;
            return $gkx;
        }
    }

    public function rptStokKayu_rpt(Request $request)
    {   
        // $pieces = explode("-", $request->tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        $stDt = date("d-m-Y", strtotime($request->tgl_laporan));
        $thnProd = date("Y", strtotime($request->tgl_laporan));

        // $eDt = date("d-m-Y", strtotime($endDt));

        $getSelCkd = DB::select(DB::raw("SELECT e.thn_produksi_tpn as thnprod,
                                            sum(e.tpn) as tpnQty,
                                            round(sum(e.tpnVol),2) as tpnVol,
                                            sum(e.tpk21) as tpk21Qty,
                                            round(sum(e.tpk21Vol),2) as tpk21Vol,
                                            sum(e.tpkLbd) as tpkLbdQty,
                                            round(sum(e.tpkLbdVol),2) as tpkLbdVol,
                                            sum(e.tpkLba) as tpkLbaQty,
                                            round(sum(e.tpkLbaVol),2) as tpkLbaVol,
                                            sum(e.tpkTmp) as tpkTmpQty,
                                            round(sum(e.tpkTmpVol),2) as tpkTmpVol,
                                            sum(e.tpkTyn) as tpkTynQty,
                                            round(sum(e.tpkTynVol),2) as tpkTynVol,
                                            sum(e.tpn)+sum(e.tpk21)+sum(e.tpkLbd)+sum(e.tpkLba)+sum(e.tpkTmp)+sum(e.tpkTyn) as totalQty,
                                            round(sum(e.tpnVol)+sum(e.tpk21Vol)+sum(e.tpkLbdVol)+sum(e.tpkLbaVol)+sum(e.tpkTmpVol)+sum(e.tpkTynVol),2) as totalVol
                                            
                                        FROM (SELECT a.thn_produksi_tpn,
                                              CASE WHEN a.lokasi_tpn = '001' THEN 1 ELSE 0 END as tpn,
                                              CASE WHEN a.lokasi_tpn = '001' THEN a.vol ELSE 0 END as tpnVol,
                                              CASE WHEN a.lokasi_tpn = '609' THEN 1 ELSE 0 END as tpk21,
                                              CASE WHEN a.lokasi_tpn = '609' THEN a.vol ELSE 0 END as tpk21Vol,                                              
                                              CASE WHEN a.lokasi_tpn = '710' THEN 1 ELSE 0 END as tpkLbd,
                                              CASE WHEN a.lokasi_tpn = '710' THEN a.vol ELSE 0 END as tpkLbdVol,
                                              CASE WHEN a.lokasi_tpn = '711' THEN 1 ELSE 0 END as tpkLba,
                                              CASE WHEN a.lokasi_tpn = '711' THEN a.vol ELSE 0 END as tpkLbaVol,
                                              CASE WHEN a.lokasi_tpn = '720' THEN 1 ELSE 0 END as tpkTmp,
                                              CASE WHEN a.lokasi_tpn = '720' THEN a.vol ELSE 0 END as tpkTmpVol,
                                              CASE WHEN a.lokasi_tpn = '740' THEN 1 ELSE 0 END as tpkTyn,
                                              CASE WHEN a.lokasi_tpn = '740' THEN a.vol ELSE 0 END as tpkTynVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = 'CKD' and a.tgl_input_tpn <= '$request->tgl_laporan'
                                              UNION ALL
                                              SELECT tdti.thn_produksi_tpn,
                                                   CASE WHEN tdp.to_lokasi = '001' THEN 1 ELSE 0 END as tpn,
                                                   CASE WHEN tdp.to_lokasi = '001' THEN tdti.vol ELSE 0 END as tpnVol,
                                                   CASE WHEN tdp.to_lokasi = '609' THEN 1 ELSE 0 END as tpk21,
                                                   CASE WHEN tdp.to_lokasi = '609' THEN tdti.vol ELSE 0 END as tpk21Vol,
                                                   CASE WHEN tdp.to_lokasi = '710' THEN 1 ELSE 0 END as tpkLbd,
                                                   CASE WHEN tdp.to_lokasi = '710' THEN tdti.vol ELSE 0 END as tpkLbdVol,
                                                   CASE WHEN tdp.to_lokasi = '711' THEN 1 ELSE 0 END as tpkLba,
                                                   CASE WHEN tdp.to_lokasi = '711' THEN tdti.vol ELSE 0 END as tpkLbaVol,
                                                   CASE WHEN tdp.to_lokasi = '720' THEN 1 ELSE 0 END as tpkTmp,
                                                   CASE WHEN tdp.to_lokasi = '720' THEN tdti.vol ELSE 0 END as tpkTmpVol,
                                                   CASE WHEN tdp.to_lokasi = '740' THEN 1 ELSE 0 END as tpkTyn,
                                                   CASE WHEN tdp.to_lokasi = '740' THEN tdti.vol ELSE 0 END as tpkTynVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = 'CKD' and tdp.tgl_input <= '$request->tgl_laporan') e
                                              GROUP BY e.thn_produksi_tpn
                                        "));

        $arrayCkd = json_decode(json_encode($getSelCkd), true);

        $getSel = DB::select(DB::raw("SELECT e.thn_produksi_tpn as thnprod,
                                            sum(e.tpn) as tpnQty,
                                            round(sum(e.tpnVol),2) as tpnVol,
                                            sum(e.tpk31)+sum(e.tpk24)+sum(e.tpkMd)+sum(e.tpkMa) as tpkGabQty,
                                            round(sum(e.tpk31Vol)+sum(e.tpk24Vol)+sum(e.tpkMdVol)+sum(e.tpkMaVol),2) as tpkGabVol,
                                            sum(e.tpkLbd) as tpkLbdQty,
                                            round(sum(e.tpkLbdVol),2) as tpkLbdVol,
                                            sum(e.tpkLba) as tpkLbaQty,
                                            round(sum(e.tpkLbaVol),2) as tpkLbaVol,
                                            sum(e.tpkTmp) as tpkTmpQty,
                                            round(sum(e.tpkTmpVol),2) as tpkTmpVol,
                                            sum(e.tpkTyn) as tpkTynQty,
                                            round(sum(e.tpkTynVol),2) as tpkTynVol,
                                            sum(e.tpn)+sum(e.tpk31)+sum(e.tpk24)+sum(e.tpkMd)+sum(e.tpkMa)+sum(e.tpkLbd)+sum(e.tpkLba)+sum(e.tpkTmp)+sum(e.tpkTyn) as totalQty,
                                            round(sum(e.tpnVol)+sum(e.tpk31Vol)+sum(e.tpk24Vol)+sum(e.tpkMdVol)+sum(e.tpkMaVol)+sum(e.tpkLbdVol)+sum(e.tpkLbaVol)+sum(e.tpkTmpVol)+sum(e.tpkTynVol),2) as totalVol
                                            
                                        FROM (SELECT a.thn_produksi_tpn,
                                              CASE WHEN a.lokasi_tpn = '002' THEN 1 ELSE 0 END as tpn,
                                              CASE WHEN a.lokasi_tpn = '002' THEN a.vol ELSE 0 END as tpnVol,
                                              CASE WHEN a.lokasi_tpn = '603' THEN 1 ELSE 0 END as tpk31,
                                              CASE WHEN a.lokasi_tpn = '603' THEN a.vol ELSE 0 END as tpk31Vol,
                                              CASE WHEN a.lokasi_tpn = '605' THEN 1 ELSE 0 END as tpk24,
                                              CASE WHEN a.lokasi_tpn = '605' THEN a.vol ELSE 0 END as tpk24Vol,
                                              CASE WHEN a.lokasi_tpn = '610' THEN 1 ELSE 0 END as tpkMd,
                                              CASE WHEN a.lokasi_tpn = '610' THEN a.vol ELSE 0 END as tpkMdVol,
                                              CASE WHEN a.lokasi_tpn = '611' THEN 1 ELSE 0 END as tpkMa,
                                              CASE WHEN a.lokasi_tpn = '611' THEN a.vol ELSE 0 END as tpkMaVol,
                                              CASE WHEN a.lokasi_tpn = '710' THEN 1 ELSE 0 END as tpkLbd,
                                              CASE WHEN a.lokasi_tpn = '710' THEN a.vol ELSE 0 END as tpkLbdVol,
                                              CASE WHEN a.lokasi_tpn = '711' THEN 1 ELSE 0 END as tpkLba,
                                              CASE WHEN a.lokasi_tpn = '711' THEN a.vol ELSE 0 END as tpkLbaVol,
                                              CASE WHEN a.lokasi_tpn = '720' THEN 1 ELSE 0 END as tpkTmp,
                                              CASE WHEN a.lokasi_tpn = '720' THEN a.vol ELSE 0 END as tpkTmpVol,
                                              CASE WHEN a.lokasi_tpn = '740' THEN 1 ELSE 0 END as tpkTyn,
                                              CASE WHEN a.lokasi_tpn = '740' THEN a.vol ELSE 0 END as tpkTynVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = 'USP' and a.tgl_input_tpn <= '$request->tgl_laporan'
                                              UNION ALL
                                              SELECT tdti.thn_produksi_tpn,
                                                   CASE WHEN tdp.to_lokasi = '002' THEN 1 ELSE 0 END as tpn,
                                                   CASE WHEN tdp.to_lokasi = '002' THEN tdti.vol ELSE 0 END as tpnVol,
                                                   CASE WHEN tdp.to_lokasi = '603' THEN 1 ELSE 0 END as tpk31,
                                                   CASE WHEN tdp.to_lokasi = '603' THEN tdti.vol ELSE 0 END as tpk31Vol,
                                                   CASE WHEN tdp.to_lokasi = '605' THEN 1 ELSE 0 END as tpk24,
                                                   CASE WHEN tdp.to_lokasi = '605' THEN tdti.vol ELSE 0 END as tpk24Vol,
                                                   CASE WHEN tdp.to_lokasi = '610' THEN 1 ELSE 0 END as tpkMd,
                                                   CASE WHEN tdp.to_lokasi = '610' THEN tdti.vol ELSE 0 END as tpkMdVol,
                                                   CASE WHEN tdp.to_lokasi = '611' THEN 1 ELSE 0 END as tpkMa,
                                                   CASE WHEN tdp.to_lokasi = '611' THEN tdti.vol ELSE 0 END as tpkMaVol,
                                                   CASE WHEN tdp.to_lokasi = '710' THEN 1 ELSE 0 END as tpkLbd,
                                                   CASE WHEN tdp.to_lokasi = '710' THEN tdti.vol ELSE 0 END as tpkLbdVol,
                                                   CASE WHEN tdp.to_lokasi = '711' THEN 1 ELSE 0 END as tpkLba,
                                                   CASE WHEN tdp.to_lokasi = '711' THEN tdti.vol ELSE 0 END as tpkLbaVol,
                                                   CASE WHEN tdp.to_lokasi = '720' THEN 1 ELSE 0 END as tpkTmp,
                                                   CASE WHEN tdp.to_lokasi = '720' THEN tdti.vol ELSE 0 END as tpkTmpVol,
                                                   CASE WHEN tdp.to_lokasi = '740' THEN 1 ELSE 0 END as tpkTyn,
                                                   CASE WHEN tdp.to_lokasi = '740' THEN tdti.vol ELSE 0 END as tpkTynVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = 'USP' and tdp.tgl_input <= '$request->tgl_laporan') e
                                              GROUP BY e.thn_produksi_tpn
                                        "));

        $array = json_decode(json_encode($getSel), true);

        $getSelGab = DB::select(DB::raw("SELECT e.thn_produksi_tpn as thnprod,
                                            sum(e.tpnCkd)+sum(e.tpnUsp) as tpnQty,
                                            round(sum(e.tpnCkdVol)+sum(e.tpnUspVol),2) as tpnVol,
                                            sum(e.tpk21)+sum(e.tpk31)+sum(e.tpk24)+sum(e.tpkMd)+sum(e.tpkMa) as tpkGabQty,
                                            round(sum(e.tpk21Vol)+sum(e.tpk31Vol)+sum(e.tpk24Vol)+sum(e.tpkMdVol)+sum(e.tpkMaVol),2) as tpkGabVol,
                                            sum(e.tpkLbd) as tpkLbdQty,
                                            round(sum(e.tpkLbdVol),2) as tpkLbdVol,
                                            sum(e.tpkLba) as tpkLbaQty,
                                            round(sum(e.tpkLbaVol),2) as tpkLbaVol,
                                            sum(e.tpkTmp) as tpkTmpQty,
                                            round(sum(e.tpkTmpVol),2) as tpkTmpVol,
                                            sum(e.tpkTyn) as tpkTynQty,
                                            round(sum(e.tpkTynVol),2) as tpkTynVol,
                                            sum(e.tpnCkd)+sum(e.tpnUsp)+sum(e.tpk21)+sum(e.tpk31)+sum(e.tpk24)+sum(e.tpkMd)+sum(e.tpkMa)+sum(e.tpkLbd)+sum(e.tpkLba)+sum(e.tpkTmp)+sum(e.tpkTyn) as totalQty,
                                            round(sum(e.tpnCkdVol)+sum(e.tpnUspVol)+sum(e.tpk21Vol)+sum(e.tpk31Vol)+sum(e.tpk24Vol)+sum(e.tpkMdVol)+sum(e.tpkMaVol)+sum(e.tpkLbdVol)+sum(e.tpkLbaVol)+sum(e.tpkTmpVol)+sum(e.tpkTynVol),2) as totalVol
                                            
                                        FROM (SELECT a.thn_produksi_tpn,
                                              CASE WHEN a.lokasi_tpn = '001' THEN 1 ELSE 0 END as tpnCkd,
                                              CASE WHEN a.lokasi_tpn = '001' THEN a.vol ELSE 0 END as tpnCkdVol,
                                              CASE WHEN a.lokasi_tpn = '002' THEN 1 ELSE 0 END as tpnUsp,
                                              CASE WHEN a.lokasi_tpn = '002' THEN a.vol ELSE 0 END as tpnUspVol,
                                              CASE WHEN a.lokasi_tpn = '609' THEN 1 ELSE 0 END as tpk21,
                                              CASE WHEN a.lokasi_tpn = '609' THEN a.vol ELSE 0 END as tpk21Vol,
                                              CASE WHEN a.lokasi_tpn = '603' THEN 1 ELSE 0 END as tpk31,
                                              CASE WHEN a.lokasi_tpn = '603' THEN a.vol ELSE 0 END as tpk31Vol,
                                              CASE WHEN a.lokasi_tpn = '605' THEN 1 ELSE 0 END as tpk24,
                                              CASE WHEN a.lokasi_tpn = '605' THEN a.vol ELSE 0 END as tpk24Vol,
                                              CASE WHEN a.lokasi_tpn = '610' THEN 1 ELSE 0 END as tpkMd,
                                              CASE WHEN a.lokasi_tpn = '610' THEN a.vol ELSE 0 END as tpkMdVol,
                                              CASE WHEN a.lokasi_tpn = '611' THEN 1 ELSE 0 END as tpkMa,
                                              CASE WHEN a.lokasi_tpn = '611' THEN a.vol ELSE 0 END as tpkMaVol,
                                              CASE WHEN a.lokasi_tpn = '710' THEN 1 ELSE 0 END as tpkLbd,
                                              CASE WHEN a.lokasi_tpn = '710' THEN a.vol ELSE 0 END as tpkLbdVol,
                                              CASE WHEN a.lokasi_tpn = '711' THEN 1 ELSE 0 END as tpkLba,
                                              CASE WHEN a.lokasi_tpn = '711' THEN a.vol ELSE 0 END as tpkLbaVol,
                                              CASE WHEN a.lokasi_tpn = '720' THEN 1 ELSE 0 END as tpkTmp,
                                              CASE WHEN a.lokasi_tpn = '720' THEN a.vol ELSE 0 END as tpkTmpVol,
                                              CASE WHEN a.lokasi_tpn = '740' THEN 1 ELSE 0 END as tpkTyn,
                                              CASE WHEN a.lokasi_tpn = '740' THEN a.vol ELSE 0 END as tpkTynVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = 'USP' and a.tgl_input_tpn <= '$request->tgl_laporan'
                                              UNION ALL
                                              SELECT tdti.thn_produksi_tpn,
                                                   CASE WHEN tdp.to_lokasi = '001' THEN 1 ELSE 0 END as tpnCkd,
                                                   CASE WHEN tdp.to_lokasi = '001' THEN tdti.vol ELSE 0 END as tpnCkdVol,
                                                   CASE WHEN tdp.to_lokasi = '002' THEN 1 ELSE 0 END as tpnUsp,
                                                   CASE WHEN tdp.to_lokasi = '002' THEN tdti.vol ELSE 0 END as tpnUspVol,
                                                   CASE WHEN tdp.to_lokasi = '609' THEN 1 ELSE 0 END as tpk21,
                                                   CASE WHEN tdp.to_lokasi = '609' THEN tdti.vol ELSE 0 END as tpk21Vol,
                                                   CASE WHEN tdp.to_lokasi = '603' THEN 1 ELSE 0 END as tpk31,
                                                   CASE WHEN tdp.to_lokasi = '603' THEN tdti.vol ELSE 0 END as tpk31Vol,
                                                   CASE WHEN tdp.to_lokasi = '605' THEN 1 ELSE 0 END as tpk24,
                                                   CASE WHEN tdp.to_lokasi = '605' THEN tdti.vol ELSE 0 END as tpk24Vol,
                                                   CASE WHEN tdp.to_lokasi = '610' THEN 1 ELSE 0 END as tpkMd,
                                                   CASE WHEN tdp.to_lokasi = '610' THEN tdti.vol ELSE 0 END as tpkMdVol,
                                                   CASE WHEN tdp.to_lokasi = '611' THEN 1 ELSE 0 END as tpkMa,
                                                   CASE WHEN tdp.to_lokasi = '611' THEN tdti.vol ELSE 0 END as tpkMaVol,
                                                   CASE WHEN tdp.to_lokasi = '710' THEN 1 ELSE 0 END as tpkLbd,
                                                   CASE WHEN tdp.to_lokasi = '710' THEN tdti.vol ELSE 0 END as tpkLbdVol,
                                                   CASE WHEN tdp.to_lokasi = '711' THEN 1 ELSE 0 END as tpkLba,
                                                   CASE WHEN tdp.to_lokasi = '711' THEN tdti.vol ELSE 0 END as tpkLbaVol,
                                                   CASE WHEN tdp.to_lokasi = '720' THEN 1 ELSE 0 END as tpkTmp,
                                                   CASE WHEN tdp.to_lokasi = '720' THEN tdti.vol ELSE 0 END as tpkTmpVol,
                                                   CASE WHEN tdp.to_lokasi = '740' THEN 1 ELSE 0 END as tpkTyn,
                                                   CASE WHEN tdp.to_lokasi = '740' THEN tdti.vol ELSE 0 END as tpkTynVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = 'USP' and tdp.tgl_input <= '$request->tgl_laporan') e
                                              GROUP BY e.thn_produksi_tpn
                                        "));

        $arrayGab = json_decode(json_encode($getSelGab), true);

        if($request->jnsLap == "xls")
        {
            $fileNm = "STOK KAYU ".$request->hph." ".$stDt.".xlsx";
            return Excel::download(new UserExport($request->hph,$request->tgl_laporan,$thnProd,$arrayCkd,$array,$arrayGab), $fileNm);
        }else{
            return redirect()->route('rptStokKayu',[$request->hph])
                            ->with('hph', $request->hph)
                            ->with('tgl_laporan', $request->tgl_laporan)
                            ->with('thn_produksi', $thnProd)
                            ->with('getSelCkd', $arrayCkd)
                            ->with('getSel', $array)
                            ->with('getSelGab', $arrayGab);
        }
    }    

    public function rptStokKayu(Request $request)
    {

        $data['title'] = 'Stok Kayu';
        return view('reporting/rptStokKayu', $data);
    }

    public static function getQtyKayuTpn($hph,$tgl_laporan,$lok,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));
        // echo $stDt;

        $getKy = TrDetailTpn::where('hph', $hph)
                            ->where('lokasi_tpn',$lok)
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->get(['no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuTpn($hph,$tgl_laporan,$lok,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));

        $getVol = TrDetailTpn::where('hph', $hph)
                            ->where('lokasi_tpn',$lok)
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->sum('vol');
        if($getVol > 0) {
            $decimals = 2;
            $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayu($hph,$tgl_laporan,$lok,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));
        // echo $stDt;

        $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tr_detail_position.to_lokasi',$lok)
                                // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                ->where('tdti.jns_kayu',$jnsKy)
                                ->where('tr_detail_position.position','current')
                                ->get(['tr_detail_position.no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayu($hph,$tgl_laporan,$lok,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));

        $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tr_detail_position.to_lokasi',$lok)
                                // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                ->where('tdti.jns_kayu',$jnsKy)
                                ->where('tr_detail_position.position','current')
                                ->sum('tdti.vol');
        if($getVol > 0) {
            $decimals = 2;
            $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayuTpnPerThn($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));
        // echo $stDt;

        $getKy = TrDetailTpn::where('hph', $hph)
                            ->where('thn_produksi_tpn',$thnProd)
                            ->where('lokasi_tpn',$lok)
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->get(['no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuTpnPerThn($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));

        $getVol = TrDetailTpn::where('hph', $hph)
                            ->where('thn_produksi_tpn',$thnProd)
                            ->where('lokasi_tpn',$lok)
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->sum('vol');
        if($getVol > 0) {
            $decimals = 2;
            $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayuPerThn($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));
        // echo $stDt;

        $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tdti.thn_produksi_tpn',$thnProd)
                                ->where('tr_detail_position.to_lokasi',$lok)
                                // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                ->where('tdti.jns_kayu',$jnsKy)
                                ->where('tr_detail_position.position','current')
                                ->get(['tr_detail_position.no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuPerThn($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));

        $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tdti.thn_produksi_tpn',$thnProd)
                                ->where('tr_detail_position.to_lokasi',$lok)
                                // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                ->where('tdti.jns_kayu',$jnsKy)
                                ->where('tr_detail_position.position','current')
                                ->sum('tdti.vol');
        if($getVol > 0) {
            // $decimals = 2;
            // $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    //----------------------------//

    public static function getQtyKayuTpnAll($hph,$tgl_laporan,$lok,$jnsKy)
    {
        $pieces = explode("-", $lok);
        $pc1 = $pieces[0];
        $pc2 = $pieces[1];

        $getKy = TrDetailTpn::whereIn('lokasi_tpn',array($pc1, $pc2))
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->get(['no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuTpnAll($hph,$tgl_laporan,$lok,$jnsKy)
    {
        $pieces = explode("-", $lok);
        $pc1 = $pieces[0];
        $pc2 = $pieces[1];

        $getVol = TrDetailTpn::whereIn('lokasi_tpn',array($pc1, $pc2))
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->sum('vol');
        if($getVol > 0) {
            // $decimals = 2;
            // $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayuAll($hph,$tgl_laporan,$lok,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));
        // echo $stDt;
        if($lok == '609-610-611-603-605')
        {
            $pieces = explode("-", $lok);
            $pc1 = $pieces[0];
            $pc2 = $pieces[1];
            $pc3 = $pieces[2];
            $pc4 = $pieces[3];
            $pc5 = $pieces[4];

            $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->whereIn('tr_detail_position.to_lokasi',array($pc1, $pc2, $pc3, $pc4, $pc5))
                                    // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->get(['tr_detail_position.no_btg']);
        }else{
            $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->where('tr_detail_position.to_lokasi',$lok)
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->get(['tr_detail_position.no_btg']);
        }

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuAll($hph,$tgl_laporan,$lok,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));
        if($lok == '609-610-611-603-605')
        {
            $pieces = explode("-", $lok);
            $pc1 = $pieces[0];
            $pc2 = $pieces[1];
            $pc3 = $pieces[2];
            $pc4 = $pieces[3];
            $pc5 = $pieces[4];

            $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->whereIn('tr_detail_position.to_lokasi',array($pc1, $pc2, $pc3, $pc4, $pc5))
                                    // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->sum('tdti.vol');
        }else{
            $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->where('tr_detail_position.to_lokasi',$lok)
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->sum('tdti.vol');
        }
        if($getVol > 0) {
            // $decimals = 2;
            // $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayuTpnPerThnAll($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        $pieces = explode("-", $lok);
        $pc1 = $pieces[0];
        $pc2 = $pieces[1];

        $getKy = TrDetailTpn::where('thn_produksi_tpn',$thnProd)
                            ->whereIn('lokasi_tpn',array($pc1, $pc2))
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->get(['no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuTpnPerThnAll($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {        
        
        $pieces = explode("-", $lok);
        $pc1 = $pieces[0];
        $pc2 = $pieces[1];

        $getVol = TrDetailTpn::where('thn_produksi_tpn',$thnProd)
                            ->whereIn('lokasi_tpn',array($pc1, $pc2))
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->sum('vol');

        if($getVol > 0) {
            // $decimals = 2;
            // $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayuPerThnAll($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        if($lok == '609-610-611-603-605')
        {
            $pieces = explode("-", $lok);
            $pc1 = $pieces[0];
            $pc2 = $pieces[1];
            $pc3 = $pieces[2];
            $pc4 = $pieces[3];
            $pc5 = $pieces[4];

            $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->where('tdti.thn_produksi_tpn',$thnProd)
                                    ->whereIn('tr_detail_position.to_lokasi',array($pc1, $pc2, $pc3, $pc4, $pc5))
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->get(['tr_detail_position.no_btg']);
        }else{
            $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->where('tdti.thn_produksi_tpn',$thnProd)
                                    ->where('tr_detail_position.to_lokasi',$lok)
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->get(['tr_detail_position.no_btg']);
        }

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuPerThnAll($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        if($lok == '609-610-611-603-605')
        {
            $pieces = explode("-", $lok);
            $pc1 = $pieces[0];
            $pc2 = $pieces[1];
            $pc3 = $pieces[2];
            $pc4 = $pieces[3];
            $pc5 = $pieces[4];

            $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->where('tdti.thn_produksi_tpn',$thnProd)
                                    ->whereIn('tr_detail_position.to_lokasi',array($pc1, $pc2, $pc3, $pc4, $pc5))
                                    // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->sum('tdti.vol');
        }else{
            $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->where('tdti.thn_produksi_tpn',$thnProd)
                                    ->where('tr_detail_position.to_lokasi',$lok)
                                    // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->sum('tdti.vol');
        }
        if($getVol > 0) {
            // $decimals = 2;
            // $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    //------------------------Report Chainsaw Tracktor---------------------------------------------//

    public function rptChainTrack(Request $request)
    {

        $data['title'] = 'Hasil Chainsaw - Tracktor - Kupas';
        return view('reporting/rptChainTrack', $data);
    }

    public function rptChainTrack_rpt(Request $request)
    {   
        $pieces = explode("-", $request->tgl_laporan);
        $startDt = $pieces[0];
        $endDt = $pieces[1];
        $strDt = date("Y-m-d", strtotime($startDt));
        $eDt = date("Y-m-d", strtotime($endDt));
        $dateNow = Carbon::now();
        $stDt = date("d-m-Y", strtotime($dateNow));

        $getSel = DB::select(DB::raw("SELECT k.nama_kayu as namakayu,
                                            sum(e.timbul) as timbulQty,
                                            round(sum(e.timbulVol),2) as timbulVol,
                                            sum(e.tenggelam) as tenggelamQty,
                                            round(sum(e.tenggelamVol),2) as tenggelamVol,
                                            sum(e.timbul)+sum(e.tenggelam) as totalQty,
                                            round(sum(e.timbulVol)+sum(e.tenggelamVol),2) as totalVol
                                        FROM (SELECT a.jns_kayu,
                                              CASE WHEN a.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                              CASE WHEN a.timbul = 'YA' THEN a.vol ELSE 0 END as timbulVol,
                                              CASE WHEN a.timbul = 'NO' THEN 1 ELSE 0 END as tenggelam,
                                              CASE WHEN a.timbul = 'NO' THEN a.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = '$request->hph' and a.tgl_input_tpn >= '$strDt' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdti.jns_kayu as kode_kayu,
                                                   CASE WHEN tdti.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                                       CASE WHEN tdti.timbul = 'YA' THEN tdti.vol ELSE 0 END as timbulVol,
                                                       CASE WHEN tdti.timbul = 'NO' THEN 1 ELSE 0 END as tenggelam,
                                                       CASE WHEN tdti.timbul = 'NO' THEN tdti.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = '$request->hph' and tdp.tgl_input >= '$strDt' and tdp.tgl_input <= '$eDt') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        GROUP BY k.nama_kayu"));

        $array = json_decode(json_encode($getSel), true);

        $getSel2 = DB::select(DB::raw("SELECT k.nama_driver as namadriver,
                                            sum(e.timbul) as timbulQty,
                                            round(sum(e.timbulVol),2) as timbulVol,
                                            sum(e.tenggelam) as tenggelamQty,
                                            round(sum(e.tenggelamVol),2) as tenggelamVol,
                                            sum(e.timbul)+sum(e.tenggelam) as totalQty,
                                            round(sum(e.timbulVol)+sum(e.tenggelamVol),2) as totalVol
                                        FROM (SELECT a.kode_driver,
                                              CASE WHEN a.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                              CASE WHEN a.timbul = 'YA' THEN a.vol ELSE 0 END as timbulVol,
                                              CASE WHEN a.timbul = 'NO' THEN 1 ELSE 0 END as tenggelam,
                                              CASE WHEN a.timbul = 'NO' THEN a.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = '$request->hph' and a.tgl_input_tpn >= '$strDt' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdti.kode_driver as kode_driver,
                                                   CASE WHEN tdti.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                                       CASE WHEN tdti.timbul = 'YA' THEN tdti.vol ELSE 0 END as timbulVol,
                                                       CASE WHEN tdti.timbul = 'NO' THEN 1 ELSE 0 END as tenggelam,
                                                       CASE WHEN tdti.timbul = 'NO' THEN tdti.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = '$request->hph' and tdp.tgl_input >= '$strDt' and tdp.tgl_input <= '$eDt') e LEFT JOIN mstr_driver k ON e.kode_driver = k.kode_driver
                                        GROUP BY k.nama_driver"));

        $array2 = json_decode(json_encode($getSel2), true);

        $getSel3 = DB::select(DB::raw("SELECT k.nama_chainsaw as namachainsaw,
                                            sum(e.timbul) as timbulQty,
                                            round(sum(e.timbulVol),2) as timbulVol,
                                            sum(e.tenggelam) as tenggelamQty,
                                            round(sum(e.tenggelamVol),2) as tenggelamVol,
                                            sum(e.timbul)+sum(e.tenggelam) as totalQty,
                                            round(sum(e.timbulVol)+sum(e.tenggelamVol),2) as totalVol
                                        FROM (SELECT a.kode_chainsaw,
                                              CASE WHEN a.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                              CASE WHEN a.timbul = 'YA' THEN a.vol ELSE 0 END as timbulVol,
                                              CASE WHEN a.timbul = 'NO' THEN 1 ELSE 0 END as tenggelam,
                                              CASE WHEN a.timbul = 'NO' THEN a.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = '$request->hph' and a.tgl_input_tpn >= '$strDt' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdti.kode_chainsaw as kode_chainsaw,
                                                   CASE WHEN tdti.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                                       CASE WHEN tdti.timbul = 'YA' THEN tdti.vol ELSE 0 END as timbulVol,
                                                       CASE WHEN tdti.timbul = 'NO' THEN 1 ELSE 0 END as tenggelam,
                                                       CASE WHEN tdti.timbul = 'NO' THEN tdti.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = '$request->hph' and tdp.tgl_input >= '$strDt' and tdp.tgl_input <= '$eDt') e LEFT JOIN mstr_chainsaw k ON e.kode_chainsaw = k.kode_chainsaw
                                        GROUP BY k.nama_chainsaw"));

        $array3 = json_decode(json_encode($getSel3), true);

        $getSel4 = DB::select(DB::raw("SELECT k.nama_kupas as namakupas,
                                            sum(e.timbul) as timbulQty,
                                            round(sum(e.timbulVol),2) as timbulVol,
                                            sum(e.tenggelam) as tenggelamQty,
                                            round(sum(e.tenggelamVol),2) as tenggelamVol,
                                            sum(e.timbul)+sum(e.tenggelam) as totalQty,
                                            round(sum(e.timbulVol)+sum(e.tenggelamVol),2) as totalVol
                                        FROM (SELECT a.kode_kupas,
                                              CASE WHEN a.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                              CASE WHEN a.timbul = 'YA' THEN a.vol ELSE 0 END as timbulVol,
                                              CASE WHEN a.timbul = 'NO' THEN 1 ELSE 0 END as tenggelam,
                                              CASE WHEN a.timbul = 'NO' THEN a.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = '$request->hph' and a.tgl_input_tpn >= '$strDt' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdti.kode_kupas as kode_kupas,
                                                   CASE WHEN tdti.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                                       CASE WHEN tdti.timbul = 'YA' THEN tdti.vol ELSE 0 END as timbulVol,
                                                       CASE WHEN tdti.timbul = 'NO' THEN 1 ELSE 0 END as tenggelam,
                                                       CASE WHEN tdti.timbul = 'NO' THEN tdti.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = '$request->hph' and tdp.tgl_input >= '$strDt' and tdp.tgl_input <= '$eDt') e LEFT JOIN mstr_kupas k ON e.kode_kupas = k.kode_kupas
                                        GROUP BY k.nama_kupas"));

        $array4 = json_decode(json_encode($getSel4), true);
                        
        if($request->jnsLap == "xls")
        {
            $fileNm = "HASIL CHAINSAW, TRAKTOR, & KUPAS PT.".$request->hph." ".$stDt.".xlsx";
            return Excel::download(new UserExport_2($request->hph,$request->tgl_laporan,$request->thn_produksi,$array,$array2,$array3,$array4), $fileNm);
        }else{
            
            return redirect()->route('rptChainTrack',[$request->hph])
                            ->with('hph', $request->hph)
                            ->with('tgl_laporan', $request->tgl_laporan)
                            ->with('thn_produksi', $request->thn_produksi)
                            ->with('getSel', $array)
                            ->with('getSel2', $array2)
                            ->with('getSel3', $array3)
                            ->with('getSel4', $array4);
        }
    }        

    //------------------------Report Loglist---------------------------------------------//

    public function rptLoglistLoc(Request $request)
    {

        $data['title'] = 'Laporan Loglist';
        return view('reporting/rptLoglistLoc', $data);
    }

    public function rptLoglistLoc_rpt(Request $request)
    {   
        $dateNow = Carbon::now();
        $stDt = date("d-m-Y", strtotime($dateNow));

        $pieces = explode("-", $request->lokasi);
        $lokasi = $pieces[0];
        if($lokasi == "001" OR $lokasi == "002")
        {
            $s_lok = "a.lokasi_tpn = '".$lokasi."' and a.position = 'current'";
        }elseif($lokasi == "720" OR $lokasi == "740"){
            $s_lok = "b.to_lokasi = '".$lokasi."' and b.position = 'current'";
        }else{
            $s_lok = "b.hph = '".$pieces[1]."' and b.to_lokasi = '".$lokasi."' and b.position = 'current'";
        }

        $getSel = DB::select(DB::raw("SELECT a.*, mk.nama_kayu as mk, mc.nama_chainsaw as mc, md.nama_driver as md FROM tr_detail_tpn_in a
                                        LEFT JOIN tr_detail_position b ON b.id_detail_tpn_in = a.id_detail_tpn_in
                                        LEFT JOIN mstr_kayu as mk ON a.jns_kayu = mk.kode_kayu
                                        LEFT JOIN mstr_chainsaw as mc ON a.kode_chainsaw = mc.kode_chainsaw
                                        LEFT JOIN mstr_driver as md ON a.kode_driver = md.kode_driver
                                        WHERE ".$s_lok.";"));

        $array = json_decode(json_encode($getSel), true);

        $getNmLok = Lokasi::where('kode_lokasi','=',$lokasi)
                            ->get(['nama_lokasi']);
        
        if($request->jnsLap == "xls")
        {
            $fileNm = "Laporan Loglist Lokasi ".$getNmLok[0]['nama_lokasi']."-".$pieces[1]." ".$stDt.".xlsx";
            return Excel::download(new UserExport_3($getNmLok[0]['nama_lokasi'],$array,$pieces[1]), $fileNm);
        }else{
            
            return redirect()->route('rptLoglistLoc',[$request->hph])
                            ->with('lokasi', $getNmLok[0]['nama_lokasi'])
                            ->with('hph', $pieces[1])
                            ->with('getSel', $array);
        }
    }

    //------------------------Report Stok Lokasi---------------------------------------------//

    public function rptStokLoc(Request $request)
    {
        $dateNow = Carbon::now();
        $dtNow = date("Y-m-d", strtotime($dateNow));
        $data['title'] = 'Stok Per Lokasi';
        return view('reporting/rptStokLoc', $data,compact('dtNow'));
    }

    public function rptStokLoc_rpt(Request $request)
    {   
        // $pieces = explode("-", $request->tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $strDt = date("Y-m-d", strtotime($startDt));
        $eDt = date("Y-m-d", strtotime($request->tgl_laporan));
        $dateNow = Carbon::now();
        $stDt = date("d-m-Y", strtotime($dateNow));

        $lokasi = $request->lokasi;
        // if($lokasi == "001" OR $lokasi == "002")
        // {
        //     $s_lok = "a.lokasi_tpn = '".$lokasi."' and a.position = 'current'";
        // }else{
        //     $s_lok = "b.to_lokasi = '".$lokasi."' and b.position = 'current'";
        // }

        $getSel = DB::select(DB::raw("SELECT k.nama_kayu as namakayu,
                                            sum(e.low) as lowQty,
                                            round(sum(e.lowVol),2) as lowVol,
                                            sum(e.middle) as middleQty,
                                            round(sum(e.middleVol),2) as middleVol,
                                            sum(e.high) as highQty,
                                            round(sum(e.highVol),2) as highVol,
                                            sum(e.low)+sum(e.middle)+sum(e.high) as totalQty,
                                            round(sum(e.lowVol)+sum(e.middleVol)+sum(e.highVol),2) as totalVol
                                        FROM (SELECT a.jns_kayu,
                                              CASE WHEN a.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                              CASE WHEN a.kelas = '40-49' THEN a.vol ELSE 0 END as lowVol,
                                              CASE WHEN a.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                              CASE WHEN a.kelas = '50-59' THEN a.vol ELSE 0 END as middleVol,
                                              CASE WHEN a.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                              CASE WHEN a.kelas = '60 Up' THEN a.vol ELSE 0 END as highVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.lokasi_tpn = '$lokasi' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdti.jns_kayu as kode_kayu,
                                                   CASE WHEN tdti.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                                       CASE WHEN tdti.kelas = '40-49' THEN tdti.vol ELSE 0 END as lowVol,
                                                       CASE WHEN tdti.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                                       CASE WHEN tdti.kelas = '50-59' THEN tdti.vol ELSE 0 END as middleVol,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN tdti.vol ELSE 0 END as highVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.to_lokasi = '$lokasi' and tdp.tgl_input <= '$eDt') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        GROUP BY k.nama_kayu"));

        $array = json_decode(json_encode($getSel), true);

        $getNmLok = Lokasi::where('kode_lokasi','=',$request->lokasi)
                            ->get(['nama_lokasi']);
        
        if($request->jnsLap == "xls")
        {
            $fileNm = "Stok Per Lokasi ".$getNmLok[0]['nama_lokasi']." ".$stDt.".xlsx";
            return Excel::download(new UserExport_4($getNmLok[0]['nama_lokasi'],$request->tgl_laporan,$array), $fileNm);
        }else{
            
            return redirect()->route('rptStokLoc',[$request->lokasi])
                            ->with('lokasi', $getNmLok[0]['nama_lokasi'])
                            ->with('tgl_laporan', $request->tgl_laporan)
                            ->with('getSel', $array);
        }
    }

    //------------------------Report Rekap Hauling---------------------------------------------//

    public function rptRekapHauling(Request $request)
    {
        $dateNow = Carbon::now();
        $dtNow = date("Y-m-d", strtotime($dateNow));
        $data['title'] = 'Rekap Hauling';
        return view('reporting/rptRekapHauling', $data);
    }

    public function rptRekapHauling_rpt(Request $request)
    {   
        $pieces = explode("-", $request->tgl_laporan);
        $startDt = $pieces[0];
        $endDt = $pieces[1];
        $strDt = date("Y-m-d", strtotime($startDt));
        $eDt = date("Y-m-d", strtotime($endDt));
        $dateNow = Carbon::now();
        $stDt = date("d-m-Y", strtotime($dateNow));

        $lokasi = $request->lokasi;
        // if($lokasi == "001" OR $lokasi == "002")
        // {
        //     $s_lok = "a.lokasi_tpn = '".$lokasi."' and a.position = 'current'";
        // }else{
        //     $s_lok = "b.to_lokasi = '".$lokasi."' and b.position = 'current'";
        // }

        $getSel = DB::select(DB::raw("SELECT k.nama_kayu as namakayu,
                                            sum(e.low) as lowQty,
                                            round(sum(e.lowVol),2) as lowVol,
                                            sum(e.middle) as middleQty,
                                            round(sum(e.middleVol),2) as middleVol,
                                            sum(e.high) as highQty,
                                            round(sum(e.highVol),2) as highVol,
                                            sum(e.low)+sum(e.middle)+sum(e.high) as totalQty,
                                            round(sum(e.lowVol)+sum(e.middleVol)+sum(e.highVol),2) as totalVol
                                        FROM (SELECT a.jns_kayu,
                                              CASE WHEN a.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                              CASE WHEN a.kelas = '40-49' THEN a.vol ELSE 0 END as lowVol,
                                              CASE WHEN a.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                              CASE WHEN a.kelas = '50-59' THEN a.vol ELSE 0 END as middleVol,
                                              CASE WHEN a.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                              CASE WHEN a.kelas = '60 Up' THEN a.vol ELSE 0 END as highVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.lokasi_tpn = '$lokasi' and a.tgl_input_tpn >= '$strDt' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdti.jns_kayu as kode_kayu,
                                                   CASE WHEN tdti.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                                       CASE WHEN tdti.kelas = '40-49' THEN tdti.vol ELSE 0 END as lowVol,
                                                       CASE WHEN tdti.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                                       CASE WHEN tdti.kelas = '50-59' THEN tdti.vol ELSE 0 END as middleVol,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN tdti.vol ELSE 0 END as highVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.to_lokasi = '$lokasi' and tdp.tgl_input >= '$strDt' and tdp.tgl_input <= '$eDt') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        GROUP BY k.nama_kayu"));

        $array = json_decode(json_encode($getSel), true);

        $getNmLok = Lokasi::where('kode_lokasi','=',$request->lokasi)
                            ->get(['nama_lokasi']);
        
        if($request->jnsLap == "xls")
        {
            $fileNm = "Rekap Hauling ".$getNmLok[0]['nama_lokasi']." ".$stDt.".xlsx";
            return Excel::download(new UserExport_6($getNmLok[0]['nama_lokasi'],$request->tgl_laporan,$array), $fileNm);
        }else{
            
            return redirect()->route('rptRekapHauling',[$request->lokasi])
                            ->with('lokasi', $getNmLok[0]['nama_lokasi'])
                            ->with('tgl_laporan', $request->tgl_laporan)
                            ->with('getSel', $array);
        }
    }

    //------------------------Report Rekap Tongkang---------------------------------------------//

    public function rptRekapTkg(Request $request)
    {
        $dateNow = Carbon::now();
        $dtNow = date("Y-m-d", strtotime($dateNow));
        $driver =  Driver::where('kode_driver','>=',500)->get();
        $data['title'] = 'Rekap Penerimaan Tongkang';
        return view('reporting/rptRekapTkg', $data,compact('dtNow','driver'));
    }

    public function rptRekapTkg_rpt(Request $request)
    {   
        // $pieces = explode("-", $request->tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $strDt = date("Y-m-d", strtotime($startDt));
        $eDt = date("Y-m-d", strtotime($request->tgl_laporan));
        $dateNow = Carbon::now();
        $stDt = date("d-m-Y", strtotime($dateNow));

        $lokasi = $request->lokasi;

        $getSel = DB::select(DB::raw("SELECT k.nama_kayu as namakayu,
                                            sum(e.low) as lowQty,
                                            round(sum(e.lowVol),2) as lowVol,
                                            sum(e.middle) as middleQty,
                                            round(sum(e.middleVol),2) as middleVol,
                                            sum(e.high) as highQty,
                                            round(sum(e.highVol),2) as highVol,
                                            sum(e.low)+sum(e.middle)+sum(e.high) as totalQty,
                                            round(sum(e.lowVol)+sum(e.middleVol)+sum(e.highVol),2) as totalVol
                                        FROM (SELECT tdti.jns_kayu,
                                                   CASE WHEN tdti.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                                       CASE WHEN tdti.kelas = '40-49' THEN tdti.vol ELSE 0 END as lowVol,
                                                       CASE WHEN tdti.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                                       CASE WHEN tdti.kelas = '50-59' THEN tdti.vol ELSE 0 END as middleVol,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN tdti.vol ELSE 0 END as highVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg 
                                              LEFT JOIN tr_header_tpn_out thto ON tdp.id_header = thto.id_header_tpn_out 
                                              WHERE tdp.position = 'current' and tdp.to_lokasi = '800' and tdp.tgl_input <= '$eDt' and thto.muatUnit = '$request->muatUnit') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        GROUP BY k.nama_kayu"));

        $array = json_decode(json_encode($getSel), true);

        $getNmTkg = Driver::where('kode_driver','=',$request->muatUnit)
                            ->get(['nama_driver']);
        
        if($request->jnsLap == "xls")
        {
            $fileNm = "Rekap Penerimaan Tongkang ".$getNmTkg[0]['nama_driver']." ".$stDt.".xlsx";
            return Excel::download(new UserExport_5($getNmTkg[0]['nama_driver'],$request->tgl_laporan,$array), $fileNm);
        }else{
            
            return redirect()->route('rptRekapTkg',[])
                            ->with('muatUnit', $request->muatUnit)
                            ->with('namaTkg', $getNmTkg[0]['nama_driver'])
                            ->with('tgl_laporan', $request->tgl_laporan)
                            ->with('getSel', $array);
        }
    }

    //------------ Logout -----------------------------------------------------//

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
