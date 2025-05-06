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
- config/db.php
   Berisi konfigurasi koneksi database menggunakan PDO. File ini digunakan oleh seluruh model untuk mengakses database.
- class/
   Folder ini berisi file PHP class model untuk masing-masing entitas di database, yaitu Artist.php, Album.php, Song.php, Studio.php, Recording.php. Masing-masing class memiliki fungsi CRUD (Create, Read, Update, Delete) yang berinteraksi langsung dengan database melalui koneksi dari db.php.
- database/db_song.sql
   Berisi kumpulan query SQL (DDL) untuk membuat struktur tabel-tabel yang digunakan dalam aplikasi, termasuk foreign key dan relasi antar tabel.
- view/
   Folder ini berisi subfolder untuk setiap entitas utama, yaitu view/Artist/, view/Album/, view/Song/, view/Studio/, view/Recording/. Masing-masing folder memiliki 4 file:
   - addX.php untuk form tambah data
   - editX.php untuk form edit data
   - deleteX.php untuk menghapus data
   - viewX.php untuk menampilkan data dalam tabel
   (X menyesuaikan nama entitas, misalnya Artist, Album, dsb)
- index.php
   Halaman utama aplikasi. File ini menangani navigasi halaman berdasarkan parameter page di URL dan me-load view yang sesuai.
- style.css
   File CSS untuk styling tampilan.


# Penjelasan Alur Program

1. User membuka privateindex.phpprivate sebagai halaman utama navigasi
2. Memilih entitas (Artist, Album, dll) akan diarahkan ke folder privateview/<entitas>/viewXXX.phpprivate
3. Di halaman tersebut dapat melihat daftar data dan melakukan:
   - Mencari data
   - Tambah data
   - Edit data
   - Hapus data
4. Untuk melakukan search terdapat search bar untuk mencari berdasarkan judul. Pencarian dikirim dengan metode GET, dan hasil ditampilkan dalam bentuk filter
5. Saat tambah/edit, jika entitas memiliki relasi, akan muncul dropdown (misal pilih artist saat buat album)
6. Data diproses melalui method-method class di class/(namaEntitas) dengan koneksi dari config/db

# Dokumentasi Program

