# TP1DPBO2025C1
 
## Janji
Saya Varrell Rizky Irvanni Mahkota dengan NIM 2306245 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamin.

## 📌 Deskripsi Proyek  
Proyek ini adalah implementasi **Object-Oriented Programming (OOP)** dalam tiga bahasa pemrograman: **Python, Java, dan PHP**. Program ini mensimulasikan sistem inventaris produk dalam **PetShop**, di mana pengguna dapat:

1. **Menambah produk baru**  
2. **Menampilkan daftar produk**  
3. **Mengedit produk yang sudah ada**  
4. **Menghapus produk dari daftar**  
5. **Mencari produk berdasarkan nama**  

Setiap produk memiliki **atribut** berikut:  
- **ID Produk**  
- **Nama Produk**  
- **Kategori Produk**  
- **Harga Produk**  
- **(Khusus PHP) Gambar Produk**  

---

## 🔍 Struktur OOP dalam Program  
Program ini menggunakan prinsip **Object-Oriented Programming (OOP)**, dengan konsep sebagai berikut:  

### 1️⃣ Class  
Setiap bahasa memiliki **class utama** bernama **`PetShop`** yang berfungsi sebagai representasi **objek produk** dalam sistem.  

### 2️⃣ Object  
Objek dari class `PetShop` dibuat untuk menyimpan informasi produk yang akan dimasukkan ke dalam **inventory** (daftar produk).

### 3️⃣ Attributes (Properties)  
Setiap objek `PetShop` memiliki properti berikut:  
- `id` → ID Produk (integer)  
- `nama_produk` → Nama Produk (string)  
- `kategori` → Kategori Produk (string)  
- `harga` → Harga Produk (double/float)  
- `gambar` (khusus PHP) → Gambar produk dalam format **Base64**  

### 4️⃣ Methods (Fungsi dalam Class)  
Class `PetShop` memiliki beberapa method utama:  
- `tambahProduk()` → Menambahkan produk baru ke dalam inventory  
- `tampilkanProduk()` → Menampilkan semua produk dalam inventory  
- `editProduk()` → Mengedit informasi produk berdasarkan ID  
- `hapusProduk()` → Menghapus produk berdasarkan ID  
- `cariProduk()` → Mencari produk berdasarkan nama  
- `displayInfo()` → Menampilkan detail produk  

