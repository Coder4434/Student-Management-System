@extends('admin.layouts.front')

@section('css')
<style>
    /* Tablo stilleri */
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

    /* Öğrenci ekleme formu stilleri */
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




    h1 {
        text-align: center;
        margin-bottom: 20px;
    }



    input[type="date"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
</style>
@endsection

@section('content')
    <div>
        <h2>Yeni Öğrenci Ekle</h2>
        <form action="{{ route('update-students') }} " method="POST">
            @csrf
            <div>
                <label for="ogrenciNo">Öğrenci Numarası:</label>
                <input type="text" id="ogrenciNo" name="ogrenciNo" required>
            </div>
            <div>
                <label for="adSoyad">Adı Soyadı:</label>
                <input type="text" id="adSoyad" name="adSoyad" required>
            </div>
            <div>
                <label for="bolum">Bölümü:</label>
                <input type="text" id="bolum" name="bolum" required>
            </div>
            <div>
                <label for="sinif">Sınıfı:</label>
                <input type="text" id="sinif" name="sinif" required>
            </div>
            <div>
                <label for="gno">GNO:</label>
                <input type="text" id="sinif" name="gno" required>
            </div>
            <div class="mb-3">
                <label for="tarih">Tarih:</label>
                <input type="date" id="tarih" name="tarih" required style="
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    font-size: 16px;
                    width: 200px;
                ">
            </div>
            <div>
                <button type="submit">Öğrenci Ekle</button>
            </div>
        </form>
    </div>

    <div>

        <h2 class="mt-4">Öğrenci Bilgileri</h2>
        <table>
            <tr>
                <th>Numarası</th>
                <th>Adı Soyadı</th>
                <th>Bölümü</th>
                <th>Sınıfı</th>
                <th>GNO</th>
                <th>Kişiyi Sil</th>
            </tr>
            @foreach ($ogrenciler as $ogrenci)
                <form action="{{ route('delete-students', ['id' => $ogrenci->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <tr>
                        <td>{{ $ogrenci->ogrNo }}</td>
                        <td>{{ $ogrenci->adSoyad }}</td>
                        <td>{{ $ogrenci->bolum }}</td>
                        <td>{{ $ogrenci->sinif }}</td>
                        <td>{{ $ogrenci->GNO }}</td>
                        <td><button type="submit" name="delete"
                                style="background-color:red; color:#f2f2f2; border-color:#f2f2f2; ">X</button></td>
                    </tr>
                </form>
            @endforeach
            <!-- Diğer öğrenciler için aynı yapıda satırlar eklenebilir -->
        </table>


    </div>
@endsection

@section('js')
    <script>
        var deleteButtons = document.querySelectorAll('button[name="delete"]');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var ogrenciId = this.closest('tr').querySelector('td:first-child').textContent;
                deleteStudent(ogrenciId);
            });
        });

        function deleteStudent(ogrenciId) {

            fetch('/admin/ogrenciler/' + ogrenciId, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(function(response) {
                    if (response.ok) {

                        var row = document.querySelector('tr td:first-child[textContent="' + ogrenciId + '"]').closest(
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
