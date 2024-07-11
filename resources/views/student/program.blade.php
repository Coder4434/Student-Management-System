@extends('student.layouts.front')

@section('css')
    <style>
        .ilk {
            background: rgb(104, 104, 104);
            color: white;
            text-align: center;
            height: 25px;
            line-height: 25px; /* Dikey hizalama */
            width: 100%;
            border-radius: 5px 5px 0 0;
        }

        .tr-list {
            background: rgb(195, 193, 193);
            color: rgb(255, 255, 255);
        }

        .kapsayici {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        .th-list,
        .tr-list,
        .td-list {
            border: 1px solid rgb(172, 172, 172);
            padding: 10px; /* Hücre içeriği için padding */
            text-align: center;
        }

        .tr-list:nth-child(even) {
            background-color: rgb(224, 224, 224); /* Tek ve çift satırlar için farklı arka plan renkleri */
        }

        .enson {
            background: rgb(143, 143, 143);
        }
    </style>
@endsection

@section('content')
@if(!empty($dersler))
    <div style="background-color: rgb(224, 224, 224); border-radius: 5px; padding: 8px;">
        <h7>Öğrenci Ders Programı</h7>
        <br>
        <h7>{{$ogr->adSoyad}}</h7>
    </div>
    <div class="mb-1" style="width: 250px; border: 1px solid rgb(205, 205, 205); border-radius: 3px;">
        <h7 class="mb-2">Dönem: <span>2023-2024 Bahar</span></h7>
    </div>

    <div class="container">
        @php
            $days = [
                'Pazartesi' => 'Pazartesi',
                'Salı' => 'Salı',
                'Çarşamba' => 'Çarşamba',
                'Perşembe' => 'Perşembe',
                'Cuma' => 'Cuma',
                'Cumartesi' => 'Cumartesi',
            ];
        @endphp

        <div class="row">
            @foreach ($days as $dayName)
                <div class="col-md-6">
                    <div class="ilk">
                        {{ $dayName }}
                    </div>
                    <table class="kapsayici">
                        <thead>
                            <tr class="tr-list">
                                <th class="th-list">Saat</th>
                                <th class="th-list">Ders Kodu</th>
                                <th class="th-list">Ders Adı</th>
                                <th class="th-list">Derslik</th>
                                <th class="th-list">Öğretim Görevlisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dersProgramlari as $item)
                                @if ($item->gun == $dayName)
                                    <tr>
                                        <td class="td-list">{{ $item->saat }}</td>
                                        <td class="td-list">{{ $item->ders->ders_kodu }}</td>
                                        <td class="td-list">{{ $item->ders->ders_adi }}</td>
                                        <td class="td-list">150B</td>
                                        <td class="td-list">{{ $item->ders->ders_Ogretmen }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($loop->iteration % 2 == 0)
        </div>
        <div class="row">
            @endif
            @endforeach
        </div>
    </div>

    @else
    <div class="alert alert-warning" >
        Öğrencinin aldığı ders yoktur.
    </div>
    @endif



@endsection
