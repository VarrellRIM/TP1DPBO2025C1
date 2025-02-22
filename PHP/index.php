<?php
// Mengimpor file PetShop.php agar bisa digunakan dalam program
require_once 'PetShop.php';

// Fungsi untuk menambahkan produk baru
function tambahProduk() {
    echo "<h2>Tambah Produk</h2>";
    // Form untuk menginput data produk baru
    echo '<form method="post" enctype="multipart/form-data">
            <label for="id">ID Produk:</label><br>
            <input type="number" name="id" required><br>
            <label for="nama">Nama Produk:</label><br>
            <input type="text" name="nama" required><br>
            <label for="kategori">Kategori:</label><br>
            <input type="text" name="kategori" required><br>
            <label for="harga">Harga:</label><br>
            <input type="number" step="0.01" name="harga" required><br>
            <label for="gambar">Gambar Produk:</label><br>
            <input type="file" name="gambar" accept="image/*" required><br><br>
            <input type="submit" name="submit_tambah" value="Tambah Produk">
          </form>';

    // Jika tombol tambah diklik
    if (isset($_POST['submit_tambah'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];

        // Memeriksa apakah file gambar telah diunggah dengan benar
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['gambar']['tmp_name'];
            $gambarData = file_get_contents($fileTmpPath); // Membaca file gambar
            $gambarBase64 = base64_encode($gambarData); // Mengubah gambar ke format base64

            // Membuat objek produk baru dan menyimpannya dalam session
            $produk = new PetShop($id, $nama, $kategori, $harga, $gambarBase64);
            $_SESSION['inventory'][] = $produk;

            echo "<p>Produk berhasil ditambahkan!</p>";
        } else {
            echo "<p>Terjadi kesalahan saat mengunggah gambar.</p>";
        }
    }
}

// Fungsi untuk menampilkan semua produk yang telah disimpan
function tampilkanSemuaProduk() {
    echo "<h2>Daftar Semua Produk</h2>";
    if (empty($_SESSION['inventory'])) {
        echo "<p>Tidak ada produk dalam inventory.</p>";
    } else {
        foreach ($_SESSION['inventory'] as $produk) {
            $produk->displayInfo(); // Menampilkan informasi produk
        }
    }
}

// Fungsi untuk mengedit produk berdasarkan ID
function editProduk() {
    echo "<h2>Edit Produk</h2>";
    echo '<form method="post">
            <label for="id">Masukkan ID produk yang ingin diubah:</label><br>
            <input type="number" name="id_edit" required><br>
            <input type="submit" name="submit_cari" value="Cari Produk">
          </form>';

    // Jika tombol cari produk ditekan
    if (isset($_POST['submit_cari'])) {
        $id_edit = $_POST['id_edit'];
        $found = false;
        foreach ($_SESSION['inventory'] as $produk) {
            if ($produk->getId() == $id_edit) {
                $found = true;
                // Form untuk mengedit data produk
                echo '<form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_edit" value="' . $produk->getId() . '">
                        <label for="nama">Nama Baru:</label><br>
                        <input type="text" name="nama" value="' . $produk->getNamaProduk() . '" required><br>
                        <label for="kategori">Kategori Baru:</label><br>
                        <input type="text" name="kategori" value="' . $produk->getKategori() . '" required><br>
                        <label for="harga">Harga Baru:</label><br>
                        <input type="number" step="0.01" name="harga" value="' . $produk->getHarga() . '" required><br>
                        <label for="gambar">Gambar Produk Baru (kosongkan jika tidak ingin mengubah):</label><br>
                        <input type="file" name="gambar" accept="image/*"><br><br>
                        <input type="submit" name="submit_edit" value="Simpan Perubahan">
                      </form>';
                break;
            }
        }
        if (!$found) {
            echo "<p>Produk dengan ID $id_edit tidak ditemukan!</p>";
        }
    }

    // Jika tombol simpan perubahan ditekan
    if (isset($_POST['submit_edit'])) {
        $id_edit = $_POST['id_edit'];
        foreach ($_SESSION['inventory'] as &$produk) {
            if ($produk->getId() == $id_edit) {
                $produk->setNamaProduk($_POST['nama']);
                $produk->setKategori($_POST['kategori']);
                $produk->setHarga($_POST['harga']);

                // Jika ada gambar baru diunggah, perbarui gambar
                if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['gambar']['tmp_name'];
                    $gambarData = file_get_contents($fileTmpPath);
                    $gambarBase64 = base64_encode($gambarData);
                    $produk->setGambar($gambarBase64);
                }

                echo "<p>Produk berhasil diperbarui!</p>";
                break;
            }
        }
    }
}

// Fungsi untuk menghapus produk berdasarkan ID
function hapusProduk() {
    echo "<h2>Hapus Produk</h2>";
    echo '<form method="post">
            <label for="id">Masukkan ID produk yang ingin dihapus:</label><br>
            <input type="number" name="id_hapus" required><br>
            <input type="submit" name="submit_hapus" value="Hapus Produk">
          </form>';

    if (isset($_POST['submit_hapus'])) {
        $id_hapus = $_POST['id_hapus'];
        $found = false;
        foreach ($_SESSION['inventory'] as $key => $produk) {
            if ($produk->getId() == $id_hapus) {
                unset($_SESSION['inventory'][$key]); // Menghapus produk dari array session
                $_SESSION['inventory'] = array_values($_SESSION['inventory']); // Reset indeks array
                $found = true;
                echo "<p>Produk berhasil dihapus!</p>";
                break;
            }
        }
        if (!$found) {
            echo "<p>Produk dengan ID $id_hapus tidak ditemukan!</p>";
        }
    }
}

// Fungsi untuk mencari produk berdasarkan nama
function cariProduk() {
    echo "<h2>Cari Produk</h2>";
    echo '<form method="post">
            <label for="nama">Masukkan Nama Produk yang dicari:</label><br>
            <input type="text" name="nama_cari" required><br>
            <input type="submit" name="submit_cari" value="Cari Produk">
          </form>';

    if (isset($_POST['submit_cari'])) {
        $nama_cari = strtolower($_POST['nama_cari']);
        $found = false;
        foreach ($_SESSION['inventory'] as $produk) {
            if (strtolower($produk->getNamaProduk()) == $nama_cari) {
                echo "<p>Produk ditemukan:</p>";
                $produk->displayInfo(); // Menampilkan informasi produk
                $found = true;
                break;
            }
        }
        if (!$found) {
            echo "<p>Produk dengan nama '$nama_cari' tidak ditemukan!</p>";
        }
    }
}

// Fungsi untuk menampilkan menu utama
function tampilkanMenu() {
    while (true) {
        echo "<h2>Menu PetShop</h2>";
        echo "<ul>
                <li><a href='?menu=tambah'>Tambah Produk</a></li>
                <li><a href='?menu=tampilkan'>Tampilkan Semua Produk</a></li>
                <li><a href='?menu=edit'>Edit Produk</a></li>
                <li><a href='?menu=hapus'>Hapus Produk</a></li>
                <li><a href='?menu=cari'>Cari Produk</a></li>
                <li><a href='?menu=keluar'>Keluar</a></li>
              </ul>";

        if (isset($_GET['menu'])) {
            $menu = $_GET['menu'];
            if ($menu == "tambah") tambahProduk();
            elseif ($menu == "tampilkan") tampilkanSemuaProduk();
            elseif ($menu == "edit") editProduk();
            elseif ($menu == "hapus") hapusProduk();
            elseif ($menu == "cari") cariProduk();
            elseif ($menu == "keluar") {
                echo "<p>Terima kasih telah menggunakan aplikasi ini!</p>";
                break;
            } else echo "<p>Menu tidak valid!</p>";
        }
        break;
    }
}

// Jalankan menu utama
tampilkanMenu();
?>
