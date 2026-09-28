# Panduan Pengujian (Walkthrough) MarketPlace Sederhana

Dokumen ini berisi panduan penelusuran (walkthrough) langkah demi langkah untuk menguji fungsionalitas aplikasi web MarketPlace Sederhana. Skenario pengujian ini disusun berdasarkan dokumen spesifikasi tugas praktik untuk memastikan semua fitur inti berjalan sesuai kriteria.

---

## 1. Pengecekan Persiapan dan Database

Sebelum memulai pengujian melalui antarmuka pengguna (UI), pastikan hal-hal berikut telah terpenuhi di level sistem dan database:

- [ ] **Instalasi:** Web server dan text editor sudah terinstal dan berjalan.
- [ ] **Data Awal (Dummy):** Sistem sudah terisi contoh data untuk **1 orang penjual** dan minimal **5 produk** di dalam database.
- [ ] **Struktur Tabel & Tipe Data:**
  - **Tabel `users`:** Memiliki kolom `id_user`, `nama_user`, `email`, `password`, `role`, `tgl_daftar`, `foto_profil`, `status_user`.
    - *Validasi:* `role` hanya berisi 'pembeli' atau 'penjual'. `status_user` hanya 'aktif' atau 'tidak_aktif'.
  - **Tabel `produk`:** Memiliki kolom `id_product`, `penjual_id`, `nama_product`, `deskripsi`, `harga`, `stok`, `kategori`, `gambar_product`, `status_product`.
    - *Validasi:* `status_product` hanya berisi 'tersedia' atau 'habis'.
  - **Tabel `order`:** Memiliki kolom `id_order`, `pembeli_id`, `tgl_order`, `total_harga`, `status_order`, `alamat_pengiriman`, `bukti_bayar`.
    - *Validasi:* `status_order` hanya berisi 'menunggu_bayar', 'menunggu_konfirmasi', 'diproses', 'dikirim', 'selesai', atau 'dibatalkan'.

---

## 2. Skenario Pengujian Pembeli (Buyer)

Gunakan alur ini untuk menguji fitur yang diakses oleh **Pembeli**:

- [ ] **Akses Landing Page:** 
  - Buka halaman utama aplikasi.
  - Pastikan terdapat tautan/tombol yang jelas menuju form Pendaftaran, Login, dan Katalog Produk.
- [ ] **Pendaftaran (Registrasi):** 
  - Klik tautan daftar dan isi formulir pendaftaran akun pembeli baru.
  - Submit form. Pastikan muncul notifikasi sukses dan pengguna diarahkan ke Halaman Login.
- [ ] **Proses Login:** 
  - Masuk menggunakan email/username dan password yang baru saja didaftarkan.
  - Setelah login berhasil, pastikan sistem mengenali role pembeli dan mengarahkan kembali ke Landing Page.
- [ ] **Eksplorasi Produk:** 
  - Buka halaman Katalog Produk.
  - Pilih salah satu produk dan masuk ke Halaman Detail Produk untuk memastikan seluruh informasi produk (nama, gambar, harga, deskripsi) tampil dengan benar.
- [ ] **Keranjang Belanja:** 
  - Tambahkan produk tersebut ke keranjang.
  - Buka Halaman Keranjang. Pastikan daftar produk yang dibeli muncul, terdapat form input alamat pengiriman, dan kalkulasi total harga sesuai.
- [ ] **Proses Checkout & Order:** 
  - Lakukan *checkout* dari halaman keranjang.
  - Pastikan halaman konfirmasi menampilkan: tanggal, nama pembeli, alamat pengiriman, dan total harga.
  - Konfirmasi dan buat order/pesanan baru.
- [ ] **Manajemen Order & Pembayaran:** 
  - Buka Halaman Order pengguna. Pastikan pesanan baru masuk dalam daftar riwayat order.
  - Lakukan simulasi mengunggah bukti pembayaran untuk order tersebut.
  - Pastikan Anda dapat melihat status terkini dari order yang dibuat.

---

## 3. Skenario Pengujian Penjual (Seller)

Gunakan alur ini untuk menguji fitur yang diakses oleh **Penjual**:

- [ ] **Proses Login:** 
  - Buka Halaman Login dan masuk menggunakan kredensial akun penjual (yang sudah ada di database).
  - Pastikan sistem mengenali role penjual dan mengarahkan ke halaman *dashboard* atau manajemen khusus admin/penjual.
- [ ] **Manajemen Produk (CRUD):**
  - **Read:** Buka Halaman Manajemen Produk dan pastikan daftar produk milik penjual tampil.
  - **Create:** Tambahkan produk baru ke katalog (termasuk upload gambar).
  - **Update:** Edit informasi produk (nama, deskripsi, harga, stok, gambar, kategori) serta ubah status produk menjadi 'tersedia' atau 'habis'.
  - **Delete:** Hapus salah satu produk percobaan dari katalog.
- [ ] **Validasi & Manajemen Order:**
  - Buka Halaman Daftar Order. Pastikan Anda bisa melihat daftar semua order yang masuk dari pembeli.
  - Lihat Detail Order (memeriksa rincian produk, *quantity*, dan alamat pengiriman pembeli).
  - **Verifikasi Pembayaran:** Cari order yang dibuat oleh pembeli di skenario sebelumnya, lalu verifikasi bukti pembayaran yang telah diunggah.
  - **Konfirmasi Pesanan:** Lakukan konfirmasi order (menerima/menolak pesanan). Terdapat tombol aksi untuk ini.
  - **Update Status:** Ubah status pesanan menjadi sedang 'diproses' atau 'dikirim'.
  - **Selesai:** Terakhir, ubah status pesanan menjadi 'Selesai' (sebagai simulasi bahwa barang telah diterima oleh pembeli).