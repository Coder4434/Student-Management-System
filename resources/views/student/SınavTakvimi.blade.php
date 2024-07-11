@extends('student.layouts.front')

@section('css')
    <style>
        /* Genel düzen */
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #444;
        }

        /* Tablo düzeni */
        #ders-programi {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        /* Başlık hücreleri */
        .th-stil {
            background-color: #6c757d;
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: 600;
        }

        /* Satırlar */
        .tr-stil {
            height: 50px;
        }

        /* Veri hücreleri */
        .td-stil {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: center;
            transition: background-color 0.3s;
            color: #555;
        }

        /* Alternatif satır rengi */
        #ders-programi tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        /* Satır üzerine gelindiğinde renk değişimi */
        #ders-programi tr:hover .td-stil {
            background-color: #f0f0f0;
        }

        /* Tarih hücresi özel stili */
        .td-stil[style*="color:aqua"] {
            color: #17a2b8;
            /* Tarih hücresi için özel renk */
        }

        /* Mobil uyumlu tablo */
        @media (max-width: 768px) {
            /* Kod bloğu değişikliği yok */
        }
    </style>
@endsection

@section('content')
@if (!empty($dersler))
<div>
    <table id="ders-programi">
        <thead>
            <tr class="tr-stil">
                <th class="th-stil">Ders adı</th>
                <th class="th-stil">Sınav Tarihi</th>
                <th class="th-stil">Sınav Adı</th>
                <th class="th-stil">Derslik</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($sinavlar as $sinav)
                <tr class="tr-stil" id="row">
                    <td class="td-stil" data-label="Ders adı">{{ $sinav->ders_adi }}</td>
                    <td class="td-stil" data-label="Sınav Tarihi" style="color:rgb(4, 0, 30)">{{ $sinav->sinav_tarihi }}
                    </td>
                    <td class="td-stil" data-label="Sınav Adı">{{ $sinav->sinav_donemi }}</td>
                    <td class="td-stil" data-label="Derslik">{{ $sinav->sinav_yeri }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@else

<div class="alert alert-warning">
    Öğrencinin aldığı ders yoktur.
</div>
@endif

@endsection

@section('js')
@endsection
