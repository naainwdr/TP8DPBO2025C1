<?php
include_once("conf.php");
include_once("models/Student.class.php");
include_once("views/Student.view.php");

class StudentController
{
  // Properti controller
  private $student;

  // Konstruktor
  function __construct()
  {
    $this->student = new Student(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  // Method untuk menampilkan data
  public function index()
  {
    // Membuka koneksi ke database
    $this->student->open();

    // Ambil data mahasiswa
    $this->student->getStudents();

    // Siapkan array data
    $data = array('student' => array());

    // Masukkan data hasil query ke array
    while ($row = $this->student->getResult()) {
      array_push($data['student'], $row);
    }

    // Tutup koneksi database
    $this->student->close();

    // Tampilkan ke view
    $view = new StudentView();
    $view->render($data);
  }

  // Method untuk menambah data mahasiswa
  public function add($data)
  {
    $this->student->open();
    $this->student->addStudent($data);
    $this->student->close();

    header("location:index.php");
  }

  // Method untuk menampilkan form edit data mahasiswa
  public function edit($id)
  {
      $this->student->open();
      $this->student->getStudentById($id);

      $data = $this->student->getResult();

      $this->student->close();

      // Tampilkan form edit
      $view = new StudentView();
      $view->renderEditForm($data);
  }

  public function update($data)
  {
      $this->student->open();
      $this->student->updateStudent($data);
      $this->student->close();

      header("location:index.php");
  }

  // Method untuk menghapus data mahasiswa
  public function delete($id)
  {
    $this->student->open();
    $this->student->deleteStudent($id);
    $this->student->close();

    header("location:index.php");
  }
}
