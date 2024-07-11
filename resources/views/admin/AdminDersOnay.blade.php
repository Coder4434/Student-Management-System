@extends('admin.layouts.front')

@section('css')
    <style>
        .right-aligned-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .right-aligned-container span {
            color: red;
            margin-right: 10px;
        }

        .right-aligned-container button {
            border: 1px solid rgb(211, 211, 211);
            border-radius: 5px;
            height: 40px;
            width: 80px;
            margin-right:24px; 
        }
    </style>
@endsection

@section('content')
    @foreach ($ogrenciler as $ogrenci)
        <div class="mb-3 p-4 bg-dark text-light rounded-3 shadow">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-0">{{ $ogrenci->ogrNo }} Numaralı {{ $ogrenci->adSoyad }} isimli öğrencinin ders kaydı
                        onaylanmadı</h6>
                </div>
                <div>
                    <form action="{{ route('onayla') }}" method="POST" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="ogrenci_id" value="{{ $ogrenci->id }}">
                        <button type="submit" class="btn btn-danger">Onayla</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <form action="{{ route('dersKaydiBaslat') }}" method="POST">
        @csrf
        <div class="right-aligned-container">
            <span>Ders Kaydını Yeniden Başlat</span>
            <button type="submit">Başlat</button>
        </div>
    </form>
@endsection

@section('js')
@endsection
