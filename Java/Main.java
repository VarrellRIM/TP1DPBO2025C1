// Class utama untuk menjalankan program PetShop
public class Main {
    public static void main(String[] args) {
        PetShop toko = new PetShop(); // Membuat objek toko dari class PetShop
        String pilihan = ""; // Variabel untuk menyimpan pilihan menu
        java.util.Scanner sc = new java.util.Scanner(System.in); // Scanner untuk input pengguna

        while (!pilihan.equals("6")) { // Loop menu utama, berhenti jika memilih "6"
            // Menampilkan menu utama
            System.out.println("\n===== PETSHOP MENU =====");
            System.out.println("1. Tambah Produk");
            System.out.println("2. Tampilkan Semua Produk");
            System.out.println("3. Edit Produk");
            System.out.println("4. Hapus Produk");
            System.out.println("5. Cari Produk");
            System.out.println("6. Keluar");
            System.out.print("Pilihan: ");
            pilihan = sc.nextLine(); // Meminta input pilihan menu

            // Mengeksekusi pilihan menu
            switch (pilihan) {
                case "1":
                    toko.tambahProduk();
                    break;
                case "2":
                    toko.tampilkanProduk();
                    break;
                case "3":
                    toko.editProduk();
                    break;
                case "4":
                    toko.hapusProduk();
                    break;
                case "5":
                    toko.cariProduk();
                    break;
                case "6":
                    break; // Keluar dari program
                default:
                    System.out.println("Pilihan tidak valid!");
            }
        }

        System.out.println("Keluar dari program..."); // Pesan setelah keluar dari loop
        sc.close(); // Menutup scanner
    }
}
