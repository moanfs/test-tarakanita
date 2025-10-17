# Inisialisasi Data
semua_surat = []

# Fungsi untuk memformat tampilan
def format_surat(surat):
    jenis = f"Jenis: {surat['jenis']}"
    nomor = f"Nomor: {surat['nomor']}"
    tanggal = f"Tanggal: {surat['tanggal']}"
    perihal = f"Perihal: {surat['perihal']}"
    asal_tujuan = f"Asal/Tujuan: {surat['asal_tujuan']}"
    return f"{'-'*30}\n{nomor}\n{jenis} | {tanggal}\n{perihal}\n{asal_tujuan}\n"

# Form Tambah Surat
def tambah_surat():
    print("\n--- TAMBAH SURAT BARU ---")
    
    jenis = ""
    while jenis.lower() not in ['masuk', 'keluar']:
        jenis = input("Jenis Surat (Masuk/Keluar): ").strip()
    
    nomor = input("Nomor Surat: ").strip()
    tanggal = input("Tanggal Surat (contoh: DD-MM-YYYY): ").strip()
    perihal = input("Perihal: ").strip()
    asal_tujuan = input(f"Asal Surat (jika Masuk) / Tujuan Surat (jika Keluar): ").strip()

    surat_baru = {
        'nomor': nomor,
        'jenis': jenis.capitalize(),
        'tanggal': tanggal,
        'perihal': perihal,
        'asal_tujuan': asal_tujuan
    }
    
    semua_surat.append(surat_baru)
    print("\n Surat berhasil dicatat!")

# Table Menampilkan Semua Surat Yang Sudah Tercatat
def tampilkan_semua_surat():
    print("\n--- DAFTAR SEMUA SURAT ---")
    if not semua_surat:
        print("Belum ada data surat yang tersimpan.")
        return

    for i, surat in enumerate(semua_surat):
        print(f"SURAT KE-{i+1}")
        print(format_surat(surat))

# Fungsi Untuk Pencarian Surat
def cari_surat():
    print("\n--- PENCARIAN SURAT ---")
    if not semua_surat:
        print("Belum ada data surat untuk dicari.")
        return

    kata_kunci = input("Masukkan kata kunci (Nomor Surat/Perihal): ").lower().strip()
    hasil_pencarian = []

    for surat in semua_surat:
        if kata_kunci in surat['nomor'].lower() or kata_kunci in surat['perihal'].lower():
            hasil_pencarian.append(surat)

    if hasil_pencarian:
        print(f"\n Ditemukan {len(hasil_pencarian)} surat yang cocok:")
        for i, surat in enumerate(hasil_pencarian):
            print(f"HASIL KE-{i+1}")
            print(format_surat(surat))
    else:
        print("\n Tidak ditemukan surat dengan kata kunci tersebut.")

# Menu Aplikasi
def menu_utama():
    while True:
        print("\n==================================")
        print("SISTEM PENGELOLAAN SURAT SEDERHANA")
        print("==================================")
        print("1. Tambah Surat Baru")
        print("2. Tampilkan Semua Surat")
        print("3. Cari Surat")
        print("4. Keluar Aplikasi")
        
        pilihan = input("Masukkan pilihan (1-4): ").strip()
        
        if pilihan == '1':
            tambah_surat()
        elif pilihan == '2':
            tampilkan_semua_surat()
        elif pilihan == '3':
            cari_surat()
        elif pilihan == '4':
            print("\nTerima kasih. Aplikasi ditutup.")
            break
        else:
            print("\nPilihan tidak valid. Silakan coba lagi.")


if __name__ == "__main__":
    menu_utama()