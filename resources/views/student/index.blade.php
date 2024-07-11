<!DOCTYPE html>
<html>
<head>
    <title>Öğrenci Bilgi Sistemi</title>
   <style>body {
    margin: 0;
    padding: 0;
}

.navbar {
    background-color: #333;
    color: #fff;
    display: flex;
    align-items: center;
    padding: 10px;
}

.navbar-logo a {
    color: #fff;
    font-weight: bold;
    text-decoration: none;
}

.navbar-nav {
    display: flex;
    list-style-type: none;
    margin-left: auto;
}

.nav-item {
    margin-left: 15px;
}

.sidebar {
    background-color: #f1f1f1;
    width: 200px;
    height: 100vh;
    padding: 20px;
}

.sidebar-nav {
    list-style-type: none;
}

.sidebar-item {
    margin-bottom: 10px;
}

.content {
    margin-left: 200px;
    padding: 20px;
}
</style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="#">Logo</a>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="#">Anasayfa</a></li>
            <li class="nav-item"><a href="#">Öğrenciler</a></li>
            <li class="nav-item"><a href="#">Dersler</a></li>
            <li class="nav-item"><a href="#">Sınavlar</a></li>
            <li class="nav-item"><a href="#">Raporlar</a></li>
        </ul>
    </nav>

    <div class="sidebar">
        <ul class="sidebar-nav">
            <li class="sidebar-item"><a href="#">Profil</a></li>
            <li class="sidebar-item"><a href="#">Ders Programı</a></li>
            <li class="sidebar-item"><a href="#">Notlar</a></li>
            <li class="sidebar-item"><a href="#">Devamsızlık</a></li>
            <li class="sidebar-item"><a href="#">Sınav Sonuçları</a></li>
        </ul>
    </div>

    <div class="content">
        <!-- İçerik buraya gelecek -->
    </div>
</body>
</html>
