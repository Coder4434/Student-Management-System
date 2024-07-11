<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use App\Models\DersListesi;
use App\Models\adminbilgisi;
use App\Models\OgrenciModel;
use Illuminate\Http\Request;
use App\Models\NotGirisiModel;
use App\Models\SinavTakvimiModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OgrenciBilgileri extends Controller
{
    public function index(){
    }

    public function CommonInfos(Auth $auth)
    {
        $user = auth()->user();
        $ogrenciler = OgrenciModel::where('ogrNo', $user->ogrNo)->first();




        return view('student.GenelBilgiler', compact("ogrenciler"));
    }

    public function DersProgramı(Auth $auth)
    {
        $user = auth()->user();
        $ogr = OgrenciModel::where('ogrNo',$user->ogrNo)->first();


        $dersler = $ogr->ders_id;


        $dersKodlari = [];
        foreach ($dersler as $ders) {
            if ($ders !== null) {
                $dersKodlari[] = $ders['id'];
            }
        }


        $dersProgramlari = Program::with('ders')->whereIn('ders_id', $dersKodlari)->get();

        return view('student.DersProgrami', compact('dersProgramlari'));
    }

    public function Not(Auth $auth)
    {
        $user= auth()->user();
        $ogr = OgrenciModel::where("ogrNo", $user->ogrNo)->first();
        $ogrencininNotlari = NotGirisiModel::where("ogrNo", $ogr->ogrNo)->where('donem', 1)->get();


        $dersKredileri = [];
        foreach ($ogrencininNotlari as $not) {
            $ders = DersListesi::where("ders_adi", $not->ders_adi)->first();
            if ($ders) {
                $dersKredileri[$not->ders_adi] = $ders->ders_kredisi;
            }
        }


        $notlar = [];
        foreach ($ogrencininNotlari as $not) {
            if (!isset($notlar[$not->ders_adi])) {
                $notlar[$not->ders_adi] = [
                    'vize' => null,
                    'final' => null,
                    'but' => null,
                    'kredi' => $dersKredileri[$not->ders_adi] ?? 'N/A',
                ];
            }

            if ($not->sinav_dönemi == 'vize') {
                $notlar[$not->ders_adi]['vize'] = $not->sinav_not;
            } elseif ($not->sinav_dönemi == 'final') {
                $notlar[$not->ders_adi]['final'] = $not->sinav_not;
            } elseif ($not->sinav_dönemi == 'but') {
                $notlar[$not->ders_adi]['but'] = $not->sinav_not;
            }
        }

        return view('student.Not', compact('notlar'));
    }
    public function SınavTakvimi(Auth $auth)
    {
        $user = auth()->user();

        $ogr = OgrenciModel::where('ogrNo',$user->ogrNo)->first();


        $dersler = $ogr->ders_id;


        $dersKodlari = [];



        if(!empty($dersler)){
            foreach ($dersler as $dersId) {
                $ders = DersListesi::where("id", $dersId)->first();

                if ($ders) {
                    $dersKodlari[] = $ders->ders_kodu;
                }
            }

        }



        $sinavlar = SinavTakvimiModel::whereIn('ders_kodu', $dersKodlari)->orderBy('sinav_tarihi',"asc")->get();


        return view('student.SınavTakvimi', compact('sinavlar','dersler'));
    }

    public function DersListesi()
    {

        $dersler = DersListesi::where('id', '>', 0)->get();

        $data = [];

        foreach ($dersler as $ders) {
            $data[] = [
                'ders_kodu' => $ders->ders_kodu,
                'ders_adi' => $ders->ders_adi,
                'ders_kredisi' => $ders->ders_kredisi,
                'ders_Ogretmen' => $ders->ders_Ogretmen
            ];
        }

        return view('student.DersListesi', compact('dersler'));
    }


    public function derslerikaydet(Request $request,Auth $auth)
    {
        $user = auth()->user();
        $ders_name = json_decode($request->input('ders_idler'));

        $ogrenci = OgrenciModel::where('ogrNo',$user->ogrNo)->first();




        $ders_idler = [];

        foreach ($ders_name as $name) {
            if ($name !== null) {
                $dersid = DersListesi::where('ders_adi', $name)->select(["id"])->first();
                $ders_idler[] = $dersid;
            }
        }



            $ogrenci->ders_id = $ders_idler;
            $ogrenci->save();




        $ogr = OgrenciModel::where("ogrNo", $ogrenci->ogrNo)->first();
        $danisman = adminbilgisi::where("danısmansınıf", $ogrenci->sinif)->first();

        $existingOnaylama2 = DB::table('onay')
            ->where('ogrid', $ogr->id)
            ->where('donem', 1)
            ->first();
        if (!$existingOnaylama2) {
            DB::table('onay')->insert([
                'ogrid' => $ogr->id,
                'danismanid' => $danisman->id,
                'ogronay' => 1,
                'donem' => 1,
                'danismanonay' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        return redirect()->route("ders-ekle");
    }

    public function DersEkle( Auth $auth)
    {
        $user= auth()->user();

        $ogrenci = OgrenciModel::all();
        $dersler = DersListesi::where('id', '>', 0)->get();

        $getid = OgrenciModel::where('ogrNo',$user->ogrNo)->first();


        $onay = DB::table('onay')->where('ogrid', $getid->id)->first();

        $data = [];

        foreach ($dersler as $ders) {
            $data[] = [
                'ders_kodu' => $ders->ders_kodu,
                'ders_adi' => $ders->ders_adi,
                'ders_kredisi' => $ders->ders_kredisi,
                'ders_Ogretmen' => $ders->ders_Ogretmen
            ];
        }

        return view('student.DersEkle', compact("dersler", "ogrenci", "onay",'getid'));
    }

    public function update()
    {

        return view("student.Sifre");
    }
    public function updatesifre(Request $request,Auth $auth)
    {
        $user = auth()->user();
        $request->validate([
            'yeni_sifre' => 'required|min:3',
            'yeni_sifre_tekrar' => 'required|same:yeni_sifre',
        ]);



        $yeni_sifre = $request->input('yeni_sifre');

        User::where('id', $user->id)->update(['password' => Hash::make($yeni_sifre)]);

        return redirect()->back()->with('success', 'Şifre başarıyla güncellendi!');
    }

    public function program(Auth $auth)
    {
        $user=auth()->user();

        $ogr = OgrenciModel::where('ogrNo',$user->ogrNo)->first();


        $dersler = $ogr->ders_id;


        $dersKodlari = [];

        if(!empty($dersler)){

            foreach ($dersler as $ders) {
                if ($ders !== null) {
                    $dersKodlari[] = $ders['id'];
                }
            }
        }



        $dersProgramlari = Program::with('ders')->whereIn('ders_id', $dersKodlari)->get();

        return view('student.program', compact('dersProgramlari','ogr',"dersler"));
    }

}
