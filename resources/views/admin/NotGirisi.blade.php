@extends('admin.layouts.front')

@section('css')

    @endsection

    @section('content')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-e8+YoFtjH2xQ5X8Tl7ZkC3n8OgpqQw9NgCQ0gveMqGvXo+0wAHbW4Zd7Ff8pFryQsKuRv7f8tC7xL6rZo6eGzA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <div>
            <form action="secilen-ders" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Sınav Seçiniz*</label>
                            <select id="sinavSecim" name="vize-final" class="form-control">
                                <option>Lütfen Seçiniz...</option>
                                <option value="final">Yılsonu Sınavı (Final)</option>
                                <option value="vize">Arasınav (Vize)</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label>Ders Seçiniz*</label>
                            <select id="dersSecim" name="ders_id" class="form-control">
                                <option value="">Lütfen Seçiniz...</option>
                                @foreach ($dersler as $ders)
                                    <option value="{{ $ders->id }}">{{ $ders->ders_adi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div style="text-align: center; margin-top:35px; " class="col-4">
                        <button
                            type="submit"style="border:  3px white; border-radius:0.25rem; width:150px;
                                        height:38px; background-color:#007bff;color:white; box-shadow:2px 2px 4px rgba(0, 0, 0, 0.5); ">Listele</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="tabloAlani">
            <form action="not-ekle" method="POST">
                @csrf
                @if (isset($ogrenciler) && $ogrenciler->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Öğrenci Numarası</th>
                                <th>Öğrenci Adı</th>
                                <th>Sınav Türü</th>
                                <th>Ders</th>
                                <th>Not</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ogrenciler as $ogrenci)
                                <tr>
                                    <input type="hidden" name="ders_adi" value="{{ $dersadi }}">
                                    <input type="hidden" name="sinav_turu" value="{{ $sinavturu }}">
                                    <input type="hidden" name="ogrenci_id[]" value="{{ $ogrenci->id }}">
                                    <input type="hidden" name="ogrenci_no[]" value="{{ $ogrenci->ogrNo }}">
                                    <td>{{ $ogrenci->ogrNo }}</td>
                                    <td>{{ $ogrenci->adSoyad }}</td>
                                    <td>{{ $sinavturu }}</td>
                                    <td>{{ $dersadi }}</td>
                                    <td><input type="text" name="not[]" class="not"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Henüz Bir Ders Seçilmedi.</p>
                @endif
                <div style="text-align: right;">
                    <button type="submit"
                        style="border-radius: 5px; background-color:rgb(236, 232, 232); border-color:gray">Kaydet</button>
                </div>
            </form>
        </div>

    @endsection

    @section('js')
    @endsection
