-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2023 pada 13.13
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbclothing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `member_fee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `card`
--

INSERT INTO `card` (`id`, `code`, `name`, `discount`, `member_fee`) VALUES
(1, 'BCK', 'Black Card', 0.2, 10000000),
(2, 'PTC', 'Prestige Card', 0.1, 1500000),
(3, 'SLV', 'Silva Card', 0.08, 120000),
(4, 'NON', 'Non Member', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `card_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `phone`, `email`, `address`, `card_id`) VALUES
(1, 'Muhammad Nurcholis ', 'L', '089635957141', 'kholisdecoy24@gmail.com', 'Bogor', 1),
(2, 'Akmal', 'L', '081900120034', 'akmal@gmail.com', 'Depok', 2),
(3, 'Muhammad Sumbul', 'L', '082190234455', 'soemboel@gmail.com', 'Bogor', 4),
(4, 'rojule', 'L', '081318387621', 'rojul@gmail.com', 'Bogor', 3),
(5, 'zaidan', 'L', '0895395231832', 'zaidang@gmail.com', 'jongggol', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `date`, `qty`, `total_price`, `customer_id`, `product_id`) VALUES
(15, 'PO00630', '2023-05-04 05:25:22', 2, 280000, 1, 1),
(16, 'PO00138', '2023-05-06 13:00:31', 2, 290000, 1, 3),
(18, 'PO00693', '2023-05-06 13:08:16', 23, 1150000, 1, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `sku` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `purchase_price` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `min_stock` int(11) DEFAULT 0,
  `product_type_id` int(11) NOT NULL,
  `restock_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `sku`, `name`, `purchase_price`, `sell_price`, `stock`, `min_stock`, `product_type_id`, `restock_id`) VALUES
(1, 'SK001', 'Tshirt Red', 100000, 140000, 90, 1, 2, 1),
(2, 'SK002', 'Hoodie Black', 120000, 190000, 49, 1, 4, 1),
(3, 'SK003', 'Jogger Pants Grey', 100000, 145000, 145, 1, 3, 3),
(4, 'SK004', 'Sneakers', 230000, 270000, 12, 1, 5, 2),
(5, 'SK005', 'Shirt Navy', 150000, 215000, 39, 1, 1, 2),
(6, 'Sk2334', 'jaket kece', 20000, 50000, 22, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `product_type`
--

INSERT INTO `product_type` (`id`, `name`) VALUES
(1, 'Shirt'),
(2, 'TShirt'),
(3, 'Pants'),
(4, 'Jacket'),
(5, 'Dress'),
(6, 'jaket kece');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restock`
--

CREATE TABLE `restock` (
  `id` int(11) NOT NULL,
  `restock_number` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `restock`
--

INSERT INTO `restock` (`id`, `restock_number`, `date`, `qty`, `price`, `supplier_id`) VALUES
(1, 'RS001', '2022-03-10 00:00:00', 20, 11500000, 3),
(2, 'RS002', '2022-04-05 00:00:00', 15, 10000000, 2),
(3, 'RS003', '2023-01-01 00:00:00', 41, 24000000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `contact_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `phone`, `address`, `contact_name`) VALUES
(1, 'PT Prima Sentosa Indonesia', '081123456789', 'Surabaya', 'Dewi Kurniawati'),
(2, 'PT QNET Indonesia', '085678901234', 'Bandung', 'Andi Pratama'),
(3, 'PT Melia Sehat Sejahtera', '081234567890', 'Jakarta Timur', 'Dimas Sanjaya');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_customer_card1` (`card_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `fk_order_customer` (`customer_id`),
  ADD KEY `fk_order_product1` (`product_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `fk_product_product_type1` (`product_type_id`),
  ADD KEY `fk_product_restock1` (`restock_id`);

--
-- Indeks untuk tabel `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `restock`
--
ALTER TABLE `restock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restock_number` (`restock_number`),
  ADD KEY `fk_restock_supplier1` (`supplier_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `restock`
--
ALTER TABLE `restock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_card1` FOREIGN KEY (`card_id`) REFERENCES `card` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_product_type1` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_restock1` FOREIGN KEY (`restock_id`) REFERENCES `restock` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `restock`
--
ALTER TABLE `restock`
  ADD CONSTRAINT `fk_restock_supplier1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
