import java.util.*; // Mengimpor semua class dari package java.util

// Class PetShop untuk mengelola daftar produk di dalam toko hewan peliharaan
public class PetShop {
    // List untuk menyimpan produk dalam bentuk Map<String, Object>
    private List<Map<String, Object>> inventory = new ArrayList<>();
    private Scanner sc = new Scanner(System.in); // Scanner untuk input pengguna

    // Fungsi untuk menambahkan produk baru ke dalam inventory
    public void tambahProduk() {
        System.out.print("ID Produk: ");
        int id = sc.nextInt(); // Meminta input ID produk
        sc.nextLine(); // Menghapus newline dari buffer
        System.out.print("Nama Produk: ");
        String nama = sc.nextLine(); // Input nama produk
        System.out.print("Kategori: ");
        String kategori = sc.nextLine(); // Input kategori produk
        System.out.print("Harga: ");
        double harga = sc.nextDouble(); // Input harga produk

        // Membuat objek produk dalam bentuk Map
        Map<String, Object> produk = new HashMap<>();
        produk.put("id", id);
        produk.put("nama", nama);
        produk.put("kategori", kategori);
        produk.put("harga", harga);

        inventory.add(produk); // Menambahkan produk ke dalam list
        System.out.println("Produk berhasil ditambahkan!");
    }

    // Fungsi untuk menampilkan semua produk dalam inventory
    public void tampilkanProduk() {
        if (inventory.isEmpty()) { // Mengecek apakah inventory kosong
            System.out.println("Tidak ada produk dalam inventory.");
        } else {
            System.out.println("\n===== DAFTAR PRODUK =====");
            for (Map<String, Object> produk : inventory) { // Iterasi setiap produk
                displayInfo(produk);
            }
        }
    }

    // Fungsi untuk mengedit produk berdasarkan ID
    public void editProduk() {
        System.out.print("Masukkan ID produk yang ingin diubah: ");
        int id = sc.nextInt();
        sc.nextLine(); // Membersihkan buffer input
        int i = 0;
        boolean found = false;

        while (i < inventory.size() && !found) { // Iterasi sampai produk ditemukan
            if ((int) inventory.get(i).get("id") == id) {
                System.out.print("Nama Baru: ");
                inventory.get(i).put("nama", sc.nextLine());
                System.out.print("Kategori Baru: ");
                inventory.get(i).put("kategori", sc.nextLine());
                System.out.print("Harga Baru: ");
                inventory.get(i).put("harga", sc.nextDouble());
                found = true;
                System.out.println("Produk berhasil diperbarui!");
            }
            i++;
        }

        if (!found) {
            System.out.println("Produk dengan ID " + id + " tidak ditemukan!");
        }
    }

    // Fungsi untuk menghapus produk berdasarkan ID
    public void hapusProduk() {
        System.out.print("Masukkan ID produk yang ingin dihapus: ");
        int id = sc.nextInt();
        int i = 0;
        boolean found = false;

        while (i < inventory.size()) {
            if ((int) inventory.get(i).get("id") == id) {
                inventory.remove(i); // Menghapus produk dari list
                System.out.println("Produk berhasil dihapus!");
                found = true;
                break;
            }
            i++;
        }

        if (!found) {
            System.out.println("Produk dengan ID " + id + " tidak ditemukan!");
        }
    }

    // Fungsi untuk mencari produk berdasarkan nama
    public void cariProduk() {
        System.out.print("Masukkan Nama Produk yang dicari: ");
        sc.nextLine(); // Menghapus newline dari buffer
        String nama = sc.nextLine().toLowerCase();
        int i = 0;
        boolean found = false;

        while (i < inventory.size() && !found) {
            if (((String) inventory.get(i).get("nama")).toLowerCase().equals(nama)) {
                System.out.println("Produk ditemukan:");
                displayInfo(inventory.get(i));
                found = true;
            }
            i++;
        }

        if (!found) {
            System.out.println("Produk dengan nama '" + nama + "' tidak ditemukan!");
        }
    }

    // Fungsi untuk menampilkan informasi produk
    private void displayInfo(Map<String, Object> produk) {
        System.out.println("ID: " + produk.get("id"));
        System.out.println("Nama Produk: " + produk.get("nama"));
        System.out.println("Kategori: " + produk.get("kategori"));
        System.out.printf("Harga: Rp %.2f\n", (double) produk.get("harga"));
        System.out.println("--------------------------");
    }
}
