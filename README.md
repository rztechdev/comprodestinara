# Destinara — Website Company Profile & Ruang Belajar Nusantara

Website resmi **Destinara (Inisiatif Pendidikan Lapangan & Riset Berbasis Komunitas)**. Proyek ini menyatukan seluruh rancangan desain editorial (*Google Stitch mockup*) menjadi sebuah situs web statis berbasis **HTML5, CSS3 kustom, dan Vanilla JavaScript (ES6+)** yang terintegrasi penuh, responsif di seluruh ukuran layar, dan siap diserahkan kepada klien (*client-ready*).

---

## 🌟 Ikhtisar Proyek

Destinara memposisikan diri sebagai jembatan etis antara ruang akademis (sekolah & kampus) dengan kearifan warga desa di seluruh pelosok Nusantara. Situs ini mengusung estetika editorial dokumenter bertema *terroir* lokal dengan tipografi berkelas (*Newsreader* serif & *Work Sans* sans-serif), visual berkilau, dan navigasi yang mulus.

---

## 🗺️ Peta Halaman (Sitemap)

Seluruh halaman terletak langsung di *root directory* dan saling terhubung dengan navigasi aktif dan *drawer* menu mobile:

| Berkas | Halaman | Deskripsi Utama |
| :--- | :--- | :--- |
| [`index.html`](index.html) | **Beranda** | Pintu gerbang utama, pengantar kurikulum tapak nusantara, pratinjau sanggar mitra, metrik capaian desa, dan reviu mitra pendidikan. |
| [`tentang-kami.html`](tentang-kami.html) | **Tentang Kami** | Esai kuratorial pendiri (*Ryan Prasetya & Maya Nirmala*), filosofi pendidikan kritis Ki Hadjar Dewantara, rekam jejak institusi, dan komitmen FPIC. |
| [`destinasi.html`](destinasi.html) | **Jelajahi Destinasi** | Kurasi ruang belajar tapak dengan **filter kategori interaktif** (*Budaya, Ekologi, Pangan, Bahari*), 4 kartu modul desa mendalam, dan **Modal Popup Pratinjau Dossier**. |
| [`untuk-sekolah.html`](untuk-sekolah.html) | **Untuk Sekolah** | Panduan resmi program ekskursi & *live-in* berkeselamatan tinggi, integrasi Kurikulum Merdeka / IB, alur persiapan 4 langkah, dan formulir audiensi kurikulum. |
| [`untuk-peneliti.html`](untuk-peneliti.html) | **Untuk Peneliti & Akademisi** | Infrastruktur riset lapangan, protokol FPIC etika antropologi, direktori 42 desa mitra per tema kajian, serta formulir pengajuan riset lapangan. |
| [`mitra-desa.html`](mitra-desa.html) | **Untuk Pengelola Destinasi** | Panduan bagi sesepuh adat, pengelola desa wisata, dan sanggar kriya untuk bergabung dalam jejaring Destinara, testimoni sesepuh, FAQ, dan formulir pendaftaran desa. |
| [`cerita.html`](cerita.html) | **Cerita Lapangan** | Majalah warta & publikasi etnografi tapak dengan tab kategori, artikel kuratorial, statistik distribusi lapangan, dan langganan buletin korespondensi. |
| [`cerita-detail.html`](cerita-detail.html) | **Baca Cerita / Monograf Etnografi** | Laman baca *editorial longform* mendalam (*Studi Kasus Pewarna Alami Sikka*), dilengkapi catatan pinggir (*marginalia*), resep botani alam, dan kutipan filosofis warga. |
| [`kontak.html`](kontak.html) | **Kontak & Kemitraan** | Ruang musyawarah terbuka, kontak WhatsApp respons cepat, surel resmi kemitraan, peta sanggar Sleman (Yogyakarta) & Menteng (Jakarta), serta formulir penjajakan agenda. |

---

## 💎 Fitur Unggulan & Interaktivitas

1. **Navigasi Responsif Penuh (Mobile Drawer):**
   - Bilah navigasi atas otomatis menyorot halaman yang sedang aktif (*active indicator*).
   - Menu hamburger di perangkat *mobile* & tablet membuka panel *drawer* dengan animasi *backdrop blur* yang halus.
2. **Filter Kategori Interaktif:**
   - Pada [`destinasi.html`](destinasi.html): Filter kategori *Semua Tapak*, *Budaya & Kriya*, *Ekologi & Hutan*, *Kedaulatan Pangan*, dan *Bahari*.
   - Pada [`cerita.html`](cerita.html): Filter artikel *Semua Warta*, *Etnografi*, *Ekologi*, dan *Pendidikan*.
3. **Popup Modal Pratinjau Dossier Lapangan:**
   - Mengklik tombol *“Buka Pratinjau Berkas Lapang”* pada kartu destinasi akan menampilkan modal pop-up berisi ringkasan teknis desa, koordinat GPS, etika busana, dan kapasitas riset.
4. **Formulir Interaktif & Toast Notifikasi Kustom:**
   - Seluruh formulir dilengkapi validasi dan simulasi pengiriman dengan umpan balik visual (*toast notification*) bertema terroir yang elegan tanpa *page reload*.
5. **Tombol "Kembali ke Atas" (*Back-to-Top*):**
   - Muncul otomatis saat pengguna menggulir halaman ke bawah untuk mempermudah navigasi.
6. **Aksesibel & Siap Cetak (*Print-Friendly*):**
   - Gaya cetak khusus disiapkan di `css/style.css` untuk mencetak atau menyimpan berkas kurikulum menjadi PDF tanpa elemen antarmuka yang mengganggu.

---

## 📂 Struktur Berkas Proyek

```text
stitch_destinara_company_profile_website/
├── index.html                   # Beranda
├── tentang-kami.html            # Tentang Kami
├── destinasi.html               # Jelajahi Destinasi (Filter + Modal)
├── untuk-sekolah.html           # Program Sekolah
├── untuk-peneliti.html          # Untuk Peneliti & Sivitas Akademika
├── mitra-desa.html              # Panduan Mitra Desa & Sanggar
├── cerita.html                  # Cerita Lapangan / Warta
├── cerita-detail.html           # Laman Baca Editorial Monograf
├── kontak.html                  # Kontak & Ruang Musyawarah
├── css/
│   └── style.css                # Palet Terroir, Typography, Animasi, Toast, Modal
├── js/
│   └── main.js                  # Engine Navigasi, Filter, Modal & Form Toast
└── README.md                    # Dokumentasi Proyek & Panduan Klien
```

---

## 🚀 Cara Menjalankan & Membuka Proyek

### Opsi 1: Buka Langsung di Peramban (Tanpa Server)
Proyek ini dibuat **100% *standalone***. Anda atau klien cukup mengklik dua kali (*double-click*) berkas **`index.html`** di browser manapun (Chrome, Edge, Safari, Firefox). Semua gambar, font Google, dan ikon dimuat secara aman via CDN terpercaya.

### Opsi 2: Menggunakan Local Development Server
Jika ingin menjalankan lewat lokal server:
```bash
# Menggunakan Python (bawaan Windows/Mac/Linux)
python -m http.server 8080

# Atau menggunakan npx serve
npx serve .
```
Lalu buka peramban di `http://localhost:8080`.

---

## 🌐 Panduan Berbagi ke Klien / Deploy Online

1. **Kirim Berkas Arsip (.ZIP):**
   - Kompres seluruh isi folder utama (pastikan berkas `.html`, folder `css/`, dan `js/` terikutsertakan).
   - Klien dapat langsung mengekstrak dan membuka `index.html`.
2. **Deploy Gratis 1-Klik ke Hosting Statis:**
   - **Vercel / Netlify:** Tarik atau *drag & drop* folder ini langsung ke dashboard Netlify Drop (`https://app.netlify.com/drop`) atau Vercel. Situs akan langsung aktif dengan domain HTTPS gratis dalam hitungan detik.
   - **GitHub Pages:** Unggah kode ke repositori GitHub dan aktifkan GitHub Pages di menu *Settings > Pages > Branch: main*.

---

## 🎨 Palet Warna & Desain (*Design System*)

- **Primary (*Bata Terakota Tapak*):** `#703a3a` / `#8c5151`
- **Secondary (*Hijau Daun Rimba*):** `#51634b` / `#d4e9ca`
- **Tertiary (*Oker Rempah Tanah*):** `#684200` / `#86580d`
- **Surface & Background (*Krem Kertas Arsip*):** `#fff8f6` / `#fff1ed` / `#fdeae5`
- **Typography:** *Newsreader* (Headings & Filosofi), *Work Sans* (Body, Navigasi & Label Data).

---

*Hak Cipta © 2025 Destinara. Inisiatif Pendidikan Lapangan & Riset Berbasis Komunitas.*
