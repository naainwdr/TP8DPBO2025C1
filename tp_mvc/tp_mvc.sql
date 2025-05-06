-- Tabel Mahasiswa
CREATE TABLE students (
    id_student INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nim VARCHAR(20) UNIQUE NOT NULL,
    phone VARCHAR(15),
    prodi VARCHAR(50)
);

-- Tabel UKM
CREATE TABLE ukm (
    id_ukm INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    established_year INT
);

-- Tabel Keanggotaan Mahasiswa dalam UKM
CREATE TABLE memberships (
    id_membership INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    ukm_id INT NOT NULL,
    join_date DATE,
    role ENUM('anggota', 'pengurus') DEFAULT 'anggota',
    FOREIGN KEY (student_id) REFERENCES students(id_student) ON DELETE CASCADE,
    FOREIGN KEY (ukm_id) REFERENCES ukm(id_ukm) ON DELETE CASCADE
);
