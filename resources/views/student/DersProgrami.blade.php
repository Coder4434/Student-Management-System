@extends('student.layouts.front')

@section('css')
<style>
    #ders-programi {
        width: 98%;
        border-collapse: collapse;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .td-stil {
        border: 2px solid rgb(255, 255, 255);
        padding: 10px;
        font-size: 14px;
        /* font-weight: bold; */
        background-color: rgb(240, 240, 240);
        color: rgb(40, 40, 40);
    }

    .tr-stil {
        height: 50px;
    }

    .th-stil {
        border: 2px solid white;
        background-color: rgb(0, 113, 235);
        color: white;
        padding: 10px;
        font-size: 16px;
        text-transform: uppercase;
    }
</style>
@endsection

@section('content')

<div>
    <table id="ders-programi" class="border">
        <thead style="border: 2px solid white;">
            <tr class="tr-stil">
                <th class="th-stil">Saat</th>
                <th class="th-stil">Pazartesi</th>
                <th class="th-stil">Salı</th>
                <th class="th-stil">Çarşamba</th>
                <th class="th-stil">Perşembe</th>
                <th class="th-stil">Cuma</th>
            </tr>
        </thead>
        <tbody>
            @php
                $saatler = [];
                $gunler = ['Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma'];
            @endphp

            @foreach ($dersProgramlari->groupBy('saat') as $saat => $dersler)
                @php
                    $dersGruplari = [];
                    foreach ($gunler as $gun) {
                        $dersGrubu = $dersler->where('gun', $gun)->first();
                        $dersGruplari[$gun] = $dersGrubu ? $dersGrubu->ders->ders_adi : '';
                    }
                @endphp
                <tr class="tr-stil" id="row">
                    <td class="td-stil">{{ $saat }}</td>
                    @foreach ($dersGruplari as $dersAdi)
                        <td class="td-stil">{{ $dersAdi }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>



</div>
@endsection

@section('js')
<script>

</script>
@endsection
