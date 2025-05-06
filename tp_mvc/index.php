<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Student.controller.php");

$student = new StudentController();

if (isset($_POST['add'])) {
    $data = $_POST;
    $student->add($data);

} else if (isset($_POST['update'])) {
    $data = $_POST;
    $student->update($data); // ini untuk proses submit dari form edit

} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $student->delete($id);

} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $student->edit($id); // ini untuk menampilkan form edit

} else {
    $student->index();
}

