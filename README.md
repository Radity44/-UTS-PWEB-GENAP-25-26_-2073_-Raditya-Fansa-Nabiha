# 🗒️ UTS PWEB 25/26 — MyRencanaKu (To-Do List)

## 📌 Deskripsi Singkat
**MyRencana** adalah website *To-Do List sederhana* yang dibuat menggunakan **Laravel 12** tanpa database, sesuai dengan ketentuan UTS Praktikum Pemrograman Web.  
Website ini berfungsi untuk mencatat, menandai, dan mengelola daftar kegiatan (rencana pribadi maupun tim) dengan penyimpanan berbasis **session browser**.

---
## 📁 Folder & File yang Dibuat

### 🧭 1. `routes/web.php`
File utama untuk mendefinisikan **routing** (jalur URL).  
Setiap route menentukan ke halaman mana pengguna akan diarahkan dan fungsi controller mana yang dijalankan.

**Fungsi utama dalam `web.php`:**
- Menampilkan halaman login (`/` dan `/login`)
- Mengarahkan ke dashboard (`/dashboard`)
- Menampilkan halaman MyRencanaKu (`/myrencanaku`)
- Menampilkan halaman profil (`/profil`)
- Mengatur proses tambah, ubah status, dan hapus to-do list

---

### 🧩 2. `app/Http/Controllers/PageController.php`
Berisi **logika utama aplikasi** — semua halaman dipanggil dan dikontrol dari sini.  
File ini mengatur alur data, request form, dan session.

**Fungsi di dalamnya:**
| Fungsi | Penjelasan |
|---------|-------------|
| `login()` | Menampilkan halaman login |
| `loginProcess()` | Memproses input login (nama lengkap, username, password) dan menyimpan ke session |
| `beranda()` | Menampilkan dashboard utama dengan daftar kegiatan |
| `myrencanaku()` | Menampilkan form tambah kegiatan dan daftar to-do list |
| `addRencana()` | Menambahkan kegiatan baru ke session |
| `toggleRencana()` | Mengubah status kegiatan (selesai/belum) |
| `deleteRencana()` | Menghapus kegiatan dari session |
| `profil()` | Menampilkan profil pengguna dan statistik tugas |

---

### 🎨 3. `resources/views/layouts/`
Folder yang menyimpan **template dasar (layout)** untuk semua halaman.

- `app.blade.php` → Layout utama yang digunakan di hampir semua halaman.  
  Termasuk navbar, footer, dan area konten (`@yield('content')`).

- `plain.blade.php` → Layout sederhana **tanpa navbar dan footer**, digunakan khusus untuk halaman **login**.

---

### 🧱 4. `resources/views/components/`
Berisi **komponen Blade** (reusable component) yang bisa dipanggil dengan `<x-componentname />`.

| File | Fungsi |
|------|---------|
| `navbar.blade.php` | Komponen navigasi utama (menu: Dashboard, MyRencanaKu, Profil, Logout) |
| `footer.blade.php` | Komponen footer dengan teks hak cipta dan tampilan transparan |

---

### 📄 5. `resources/views/`
Folder yang menyimpan seluruh **halaman tampilan utama** (Blade Template).

| File | Fungsi Halaman |
|------|----------------|
| `login.blade.php` | Halaman login pengguna (input nama lengkap, username, password) |
| `beranda.blade.php` | Dashboard utama, menampilkan semua daftar to-do berdasarkan kategori |
| `myrencanaku.blade.php` | Halaman untuk menambah, menghapus, dan menandai kegiatan |
| `profil.blade.php` | Halaman profil pengguna, menampilkan nama lengkap, username, dan statistik tugas |

---

### 🎨 6. `public/css/style.css`
Berisi **CSS tambahan (native)** untuk memperindah tampilan Bootstrap.  
Menentukan tema warna biru langit, mengatur posisi navbar dan footer, serta menambahkan efek animasi halus.

**Contoh pengaturan penting:**
- `body` → warna background dan font utama  
- `.navbar` → warna biru langit `#3ABEFF` dan efek shadow  
- `footer` → warna transparan dengan efek blur (`backdrop-filter`)  
- `.section-header` & `.section-content` → jarak antar elemen agar tampilan rapi  

---

## 💡 Teknologi yang Digunakan
- **Laravel 12 (Tanpa Starter Kit)** → Framework utama untuk routing, controller, dan view.  
- **Blade Template Engine** → Mengatur layout dan komponen halaman.  
- **Bootstrap 5.3 (CDN)** → Framework CSS untuk tampilan yang responsif dan cepat.  
- **CSS Native (style.css)** → Kustomisasi tema warna biru langit.  
- **Session Laravel** → Penyimpanan data sementara tanpa database.


## ⚙️ Fitur Utama
### 🔐 Login
- Pengguna mengisi **Nama Lengkap**, **Username**, dan **Password**.  
- Semua input diterima tanpa autentikasi database.  
- Data login disimpan sementara menggunakan session.  

### 🏠 Dashboard (Beranda)
- Menampilkan sapaan pengguna berdasarkan nama lengkap.  
- Menampilkan daftar kegiatan berdasarkan kategori:
  - PribadiGwej  
  - TeamGwej  
  - Selesai  

### 📝 MyRencanaKu
- Menambah kegiatan baru (judul dan kategori).  
- Mengubah status kegiatan (centang jika selesai).  
- Menghapus kegiatan.  
- Semua data disimpan sementara menggunakan session.  

### 👤 Profil Pengguna
- Menampilkan **Nama Lengkap** dan **Username** pengguna.  
- Menampilkan jumlah total tugas berdasarkan kategori:
  - Tugas PribadiGwej  
  - Tugas TeamGwej  
  - Tugas Selesai  

---

## 🧩 Teknologi yang Digunakan
- **Laravel 12 (tanpa starter kit)**  
- **Blade Template** untuk manajemen layout dan komponen.  
- **Bootstrap 5.3 (CDN)** untuk tampilan yang rapi dan responsif.  
- **CSS Native (style.css)** untuk kustomisasi warna biru langit dan efek transparansi.  
- **Session Laravel** untuk menyimpan data sementara tanpa database.  

---

## 🎨 Desain & Tema
- **Warna utama:** Biru langit cerah `#3ABEFF`.  
- **Footer:** Transparan dengan efek blur (`backdrop-filter: blur(8px)`).  
- **Font:** `'Segoe UI', sans-serif` untuk tampilan bersih dan modern.  
- **Layout:** Menggunakan sistem grid dan komponen Bootstrap seperti `navbar`, `card`, `form-control`, `row`, `col-md`.  
- **Tujuan desain:** Membuat tampilan ringan, simpel, dan mudah dipahami pengguna.  

---

## 🚀 Cara Menjalankan
1. Clone repository ini:
   ```bash
   git clone https://github.com/[username]/UTS_PWEB_[NIM].git
2. Masuk ke folder project:
    cd  UTS_PWEB_To_Do_List

3. Jalankan server lokal Laravel:
    php artisan serve

Buka di browser:

http://127.0.0.1:8000

👨‍💻 Pengembang

Nama: Raditya Dwi Putra
NIM: 242410102073
Kelas:TI B
Fakultas: Ilmu Komputer – Universitas Jember
