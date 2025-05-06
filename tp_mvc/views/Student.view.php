<?php

class StudentView
{
  public function render($data)
  {
    $no = 1;
    $dataStudent = null;

    foreach ($data['student'] as $row) {
      $dataStudent .= "<tr>
          <td>{$row['id_student']}</td>
          <td>{$row['name']}</td>
          <td>{$row['nim']}</td>
          <td>{$row['phone']}</td>
          <td>{$row['prodi']}</td>
          <td>
            <a class='btn btn-warning btn-sm' href='index.php?id_edit={$row['id_student']}'>Edit</a>
            <a class='btn btn-danger btn-sm' href='index.php?id_hapus={$row['id_student']}'>Delete</a>
          </td>
        </tr>";
    }    

    $tpl = new Template("templates/index.html");

    $tpl->replace("JUDUL", "Data Mahasiswa");
    $tpl->replace("DATA_TABEL", $dataStudent);
    $tpl->write();
  }

  public function renderEditForm($data)
  {
      $tpl = new Template("templates/studentEdit.html");
  
      $tpl->replace("ID_Student", $data['id_student']);
      $tpl->replace("name", $data['name']);
      $tpl->replace("nim", $data['nim']);
      $tpl->replace("phone", $data['phone']);
      $tpl->replace("prodi", $data['prodi']);
  
      $tpl->write();
  }
  

}

