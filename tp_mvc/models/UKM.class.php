<?php

class UKM extends DB
{
    // Mendapatkan semua data UKM
    function getUKM()
    {
        $query = "SELECT * FROM ukm";
        return $this->execute($query);
    }

    // Menambahkan UKM baru
    function addUKM($data)
    {
        $name = $data['name'];
        $description = $data['description'];
        $established_year = $data['established_year'];

        $query = "INSERT INTO ukm (name, description, established_year) VALUES ('$name', '$description', '$established_year')";
        return $this->execute($query);
    }

    // Menghapus UKM berdasarkan id
    function deleteUKM($id)
    {
        $query = "DELETE FROM ukm WHERE id_ukm = '$id'";
        return $this->execute($query);
    }

    // Memperbarui data UKM
    function updateUKM($data)
    {
        $id = $data['id_ukm'];
        $name = $data['name'];
        $description = $data['description'];
        $established_year = $data['established_year'];

        $query = "UPDATE ukm SET name = '$name', description = '$description', established_year = '$established_year' WHERE id_ukm = '$id'";
        return $this->execute($query);
    }
}
?>
