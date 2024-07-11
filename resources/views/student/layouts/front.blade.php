<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogrenci Bilgi Sistemi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .panel-content {
            padding: 30px 15px;
            width: calc(100% - 254px);
          }
          @media (max-width: 991px) {
            .panel-content {
              padding: 90px 15px 30px;
              width: 100%;
            }
          }
          .panel-content .webinar-card {
            box-shadow: 0px 12px 23px 0px rgba(62, 73, 84, 0.04) !important;
          }
          .panel-content .webinar-card:hover {
            transform: unset !important;
            box-shadow: 0px 8px 23px 0px rgba(62, 73, 84, 0.15) !important;
            transition: all 0.5s ease;
          }
          .panel-content .webinar-card .image-box::after {
            border-radius: 10px 0 0 10px;
          }
        </style>
    @yield('css')

</head>

<body>
    <div id = "panel_app">

        @include('layouts.student.sidebar')
        <div class="d-flex justify-content-end">
            <div class="panel-content">
                @yield('content')


            </div>
        </div>
    </div>

    @yield('js ')

</body>

</html>

@push('styles_top')
@endpush

@section('content')
@endsection
