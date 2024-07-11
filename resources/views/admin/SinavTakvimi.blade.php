@extends('admin.layouts.front')

@section('css')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {

            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .tablinks {
            border-radius: 8px;
            background-color: rgb(239, 239, 239);
            border-color: rgb(228, 228, 228);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }


        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: calc(100% - 12px);
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
@endsection

@section('content')



<div>
    <h2>Sınav Bilgileri</h2>
    <table>
        <tr>
            <th>Ders Kodu</th>
            <th>Ders Adı</th>
            <th>Sınav Yeri</th>
            <th>Sınav Tarihi</th>
            <th>Sınav Dönemi</th>
            <th>Sinavı Sil</th>
        </tr>
        @foreach ($sinavlar as $sinav)
            <form action="{{ route('sinav-takvimi-delete', ['id' => $sinav->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <tr>
                    <td>{{ $sinav->ders_kodu }}</td>
                    <td>{{ $sinav->ders_adi }}</td>
                    <td>{{ $sinav->sinav_yeri }}</td>
                    <td>{{ $sinav->sinav_tarihi }}</td>
                    <td>{{ $sinav->sinav_donemi }}</td>
                    <td><button type="submit" name="delete"
                            style="background-color:red; color:#f2f2f2; border-color:#f2f2f2; ">X</button></td>
                </tr>
            </form>
        @endforeach

    </table>
</div>
    <div class=" row">
        <div class="container col ">

            <form action=" {{ route('sinav-takvimi-add') }}" method="POST">
                @csrf
                <div id="ekle" class="tabcontent ">
                    <h3>Sınav Bilgisi Ekle</h3>

                    <div class="form-group">
                        <label for="dersAdı">Ders Adı</label>
                        <input type="text" id="dersAdı" name="dersAdi" required>
                    </div>
                    <div class="form-group">
                        <label for="sınavTürü">Sınav Dönemi</label>
                        <select id="sınavTürü" name="sinavDonemi" required>
                            <option value="vize">Vize</option>
                            <option value="final">Final</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sınavSınıfı">Sınav Yeri</label>
                        <input type="text" id="sınavSınıfı" name="sinavYeri" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col" style="flex: 1; margin-right: 10px;">
                                <label for="sınavTarihi"
                                    style="display: block; font-size: 16px; color: #333; margin-bottom: 8px;">Sınav
                                    Tarihi</label>
                                <input type="date" id="sınavTarihi" name="sinavTarihi" required
                                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: border-color 0.3s ease;">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Ekle" name="action">
                    </div>

                </div>
            </form>
        </div>

    </div>




    {{-- <div class="tab row">
    <button class="tablinks col mr-1" onclick="openPage('ekle')">Ekle Sayfası</button>
    <button class="tablinks col mr-1" onclick="openPage('sil')">Sil Sayfası</button>
    <button class="tablinks col mr-1" onclick="openPage('guncelle')">Güncelle Sayfası</button>
</div> --}}
@endsection
@section('js')
    <script>
    var deleteButtons = document.querySelectorAll('button[name="delete"]');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var dersId = this.closest('tr').querySelector('td:first-child').textContent;
            deleteStudent(dersId);
        });
    });

    function deleteStudent(ogrenciId) {

        fetch('/admin/sinav-takvimi/' + dersId, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(function(response) {
                if (response.ok) {

                    var row = document.querySelector('tr td:first-child[textContent="' + dersId + '"]').closest(
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
</script>
@endsection
