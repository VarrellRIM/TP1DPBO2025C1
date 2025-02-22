# Mengimpor class PetShop dari file PetShop.py
from PetShop import PetShop

def main():
    """
    Fungsi utama untuk menjalankan program PetShop.
    """
    toko = PetShop()  # Membuat objek toko dari kelas PetShop
    pilihan = ""  # Variabel untuk menyimpan pilihan menu

    while pilihan != "6":  # Loop menu utama, berhenti jika memilih "6"
        # Menampilkan menu utama
        print("\n===== PETSHOP MENU =====")
        print("1. Tambah Produk")
        print("2. Tampilkan Semua Produk")
        print("3. Edit Produk")
        print("4. Hapus Produk")
        print("5. Cari Produk")
        print("6. Keluar")
        pilihan = input("Pilihan: ")  # Meminta input pilihan menu

        # Mengeksekusi pilihan menu
        if pilihan == "1":
            toko.tambah_produk()
        elif pilihan == "2":
            toko.tampilkan_produk()
        elif pilihan == "3":
            toko.edit_produk()
        elif pilihan == "4":
            toko.hapus_produk()
        elif pilihan == "5":
            toko.cari_produk()
        elif pilihan != "6":
            print("Pilihan tidak valid!")  # Jika pilihan tidak ada di menu

    print("Keluar dari program...")  # Pesan setelah keluar dari loop

# Memeriksa apakah file ini dijalankan sebagai skrip utama
if __name__ == "__main__":
    main()
