<?php
$file = "todo.txt";
if (!file_exists($file)) touch($file);

if (!empty($_POST['tugas'])) {
    $f = fopen($file, "a");
    fwrite($f, str_replace(["/r", "/n"], " ", $_POST['tugas']) . PHP_EOL);
    fclose($f);
}

if (isset($_POST['hapus'])) {
    $list = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    unset($list[(int)$_POST['hapus']]);
    file_put_contents($file, $list ? implode(PHP_EOL, $list) . PHP_EOL : "");
}

$list = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>
<h2>To-Do List</h2>
<form method="post">
    <input name="tugas" placeholder="tugas baru" required>
    <button>Tambah</button>
</form>
<ul>
<?php foreach ($list as $i => $t): ?>
    <li><?= htmlspecialchars($t) ?> 
        <form method="post" style="display:inline">
            <button name="hapus" value="<?= $i ?>">Hapus</button>
</form>
</li>
<?php endforeach; ?>
</ul>