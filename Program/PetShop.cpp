#include <bits/stdc++.h>

using namespace std;

class PetShop {
private:
    int id;
    string nama_produk;
    string kategori;
    double harga;

public:
    // Konstruktor Default
    PetShop() {
        this->id = 0;
        this->nama_produk = "";
        this->kategori = "";
        this->harga = 0.0;
    }

    // Konstruktor dengan Parameter
    PetShop(int id, string nama, string kategori, double harga) {
        this->id = id;
        this->nama_produk = nama;
        this->kategori = kategori;
        this->harga = harga;
    }

    // Getter dan Setter
    int get_id() { return this->id; }
    void set_id(int id) { this->id = id; }

    string get_nama_produk() { return this->nama_produk; }
    void set_nama_produk(string nama) { this->nama_produk = nama; }

    string get_kategori() { return this->kategori; }
    void set_kategori(string kategori) { this->kategori = kategori; }

    double get_harga() { return this->harga; }
    void set_harga(double harga) { this->harga = harga; }

    // Menampilkan data produk
    void display_info() {
        cout << "ID: " << this->id << "\n";
        cout << "Nama Produk: " << this->nama_produk << "\n";
        cout << "Kategori: " << this->kategori << "\n";
        cout << "Harga: Rp " << fixed << setprecision(2) << this->harga << "\n";
        cout << "--------------------------\n";
    }

    // Destructor
    ~PetShop() {}
};
