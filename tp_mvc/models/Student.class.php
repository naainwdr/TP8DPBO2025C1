<?php

class Student extends DB
{
    // Mendapatkan semua data mahasiswa
    function getStudents()
    {
        $query = "SELECT * FROM students";
        return $this->execute($query);
    }

    // Menambahkan mahasiswa baru
    function addStudent($data)
    {
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $prodi = $data['prodi'];

        $query = "INSERT INTO students (name, nim, phone, prodi) VALUES ('$name', '$nim', '$phone', '$prodi')";
        return $this->execute($query);
    }

    // Menghapus mahasiswa berdasarkan id
    function deleteStudent($id)
    {
        $query = "DELETE FROM students WHERE id_student = '$id'";
        return $this->execute($query);
    }

    function getStudentById($id)
    {
        $query = "SELECT * FROM students WHERE id_student = '$id'";
        return $this->execute($query);
    }


    // Memperbarui data mahasiswa
    function updateStudent($data)
    {
        $id = $data['id_student'];
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $prodi = $data['prodi'];

        $query = "UPDATE students SET name = '$name', nim = '$nim', phone = '$phone', prodi = '$prodi' WHERE id_student = '$id'";
        return $this->execute($query);
    }
}
?>
