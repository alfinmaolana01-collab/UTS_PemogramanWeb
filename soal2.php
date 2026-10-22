<?php
$kategori = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usia = (int)$_POST['usia'];
    switch (true) {
        case $usia < 0: $kategori = "Usia Tidak Valid"; break;
        case $usia <= 12: $kategori = "Anak-Anak"; break;
        case $usia <= 17: $kategori = "Remaja"; break;
        case $usia <= 59: $kategori = "Dewasa"; break;
        default:          $kategori = "Lansia";
    }
}
?>
<h2>Cek Kategori Usia</h2>
<form method="post">
    Usia: <input type="number" name="usia" required>
    <button>Cek</button>
</form>
<?php if ($kategori) echo "<h3>kategori: $kategori</h3>"; ?>