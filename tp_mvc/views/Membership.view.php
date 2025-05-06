<?php

class MembershipView
{
  public function render($data)
  {
    $no = 1;
    $dataMembership = null;

    foreach ($data['memberships'] as $row) {
      $dataMembership .= "<tr>
          <td>{$no}</td>
          <td>{$row['student_name']}</td> 
          <td>{$row['nim']}</td> 
          <td>{$row['ukm_name']}</td>
          <td>{$row['join_date']}</td>
          <td>{$row['role']}</td> 
          <td>
            <a class='btn btn-warning btn-sm' href='edit.php?id={$row['id_membership']}'>Edit</a>
            <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id_membership']}'>Delete</a>
          </td>
        </tr>";
      $no++;
    }    

    $tpl = new Template("templates/membership.html");

    $tpl->replace("JUDUL", "Keanggotaan Mahasiswa dalam UKM");
    $tpl->replace("DATA_TABEL", $dataMembership);
    $tpl->write();
  }

  public function renderCreateForm()
{
    $tpl = new Template("templates/membershipCreate.html");

    // Kosongkan nilai untuk form input default
    $tpl->replace("FORM_ACTION", "membership.php");
    $tpl->replace("ID", "");
    $tpl->replace("NAME", "");
    $tpl->replace("LEVEL", "");
    $tpl->replace("BUTTON_NAME", "add");
    $tpl->replace("BUTTON_LABEL", "Submit");

    $tpl->write();
}

}
