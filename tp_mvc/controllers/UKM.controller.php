<?php
include_once("conf.php");
include_once("models/UKM.class.php");
include_once("views/UKM.view.php");

class UKMController
{
  // Properti controller
  private $ukm;

  // Konstruktor
  function __construct()
  {
    $this->ukm = new UKM(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  // Method utama untuk menampilkan daftar UKM
  public function index()
  {
    $this->ukm->open();
    $this->ukm->getUKM();

    $data = array('ukm' => array());

    while ($row = $this->ukm->getResult()) {
      array_push($data['ukm'], $row);
    }

    $this->ukm->close();

    $view = new UKMView();
    $view->render($data);
  }

  // Method untuk menambahkan UKM baru
  public function add($data)
  {
    $this->ukm->open();
    $this->ukm->addUKM($data);
    $this->ukm->close();

    header("location:index.php");
  }

  // Method untuk mengedit UKM
  public function edit($id)
  {
    $this->ukm->open();
    $this->ukm->updateUKM($id);
    $this->ukm->close();

    header("location:index.php");
  }

  // Method untuk menghapus UKM
  public function delete($id)
  {
    $this->ukm->open();
    $this->ukm->deleteUKM($id);
    $this->ukm->close();

    header("location:index.php");
  }
}
