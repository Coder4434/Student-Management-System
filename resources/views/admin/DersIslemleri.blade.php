@extends('admin.layouts.front')

@section('css')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .liste {
            position: absolute;
            right: 0;
            height: 50px;
            width: 150px;
        }

        .page {
            display: none;
        }

        .active {
            display: block;
        }

        label {
            font-weight: bold;
        }

        button:first-child {
            margin-right: 4%;
        }

        form label {
            font-weight: bold;
        }

        button {
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-right: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .panel {
            display: none;
            padding: 20px;
            margin-top: 20px;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 30%;
            color: white;
            background-color: rgb(51, 49, 49);
            z-index: 9999;
            height: 600px;
            width: 800px;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
            width: auto;
            text-align: center;
        }

        .panel {
            display: none;
            flex-direction: column;
            align-items: center;
        }

        .add-form {
            margin-top: 20px;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .label {
            font-weight: bold;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        th {
            background-color: rgb(2, 3, 27);
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        .add-button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-button:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <table>
            <tr>
                <th>Ders Kodu</th>
                <th>Ders Adı</th>
                <th>Dersin Kredisi</th>
                <th>Dersin Dönemi</th>
                <th>Öğretim Görevlisi</th>
                <th>Dersin Sınıfı</th>
                <th>Dersi AKTS</th>
                <th>Ders Türü</th>
                <th>Ders Saati</th>
                <th>Ders Sil</th>

            </tr>
            @foreach ($dersler as $ders)
                <tr>
                    <td>{{ $ders->ders_kodu }}</td>
                    <td>{{ $ders->ders_adi }}</td>
                    <td>{{ $ders->ders_kredisi }}</td>
                    <td>{{ $ders->donem }}</td>
                    <td>{{ $ders->ders_Ogretmen }}</td>
                    <td>{{ $ders->ders_sinif }}</td>
                    <td>{{ $ders->ders_AKTS }}</td>
                    <td>{{ $ders->zorunlu_secmeli }}</td>
                    <td>{{ $ders->ders_Saati }}</td>
                    <form action="{{ route('ders-delete', ['id' => $ders->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <td><button type="submit" style="background-color:rgb(220, 17, 17); color:#f8f9fa;  " name="delete">X</button>
                        </td>
                    </form>

                </tr>
            @endforeach
        </table>
    </div>
</div>
    <button type="submit" id="liste" class="liste" style="margin-right: 30px;">Yeni Ders Ekle</button>
    <br>
    <div id="panel" class="panel">

        <button class="btn " id="kapatma" type="button"
            style="position: absolute; top:5px; margin-right:20px; right: 0; background-color: red; color: white;">X</button>

        <form class="add-form" style="display: flex; flex-direction: column; align-items: center;"
            action="{{ route('ders-add') }}" method="POST">
            @csrf
            <div class="row" style="width: 100%;">
                <div class="col">
                    <div class="form-group">
                        <label for="dersAdi">Ders Adı:</label>
                        <input type="text" id="dersAdi" name="dersAdi" class="input-field">
                    </div>
                    <div class="form-group">
                        <label for="dersDonem">Ders Donem:</label>
                        <input type="text" id="dersDonem" name="dersDonem" class="input-field">
                    </div>
                    <div class="form-group">
                        <label for="dersKredisi">Ders Kredisi:</label>
                        <input type="text" id="dersKredisi" name="dersKredisi" class="input-field">
                    </div>
                    <div class="form-group">
                        <label for="dersOgretimGorevlisi">Öğretim Görevlisi:</label>
                        <input type="text" id="dersOgretimGorevlisi" name="dersOgretmen" class="input-field">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="dersSinifi">Dersin Sınıfı:</label>
                        <input type="text" id="dersSinifi" name="dersSinifi" class="input-field">
                    </div>
                    <div class="form-group">
                        <label for="dersAKTS">Dersin AKTS:</label>
                        <input type="text" id="dersAKTS" name="dersAKTS" class="input-field">
                    </div>
                    <div class="form-group">
                        <label for="dersSaat">Dersin Saat:</label>
                        <input type="text" id="dersSaat" name="dersSaat" class="input-field">
                    </div>
                    <div class="form-group">
                        <label for="dersTur">Dersin Türü:</label>
                        <input type="text" id="dersTur" name="dersTur" class="input-field">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Ders Bilgisini Ekle</button>
        </form>

    </div>
@endsection

<script>
    var deleteButtons = document.querySelectorAll('button[name="delete"]');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var dersID = this.closest('tr').querySelector('td:first-child').textContent;
            deleteStudent(dersID);
        });
    });

    function deleteStudent(dersID) {

        fetch('/admin/ogrenciler/' + dersID, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(function(response) {
                if (response.ok) {

                    var row = document.querySelector('tr td:first-child[textContent="' + dersID + '"]').closest(
                        'tr');
                    row.remove();
                    alert('Öğrenci başarıyla silindi.');
                } else {
                    alert('Öğrenci silinemedi. Lütfen daha sonra tekrar deneyin.');
                }
            })
            .catch(function(error) {
                alert('Bir hata oluştu. Lütfen daha sonra tekrar deneyin.');
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const panel = document.getElementById('panel');
        const liste = document.getElementById('liste');
        const kapatma = document.getElementById('kapatma');

        liste.addEventListener('click', function(event) {
            event.preventDefault();
            panel.style.display = 'block';
        });
        kapatma.addEventListener('click', function(event) {
            event.preventDefault();
            panel.style.display = 'none';
        });
    });
</script>

@section('js')
@endsection
