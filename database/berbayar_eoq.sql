-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 07:49 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `berbayar_eoq`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `biaya_pesan` int(11) NOT NULL,
  `biaya_simpan` int(11) NOT NULL,
  `lead_time` int(11) NOT NULL,
  `min_stok` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `biaya_pesan`, `biaya_simpan`, `lead_time`, `min_stok`, `stok`) VALUES
('BR001', 'SAMSUNG GALAXY S6', 1000000, 12000000, 20000, 200000, 7, 292, 1100),
('BR002', 'SAMSUNG S6 EDGE', 8000000, 10000000, 50000, 1600000, 7, 0, 400),
('BR003', 'SAMSUNG GALAXY J1', 1200000, 1400000, 20000, 240000, 7, 0, 100),
('BR004', 'SAMSUNG GRAND NEO PLUS', 2000000, 2200000, 50000, 400000, 7, 0, 200),
('BR005', 'SAMSUNG GALAXY GRAND', 2200000, 2400000, 30000, 440000, 7, 0, 100),
('BR006', 'SAMSUNG GALAXY MEGA 2', 3200000, 3500000, 50000, 640000, 7, 0, 200),
('BR007', 'SAMSUNG GALAXY E7', 4400000, 4600000, 40000, 880000, 7, 0, 250);

-- --------------------------------------------------------

--
-- Table structure for table `eoq`
--

CREATE TABLE IF NOT EXISTS `eoq` (
  `no` int(11) NOT NULL,
  `id_eoq` varchar(15) NOT NULL,
  `tanggal_eoq` date NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `biaya_pesan` int(11) NOT NULL,
  `biaya_simpan` int(11) NOT NULL,
  `lead_time` int(11) NOT NULL,
  `permintaan` int(11) NOT NULL,
  `eoq` int(11) NOT NULL,
  `rop` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  PRIMARY KEY (`id_eoq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eoq`
--

INSERT INTO `eoq` (`no`, `id_eoq`, `tanggal_eoq`, `bulan`, `id_barang`, `nama_barang`, `biaya_pesan`, `biaya_simpan`, `lead_time`, `permintaan`, `eoq`, `rop`, `total_biaya`) VALUES
(1, 'EQ0001', '2018-03-12', 'April', 'BR001', 'SAMSUNG GALAXY S6', 20000, 200000, 7, 500, 10, 292, 10220000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` varchar(15) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  `kota_pelanggan` varchar(30) NOT NULL,
  `telp_pelanggan` varchar(12) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `kota_pelanggan`, `telp_pelanggan`) VALUES
('PL001', 'Indra Satya', 'Jalan Baru No. 1 Kedaton Bandar Lampung', 'Bandar Lampung', '85758857775'),
('PL002', 'Danang Kesuma', 'Jalan Z.A. Pagaralam No 15 Kedaton Bandar Lampung', 'Bandar Lampung', '82281617761');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `no` int(11) NOT NULL,
  `id_pembelian` varchar(15) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `id_supplier` varchar(15) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  PRIMARY KEY (`id_pembelian`,`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no`, `id_pembelian`, `tanggal_beli`, `id_supplier`, `nama_supplier`, `id_barang`, `nama_barang`, `harga_beli`, `jumlah_beli`, `total_harga`) VALUES
(1, 'PB03180001', '2018-03-12', 'SP001', 'Supplier Oke', 'BR001', 'SAMSUNG GALAXY S6', 1000000, 100, 100000000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `no` int(11) NOT NULL,
  `id_penjualan` varchar(15) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no`, `id_penjualan`, `tanggal_jual`, `id_pelanggan`, `nama_pelanggan`, `id_barang`, `nama_barang`, `harga_jual`, `jumlah_jual`, `total_harga`) VALUES
(1, 'PJ03180001', '2018-03-12', 'PL001', 'Indra Satya', 'BR002', 'SAMSUNG S6 EDGE', 10000000, 100, 1000000000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` varchar(15) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `kota_supplier` varchar(30) NOT NULL,
  `provinsi_supplier` varchar(30) NOT NULL,
  `telp_supplier` varchar(12) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `kota_supplier`, `provinsi_supplier`, `telp_supplier`) VALUES
('SP001', 'Supplier Oke', 'Jalan Lama Gang Baru No 1 Jakarta', 'Jakarta', 'DKI Jakarta', '085758857775'),
('SP002', 'Supplier Yes', 'Jalan Oke Gang Yes No 2', 'Metro', 'Lampung', '085857775885');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(15) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `telp_user` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `telp_user`, `password`, `level`) VALUES
('admin', 'Administrator', 'admin@gmail.com', '082281617761', 'admin', 'admin'),
('gudang', 'Bagian Gudang', 'gudang@gmail.com', '085669919769', 'gudang', 'gudang'),
('pembelian', 'Bagian Pembelian', 'pembelian@gmail.com', '085758857775', 'beli', 'pembelian'),
('penjualan', 'Bagian Penjualan', 'penjualan@gmail.com', '082281617761', 'jual', 'penjualan'),
('pimpinan', 'Pimpinan', 'pimpinan@gmail.com', '085758857775', 'pimpin', 'pimpinan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
