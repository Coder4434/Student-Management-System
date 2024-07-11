<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Onay;
use App\Models\User;
use App\Models\DersListesi;
use App\Models\adminbilgisi;
use App\Models\OgrenciModel;
use Illuminate\Http\Request;
use App\Models\NotGirisiModel;
use App\Models\SinavTakvimiModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminBilgileri extends Controller
{
    public function AdminCommonInfos()
    {
        return view('admin.AdminBilgisi');
    }

    public function AdminNotGiris(Request $request)
    {


        $ogrenciler = OgrenciModel::where('id', '>=', 0)
            ->orderByRaw('CAST(ogrNo AS UNSIGNED) ASC')
            ->get();

        $dersler = DersListesi::where('id', '>=', 0)->get();



        return view('admin.NotGirisi', compact("dersler"));
    }

    public function BringStudents(Request $request)
    {

        dd($request->all());
    }

    public function AdminDersIslemleri()
    {
        $dersler = DersListesi::where("id", ">", "0")->get();

        return view('admin.DersIslemleri', compact("dersler"));
    }

    public function addDers(Request $request)
    {

        $dersAdı = $request->input("dersAdi");
        $dersDonem = $request->input("dersDonem");
        $dersKredi = $request->input("dersKredisi");
        $dersOgretmen = $request->input("dersOgretmen");
        $dersSinif = $request->input("dersSinifi");
        $dersAKTS = $request->input("dersAKTS");
        $dersSaat = $request->input("dersSaat");
        $dersTur = $request->input("dersTur");

        $sonDersKodu = DersListesi::latest("id")->first();


        $sonDersKodu->id++;
        $dersKodu = "bm-" . strval($sonDersKodu->id);


        DersListesi::create([
            "ders_kodu" => $dersKodu,
            "ders_adi" => $dersAdı,
            "ders_kredisi" => $dersKredi,
            "ders_Ogretmen" => $dersOgretmen,
            "zorunlu_secmeli" => $dersTur,
            "ders_AKTS" => $dersAKTS,
            "ders_Saati" => $dersSaat,
            "ders_sinif" => $dersSinif,
            "donem" => $dersDonem
        ]);

        return redirect()->route("ders-islemleri");
    }

    public function deleteDers(Request $request)
    {

        $ders = DersListesi::findOrFail($request->id);

        $ders->delete();

        return redirect()->route("ders-islemleri");
    }

    public function AdminOgrenciIslemleri()
    {
        $ogrenciler = OgrenciModel::where('id', '>', 0)->get();




        return view('admin.OgrenciIslemleri', compact("ogrenciler"));
    }

    public function updateStudents(Request $request)
    {
        $ogrNo = $request->input("ogrenciNo");
        $adSoyad = $request->input("adSoyad");
        $bolum = $request->input("bolum");
        $sinif = $request->input("sinif");
        $GNO = $request->input("gno");
        $tarih = $request->input("tarih");

        $ogrNo = intval($ogrNo);
        $GNO = floatval($GNO);

        $mail = strtolower($adSoyad);
        $mail = str_replace(' ','',$mail);
        User::create([

            'ogrNo' => $ogrNo,
            'name' => $adSoyad,
            'password' => Hash::make($ogrNo),
            'status' => 0,
            'email'=> $mail."@iste.edu.tr"
        ]);
        OgrenciModel::create([
            'ogrNo' => $ogrNo,
            'adSoyad' => $adSoyad,
            'GNO' => $GNO,
            'bolum' => $bolum,
            'sinif' => $sinif,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'Kayıt Tarihi' => $tarih


        ]);






        return redirect()->route("ogrenci-islemleri");
    }

    public function deleteStudents(Request $request)
    {


        $ogrenci = OgrenciModel::findOrFail($request->id);
        $ogrenci->delete();
        return redirect()->route("ogrenci-islemleri");
    }

    public function AdminSinavTakvimi()
    {
        $sinavlar = SinavTakvimiModel::where('id', '>', 0)->orderBy('sinav_tarihi', 'desc')->get();

        return view('admin.SinavTakvimi', compact("sinavlar"));
    }

    public function addSinavTakvimi(Request $request)
    {


        $dersAdi = $request->input("dersAdi");
        $sinavDonemi = $request->input("sinavDonemi");
        $sinavTarihi = $request->input("sinavTarihi") . "  " . $request->input("sinavSaati");
        $sinavYeri = $request->input("sinavYeri");

        $dersler = DersListesi::where('id', '>', 0)->get();

        foreach ($dersler as $ders) {

            if ($ders->ders_adi == $dersAdi) {
                $dersKodu = $ders->ders_kodu;
            }
        }

        SinavTakvimiModel::create([

            'ders_kodu' => $dersKodu,
            'ders_adi' => $dersAdi,
            'sinav_yeri' => $sinavYeri,
            'sinav_tarihi' => $sinavTarihi,
            'sinav_donemi' => $sinavDonemi
        ]);

        return redirect()->route('sinav-takvimi');
    }
    public function deleteSinavTakvimi(Request $request)
    {

        $sinav = SinavTakvimiModel::findOrFail($request->id);
        $sinav->delete();

        return redirect()->route("sinav-takvimi");
    }
    public function updateSinavTakvimi(Request $request)
    {

        $islem = $request->input('action');



        dd($request->all());
    }

    public function AdminSifreDegisikligi()
    {

        return view('admin.SifreDegisikligi');
    }

    public function updateAdminSifre(Request $request,Auth $auth)
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

    public function secilenders(Request $request)
    {
        $selectedDersId = $request->input('ders_id');
        $dersadi = DersListesi::where('id', $selectedDersId)->value('ders_adi');

        $ogrenciler = OgrenciModel::whereJsonContains('ders_id', [['id' => (int)$selectedDersId]])->get();
        $dersler = DersListesi::all();
        $sinavturu = $request->input('vize-final');

        return view('admin.NotGirisi', compact('ogrenciler', 'dersler', 'sinavturu', 'dersadi'));
    }


    public function notekle(Request $request)
    {

        $ders = DersListesi::where('ders_adi', $request->ders_adi)->first();


        if (!$ders) {
            return redirect()->back()->with('error', 'Ders bulunamadı.');
        }

        $ogrenciNos = $request->input('ogrenci_no');
        $notlar = $request->input('not');
        $dersAdi = $request->input('ders_adi');
        $sinavTuru = $request->input('sinav_turu');


        foreach ($ogrenciNos as $index => $ogrenciNo) {
            $sinav_not = $notlar[$index];

            if (empty($sinav_not)) {
                return back()->with('error', 'Sınav notu boş olamaz!');
            }
            NotGirisiModel::create([
                'ogrNo' => $ogrenciNo,
                'sinav_dönemi' => $sinavTuru,
                'ders_adi' => $dersAdi,
                'donem' => 1,
                'ders_kodu' => $ders->ders_kodu,
                'sinav_not' => $notlar[$index]
            ]);
        }




        return redirect()->back()->with('success', 'Notlar başarıyla kaydedildi.');
    }

    public function AdminDersOnay()
    {
        $ogrenciIds = DB::table('onay')
           // ->where("danismanid", 1)
            ->where('danismanonay', 0)
            ->pluck('ogrid');


        $ogrenciler = OgrenciModel::whereIn('id', $ogrenciIds)->get();


        return view('admin.AdminDersOnay', compact('ogrenciler'));
    }

    public function onayla(Request $request)
    {
        $ogrenciId = $request->input('ogrenci_id');


        $onay = DB::table('onay')->where('ogrid', $ogrenciId)->first();


        if (!$onay) {
            return redirect()->back()->with('error', 'Onay kaydı bulunamadı.');
        }


        DB::table('onay')->where('ogrid', $ogrenciId)->update(['danismanonay' => 1]);

        return redirect()->route('ders-onay')->with('success', 'Öğrencinin ders kaydı başarıyla onaylandı.');
    }

    public function resetDanismanOnay(Request $request)
    {

        DB::table('onay')->update(['danismanonay' => 0]);


        return redirect()->back()->with('success', 'Ders kaydı başarıyla yeniden başlatıldı.');
    }
}
