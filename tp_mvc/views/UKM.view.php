<?php

class UKMView
{
  public function render($data)
  {
    $no = 1;
    $dataUKM = '';

    foreach ($data['ukm'] as $row) {
      $dataUKM .= "<tr>
        <td>{$no}</td>
        <td>{$row['name']}</td>
        <td>{$row['description']}</td>
        <td>{$row['established_year']}</td>
        <td>
          <a href='index.php?id_edit_ukm={$row['id_ukm']}' class='btn btn-warning btn-sm mb-2 mb-md-0'>Edit</a>
          <a href='index.php?id_hapus_ukm={$row['id_ukm']}' class='btn btn-danger btn-sm'>Hapus</a>
        </td>
      </tr>";
      $no++;
    }

    $tpl = new Template("templates/ukm.html");
    $tpl->replace("DATA_TABEL", $dataUKM);
    $tpl->replace("JUDUL", "Daftar UKM");
    $tpl->write();
  }
}
