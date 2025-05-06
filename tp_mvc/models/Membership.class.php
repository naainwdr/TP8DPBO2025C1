<?php

class Membership extends DB
{
  function getMemberships()
  {
    $query = $sql = "SELECT memberships.id_membership, students.name AS student_name, students.nim, 
                    ukm.name AS ukm_name, memberships.join_date, memberships.role 
                    FROM memberships
                    JOIN students ON memberships.student_id = students.id_student
                    JOIN ukm ON memberships.ukm_id = ukm.id_ukm";  
    return $this->execute($query);
  }

  function addMembership($data)
  {
    $student_id = $data['student_id'];
    $ukm_id = $data['ukm_id'];
    $join_date = $data['join_date'];
    $role = $data['role'];

    $query = "INSERT INTO memberships (student_id, ukm_id, join_date, role) 
              VALUES ('$student_id', '$ukm_id', '$join_date', '$role')";
    return $this->execute($query);
  }

  function deleteMembership($id)
  {
    $query = "DELETE FROM memberships WHERE id_membership = $id";
    return $this->execute($query);
  }

  function updateMembership($id, $join_date, $role)
  {
    $query = "UPDATE memberships 
              SET join_date = '$join_date', role = '$role' 
              WHERE id_membership = $id";
    return $this->execute($query);
  }  
}
