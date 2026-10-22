<?php
$barang = ["buku" => 5000, "pulpen" => 3000, "penghapus" => 2000, "penggaris" => 4000];
$total = 0;
$rincian = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($barang as $nama => $harga) {
        $qty = (int)($_POST['qty'][$nama] ?? 0);
        if ($qty > 0) {
            $sub = $qty * $harga;
            $total += $sub;
            $rincian[] = "$nama * $qty = Rp " . number_format($sub, 0, ',','.');
        }
    }
}
?>
<h2>total belanja</h2>
<form method="post">
    <?php foreach ($barang as $nama => $harga): ?>
        <p><?= $nama ?> (Rp <?= number_format($harga, 0, ',','.') ?></p>
        <input type="number" name="qty[<?= $nama ?>]" min="0" value="0"></P>
    <?php endforeach; ?>
    <button>hitung total</button>
</form>
<?php
foreach ($rincian as $r) echo "$r <br>";
if ($total > 0) echo "<h3>total: Rp ". number_format($total, 0, ',','.') . "</h3>";
