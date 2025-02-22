# Class untuk mengelola data produk di dalam PetShop
class PetShop:
    def __init__(self):
        """
        Konstruktor untuk inisialisasi daftar produk dalam bentuk list.
        Setiap produk akan disimpan dalam dictionary.
        """
        self.inventory = []

    def tambah_produk(self):
        """
        Fungsi untuk menambahkan produk baru ke dalam inventory.
        """
        # Meminta input dari pengguna
        id = int(input("ID Produk: "))  # ID unik untuk produk
        nama = input("Nama Produk: ")  # Nama produk
        kategori = input("Kategori: ")  # Kategori produk
        harga = float(input("Harga: "))  # Harga produk (dikonversi ke float)

        # Menyimpan produk dalam dictionary dan menambahkannya ke inventory
        self.inventory.append({
            "id": id,
            "nama": nama,
            "kategori": kategori,
            "harga": harga
        })
        print("Produk berhasil ditambahkan!")

    def tampilkan_produk(self):
        """
        Fungsi untuk menampilkan semua produk dalam inventory.
        """
        if not self.inventory:  # Mengecek apakah inventory kosong
            print("Tidak ada produk dalam inventory.")
        else:
            print("\n===== DAFTAR PRODUK =====")
            for produk in self.inventory:  # Loop untuk menampilkan tiap produk
                self.display_info(produk)

    def edit_produk(self):
        """
        Fungsi untuk mengedit produk berdasarkan ID.
        """
        id = int(input("Masukkan ID produk yang ingin diubah: "))  # Meminta ID produk
        found = False  # Menandai apakah produk ditemukan
        i = 0  # Variabel indeks untuk iterasi

        while i < len(self.inventory) and not found:  # Loop sampai produk ditemukan atau inventory habis
            if self.inventory[i]["id"] == id:
                # Memperbarui informasi produk
                self.inventory[i]["nama"] = input("Nama Baru: ")
                self.inventory[i]["kategori"] = input("Kategori Baru: ")
                self.inventory[i]["harga"] = float(input("Harga Baru: "))
                found = True  # Produk ditemukan
                print("Produk berhasil diperbarui!")
            i += 1  # Pindah ke produk berikutnya

        if not found:  # Jika produk tidak ditemukan
            print(f"Produk dengan ID {id} tidak ditemukan!")

    def hapus_produk(self):
        """
        Fungsi untuk menghapus produk berdasarkan ID.
        """
        id = int(input("Masukkan ID produk yang ingin dihapus: "))
        i = 0  # Variabel indeks untuk iterasi

        while i < len(self.inventory):  # Loop sampai produk ditemukan
            if self.inventory[i]["id"] == id:
                del self.inventory[i]  # Menghapus produk dari list
                print("Produk berhasil dihapus!")
                return  # Keluar setelah menghapus produk
            i += 1  # Pindah ke produk berikutnya

        print(f"Produk dengan ID {id} tidak ditemukan!")  # Jika produk tidak ditemukan

    def cari_produk(self):
        """
        Fungsi untuk mencari produk berdasarkan nama.
        """
        nama = input("Masukkan Nama Produk yang dicari: ").lower()  # Input nama dalam huruf kecil
        found = False  # Menandai apakah produk ditemukan
        i = 0  # Variabel indeks

        while i < len(self.inventory) and not found:
            if self.inventory[i]["nama"].lower() == nama:
                print("Produk ditemukan:")
                self.display_info(self.inventory[i])  # Menampilkan produk
                found = True  # Produk ditemukan
            i += 1  # Pindah ke produk berikutnya

        if not found:  # Jika produk tidak ditemukan
            print(f"Produk dengan nama '{nama}' tidak ditemukan!")

    def display_info(self, produk):
        """
        Fungsi untuk menampilkan informasi produk.
        :param produk: Dictionary yang menyimpan data produk.
        """
        print(f"ID: {produk['id']}")
        print(f"Nama Produk: {produk['nama']}")
        print(f"Kategori: {produk['kategori']}")
        print(f"Harga: Rp {produk['harga']:.2f}")
        print("--------------------------")
