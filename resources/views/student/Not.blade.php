@extends('student.layouts.front')

@section('css')
    <style>
        #ders-programi {
            width: 100%;
            text-align: center;
        }


        .tr-stil {
            margin-top: 5px;
            height: 20px;
        }

        .th-stil {
            background-color: rgb(110, 110, 110);
            color: white;
            width: 20px;

        }

        .alt {
            border-bottom: 1px solid rgb(222, 222, 222);
        }
        .header-container {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .header-container h7 {
        font-size: 16px;
        font-weight: normal;
        margin: 0;
    }

    .header-container h7 span {
        border: 1px solid rgb(205, 205, 205);
        border-radius: 3px;
        padding: 3px 8px;
        background-color: #fff;
    }

    </style>
@endsection

@section('content')
    <div>
        <div class="">
            <div class="mb-1" style="width: 250px; border:1px solid  rgb(205, 205, 205); border-radius:3px;">
            <h7 class="mb-2">Dönem: <span >2023-2024 Bahar</span></h7>
            </div>
            <div style="  display: flex; align-items: center; height: 45px; width:140px; background-color:rgb(223, 223, 223); border-radius:2px; display: flex; align-items: center; justify-content: center;">
                Özel Not Durumu
            </div>
        </div>
        <table id="ders-programi" class="mt-2">
            <thead class="ana">
                <tr class="tr-stil">
                    <th class="th-stil">Ders adı</th>
                    <th class="th-stil">Sonuç Durumu</th>
                    <th class="th-stil">Kredi</th>
                    <th class="th-stil">Vize</th>
                    <th class="th-stil">Final</th>
                    <th class="th-stil">Büt</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notlar as $ders_adi => $not)
                <tr class="tr-stil alt" id="row">
                    <td class="td-stil">{{ $ders_adi }}</td>
                    @if(!is_null($not['vize']) && !is_null($not['final']))
                    <td class="td-stil" style="color:red">Sonuçlandırıldı</td>
                    @else
                    <td class="td-stil" style="color:black">Sonuçlandırılmadı</td>
                    @endif
                    <td class="td-stil">{{ $not['kredi'] }}</td>
                    <td class="td-stil">{{ $not['vize'] ?? 'G' }}</td>
                    <td class="td-stil">{{ $not['final'] ?? 'G' }}</td>
                    <td class="td-stil">{{ $not['but'] ?? 'G' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="alert alert-info alert-dismissible fade show mt-5" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"
                class="text-danger">×</span></button>
        <span id="lblUyari_Notlar"
            style="display:inline-block;color:#3A3A3A;font-family:Open Sans;font-size:8pt;text-decoration:underline;height:16px;width:50px;">Notlar</span>
        <br>
        <span id="lblUyari_1" style="color:#3A3A3A;font-family:Open Sans;font-size:8pt;">
            <font color="red"> (Ders Sonuçlandırılmadı olarak görüntülenmesi )</font>
            <font color="blue"> Ne anlama geliyor</font> :<br>1- Yarıyıl sonu sınavı notu henüz girilmedi<br>2- Tüm sınav
            notları girildi fakat harf notu henüz hesaplanmadı<br>3- Not girişi tamamlanmayan bütünleme sınavı mevcut<br>4-
            Bütünleme sınav notları girildi fakat henüz harf notu hesaplanmadı
        </span>
        <br>
        <span id="lblUyari_2" style="color:#3A3A3A;font-family:Open Sans;font-size:8pt;">
            <font color="blue"> Harf Notunun "--" olarak görünmesi ne anlama geliyor</font>: <br>1) Akademik takvime göre
            harf notlarının ilan tarihi bekleniyor (Akademik takvimden ilgili tarihleri kontrol edebilirsiniz)<br>2) Ders
            sonuçlandırılmamış/ilan edilmemiş olabilir<br>3) Derse ait bütünleme sınavı tanımlanmış ise Akademik Takvimde
            yer alan bütünleme ilan tarihi beklenir
        </span>
        <br>
        <span id="lblDuyuru" title="OGR_NL" style="color:#3A3A3A;font-family:Open Sans;font-size:8pt;"></span>
    </div>
@endsection

@section('js')
@endsection
