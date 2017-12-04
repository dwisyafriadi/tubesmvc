<table border="1">
  <thead>
    <th>No</th>
    <th>Nama</th>
    <th>Nim</th>
    <th>Umur</th>
    <th>Jenis Kelamin</th>
    <th>gambar</th>
    <th>Keluhan</th>
    <th>Solusi</th>
    <th>Aksi</th>
  </thead>
<?php
  while ($row = $result->fetch_assoc()) { ?>
  <tr>
    <td><?=$row['id']?></td>
    <td><?=$row['nama']?></td>
    <td><?=$row['nim']?></td>
    <td><?=$row['umur']?></td>
    <td><?=$row['jenis_kelamin']?></td>
    <td><img src='<?=$row['gambar']?>' height='50'></td>
    <td><?=$row['keluhan']?></td>
    <td><?=$row['solusi']?></td>
    <td>
    <a href="http://localhost/mvc2/mvc/index.php?controller=controller&fungsi=edit&userid=<?=$row['id']?>">
        Update</a>
    <a href="http://localhost/mvc2/mvc/index.php?controller=controller&fungsi=hapus&userid=<?=$row['id']?>">
        Hapus</a>
    </td>
</tr>
<?php }?>
    <tr>
        <td><a href="http://localhost/mvc2/mvc/index.php?fungsi=tambah">Tambah</a></td>
    </tr>
</table>

