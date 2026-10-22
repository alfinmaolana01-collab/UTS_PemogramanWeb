<?php
function tambah($a, $b){return $a + $b;}
function kurang($a, $b){return $a - $b;}
function kali($a, $b){return $a * $b;}
function bagi($a, $b){return $a == 0 ?
"eror: tidak bisa dibagi 0" : $a / $b;}

$hasil = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $a = (float)$_POST['a'];
    $b = (float)$_POST['b'];
    switch ($_POST['op']) {
        case '+': $hasil = tambah($a, $b); break;
        case '-': $hasil = kurang($a, $b); break;
        case '*': $hasil = kali($a, $b); break;
        case '/': $hasil = bagi($a, $b); break;
    }
}
?>
<h2>Kalkulator Sederhana</h2>
<form method="post">
    <input type="number" step="any" name="a" value=" $_post['a'] ?? '' ?>" required>
    <select name="op">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" step="any" name="b" value=" $_post['b'] ?? '' ?>" required>
    <button>Hitung</button>
</form>
<?php if ($hasil !== "") echo "<h3>hasil: $hasil</h3>"; ?>