# TP8DPBO2025C1
Saya Nina Wulandari dengan NIM 2312091 mengerjakan Tugas Praktikum 8 dalam mata kuliah DPBO untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# Desain ERD
![Screenshot 2025-05-06 165921](https://github.com/user-attachments/assets/2b85d489-f67c-43c4-9364-d439dbf6ae30)

# Struktur Database
Database ini menyimpan 3 tabel.

1. students
   * id_student (INT, PK): ID unik
   * name (VARCHAR): Nama lengkap
   * nim (VARCHAR, UNIQUE): Nomor Induk Mahasiswa
   * phone (VARCHAR): No. telepon
   * prodi (VARCHAR): Program studi

2. ukm
   * id_ukm (INT, PK): ID unik
   * name (VARCHAR): Nama UKM
   * description (TEXT): Deskripsi
   * established_year (INT): Tahun berdiri

3. memberships
   * id_membership (INT, PK): ID unik
   * student_id (INT, FK): ID mahasiswa
   * ukm_id (INT, FK): ID UKM
   * join_date (DATE): Tanggal bergabung
   * role (ENUM): Peran ('anggota' / 'pengurus')

### Relasi
* **students → memberships**: 1 mahasiswa bisa ikut banyak UKM
* **ukm → memberships**: 1 UKM bisa punya banyak anggota

# Penjelasan Struktural File
 TP_MVC - Sistem Manajemen Keanggotaan Mahasiswa dalam UKM (MVC Pattern)

### 1. controllers/
Folder ini berisi **controller**, yaitu logika utama yang menghubungkan antara data (model) dan tampilan (view).

- Membership.controller.php - Mengelola data keanggotaan (tambah, hapus, update).
- Student.controller.php - Mengelola data mahasiswa.
- UKM.controller.php - Mengelola data UKM.

### 2. models/
Berisi **kelas model** untuk berinteraksi dengan database.

- DB.class.php - Koneksi database dan eksekusi query dasar.
- Membership.class.php - Fungsi CRUD untuk tabel memberships.
- Student.class.php - Fungsi CRUD untuk tabel students.
- UKM.class.php - Fungsi CRUD untuk tabel ukm.

### 3. views/
Berisi **kelas view** (PHP) yang bertugas menampilkan data menggunakan template HTML.

- Membership.view.php, Student.view.php, UKM.view.php - View khusus tiap entitas.
- Template.class.php - (Opsional) View umum untuk membungkus halaman (header/footer).
- **NOTE:** Di sinilah kamu juga harus menyimpan file HTML dengan ekstensi .php jika ingin menggunakan PHP di dalamnya.

### 4. templates/
Berisi **template HTML statis** (tanpa pemrosesan PHP langsung).
- membership.html, membershipCreate.html – Harus diubah menjadi .php untuk menampilkan data dinamis.

### 5. assets/
Berisi file frontend seperti JavaScript dan CSS.
- js/ – Folder untuk file JS tambahan (misal: bootstrap.min.js, jquery.min.js).


### 6. File Utama (Root Files)
- index.php - Halaman utama mahasiswa.
- membership.php - Endpoint untuk keanggotaan, memanggil MembershipController.
- conf.php - Konfigurasi database global.



# Alur Program
Tambah, edit, dan hapus mahasiswa.

Tambah, edit, dan hapus UKM.

Tambah dan kelola keanggotaan mahasiswa dalam UKM.

# Dokumentasi Program
![image](https://github.com/user-attachments/assets/4576d931-0fd4-4432-8bcc-d0be02518c80)

https://github.com/user-attachments/assets/bdefdee0-f4c9-47ee-930a-e19e9e53a65e


