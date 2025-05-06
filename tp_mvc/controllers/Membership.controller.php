<?php
include_once("conf.php");
include_once("models/Membership.class.php");
include_once("models/Student.class.php");
include_once("models/UKM.class.php");
include_once("views/Membership.view.php");

class MembershipController
{
  private $membership;
  private $student;
  private $ukm;

  function __construct()
  {
    $this->membership = new Membership(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->student = new Student(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->ukm = new UKM(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index()
  {
    $this->membership->open();
    $this->student->open();
    $this->ukm->open();

    $this->membership->getMemberships();
    $this->student->getStudents();
    $this->ukm->getUKM();

    $data = [
      'memberships' => [],
      'students' => [],
      'ukms' => []
    ];

    while ($row = $this->membership->getResult()) {
      $data['memberships'][] = $row;
    }

    while ($row = $this->student->getResult()) {
      $data['students'][] = $row;
    }

    while ($row = $this->ukm->getResult()) {
      $data['ukms'][] = $row;
    }

    $this->membership->close();
    $this->student->close();
    $this->ukm->close();

    $view = new MembershipView();
    $view->render($data);
  }

  public function add($data)
  {
    $this->membership->open();
    $this->membership->addMembership($data);
    $this->membership->close();

    header("Location: index.php?page=membership");
  }

  public function create()
  {
    $this->student->open();
    $this->ukm->open();
  
    $this->student->getStudents();
    $this->ukm->getUKM();
  
    $students = [];
    $ukms = [];
  
    while ($row = $this->student->getResult()) {
      $students[] = $row;
    }
  
    while ($row = $this->ukm->getResult()) {
      $ukms[] = $row;
    }
  
    $this->student->close();
    $this->ukm->close();
  
    include("templates/membershipsCreate.html");
  }
  

  public function delete($id)
  {
    $this->membership->open();
    $this->membership->deleteMembership($id);
    $this->membership->close();

    header("Location: index.php?page=membership");
  }

  public function updateMembership($id, $join_date, $role)
  {
    $this->membership->open();
    $this->membership->updateMembership($id, $join_date, $role);
    $this->membership->close();
  
    header("Location: index.php?page=membership");
  }  
}
