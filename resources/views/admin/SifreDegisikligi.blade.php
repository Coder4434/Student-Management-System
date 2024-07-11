@extends("admin.layouts.front")

@section('css')
    <style>
        .yazi {
            color: #3A3A3A;
            font-family: Open Sans;
            font-size: 9pt;

        }

        .ust {
            background-color: rgb(233, 232, 232);
            border-radius: 1px;
            padding: 3px;
            box-shadow: #3A3A3A;
            width: 98%;
        }

        .giris input {
            border-radius: 5px;
            width: 398px;

            border-color: rgb(186, 185, 185);
        }

        .girisiki input {
            border-radius: 5px;
            width: 398px;

            border-color: rgb(186, 185, 185);
        }

        .btnkaydet {
            border-color: rgb(191, 191, 191);
        }
    </style>
@endsection

@section('content')
    <div id="UpdatePanel1">

        <div class="ust">Şifre Değiştir</div>
        <form method="POST" action="{{ route('updateAdminSifre') }}">
            @csrf
            <div class="row">
                <div class="giris col-12">
                    <div class="col-4">
                        <span class="ml-2 ">Yeni Şifre</span>
                    </div>
                    <div class="col-8">
                        <input type="password" name="yeni_sifre">
                    </div>
                </div>
                <div class="giris col-12">
                    <div class="col-4">
                        <span class="ml-2 ">Yeni Şifre Tekrar</span>
                    </div>
                    <div class="col-8">
                        <input type="password" name="yeni_sifre_tekrar">
                        <div class="mt-2">
                            <button type="submit" class="btnkaydet">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="col-md-10">
            &nbsp;<br><br><br>
            <span class="yazi">Şifre tanımlarken lütfen aşağıdaki
                hususlara dikkat ediniz;</span><br>
            <span class="yazi"><b>1</b>. En Fazla 15
                Karakter<br><b>2</b>. Tahmin edilebilir olmamalıdır. Örneğin şu bilgileri içermemelidir: hesap adı, T.C.
                numarası, telefon numarası, doğum tarih, aile fertlerinden birinin adı, vs.<br><b>3</b>. Şifrenin içinde en
                az bir büyük harf bulunabilir (sistem, büyük - küçük harf duyarlılığına sahiptir). Yanlış örnek: "abhde5f",
                doğru örnek: "abHde5F".<br><b>4</b>. Şifrenizde en az bir sayı bulunabilir.<br><b>5</b>. Şifrenizde
                bulunanan sayılar veya harfler ardışık olmamalıdır. Yanlış örnek: "abcd1234", doğru örnek:
                "a1B2c3d4".<br><b>5</b>. Şifreniz bulunan sayılar veya harfler en fazla 2 defa tekrar etmelidir. Yanlış
                örnek: "aaaa1111", doğru örnek "aa11BB22".<br><b>7</b>. Şifrenizi hiç kimseyle paylaşmayınız.<br></span>
            <span class="yazi">Not: Verilen yeni şifre T.C.
                Kimlik Numarasından Bir Parça İçermemelidir.</span>
            <br>
            <span class="yazi">Eğer şifre T.C. Kimlik
                Numarasından bir parça içeriyorsa,</span>
            <br>
            <span class="yazi">Öğrenci sisteme her girdiğinde
                şifre değiştirme ekranı ile karşılaşır.</span>
        </div>
    </div>
@endsection

@section('js')
@endsection
