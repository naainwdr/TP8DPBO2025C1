<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/UKM.controller.php");

$ukm = new UKMController();

if (isset($_POST['add'])) {
    // Lengkapi bagian untuk mengambil post data
    $data = $_POST;
    $ukm->add($data);
} else if (!empty($_GET['id_hapus'])) {
    // Lengkapi bagian untuk menghapus data
    $id = $_GET['id_hapus'];
    $ukm->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // Lengkapi bagian untuk mengedit status data
    $id = $_GET['id_edit'];
    $ukm->edit($id);
} else {
    $ukm->index();
}
