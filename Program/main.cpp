#pragma once
#include "PetShop.cpp"

int main() {
    list<PetShop> inventory;
    int choice;

    do {
        cout << "\n===== PETSHOP MENU =====\n";
        cout << "1. Tambah Produk\n";
        cout << "2. Tampilkan Semua Produk\n";
        cout << "3. Edit Produk\n";
        cout << "4. Hapus Produk\n";
        cout << "5. Cari Produk\n";
        cout << "6. Keluar\n";
        cout << "Pilihan: ";
        cin >> choice;
        cin.ignore();

        if (choice == 1) {
            // Tambah Produk
            int id;
            string nama, kategori;
            double harga;

            cout << "ID Produk: ";
            cin >> id;
            cin.ignore();
            cout << "Nama Produk: ";
            getline(cin, nama);
            cout << "Kategori: ";
            getline(cin, kategori);
            cout << "Harga: ";
            cin >> harga;

            inventory.push_back(PetShop(id, nama, kategori, harga));
            cout << "Produk berhasil ditambahkan!\n";

        } else if (choice == 2) {
            // Tampilkan Semua Produk
            if (inventory.empty()) {
                cout << "Tidak ada produk dalam inventory.\n";
            } else {
                cout << "\n===== DAFTAR PRODUK =====\n";
                for (auto &produk : inventory) {
                    produk.display_info();
                }
            }

        } else if (choice == 3) {
            // Edit Produk
            int id;
            cout << "Masukkan ID produk yang ingin diubah: ";
            cin >> id;
            cin.ignore();

            bool found = false;
            for (auto &produk : inventory) {
                if (produk.get_id() == id) {
                    string nama, kategori;
                    double harga;

                    cout << "Nama Baru: ";
                    getline(cin, nama);
                    cout << "Kategori Baru: ";
                    getline(cin, kategori);
                    cout << "Harga Baru: ";
                    cin >> harga;

                    produk.set_nama_produk(nama);
                    produk.set_kategori(kategori);
                    produk.set_harga(harga);
                    found = true;
                    cout << "Produk berhasil diperbarui!\n";
                    break;
                }
            }
            if (!found) {
                cout << "Produk dengan ID " << id << " tidak ditemukan!\n";
            }

        } else if (choice == 4) {
            // Hapus Produk
            int id;
            cout << "Masukkan ID produk yang ingin dihapus: ";
            cin >> id;

            auto it = inventory.begin();
            bool found = false;
            while (it != inventory.end()) {
                if (it->get_id() == id) {
                    it = inventory.erase(it);
                    found = true;
                    cout << "Produk berhasil dihapus!\n";
                    break;
                } else {
                    ++it;
                }
            }
            if (!found) {
                cout << "Produk dengan ID " << id << " tidak ditemukan!\n";
            }

        } else if (choice == 5) {
            // Cari Produk berdasarkan Nama
            string nama;
            cout << "Masukkan Nama Produk yang dicari: ";
            cin.ignore();
            getline(cin, nama);

            bool found = false;
            for (auto &produk : inventory) {
                if (produk.get_nama_produk() == nama) {
                    cout << "Produk ditemukan:\n";
                    produk.display_info();
                    found = true;
                    break;
                }
            }
            if (!found) {
                cout << "Produk dengan nama '" << nama << "' tidak ditemukan!\n";
            }

        } else if (choice == 6) {
            cout << "Keluar dari program...\n";
            break;

        } else {
            cout << "Pilihan tidak valid!\n";
        }
    } while (choice != 6);

    return 0;
}
