@extends('student.layouts.front')

@section('css')
    <style>
        .ilk {
            background: rgb(62, 62, 62);
            color: white;
            text-align: center;
            height: 30px;
            width: 98%;
        }

        .tr-list {
            background: rgb(174, 173, 173);
            width: 98%;
        }

        .kapsayici {
            width: 98%;
            margin-block-end: 10px;
            text-align: center;
        }

        .enson {
            background: rgb(143, 143, 143);
        }
    </style>
@endsection

@section('content')
    @php

    @endphp
    <div class="1">
        <div class="ilk">
            1.Yarıyıl Ders Planı
        </div>
        <table class="kapsayici">
            <tr class="tr-list">
                <th class="th-list">Ders Adı</th>
                <th class="th-list">Ders Kodu</th>
                <th class="th-list">Zorunluluk Durumu</th>
                <th class="th-list">Kredi</th>
                <th class="th-list">Ogretmen Adı</th>
            </tr>

            @php
                $totalKredi = 0;
            @endphp


            <tbody>
                @foreach ($dersler as $ders)
                @if($ders->donem == 1 || $ders->donem == 2)
                    @php
                        $totalKredi += $ders->ders_kredisi;
                    @endphp

                    <tr>
                        <td>{{ $ders->ders_kodu }}</td>
                        <td>{{ $ders->ders_adi }}</td>
                        <td>{{ $ders->zorunlu_secmeli }}</td>
                        <td>{{ $ders->ders_kredisi }}</td>
                        <td>{{ $ders->ders_Ogretmen }}</td>

                    </tr>
                @endif
                @endforeach

            </tbody>

            <tr class="enson">
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $totalKredi }}</td>
                <td></td>
            </tr>
        </table>
    </div>

    <div class="2">
        <div class="ilk">
            2.Yarıyıl Ders Planı
        </div>
        <table class="kapsayici">
            <tr class="tr-list">
                <th class="th-list">Ders Adı</th>
                <th class="th-list">Ders Kodu</th>
                <th class="th-list">Zorunluluk Durumu</th>
                <th class="th-list">Kredi</th>
                <th class="th-list">Ogretmen Adı</th>
            </tr>

            @php
                $totalKredi = 0;
            @endphp


            <tbody>


                @foreach ($dersler as $ders)
                @if($ders->donem == 3 || $ders->donem == 4)
                    @php
                        $totalKredi += $ders->ders_kredisi;
                    @endphp

                    <tr>
                        <td>{{ $ders->ders_kodu }}</td>
                        <td>{{ $ders->ders_adi }}</td>
                        <td>{{ $ders->zorunlu_secmeli }}</td>
                        <td>{{ $ders->ders_kredisi }}</td>
                        <td>{{ $ders->ders_Ogretmen }}</td>

                    </tr>
                @endif
                @endforeach

            </tbody>

            <tr class="enson">
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $totalKredi }}</td>
                <td></td>
            </tr>
        </table>
    </div>

    <div class="3">
        <div class="ilk">
            3.Yarıyıl Ders Planı
        </div>
        <table class="kapsayici">
            <tr class="tr-list">
                <th class="th-list">Ders Adı</th>
                <th class="th-list">Ders Kodu</th>
                <th class="th-list">Zorunluluk Durumu</th>
                <th class="th-list">Kredi</th>
                <th class="th-list">Ogretmen Adı</th>
            </tr>

            @php
                $totalKredi = 0;
            @endphp


            <tbody>


                @foreach ($dersler as $ders)
                @if($ders->donem == 5 || $ders->donem == 6)
                    @php
                        $totalKredi += $ders->ders_kredisi;
                    @endphp

                    <tr>
                        <td>{{ $ders->ders_kodu }}</td>
                        <td>{{ $ders->ders_adi }}</td>
                        <td>{{ $ders->zorunlu_secmeli }}</td>
                        <td>{{ $ders->ders_kredisi }}</td>
                        <td>{{ $ders->ders_Ogretmen }}</td>

                    </tr>
                @endif
                @endforeach

            </tbody>

            <tr class="enson">
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $totalKredi }}</td>
                <td></td>
            </tr>
        </table>
    </div>

    <div class="4">
        <div class="ilk">
            4.Yarıyıl Ders Planı
        </div>
        <table class="kapsayici">
            <tr class="tr-list">
                <th class="th-list">Ders Adı</th>
                <th class="th-list">Ders Kodu</th>
                <th class="th-list">Zorunluluk Durumu</th>
                <th class="th-list">Kredi</th>
                <th class="th-list">Ogretmen Adı</th>
            </tr>

            @php
                $totalKredi = 0;
            @endphp


            <tbody>


                @foreach ($dersler as $ders)
                @if($ders->donem == 7 || $ders->donem == 8)
                    @php
                        $totalKredi += $ders->ders_kredisi;
                    @endphp

                    <tr>
                        <td>{{ $ders->ders_kodu }}</td>
                        <td>{{ $ders->ders_adi }}</td>
                        <td>{{ $ders->zorunlu_secmeli }}</td>
                        <td>{{ $ders->ders_kredisi }}</td>
                        <td>{{ $ders->ders_Ogretmen }}</td>

                    </tr>
                @endif
                @endforeach

            </tbody>

            <tr class="enson">
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $totalKredi }}</td>
                <td></td>
            </tr>
        </table>
    </div>
@endsection

@section('js')
@endsection
