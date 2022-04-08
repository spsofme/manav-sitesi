-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 08 Nis 2022, 01:29:21
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `manav`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `genel`
--

CREATE TABLE `genel` (
  `ID` int(11) NOT NULL,
  `tur` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `metin` varchar(200) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `genel`
--

INSERT INTO `genel` (`ID`, `tur`, `metin`) VALUES
(1, 'isim', 'Manav adı'),
(2, 'slogan', 'Slogan');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `ID` int(11) NOT NULL,
  `baslik` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `resim_adi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`ID`, `baslik`, `resim_adi`, `aciklama`) VALUES
(1, 'Taze ürünler', 'saat.png', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, illum deserunt neque dolorum, illo qui praesentium repellat dolore sunt ratione magni earum architecto repellendus blanditiis impedit quas voluptatibus alias accusantium explicabo id! Voluptas eligendi in eaque autem nostrum? Velit deleniti inventore obcaecati error eius accusantium cum omnis reprehenderit dignissimos repellat.'),
(2, 'Güvenli saklama', 'guvenli.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, illum deserunt neque dolorum, illo qui praesentium repellat dolore sunt ratione magni earum architecto repellendus blanditiis impedit quas voluptatibus alias accusantium explicabo id! Voluptas eligendi in eaque autem nostrum? Velit deleniti inventore obcaecati error eius accusantium cum omnis reprehenderit dignissimos repellat.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `ID` int(11) NOT NULL,
  `tur` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `deger` varchar(150) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`ID`, `tur`, `deger`) VALUES
(2, 'telefon', '+90 5xx xxx xxxx'),
(4, 'email', 'xxx@xx.com'),
(6, 'instagram', 'xxx'),
(12, 'haftaici-saatler', '09:00 - 22:00'),
(13, 'adres', 'X Mah., X Sok., No: X, X/Türkiye'),
(14, 'haftasonu-saatler', '10:00 - 21:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `ID` int(11) NOT NULL,
  `k_adi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`ID`, `k_adi`, `sifre`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim_hakkimizda`
--

CREATE TABLE `resim_hakkimizda` (
  `ID` int(11) NOT NULL,
  `resim_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `konum` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `resim_hakkimizda`
--

INSERT INTO `resim_hakkimizda` (`ID`, `resim_adi`, `konum`) VALUES
(1, 'guvenli.jpg', '/assets/images/about'),
(2, 'saat.png', '/assets/images/about');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim_urunler`
--

CREATE TABLE `resim_urunler` (
  `ID` int(11) NOT NULL,
  `resim_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `konum` varchar(30) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `resim_urunler`
--

INSERT INTO `resim_urunler` (`ID`, `resim_adi`, `konum`) VALUES
(1, 'apple.jpg', '/assets/images/products'),
(2, 'bean.jpg', '/assets/images/products'),
(3, 'black-pepper.jpg', '/assets/images/products'),
(4, 'broccoli.jpg', '/assets/images/products'),
(5, 'carrot.jpg', '/assets/images/products'),
(6, 'chickpeas.jpg', '/assets/images/products'),
(7, 'chili-pepper.jpg', '/assets/images/products'),
(8, 'cumin.jpg', '/assets/images/products'),
(9, 'lentil.jpg', '/assets/images/products'),
(10, 'lettuce.jpg', '/assets/images/products'),
(11, 'oregano.jpg', '/assets/images/products'),
(12, 'peas.jpg', '/assets/images/products'),
(13, 'pineapple.jpg', '/assets/images/products'),
(14, 'pomegranate.jpg', '/assets/images/products'),
(15, 'spinach.jpg', '/assets/images/products'),
(16, 'watermelon.jpg', '/assets/images/products');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `ID` int(11) NOT NULL,
  `urun_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `tur` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `resim_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`ID`, `urun_adi`, `tur`, `resim_adi`) VALUES
(1, 'Elma', 'meyve', 'apple.jpg'),
(2, 'Ananas', 'meyve', 'pineapple.jpg'),
(3, 'Nar', 'meyve', 'pomegranate.jpg'),
(4, 'Karpuz', 'meyve', 'watermelon.jpg'),
(5, 'Brokoli', 'sebze', 'broccoli.jpg'),
(6, 'havuç', 'sebze', 'carrot.jpg'),
(7, 'Ispanak', 'sebze', 'spinach.jpg'),
(8, 'Marul', 'sebze', 'lettuce.jpg'),
(9, 'Fasulye', 'baklagil', 'bean.jpg'),
(10, 'Nohut', 'baklagil', 'chickpeas.jpg'),
(11, 'Bezelye', 'baklagil', 'peas.jpg'),
(12, 'Kırmızı mercimek', 'baklagil', 'lentil.jpg'),
(13, 'Karabiber', 'baharat', 'black-pepper.jpg'),
(14, 'Acı biber', 'baharat', 'chili-pepper.jpg'),
(15, 'Kekik', 'baharat', 'oregano.jpg'),
(16, 'Kimyon', 'baharat', 'cumin.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `genel`
--
ALTER TABLE `genel`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `resim_hakkimizda`
--
ALTER TABLE `resim_hakkimizda`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `resim_urunler`
--
ALTER TABLE `resim_urunler`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `genel`
--
ALTER TABLE `genel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `resim_hakkimizda`
--
ALTER TABLE `resim_hakkimizda`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `resim_urunler`
--
ALTER TABLE `resim_urunler`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
