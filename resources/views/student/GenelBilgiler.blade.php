@extends('student.layouts.front')

@section("css")
<style>
    .kapsayici div {
        height: 110px;
        border-radius: 10px;
        
        text-align: center;
        display:flex; align-items: center;  justify-content: center;
    };
    .texts{

    };
</style>

@endsection

@section("content")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-e8+YoFtjH2xQ5X8Tl7ZkC3n8OgpqQw9NgCQ0gveMqGvXo+0wAHbW4Zd7Ff8pFryQsKuRv7f8tC7xL6rZo6eGzA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  @php

  @endphp
<div >
    <div class=" bg-success " style="border: 2px solid #c7c7c7; height:50px; border-radius:10px; display:flex; align-items: center;  background-color: rgb(119, 222, 119); color:aliceblue; justify-content: center;">
        <b>Bilgilendirme : </b>  Bahar Döneminde 2 Adet Onaylanmış ders kaydınız mevcut.

    </div>
    <br>

    <div class="row kapsayici">
        <div class="col mr-2" style="background-color:#005a8c!important; border: 2px solid #c7c7c7; color: #ffffff;">
            <div class="icons" style="height: 80px; width: 80px; display: flex; align-items: center; justify-content: left;"><i class="fa fa-university fa-3x"></i></div>
            <div class="texts">Aktif Akademik Dönem Bilgileri <br>2023-2024 Bahar</div>
        </div>
        <div class="col mr-2" style="background-color: #52b864!important; border: 2px solid #c7c7c7; color: #ffffff;">
            <div class="icons" style="height: 80px; width: 80px; display: flex; align-items: center; justify-content: left;"><i class="fa-solid fa-chalkboard-user fa-3x"></i></div>
            <div class="texts">Aktif Danışman Bilgileri <br>Ahmet Yılmaz </div>
        </div>
        <div class="col mr-2" style="background-color: #27a7df!important; border: 2px solid #c7c7c7; color: white">
            <div class="icons" style="height: 80px; width: 80px; display: flex; align-items: center; justify-content: left;"><i class="fas fa-book fa-3x"></i></div>
            <div class="texts">Öğrenim Bilgileri <br> {{$ogrenciler->bolum}}</div>
        </div>
        <div class="col mr-2" style="background-color: #4c7c8f!important; border: 2px solid #c7c7c7; color: #ffffff;">
            <div class="icons" style="height: 80px; width: 80px; display: flex; align-items: center; justify-content: left;"><i class="fas fa-database fa-3x"></i></div>
            <div class="texts">Kayıt Tarihi : 30.08.2020 <br>{{$ogrenciler->GNO}}</div>
        </div>
    </div>
    
   </div>

@endsection

@section("js")


@endsection
