-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2021 pada 04.01
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaranp4s`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `email`) VALUES
(7, 'Adminroot', 'adminroot', '$2y$10$VANB0c1MegWcL7Kbb84.0ORPopQZQv8qxW98E/hrg8.Tf9HLTlR8u', 'adminroot@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata_peserta_pelatihan`
--

CREATE TABLE `biodata_peserta_pelatihan` (
  `id` int(11) NOT NULL,
  `id_pengajuan_peserta` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(60) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `jenis_kelamin` varchar(35) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `no_wa` varchar(13) NOT NULL,
  `fb` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `hobby` text NOT NULL,
  `cita_cita` text NOT NULL,
  `pelatihan` text NOT NULL,
  `harapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelatihan`
--

CREATE TABLE `jadwal_pelatihan` (
  `id` int(11) NOT NULL,
  `id_pengajuan_peserta` int(11) NOT NULL,
  `hari` varchar(25) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_pelatihan`
--

INSERT INTO `jadwal_pelatihan` (`id`, `id_pengajuan_peserta`, `hari`, `tanggal`) VALUES
(10, 5, 'Selasa', '2021-12-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelatihan_detail`
--

CREATE TABLE `jadwal_pelatihan_detail` (
  `id` int(11) NOT NULL,
  `id_jadwal_pelatihan` int(11) NOT NULL,
  `mata_latihan` text NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `jp` int(5) NOT NULL,
  `fasilitator` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_pelatihan_detail`
--

INSERT INTO `jadwal_pelatihan_detail` (`id`, `id_jadwal_pelatihan`, `mata_latihan`, `jam_mulai`, `jam_selesai`, `jp`, `fasilitator`) VALUES
(5, 10, 'asdasd', '08:45:00', '09:00:00', 2, 'Suma');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id` int(11) NOT NULL,
  `id_pengajuan_peserta` int(11) NOT NULL,
  `no_rekening` varchar(40) NOT NULL,
  `atas_nama` varchar(60) NOT NULL,
  `bank` varchar(60) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `tanggal_konfirmasi` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_harga`
--

CREATE TABLE `list_harga` (
  `id` int(11) NOT NULL,
  `no_paket` varchar(30) NOT NULL,
  `nama_paket` varchar(60) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `list_harga`
--

INSERT INTO `list_harga` (`id`, `no_paket`, `nama_paket`, `deskripsi`, `harga`) VALUES
(1, 'PKT0000001', 'Paket A', 'Lorem ipsum dolor sit amet, consectetur adipisicing est ', 20000000),
(4, 'PKT0000002', 'Paket B', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 1000000),
(5, 'PKT0000003', 'Paket C', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_peserta`
--

CREATE TABLE `pengajuan_peserta` (
  `id` int(11) NOT NULL,
  `id_list_harga` int(11) NOT NULL,
  `id_registrasi_akun_instansi` int(11) NOT NULL,
  `no_pengajuan` varchar(10) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `sampai_tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` text NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_peserta_detail`
--

CREATE TABLE `pengajuan_peserta_detail` (
  `id` int(11) NOT NULL,
  `id_pengajuan_peserta` int(11) NOT NULL,
  `nama_perwakilan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi_akun_instansi`
--

CREATE TABLE `registrasi_akun_instansi` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(70) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_registrasi` date NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `registrasi_akun_instansi`
--

INSERT INTO `registrasi_akun_instansi` (`id`, `nama_instansi`, `kategori`, `telepon`, `alamat`, `tanggal_registrasi`, `username`, `password`) VALUES
(3, 'Instansi A', 'Instansi', '1234567', 'Korea', '2021-12-19', 'peserta1', '$2y$10$AVLsUYgGuLye94SS1xfV9.JbBP3PiOXjmo0o9wXH7yX553dLWHJRO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `biodata_peserta_pelatihan`
--
ALTER TABLE `biodata_peserta_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_pelatihan`
--
ALTER TABLE `jadwal_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_pelatihan_detail`
--
ALTER TABLE `jadwal_pelatihan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_harga`
--
ALTER TABLE `list_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_peserta`
--
ALTER TABLE `pengajuan_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_peserta_detail`
--
ALTER TABLE `pengajuan_peserta_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `registrasi_akun_instansi`
--
ALTER TABLE `registrasi_akun_instansi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `biodata_peserta_pelatihan`
--
ALTER TABLE `biodata_peserta_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelatihan`
--
ALTER TABLE `jadwal_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelatihan_detail`
--
ALTER TABLE `jadwal_pelatihan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `list_harga`
--
ALTER TABLE `list_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_peserta`
--
ALTER TABLE `pengajuan_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_peserta_detail`
--
ALTER TABLE `pengajuan_peserta_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `registrasi_akun_instansi`
--
ALTER TABLE `registrasi_akun_instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
