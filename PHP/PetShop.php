<?php
session_start();

class PetShop {
    private $id;
    private $nama_produk;
    private $kategori;
    private $harga;
    private $gambar; // Menyimpan data gambar dalam base64

    public function __construct($id, $nama_produk, $kategori, $harga, $gambar) {
        $this->id = $id;
        $this->nama_produk = $nama_produk;
        $this->kategori = $kategori;
        $this->harga = $harga;
        $this->gambar = $gambar;
    }

    // Getter dan Setter untuk setiap atribut
    public function getId() {
        return $this->id;
    }

    public function getNamaProduk() {
        return $this->nama_produk;
    }

    public function setNamaProduk($nama) {
        $this->nama_produk = $nama;
    }

    public function getKategori() {
        return $this->kategori;
    }

    public function setKategori($kategori) {
        $this->kategori = $kategori;
    }

    public function getHarga() {
        return $this->harga;
    }

    public function setHarga($harga) {
        $this->harga = $harga;
    }

    public function getGambar() {
        return $this->gambar;
    }

    public function setGambar($gambar) {
        $this->gambar = $gambar;
    }

    // Menampilkan informasi produk
    public function displayInfo() {
        echo "<div style='border:1px solid #000; padding:10px; margin:10px;'>";
        echo "<p><strong>ID:</strong> {$this->id}</p>";
        echo "<p><strong>Nama Produk:</strong> {$this->nama_produk}</p>";
        echo "<p><strong>Kategori:</strong> {$this->kategori}</p>";
        echo "<p><strong>Harga:</strong> Rp " . number_format($this->harga, 2, ',', '.') . "</p>";
        if ($this->gambar) {
            echo "<p><strong>Gambar Produk:</strong><br><img src='data:image/*;base64,{$this->gambar}' alt='{$this->nama_produk}' style='max-width:200px;'></p>";
        }
        echo "</div>";
    }
}

// Inisialisasi inventory dalam sesi jika belum ada
if (!isset($_SESSION['inventory'])) {
    $_SESSION['inventory'] = [];
}
?>
