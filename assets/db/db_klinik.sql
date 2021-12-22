-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2021 pada 15.10
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(5) NOT NULL,
  `no_antrian` varchar(5) NOT NULL,
  `id_pasien` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tgl_checkup` date NOT NULL DEFAULT current_timestamp(),
  `status_antrian` enum('antrian','pemeriksaan','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `no_antrian`, `id_pasien`, `id_user`, `tgl_checkup`, `status_antrian`) VALUES
(4, 'K0001', 2, 6, '2021-12-21', 'pemeriksaan'),
(9, 'K0002', 1, 7, '2021-12-21', 'pemeriksaan'),
(11, 'K0003', 3, 6, '2021-12-22', 'antrian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `jenis_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `tahun_produksi` date NOT NULL,
  `stok_obat` int(10) NOT NULL,
  `merk_obat` varchar(20) NOT NULL,
  `harga_obat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `masa_berlaku`, `jenis_obat`, `nama_obat`, `tahun_produksi`, `stok_obat`, `merk_obat`, `harga_obat`) VALUES
(2, '2023-10-24', 'Salep', 'Chorampenicol', '2021-12-01', 250, 'Kalmicetine', 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL,
  `nik_pasien` varchar(16) NOT NULL,
  `nama_pasien` varchar(20) NOT NULL,
  `umur_pasien` int(3) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nik_pasien`, `nama_pasien`, `umur_pasien`, `alamat_pasien`, `jenis_kelamin`) VALUES
(1, '3020101010101293', 'Agus Hartono', 20, 'Bandung', 'laki-laki'),
(2, '3012020102939401', 'Julia', 25, 'Cimahi', 'perempuan'),
(3, '3013404059681923', 'Heri', 30, 'Tangerang', 'laki-laki'),
(4, '3013404052681923', 'Joko', 20, 'Bandung', 'laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `id_rekam_medis` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `total_bayar` double NOT NULL,
  `status_bayar` enum('pending','lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_rekam_medis`, `id_user`, `tgl_bayar`, `total_bayar`, `status_bayar`) VALUES
(1, 7, 8, '2021-12-22', 100000, 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id_pemeriksaan` int(5) NOT NULL,
  `id_antrian` int(5) NOT NULL,
  `tekanan_darah` varchar(20) NOT NULL,
  `suhu_badan` float NOT NULL,
  `keluhan` text NOT NULL,
  `status_pemeriksaan` enum('petugas','dokter') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `id_antrian`, `tekanan_darah`, `suhu_badan`, `keluhan`, `status_pemeriksaan`) VALUES
(2, 4, '90/60', 36, 'Pilek', 'dokter'),
(3, 9, '90/60', 36, 'Pilek', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekammedis`
--

CREATE TABLE `rekammedis` (
  `id_rekam_medis` int(5) NOT NULL,
  `id_pemeriksaan` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `diagnosa` varchar(50) NOT NULL,
  `tindakan` varchar(50) NOT NULL,
  `rujukan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekammedis`
--

INSERT INTO `rekammedis` (`id_rekam_medis`, `id_pemeriksaan`, `id_user`, `diagnosa`, `tindakan`, `rujukan`) VALUES
(7, 2, 8, 'Flu biasa', 'perban', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resepobat`
--

CREATE TABLE `resepobat` (
  `id_resep_obat` int(5) NOT NULL,
  `id_rekam_medis` int(5) NOT NULL,
  `id_obat` int(5) NOT NULL,
  `jumlah_obat` int(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('administrator','dokter','petugas','apoteker') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nik`, `username`, `password`, `nama_user`, `alamat`, `level`) VALUES
(4, '1971012310010008', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin', 'padang', 'administrator'),
(6, '1376012310001000', 'aqiill', '5a919f4b9e99f35bf01f8b56a7cad352d9d693f6', 'Aqil Rahman', 'Padang Data', 'petugas'),
(7, '1971010010010008', 'faizal', '4463171ed285270b4d325f69f8217b8471e828ce', 'Faizal', 'Bandung', 'petugas'),
(8, '1376010010002002', 'catur', 'e8601eb22ba7f55f8d54a109dc6d1792000a43fe', 'Caturiani', 'Tasik', 'dokter');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `fk_id_pasien_pasien` (`id_pasien`),
  ADD KEY `fk_antrian_user` (`id_user`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_id_rekam_medis_rekammedis` (`id_rekam_medis`),
  ADD KEY `fk_pembayaran_user` (`id_user`);

--
-- Indeks untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `fk_pemeriksaan_antrian` (`id_antrian`);

--
-- Indeks untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  ADD PRIMARY KEY (`id_rekam_medis`),
  ADD KEY `fk_rekammedis_pemeriksaan` (`id_pemeriksaan`),
  ADD KEY `fk_rekammedis_user` (`id_user`);

--
-- Indeks untuk tabel `resepobat`
--
ALTER TABLE `resepobat`
  ADD PRIMARY KEY (`id_resep_obat`),
  ADD KEY `fk_resepobat_obat` (`id_obat`),
  ADD KEY `fk_resepobat_rekammedis` (`id_rekam_medis`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id_pemeriksaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  MODIFY `id_rekam_medis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `resepobat`
--
ALTER TABLE `resepobat`
  MODIFY `id_resep_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `fk_antrian_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_antrian_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pasien_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_id_rekam_medis_rekammedis` FOREIGN KEY (`id_rekam_medis`) REFERENCES `rekammedis` (`id_rekam_medis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembayaran_rekammedis` FOREIGN KEY (`id_rekam_medis`) REFERENCES `rekammedis` (`id_rekam_medis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembayaran_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `fk_pemeriksaan_antrian` FOREIGN KEY (`id_antrian`) REFERENCES `antrian` (`id_antrian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  ADD CONSTRAINT `fk_rekammedis_pemeriksaan` FOREIGN KEY (`id_pemeriksaan`) REFERENCES `pemeriksaan` (`id_pemeriksaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rekammedis_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `resepobat`
--
ALTER TABLE `resepobat`
  ADD CONSTRAINT `fk_resepobat_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_resepobat_rekammedis` FOREIGN KEY (`id_rekam_medis`) REFERENCES `rekammedis` (`id_rekam_medis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
