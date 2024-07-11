@extends('student.layouts.front')

@section('css')
    <style>
        .tablo {
            width: 98%;
            color: rgb(92, 92, 92);
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);

        }

        /* .ders-ekle-panel {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        position: fixed;
                        top: 0;
                        left: 35%;
                        /* background-color: rgba(0, 0, 0, 0.5);
                        background-color: rgb(51, 49, 49);
                        z-index: 9999;
                        height: 650px;
                        width: 650px;
                    } */

        .ders-ekle-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 35%;
            background-color: rgb(51, 49, 49);
            z-index: 9999;
            height: 650px;
            /* İçeriğin maksimum yüksekliği */
            width: 650px;
            overflow-y: auto;
            /* Dikey kaydırma çubuğunu etkinleştir */
        }

        .birinci {
            background-color: rgb(216, 216, 216);
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);

            border-radius: 3px;
            width: 98%;
        }

        .ikinci {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgb(216, 216, 216);
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            border-radius: 3px;
            width: 98%;
        }

        .ikinci button {
            margin-left: auto;
            border-radius: 6px;
            border-color: gray;
        }

        .tablo {
            text-align: center;
            width: 98%;
        }

        .th-list {
            background: gray;
            color: white;
        }

        .body tr {
            border-bottom: 1px solid #e8e8e8;
        }

        .kırmızı {
            color: red;
            margin: 10px;
        }

        .panelbody {
            color: white;
        }

        .derseklebtn {
            border-radius: 3px;
            background: white;
        }
    </style>
@endsection

@section('content')
    <div>
        <div class="birinci">
            Ders Kayıt Öğrenci Bilgileri
        </div>
        <div>
            @foreach ($ogrenci as $ogr)
                @if ($ogr->id == $getid->id)
                    <table class="tablo">
                        <tr>
                            <td>Öğrenci No/Adı Soyadı</td>
                            <td>{{ $ogr->adSoyad }}</td>
                            <td>Önceki Dönem Bakiye</td>
                            <td>0.00 TL</td>
                        </tr>
                        <tr>
                            <td>Fakülte-Program/Sınıf</td>
                            <td>{{ $ogr->bolum }}</td>
                            <td>Dönemlik Ücret</td>
                            <td>0.00 TL</td>
                        </tr>
                        <tr>
                            <td>Kayıt Tarihi</td>
                            <td>20.02.2020</td>
                            <td>Ödenmesi Gereken Bakiye</td>
                            <td>0.00 TL</td>
                        </tr>
                        <tr>
                            <td>Genel Ortalama</td>
                            <td>{{ $ogr->GNO }}</td>
                        </tr>
                    </table>
                @endif
            @endforeach
        </div>
    </div>

    <div>
        <div class="ikinci mt-3 mb-2">
            <span>Seçilen Dersler</span>
            <button type="submit" id="EkleButton">Ders Ekle</button>
        </div>

        <div>
            <table class="tablo" id="dersListeTable">
                <tr class="th-list">
                    <th>Ders Adı</th>
                    <th>Krd</th>
                    <th>Akts</th>
                    <th>Alış</th>
                    <th></th>
                </tr>
                <tbody class="body">


                </tbody>
            </table>
        </div>

    </div>

    @php
        $totalKredi = 0;
        $totalAKTS = 0;
        $totalHour = 0;
        $dersSayisi = 0;
    @endphp
    <div class="ders-ekle-panel" id="dersEklePanel" style="display: none;">
        <table class="tablo">
            <tr class="th-list">
                <th>Ders Adı</th>
                <th>Krd</th>
                <th>Akts</th>
                <th>Alış</th>
                <th><button class="text-light bg-danger" id="kapatma">X</button></th>
            </tr>
            <tbody class="panelbody">
                @foreach ($dersler as $ders)
                    @php
                        $totalKredi += $ders->ders_kredisi;
                        $totalAKTS += $ders->ders_AKTS;
                        $totalHour += $ders->ders_Saati;
                        $dersSayisi++;
                    @endphp

                    <tr>
                        <td style="display: none;">{{ $ders->id }}</td>
                        <td>{{ $ders->ders_adi }}</td>
                        <td>{{ $ders->ders_kredisi }}</td>

                        <td>{{ $ders->ders_AKTS }}</td>
                        <td>{{ $ders->zorunlu_secmeli }}</td>
                        <td><button type="submit" class="derseklebtn">Ekle</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- <div style="width: 98%" class="mt-3">
        <span>Toplam Kredi:</span>
        <span class="kırmızı">{{ $totalKredi }}</span>
        <span>AKTS:</span>
        <span class="kırmızı">{{ $totalAKTS }}</span>
        <span>Saat:</span>
        <span class="kırmızı">{{ $totalHour }}</span>
        <span>Ders Sayısı:</span>
        <span class="kırmızı">{{ $dersSayisi }}</span>
        <form id="dersEkleForm" method="POST" action="{{ route('dersleri_kaydet') }}">
            @csrf
            <input type="hidden" name="ders_idler" id="ders_idler">
            <!-- Gizli bir input alanı oluşturun ve seçilen derslerin ID'lerini buraya ekleyin -->
            <button type="submit" class="bg-danger text-light border-light onayla"
                style="float: right; border-radius:5px;">Onayla</button>
        </form>

    </div> --}}

    <div style="width: 98%" class="mt-3">
        <span>Toplam Kredi:</span>
        <span class="kırmızı totalKredi">{{ $totalKredi }}</span>
        <span>AKTS:</span>
        <span class="kırmızı totalAKTS">{{ $totalAKTS }}</span>
        <span>Saat:</span>
        <span class="kırmızı totalHour">40</span>
        <span>Ders Sayısı:</span>
        <span class="kırmızı dersSayisi">{{ $dersSayisi }}</span>
        <form id="dersEkleForm" method="POST" action="{{ route('dersleri_kaydet') }}">
            @csrf
            <input type="hidden" name="ders_idler" id="ders_idler">
            <!-- Gizli bir input alanı oluşturun ve seçilen derslerin ID'lerini buraya ekleyin -->
            <button type="submit" class="bg-danger text-light border-light onayla"
                style="float: right; border-radius:5px;">Onayla</button>
        </form>
    </div>


    <div style="color:red; display:flex; align-items:center; justify-content:center; margin-top:23px;">
        @if (isset($onay->ogronay) && isset($onay->danismanonay) && $onay->ogronay == 1 && $onay->danismanonay == 1)
           {Ders Kaydınız Onaylanmıştır Lütfen Yeni Bir İşlem Yapmayınız}
        @endif
    </div>

    <script>
        window.addEventListener('load', function() {


            const dersListeTable = document.getElementById('dersListeTable');


            const dersler = JSON.parse(localStorage.getItem('dersler')) || [];


            dersler.forEach(function(ders) {


                const yeniDersSatiri = document.createElement('tr');


                const dersAdiHucresi = document.createElement('td');


                const krediHucresi = document.createElement('td');


                const aktsHucresi = document.createElement('td');


                const alisHucresi = document.createElement('td');


                const buttons = document.createElement('td');


                const silmeButonu = document.createElement('button');


                dersAdiHucresi.innerText = ders.dersAdi;


                krediHucresi.innerText = ders.kredi;


                aktsHucresi.innerText = ders.akts;


                alisHucresi.innerText = ders.alis;


                silmeButonu.innerText = 'X';


                silmeButonu.classList.add('silme');


                buttons.appendChild(silmeButonu);


                yeniDersSatiri.appendChild(dersAdiHucresi);
                yeniDersSatiri.appendChild(krediHucresi);
                yeniDersSatiri.appendChild(aktsHucresi);
                yeniDersSatiri.appendChild(alisHucresi);
                yeniDersSatiri.appendChild(buttons);


                dersListeTable.querySelector('.body').appendChild(yeniDersSatiri);


                silmeButonu.addEventListener('click', function() {



                    const satir = this.parentNode.parentNode;


                    satir.parentNode.removeChild(satir);


                    const index = dersler.findIndex(
                        (d) =>
                        d.dersAdi === ders.dersAdi &&
                        d.kredi === ders.kredi &&
                        d.akts === ders.akts &&
                        d.alis === ders.alis
                    );


                    if (index !== -1) {
                        dersler.splice(index, 1);


                        localStorage.setItem('dersler', JSON.stringify(dersler));

                    }
                    toplamDegerleriGuncelle();
                });
            });

        });


        const EkleButton = document.getElementById('EkleButton');
        const dersEklePanel = document.getElementById('dersEklePanel');
        const dersListeTable = document.getElementById('dersListeTable');
        const dersListeBody = dersListeTable.querySelector('.body');
        const kapatma = document.getElementById('kapatma');

        EkleButton.addEventListener('click', function() {
            dersEklePanel.style.display = 'block';
        });

        kapatma.addEventListener('click', function() {
            dersEklePanel.style.display = 'none';
        });

        const ekleButonlari = document.querySelectorAll('.panelbody .derseklebtn');


        ekleButonlari.forEach(function(ekleButonu) {


            ekleButonu.addEventListener('click', function() {


                const dersAdi = this.parentNode.parentNode.querySelector('td:nth-child(2)').innerText;


                const kredi = this.parentNode.parentNode.querySelector('td:nth-child(3)').innerText;


                const akts = this.parentNode.parentNode.querySelector('td:nth-child(4)').innerText;


                const alis = this.parentNode.parentNode.querySelector('td:nth-child(5)').innerText;


                const yeniDersSatiri = document.createElement('tr');


                const dersAdiHucresi = document.createElement('td');


                const krediHucresi = document.createElement('td');


                const aktsHucresi = document.createElement('td');

                const alisHucresi = document.createElement('td');


                const buttons = document.createElement('td');


                const silmeButonu = document.createElement('button');


                silmeButonu.classList.add('silme');


                dersAdiHucresi.innerText = dersAdi;


                krediHucresi.innerText = kredi;


                aktsHucresi.innerText = akts;


                alisHucresi.innerText = alis;


                silmeButonu.innerText = 'X';
                buttons.appendChild(silmeButonu);


                yeniDersSatiri.appendChild(dersAdiHucresi);
                yeniDersSatiri.appendChild(krediHucresi);
                yeniDersSatiri.appendChild(aktsHucresi);
                yeniDersSatiri.appendChild(alisHucresi);
                yeniDersSatiri.appendChild(buttons);


                dersListeBody.appendChild(yeniDersSatiri);


                const ders = {
                    dersAdi: dersAdi,
                    kredi: kredi,
                    akts: akts,
                    alis: alis
                };


                const dersler = JSON.parse(localStorage.getItem('dersler')) || [];

                dersler.push(ders);

                localStorage.setItem('dersler', JSON.stringify(dersler));

                silmeButonu.addEventListener('click', function() {

                    const satir = this.parentNode.parentNode;

                    satir.parentNode.removeChild(satir);


                    const index = dersler.findIndex((d) =>
                        d.dersAdi === ders.dersAdi &&
                        d.kredi === ders.kredi &&
                        d.akts === ders.akts &&
                        d.alis === ders.alis
                    );


                    if (index !== -1) {
                        dersler.splice(index, 1);

                        localStorage.setItem('dersler', JSON.stringify(dersler));

                    }
                    toplamDegerleriGuncelle();
                });
                toplamDegerleriGuncelle();
            });
        });


        document.querySelector('.onayla').addEventListener('click', function() {
            document.getElementById('EkleButton').disabled = true;
            document.querySelectorAll('.silme').forEach(function(button) {
                button.disabled = true;
            });
        });

        const silmeButtons = document.getElementsByClassName('silme');


        for (let i = 0; i < silmeButtons.length; i++) {
            silmeButtons[i].addEventListener('click', function() {
                const row = this.parentNode.parentNode;
                row.parentNode.removeChild(row);
            });
        }

        document.querySelector('.onayla').addEventListener('click', function() {
            const ders_idler = [];


            const secilenDersler = dersListeTable.querySelectorAll('.body tr');


            secilenDersler.forEach(function(satir) {
                const ders_id = satir.querySelector('td:first-child').innerText;

                ders_idler.push(ders_id);

            });

            document.getElementById('ders_idler').value = JSON.stringify(ders_idler);

        });

        function toplamDegerleriGuncelle() {
            const dersListeTable = document.getElementById('dersListeTable');
            const secilenDersler = dersListeTable.querySelectorAll('.body tr');

            let toplamKredi = 0;
            let toplamAKTS = 0;
            let toplamSaat = 0;
            let dersSayisi = 0;

            secilenDersler.forEach(function(satir) {
                const kredi = parseFloat(satir.querySelector('td:nth-child(2)').innerText);
                const akts = parseFloat(satir.querySelector('td:nth-child(3)').innerText);
                const saat = parseFloat(satir.querySelector('td:nth-child(4)').innerText);

                toplamKredi += kredi;
                toplamAKTS += akts;
                toplamSaat += saat;
                dersSayisi++;
            });

            document.querySelector('.kırmızı.totalKredi').innerText = toplamKredi;
            document.querySelector('.kırmızı.totalAKTS').innerText = toplamAKTS;
            document.querySelector('.kırmızı.dersSayisi').innerText = dersSayisi;
        }

    </script> -

@endsection

@section('js')
@endsection
