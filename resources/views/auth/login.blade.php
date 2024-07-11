@extends('layouts.auth.auth')

@section('css')
    <style>
        .ana {
            height: 90px;
            background-color: rgb(1, 1, 39);
            display: flex;
            align-items: center;

        }


        * {
            margin: 0;
            padding: 0;
        }

        .yazi {
            color: aliceblue;
            font-size: 150%;
            margin-left: 10px;
        }

        .bilgi {
            color: aliceblue;
            margin-left: auto;
            margin-right: 10px;
        }

        .kra {
            border: 1px solid rgb(176, 175, 175);
            margin-top: 60px;
            margin-left: 25px;
            margin-right: 25px;
            border: 1px solid rgb(185, 180, 180);
            padding: 15px;
            border-radius: 5px;
        }

        .iki {
            margin-left: 76px;
            border: 1px solid rgb(185, 180, 180);
        }

        .bir {
            margin-left: 33px;
            border: 1px solid rgb(185, 180, 180);
        }

        .sutun {
            margin-top: 5px;
        }
    </style>
    <!-- Bootstrap CSS dosyasını dahil et -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- Bootstrap JavaScript dosyalarını dahil et -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
@endsection

@section('content')
    <nav class="ana">
        <a class="navbar-brand" href="#">
            <img src="https://iste.edu.tr/files/iste_arma.png" height="75" style="margin-left:10px; margin-top:5px;"
                alt="İste" loading="lazy" />
        </a>
        <span class="yazi">İskenderun Teknik Üniversitesi</span>
        <span class=" bilgi">Öğrenci Bilgi Sistemi</span>
    </nav>

    <div class="kra">
        <div class="row">
            <div class="col-md-4" style="margin-top:20px; ">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <span style="color:rgb(96, 96, 96); font-size:14px;">Öğrenci No:</span>
                            <input type="text" class="bir" name="email" id="no">
                        </div>
                    </div>
                    <div class="row sutun">
                        <div class="col">
                            <span style="color:rgb(96, 96, 96); font-size:14px;">Şifre:</span>
                            <input type="password" class="iki" name="password" id="sifre">
                        </div>
                    </div>
                    <div class="row">
                        <button
                            style="width: 37%; margin-left:121px; margin-top:13px; height:25px; border-radius:3px; border-color:rgb(230, 230, 230); background-color:rgb(243, 243, 243); padding-bottom:3px;"
                            class="" type="submit">Giriş</button>
                    </div>
                </form>
            </div>

            <div class="col-md-8" style="border-left: 1px solid rgb(176, 175, 175);">
                <span style="font-family: italic; font-size:10px; ">Değerli Öğrencilerimiz;
                    <br>
                    Yetenek Sende Fırsatlar Yetenek Kapısı'nda! Fırsatlardan ilk sen haberdar olmak istiyorsan, Yetenek
                    Kapısı seni bekliyor. İş /Staj ilanları, kariyer danışmanlığı, kariyer fuarları, etkinlikler ve çok
                    daha fazlasına yetenek kapısından ulaşabilirsin. Detaylı bilgi için
                    <a href="https://www.yetenekkapisi.org"
                        style="color: #0000FF; text-decoration: none;">https://www.yetenekkapisi.org</a><br>

                    Değerli Öğrencimiz, İSTE Uzaktan Öğretim Portalına, <a href="https://ubom.iste.edu.tr/login/index.php"
                        style="color: #0000FF; text-decoration: none;">https://ubom.iste.edu.tr/login/index.php</a>
                    internet adresinden öğrenci numarası ve Öğrenci Bilgi Sistemi (OBS) şifresi ile giriş
                    yapılmaktadır.<br>

                    Üniversitemizin kurumsal e-posta başvurusu, <a href="https://iste.edu.tr/mailbasvuru"
                        style="color: #0000FF; text-decoration: none;">https://iste.edu.tr/mailbasvuru</a> internet
                    sayfasından
                    yapılmaktadır. Üniversitemizin kurumsal e-posta adresine, <a href="https://eposta.iste.edu.tr/"
                        style="color: #0000FF; text-decoration: none;">https://eposta.iste.edu.tr/</a> internet
                    sayfasından giriş yapılmaktadır. <a href="https://kimlik.iste.edu.tr/module/istekimlik"
                        style="color: #0000FF; text-decoration: none;">https://kimlik.iste.edu.tr/module/istekimlik</a>
                    internet adresinden
                    e-Devlet kapısı ile giriş sağlayarak kurumsal e-posta başvurusu esnasında tanımladığınız e-posta
                    adresinizi öğrenebilir, tanımlı e-postanızı güncelleyebilir ve e- posta şifrenizi
                    değiştirebilirsiniz. <br>

                    Öğrenci Numara Sorgulama Sistemine, <a href="https://obs.iste.edu.tr/oibs/ogrsis/no_query.aspx?"
                        style="color: #0000FF; text-decoration: none;">https://obs.iste.edu.tr/oibs/ogrsis/no_query.aspx?</a>
                    internet
                    adresinden giriş sağlayarak T.C. Kimlik numaranızı sisteme girip, öğrenci numaranızı
                    öğrenebilirsiniz.<br>

                    Öğrenci otomasyon şifrenizi, <a href="https://obs.iste.edu.tr/oibs/ogrenci/login.aspx"
                        style="color: #0000FF; text-decoration: none;">https://obs.iste.edu.tr/oibs/ogrenci/login.aspx</a>
                    internet adresinden
                    “Şifre Sıfırla”yı seçerek “Kimlik Bilgileriyle Sıfırla” ya da “E-Posta Adresiyle Sıfırla”
                    seçeneklerinden birini kullanarak belirleyebilirsiniz. Ayrıca öğrenci otomasyon şifrenizi, e devlet
                    ile giriş yaptıktan sonra "Kullanıcı İşlemleri, Şifre Değiştir" menüsünden
                    değiştirebilirsiniz.</span>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
