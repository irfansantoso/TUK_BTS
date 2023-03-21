<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('view', function () {
//     return view('view', ['title' => '']);
// })->name('view');
Route::get('/', function () {
    return view('login', ['title' => '']);
})->name('login');
Route::get('login', [UserController::class, 'login_action'])->name('login.action');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('home', [UserController::class, 'home'])->name('home')->middleware('auth');
Route::get('register',[UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('users',[UserController::class, 'users'])->name('users')->middleware('auth');
Route::post('users', [UserController::class, 'users_add'])->name('users.add')->middleware('auth');
Route::get('profile',[UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('profile', [UserController::class, 'profile_edit'])->name('profile.edit')->middleware('auth');
Route::get('lokasi',[UserController::class, 'lokasi'])->name('lokasi')->middleware('auth');
Route::post('lokasi', [UserController::class, 'lokasi_add'])->name('lokasi.add')->middleware('auth');
Route::get('tongkang',[UserController::class, 'tongkang'])->name('tongkang')->middleware('auth');
Route::post('tongkang', [UserController::class, 'tongkang_add'])->name('tongkang.add')->middleware('auth');
Route::get('kayu',[UserController::class, 'kayu'])->name('kayu')->middleware('auth');
Route::post('kayu', [UserController::class, 'kayu_add'])->name('kayu.add')->middleware('auth');
Route::get('driver',[UserController::class, 'driver'])->name('driver')->middleware('auth');
Route::post('driver', [UserController::class, 'driver_add'])->name('driver.add')->middleware('auth');
Route::get('unitAlat',[UserController::class, 'unitAlat'])->name('unitAlat')->middleware('auth');
Route::post('unitAlat', [UserController::class, 'unitAlat_add'])->name('unitAlat.add')->middleware('auth');
Route::get('chainsaw',[UserController::class, 'chainsaw'])->name('chainsaw')->middleware('auth');
Route::post('chainsaw', [UserController::class, 'chainsaw_add'])->name('chainsaw.add')->middleware('auth');
Route::get('kupas',[UserController::class, 'kupas'])->name('kupas')->middleware('auth');
Route::post('kupas', [UserController::class, 'kupas_add'])->name('kupas.add')->middleware('auth');
Route::get('keperluan',[UserController::class, 'keperluan'])->name('keperluan')->middleware('auth');
Route::get('helper',[UserController::class, 'helper'])->name('helper')->middleware('auth');
Route::post('helper', [UserController::class, 'helper_add'])->name('helper.add')->middleware('auth');
Route::post('keperluan', [UserController::class, 'keperluan_add'])->name('keperluan.add')->middleware('auth');
Route::get('trHistory',[UserController::class, 'trHistory'])->name('trHistory')->middleware('auth');
Route::get('trHistory/json', [UserController::class, 'trHistory_data'])->name('trHistory.data')->middleware('auth');
Route::get('periodeOperasional',[UserController::class, 'periodeOperasional'])->name('periodeOperasional')->middleware('auth');
Route::post('periodeOperasional', [UserController::class, 'periodeOperasional_add'])->name('periodeOperasional.add')->middleware('auth');
Route::get('periodeOperasional/{id_periode}', [UserController::class, 'periodeOperasional_actived'])->name('periodeOperasional.actived')->middleware('auth');

// --------- CKD --------------------//
Route::get('trHeaderTpnCkd',[UserController::class, 'trHeaderTpnCkd'])->name('trHeaderTpnCkd')->middleware('auth');
Route::get('trHeaderTpnCkd/json', [UserController::class, 'trHeaderTpnCkd_data'])->name('trHeaderTpnCkd.data')->middleware('auth');
Route::post('trHeaderTpnCkd', [UserController::class, 'trHeaderTpnCkd_add'])->name('trHeaderTpnCkd.add')->middleware('auth');
Route::post('trHeaderTpnCkd/delete/', [UserController::class, 'trHeaderTpnCkdDestroy_del'])->name('trHeaderTpnCkdDestroy.del')->middleware('auth');

Route::get('trDetailTpnCkd/{id_header_tpn_in}', [UserController::class, 'trDetailTpnCkd'])->name('trDetailTpnCkd')->middleware('auth');
Route::post('trDetailTpnCkd', [UserController::class, 'trDetailTpnCkd_add'])->name('trDetailTpnCkd.add')->middleware('auth');
// Route::post('trDetailTpnCkd/{id_header_tpn_in}', [UserController::class, 'trDetailTpnCkd'])->name('trDetailTpnCkd')->middleware('auth');
Route::post('trDetailTpnCkd/edit', [UserController::class, 'trDetailTpnCkd_edit'])->name('trDetailTpnCkd.edit')->middleware('auth');
Route::post('trDetailTpnCkd/delete/', [UserController::class, 'trDetailTpnCkd_del'])->name('trDetailTpnCkd.del')->middleware('auth');

Route::get('trHeaderTpnCkdOut',[UserController::class, 'trHeaderTpnCkdOut'])->name('trHeaderTpnCkdOut')->middleware('auth');
Route::get('trHeaderTpnCkdOut/json', [UserController::class, 'trHeaderTpnCkdOut_data'])->name('trHeaderTpnCkdOut.data')->middleware('auth');
Route::post('trHeaderTpnCkdOut', [UserController::class, 'trHeaderTpnCkdOut_add'])->name('trHeaderTpnCkdOut.add')->middleware('auth');
Route::post('trHeaderTpnCkdOut/delete/', [UserController::class, 'trHeaderTpnCkdOutDestroy_del'])->name('trHeaderTpnCkdOutDestroy.del')->middleware('auth');

Route::get('trDetailTpnCkdOut/{id_header_tpn_out}', [UserController::class, 'trDetailTpnCkdOut'])->name('trDetailTpnCkdOut')->middleware('auth');
Route::post('trDetailTpnCkdOut', [UserController::class, 'trDetailTpnCkdOut_add'])->name('trDetailTpnCkdOut.add')->middleware('auth');
Route::post('trDetailTpnCkdOut/delete/', [UserController::class, 'trDetailTpnCkdOut_del'])->name('trDetailTpnCkdOut.del')->middleware('auth');

Route::get('trHeaderTpk21CkdOutLBD',[UserController::class, 'trHeaderTpk21CkdOutLBD'])->name('trHeaderTpk21CkdOutLBD')->middleware('auth');
Route::get('trHeaderTpk21CkdOutLBD/json', [UserController::class, 'trHeaderTpk21CkdOutLBD_data'])->name('trHeaderTpk21CkdOutLBD.data')->middleware('auth');
Route::post('trHeaderTpk21CkdOutLBD', [UserController::class, 'trHeaderTpk21CkdOutLBD_add'])->name('trHeaderTpk21CkdOutLBD.add')->middleware('auth');
Route::post('trHeaderTpk21CkdOutLBD/delete/', [UserController::class, 'trHeaderTpk21CkdOutLBDDestroy_del'])->name('trHeaderTpk21CkdOutLBDDestroy.del')->middleware('auth');

Route::get('trDetailTpk21CkdOutLBD/{id_header_tpn_out}', [UserController::class, 'trDetailTpk21CkdOutLBD'])->name('trDetailTpk21CkdOutLBD')->middleware('auth');
Route::post('trDetailTpk21CkdOutLBD', [UserController::class, 'trDetailTpk21CkdOutLBD_add'])->name('trDetailTpk21CkdOutLBD.add')->middleware('auth');
Route::post('trDetailTpk21CkdOutLBD/delete/', [UserController::class, 'trDetailTpk21CkdOutLBD_del'])->name('trDetailTpk21CkdOutLBD.del')->middleware('auth');

// --------- USP --------------------//
Route::get('trHeaderTpnUsp',[UserController::class, 'trHeaderTpnUsp'])->name('trHeaderTpnUsp')->middleware('auth');
Route::get('trHeaderTpnUsp/json', [UserController::class, 'trHeaderTpnUsp_data'])->name('trHeaderTpnUsp.data')->middleware('auth');
Route::post('trHeaderTpnUsp', [UserController::class, 'trHeaderTpnUsp_add'])->name('trHeaderTpnUsp.add')->middleware('auth');
Route::post('trHeaderTpnUsp/delete/', [UserController::class, 'trHeaderTpnUspDestroy_del'])->name('trHeaderTpnUspDestroy.del')->middleware('auth');

Route::get('trDetailTpnUsp/{id_header_tpn_in}', [UserController::class, 'trDetailTpnUsp'])->name('trDetailTpnUsp')->middleware('auth');
Route::post('trDetailTpnUsp', [UserController::class, 'trDetailTpnUsp_add'])->name('trDetailTpnUsp.add')->middleware('auth');
Route::post('trDetailTpnUsp/edit', [UserController::class, 'trDetailTpnUsp_edit'])->name('trDetailTpnUsp.edit')->middleware('auth');
Route::post('trDetailTpnUsp/delete/', [UserController::class, 'trDetailTpnUsp_del'])->name('trDetailTpnUsp.del')->middleware('auth');

Route::get('trHeaderTpnUspOut',[UserController::class, 'trHeaderTpnUspOut'])->name('trHeaderTpnUspOut')->middleware('auth');
Route::get('trHeaderTpnUspOut/json', [UserController::class, 'trHeaderTpnUspOut_data'])->name('trHeaderTpnUspOut.data')->middleware('auth');
Route::post('trHeaderTpnUspOut', [UserController::class, 'trHeaderTpnUspOut_add'])->name('trHeaderTpnUspOut.add')->middleware('auth');
Route::post('trHeaderTpnUspOut/delete/', [UserController::class, 'trHeaderTpnUspOutDestroy_del'])->name('trHeaderTpnUspOutDestroy.del')->middleware('auth');

Route::get('trDetailTpnUspOut/{id_header_tpn_out}', [UserController::class, 'trDetailTpnUspOut'])->name('trDetailTpnUspOut')->middleware('auth');
Route::post('trDetailTpnUspOut', [UserController::class, 'trDetailTpnUspOut_add'])->name('trDetailTpnUspOut.add')->middleware('auth');
Route::post('trDetailTpnUspOut/delete/', [UserController::class, 'trDetailTpnUspOut_del'])->name('trDetailTpnUspOut.del')->middleware('auth');

Route::get('trHeaderTpnUspOutMadiDrt',[UserController::class, 'trHeaderTpnUspOutMadiDrt'])->name('trHeaderTpnUspOutMadiDrt')->middleware('auth');
Route::get('trHeaderTpnUspOutMadiDrt/json', [UserController::class, 'trHeaderTpnUspOutMadiDrt_data'])->name('trHeaderTpnUspOutMadiDrt.data')->middleware('auth');
Route::post('trHeaderTpnUspOutMadiDrt', [UserController::class, 'trHeaderTpnUspOutMadiDrt_add'])->name('trHeaderTpnUspOutMadiDrt.add')->middleware('auth');
Route::post('trHeaderTpnUspOutMadiDrt/delete/', [UserController::class, 'trHeaderTpnUspOutMadiDrtDestroy_del'])->name('trHeaderTpnUspOutMadiDrtDestroy.del')->middleware('auth');

Route::get('trDetailTpnUspOutMadiDrt/{id_header_tpn_out}', [UserController::class, 'trDetailTpnUspOutMadiDrt'])->name('trDetailTpnUspOutMadiDrt')->middleware('auth');
Route::post('trDetailTpnUspOutMadiDrt', [UserController::class, 'trDetailTpnUspOutMadiDrt_add'])->name('trDetailTpnUspOutMadiDrt.add')->middleware('auth');
Route::post('trDetailTpnUspOutMadiDrt/delete/', [UserController::class, 'trDetailTpnUspOutMadiDrt_del'])->name('trDetailTpnUspOutMadiDrt.del')->middleware('auth');

Route::get('trHeaderTpkUspOut24',[UserController::class, 'trHeaderTpkUspOut24'])->name('trHeaderTpkUspOut24')->middleware('auth');
Route::get('trHeaderTpkUspOut24/json', [UserController::class, 'trHeaderTpkUspOut24_data'])->name('trHeaderTpkUspOut24.data')->middleware('auth');
Route::post('trHeaderTpkUspOut24', [UserController::class, 'trHeaderTpkUspOut24_add'])->name('trHeaderTpkUspOut24.add')->middleware('auth');
Route::post('trHeaderTpkUspOut24/delete/', [UserController::class, 'trHeaderTpkUspOut24Destroy_del'])->name('trHeaderTpkUspOut24Destroy.del')->middleware('auth');

Route::get('trDetailTpkUspOut24/{id_header_tpn_out}', [UserController::class, 'trDetailTpkUspOut24'])->name('trDetailTpkUspOut24')->middleware('auth');
Route::post('trDetailTpkUspOut24', [UserController::class, 'trDetailTpkUspOut24_add'])->name('trDetailTpkUspOut24.add')->middleware('auth');
Route::post('trDetailTpkUspOut24/delete/', [UserController::class, 'trDetailTpkUspOut24_del'])->name('trDetailTpkUspOut24.del')->middleware('auth');

Route::get('trHeaderTpk24UspOutLBD',[UserController::class, 'trHeaderTpk24UspOutLBD'])->name('trHeaderTpk24UspOutLBD')->middleware('auth');
Route::get('trHeaderTpk24UspOutLBD/json', [UserController::class, 'trHeaderTpk24UspOutLBD_data'])->name('trHeaderTpk24UspOutLBD.data')->middleware('auth');
Route::post('trHeaderTpk24UspOutLBD', [UserController::class, 'trHeaderTpk24UspOutLBD_add'])->name('trHeaderTpk24UspOutLBD.add')->middleware('auth');
Route::post('trHeaderTpk24UspOutLBD/delete/', [UserController::class, 'trHeaderTpk24UspOutLBDDestroy_del'])->name('trHeaderTpk24UspOutLBDDestroy.del')->middleware('auth');

Route::get('trDetailTpk24UspOutLBD/{id_header_tpn_out}', [UserController::class, 'trDetailTpk24UspOutLBD'])->name('trDetailTpk24UspOutLBD')->middleware('auth');
Route::post('trDetailTpk24UspOutLBD', [UserController::class, 'trDetailTpk24UspOutLBD_add'])->name('trDetailTpk24UspOutLBD.add')->middleware('auth');
Route::post('trDetailTpk24UspOutLBD/delete/', [UserController::class, 'trDetailTpk24UspOutLBD_del'])->name('trDetailTpk24UspOutLBD.del')->middleware('auth');

Route::get('trHeaderTpkMadiDrtUspOutMadiAir',[UserController::class, 'trHeaderTpkMadiDrtUspOutMadiAir'])->name('trHeaderTpkMadiDrtUspOutMadiAir')->middleware('auth');
Route::get('trHeaderTpkMadiDrtUspOutMadiAir/json', [UserController::class, 'trHeaderTpkMadiDrtUspOutMadiAir_data'])->name('trHeaderTpkMadiDrtUspOutMadiAir.data')->middleware('auth');
Route::post('trHeaderTpkMadiDrtUspOutMadiAir', [UserController::class, 'trHeaderTpkMadiDrtUspOutMadiAir_add'])->name('trHeaderTpkMadiDrtUspOutMadiAir.add')->middleware('auth');
Route::post('trHeaderTpkMadiDrtUspOutMadiAir/delete/', [UserController::class, 'trHeaderTpkMadiDrtUspOutMadiAirDestroy_del'])->name('trHeaderTpkMadiDrtUspOutMadiAirDestroy.del')->middleware('auth');

Route::get('trDetailTpkMadiDrtUspOutMadiAir/{id_header_tpn_out}', [UserController::class, 'trDetailTpkMadiDrtUspOutMadiAir'])->name('trDetailTpkMadiDrtUspOutMadiAir')->middleware('auth');
Route::post('trDetailTpkMadiDrtUspOutMadiAir', [UserController::class, 'trDetailTpkMadiDrtUspOutMadiAir_add'])->name('trDetailTpkMadiDrtUspOutMadiAir.add')->middleware('auth');
Route::post('trDetailTpkMadiDrtUspOutMadiAir/delete/', [UserController::class, 'trDetailTpkMadiDrtUspOutMadiAir_del'])->name('trDetailTpkMadiDrtUspOutMadiAir.del')->middleware('auth');

Route::get('trHeaderTpkMadiAirUspOutLBA',[UserController::class, 'trHeaderTpkMadiAirUspOutLBA'])->name('trHeaderTpkMadiAirUspOutLBA')->middleware('auth');
Route::get('trHeaderTpkMadiAirUspOutLBA/json', [UserController::class, 'trHeaderTpkMadiAirUspOutLBA_data'])->name('trHeaderTpkMadiAirUspOutLBA.data')->middleware('auth');
Route::post('trHeaderTpkMadiAirUspOutLBA', [UserController::class, 'trHeaderTpkMadiAirUspOutLBA_add'])->name('trHeaderTpkMadiAirUspOutLBA.add')->middleware('auth');
Route::post('trHeaderTpkMadiAirUspOutLBA/delete/', [UserController::class, 'trHeaderTpkMadiAirUspOutLBADestroy_del'])->name('trHeaderTpkMadiAirUspOutLBADestroy.del')->middleware('auth');

Route::get('trDetailTpkMadiAirUspOutLBA/{id_header_tpn_out}', [UserController::class, 'trDetailTpkMadiAirUspOutLBA'])->name('trDetailTpkMadiAirUspOutLBA')->middleware('auth');
Route::post('trDetailTpkMadiAirUspOutLBA', [UserController::class, 'trDetailTpkMadiAirUspOutLBA_add'])->name('trDetailTpkMadiAirUspOutLBA.add')->middleware('auth');
Route::post('trDetailTpkMadiAirUspOutLBA/delete/', [UserController::class, 'trDetailTpkMadiAirUspOutLBA_del'])->name('trDetailTpkMadiAirUspOutLBA.del')->middleware('auth');

Route::get('trHeaderBereDrtOutBereAir',[UserController::class, 'trHeaderBereDrtOutBereAir'])->name('trHeaderBereDrtOutBereAir')->middleware('auth');
Route::get('trHeaderBereDrtOutBereAir/json', [UserController::class, 'trHeaderBereDrtOutBereAir_data'])->name('trHeaderBereDrtOutBereAir.data')->middleware('auth');
Route::post('trHeaderBereDrtOutBereAir', [UserController::class, 'trHeaderBereDrtOutBereAir_add'])->name('trHeaderBereDrtOutBereAir.add')->middleware('auth');
Route::post('trHeaderBereDrtOutBereAir/delete/', [UserController::class, 'trHeaderBereDrtOutBereAirDestroy_del'])->name('trHeaderBereDrtOutBereAirDestroy.del')->middleware('auth');

Route::get('trDetailBereDrtOutBereAir/{id_header_tpn_out}', [UserController::class, 'trDetailBereDrtOutBereAir'])->name('trDetailBereDrtOutBereAir')->middleware('auth');
Route::post('trDetailBereDrtOutBereAir', [UserController::class, 'trDetailBereDrtOutBereAir_add'])->name('trDetailBereDrtOutBereAir.add')->middleware('auth');
Route::post('trDetailBereDrtOutBereAir/delete/', [UserController::class, 'trDetailBereDrtOutBereAir_del'])->name('trDetailBereDrtOutBereAir.del')->middleware('auth');

Route::get('trHeaderBereAirOutTempunak',[UserController::class, 'trHeaderBereAirOutTempunak'])->name('trHeaderBereAirOutTempunak')->middleware('auth');
Route::get('trHeaderBereAirOutTempunak/json', [UserController::class, 'trHeaderBereAirOutTempunak_data'])->name('trHeaderBereAirOutTempunak.data')->middleware('auth');
Route::post('trHeaderBereAirOutTempunak', [UserController::class, 'trHeaderBereAirOutTempunak_add'])->name('trHeaderBereAirOutTempunak.add')->middleware('auth');
Route::post('trHeaderBereAirOutTempunak/delete/', [UserController::class, 'trHeaderBereAirOutTempunakDestroy_del'])->name('trHeaderBereAirOutTempunakDestroy.del')->middleware('auth');

Route::get('trDetailBereAirOutTempunak/{id_header_tpn_out}', [UserController::class, 'trDetailBereAirOutTempunak'])->name('trDetailBereAirOutTempunak')->middleware('auth');
Route::post('trDetailBereAirOutTempunak', [UserController::class, 'trDetailBereAirOutTempunak_add'])->name('trDetailBereAirOutTempunak.add')->middleware('auth');
Route::post('trDetailBereAirOutTempunak/delete/', [UserController::class, 'trDetailBereAirOutTempunak_del'])->name('trDetailBereAirOutTempunak.del')->middleware('auth');

Route::get('trHeaderBereAirOutTayan',[UserController::class, 'trHeaderBereAirOutTayan'])->name('trHeaderBereAirOutTayan')->middleware('auth');
Route::get('trHeaderBereAirOutTayan/json', [UserController::class, 'trHeaderBereAirOutTayan_data'])->name('trHeaderBereAirOutTayan.data')->middleware('auth');
Route::post('trHeaderBereAirOutTayan', [UserController::class, 'trHeaderBereAirOutTayan_add'])->name('trHeaderBereAirOutTayan.add')->middleware('auth');
Route::post('trHeaderBereAirOutTayan/delete/', [UserController::class, 'trHeaderBereAirOutTayanDestroy_del'])->name('trHeaderBereAirOutTayanDestroy.del')->middleware('auth');

Route::get('trDetailBereAirOutTayan/{id_header_tpn_out}', [UserController::class, 'trDetailBereAirOutTayan'])->name('trDetailBereAirOutTayan')->middleware('auth');
Route::post('trDetailBereAirOutTayan', [UserController::class, 'trDetailBereAirOutTayan_add'])->name('trDetailBereAirOutTayan.add')->middleware('auth');
Route::post('trDetailBereAirOutTayan/delete/', [UserController::class, 'trDetailBereAirOutTayan_del'])->name('trDetailBereAirOutTayan.del')->middleware('auth');

Route::get('trHeaderTempunakOutTayan',[UserController::class, 'trHeaderTempunakOutTayan'])->name('trHeaderTempunakOutTayan')->middleware('auth');
Route::get('trHeaderTempunakOutTayan/json', [UserController::class, 'trHeaderTempunakOutTayan_data'])->name('trHeaderTempunakOutTayan.data')->middleware('auth');
Route::post('trHeaderTempunakOutTayan', [UserController::class, 'trHeaderTempunakOutTayan_add'])->name('trHeaderTempunakOutTayan.add')->middleware('auth');
Route::post('trHeaderTempunakOutTayan/delete/', [UserController::class, 'trHeaderTempunakOutTayanDestroy_del'])->name('trHeaderTempunakOutTayanDestroy.del')->middleware('auth');

Route::get('trDetailTempunakOutTayan/{id_header_tpn_out}', [UserController::class, 'trDetailTempunakOutTayan'])->name('trDetailTempunakOutTayan')->middleware('auth');
Route::post('trDetailTempunakOutTayan', [UserController::class, 'trDetailTempunakOutTayan_add'])->name('trDetailTempunakOutTayan.add')->middleware('auth');
Route::post('trDetailTempunakOutTayan/delete/', [UserController::class, 'trDetailTempunakOutTayan_del'])->name('trDetailTempunakOutTayan.del')->middleware('auth');

Route::get('trHeaderTayanOutTongkang',[UserController::class, 'trHeaderTayanOutTongkang'])->name('trHeaderTayanOutTongkang')->middleware('auth');
Route::get('trHeaderTayanOutTongkang/json', [UserController::class, 'trHeaderTayanOutTongkang_data'])->name('trHeaderTayanOutTongkang.data')->middleware('auth');
Route::post('trHeaderTayanOutTongkang', [UserController::class, 'trHeaderTayanOutTongkang_add'])->name('trHeaderTayanOutTongkang.add')->middleware('auth');
Route::post('trHeaderTayanOutTongkang/delete/', [UserController::class, 'trHeaderTayanOutTongkangDestroy_del'])->name('trHeaderTayanOutTongkangDestroy.del')->middleware('auth');

Route::get('trDetailTayanOutTongkang/{id_header_tpn_out}', [UserController::class, 'trDetailTayanOutTongkang'])->name('trDetailTayanOutTongkang')->middleware('auth');
Route::post('trDetailTayanOutTongkang', [UserController::class, 'trDetailTayanOutTongkang_add'])->name('trDetailTayanOutTongkang.add')->middleware('auth');
Route::post('trDetailTayanOutTongkang/delete/', [UserController::class, 'trDetailTayanOutTongkang_del'])->name('trDetailTayanOutTongkang.del')->middleware('auth');

Route::get('trTongkang',[UserController::class, 'trTongkang'])->name('trTongkang')->middleware('auth');
Route::get('trTongkang/json', [UserController::class, 'trTongkang_data'])->name('trTongkang.data')->middleware('auth');
Route::get('trLoglistModal/json', [UserController::class, 'trLoglistModal_data'])->name('trLoglistModal.data')->middleware('auth');
Route::post('trLoglistModal/edit/', [UserController::class, 'trLoglistModal_edit'])->name('trLoglistModal.edit')->middleware('auth');
Route::get('trLogListTkg/{no_loglist}', [UserController::class, 'trLogListTkg'])->name('trLogListTkg')->middleware('auth');

// ------------------ Reporting --------------------------------//
Route::get('rptStokKayu',[UserController::class, 'rptStokKayu'])->name('rptStokKayu')->middleware('auth');
Route::post('rptStokKayu', [UserController::class, 'rptStokKayu_rpt'])->name('rptStokKayu.rpt')->middleware('auth');

Route::get('rptChainTrack',[UserController::class, 'rptChainTrack'])->name('rptChainTrack')->middleware('auth');
Route::post('rptChainTrack', [UserController::class, 'rptChainTrack_rpt'])->name('rptChainTrack.rpt')->middleware('auth');

Route::get('rptLoglistLoc',[UserController::class, 'rptLoglistLoc'])->name('rptLoglistLoc')->middleware('auth');
Route::post('rptLoglistLoc', [UserController::class, 'rptLoglistLoc_rpt'])->name('rptLoglistLoc.rpt')->middleware('auth');

Route::get('rptStokLoc',[UserController::class, 'rptStokLoc'])->name('rptStokLoc')->middleware('auth');
Route::post('rptStokLoc', [UserController::class, 'rptStokLoc_rpt'])->name('rptStokLoc.rpt')->middleware('auth');

Route::get('rptRekapHauling',[UserController::class, 'rptRekapHauling'])->name('rptRekapHauling')->middleware('auth');
Route::post('rptRekapHauling', [UserController::class, 'rptRekapHauling_rpt'])->name('rptRekapHauling.rpt')->middleware('auth');

Route::get('rptRekapTkg',[UserController::class, 'rptRekapTkg'])->name('rptRekapTkg')->middleware('auth');
Route::post('rptRekapTkg', [UserController::class, 'rptRekapTkg_rpt'])->name('rptRekapTkg.rpt')->middleware('auth');


Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('/{any}',[UserController::class, 'logout']);
