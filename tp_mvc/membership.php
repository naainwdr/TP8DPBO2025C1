<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Membership.controller.php");

$membership = new MembershipController();

if (isset($_POST['add'])) {
    // Lengkapi bagian untuk mengambil post data
    $data = $_POST;
    $membership->add($data);
} else if (!empty($_GET['create'])) {
    $membership->create();
}else if (!empty($_GET['id_hapus'])) {
    // Lengkapi bagian untuk menghapus data
    $id = $_GET['id_hapus'];
    $membership->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // Lengkapi bagian untuk mengedit status data
    $id = $_GET['id_edit'];
    $membership->edit($id);
} else {
    $membership->index();
}
