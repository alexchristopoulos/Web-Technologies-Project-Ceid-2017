-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 01 Οκτ 2017 στις 11:44:14
-- Έκδοση διακομιστή: 5.7.14
-- Έκδοση PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `projectweb`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `apostoli`
--

CREATE TABLE `apostoli` (
  `ekkinisi` varchar(20) COLLATE utf8_bin NOT NULL,
  `termatismos` varchar(20) COLLATE utf8_bin NOT NULL,
  `trackingnumber` varchar(20) COLLATE utf8_bin NOT NULL,
  `katastasi` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT 'epeksergasia',
  `typos` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'apli',
  `diadromi` varchar(100) COLLATE utf8_bin NOT NULL,
  `topothesia` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `apostoli`
--

INSERT INTO `apostoli` (`ekkinisi`, `termatismos`, `trackingnumber`, `katastasi`, `typos`, `diadromi`, `topothesia`) VALUES
('IRAKLIO', 'Αλεξανδρούπολη1', 'IR1505033189AL', 'Ολοκληρώθηκε', 'aplo', 'IRAKLIO>KALAMATA>PATRA>IOANNINA>THESSALONIKI>ALEXANDROUPOLI>', 'Αλεξανδρούπολη1'),
('THESSALONIKI', 'Ηράκλειο', 'TH1505033218IR', 'Υπό Επεξεργασία', 'express', 'THESSALONIKI>ATHENS>IRAKLIO>', 'THESSALONIKI'),
('THESSALONIKI', 'Ηράκλειο', 'TH1505033259IR', 'Υπό Επεξεργασία', 'aplo', 'THESSALONIKI>LARISSA>ATHENS>KALAMATA>IRAKLIO>', 'THESSALONIKI'),
('IOANNINA', 'storesparti', 'IO1505033337KA', 'Υπό Επεξεργασία', 'aplo', 'IOANNINA>PATRA>KALAMATA>', 'IOANNINA'),
('ALEXANDROUPOLI', 'storesparti', 'AL1505033350KA', 'Υπό Επεξεργασία', 'express', 'ALEXANDROUPOLI>ATHENS>KALAMATA>', 'ALEXANDROUPOLI'),
('ALEXANDROUPOLI', 'storesparti', 'AL1505033360KA', 'Υπό Επεξεργασία', 'aplo', 'ALEXANDROUPOLI>THESSALONIKI>LARISSA>ATHENS>KALAMATA>', 'ALEXANDROUPOLI'),
('ATHENS', 'Αλεξανδρούπολη1', 'AT1505033389AL', 'Υπό Επεξεργασία', 'express', 'ATHENS>ALEXANDROUPOLI>', 'ATHENS'),
('ATHENS', 'Αλεξανδρούπολη1', 'AT1505033401AL', 'Υπό Επεξεργασία', 'aplo', 'ATHENS>LARISSA>THESSALONIKI>ALEXANDROUPOLI>', 'ATHENS'),
('ATHENS', 'Αλεξανδρούπολη1', 'AT1505033420AL', 'Υπό Επεξεργασία', 'express', 'ATHENS>ALEXANDROUPOLI>', 'ATHENS'),
('ATHENS', 'Αλεξανδρούπολη1', 'AT1505033424AL', 'Υπό Επεξεργασία', 'aplo', 'ATHENS>LARISSA>THESSALONIKI>ALEXANDROUPOLI>', 'ATHENS'),
('THESSALONIKI', 'Αθήνα1', 'TH1505228187AT', 'Ολοκληρώθηκε', 'express', 'THESSALONIKI>ATHENS>', 'Αθήνα1'),
('THESSALONIKI', 'Αθήνα1', 'TH1505246658AT', 'Ολοκληρώθηκε', 'aplo', 'THESSALONIKI>LARISSA>ATHENS>', 'Αθήνα1'),
('IRAKLIO', 'Ιωάννινα1', 'IR1505663067IO', 'Ολοκληρώθηκε', 'aplo', 'IRAKLIO>KALAMATA>PATRA>IOANNINA>', 'Ιωάννινα1'),
('THESSALONIKI', 'Αθήνα1', 'TH1506073002AT', 'Υπό Επεξεργασία', 'express', 'THESSALONIKI>ATHENS>', 'THESSALONIKI'),
('THESSALONIKI', 'Αθήνα1', 'TH1506073014AT', 'Υπό Επεξεργασία', 'aplo', 'THESSALONIKI>LARISSA>ATHENS>', 'THESSALONIKI'),
('ALEXANDROUPOLI', 'Ηράκλειο', 'AL1506073033IR', 'Υπό Επεξεργασία', 'express', 'ALEXANDROUPOLI>IRAKLIO>', 'ALEXANDROUPOLI'),
('IRAKLIO', 'Αλεξανδρούπολη1', 'IR1506073071AL', 'Υπό Επεξεργασία', 'aplo', 'IRAKLIO>KALAMATA>PATRA>IOANNINA>THESSALONIKI>ALEXANDROUPOLI>', 'IRAKLIO'),
('IRAKLIO', 'Αλεξανδρούπολη1', 'IR1506073081AL', 'Υπό Επεξεργασία', 'express', 'IRAKLIO>ALEXANDROUPOLI>', 'IRAKLIO'),
('IOANNINA', 'storesparti', 'IO1506073380KA', 'Υπό Επεξεργασία', 'aplo', 'IOANNINA>PATRA>KALAMATA>', 'IOANNINA'),
('IOANNINA', 'storesparti', 'IO1506073468KA', 'Υπό Επεξεργασία', 'express', 'IOANNINA>PATRA>KALAMATA>', 'IOANNINA');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `hub`
--

CREATE TABLE `hub` (
  `onomasia` varchar(25) COLLATE utf8_bin NOT NULL,
  `poli` varchar(25) COLLATE utf8_bin NOT NULL,
  `sintetagmenes` varchar(45) COLLATE utf8_bin NOT NULL,
  `tilefono` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `hub`
--

INSERT INTO `hub` (`onomasia`, `poli`, `sintetagmenes`, `tilefono`) VALUES
('ATHENS', 'Αθήνα', '38.056261, 23.586964', '210 1234 567'),
('IOANNINA', 'Ιωάννινα', '39.6818260, 20.8630371', '26510 12345'),
('THESSALONIKI', 'Θεσσαλονίκη', '40.672327, 22.939465', '2310 1234 56'),
('MITILINI', 'Μυτιλήνη', '39.091932, 26.534764', '22510 23654'),
('ALEXANDROUPOLI', 'Αλεξανδρούπολη', '40.855488, 25.861820', '25510 23654'),
('IRAKLIO', 'Ηράκλειο', '35.339798, 25.147704', '2813 1234 56'),
('PATRA', 'Πάτρα', '38.225278, 21.739196', '2610 123456'),
('KALAMATA', 'Καλαμάτα', '37.042047, 22.120972', '27210 12345'),
('LARISSA', 'Λάρισσα', '39.643794, 22.412108', '2410 123456');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `katastima`
--

CREATE TABLE `katastima` (
  `onomasia` varchar(20) COLLATE utf8_bin NOT NULL,
  `odos` varchar(35) COLLATE utf8_bin NOT NULL,
  `arithmos` int(4) NOT NULL,
  `poli` varchar(25) COLLATE utf8_bin NOT NULL,
  `tk` varchar(8) COLLATE utf8_bin NOT NULL,
  `tilefono` varchar(15) COLLATE utf8_bin NOT NULL,
  `sintetagmenes` varchar(32) COLLATE utf8_bin NOT NULL,
  `hub` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `katastima`
--

INSERT INTO `katastima` (`onomasia`, `odos`, `arithmos`, `poli`, `tk`, `tilefono`, `sintetagmenes`, `hub`) VALUES
('Αθήνα1', 'Ερμού', 17, 'Αθήνα', '14341', '2109876321', '37.975956, 23.731675', 'ATHENS'),
('Ιωάννινα1', 'Αβέρωφ', 25, 'Ιωάννινα', '45221', '26510 12345', '39.667316, 20.855220', 'IOANNINA'),
('Αλεξανδρούπολη1', 'Ειρήνης', 5, 'Αλεξανδρούπολη', '68131', '25510 12345', '40.845202, 25.875796', 'ALEXANDROUPOLI'),
('Ηράκλειο', 'Μελιδώνη', 15, 'Ηράκλειο', '71201', '2813 123456', '35.340508, 25.125834', 'IRAKLIO'),
('storesparti', 'Λεωφ. Λυκούργου', 55, 'Σπάρτη', '23100', '1234512345', '37.074448, 22.430229', 'KALAMATA'),
('storekastoria', 'Λεωφόρος Κύκνων', 2, 'Καστοριά', '52100', '24670 12345', '40.520813, 21.262262', 'THESSALONIKI');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `topologia`
--

CREATE TABLE `topologia` (
  `trackingnumber` varchar(30) COLLATE utf8_bin NOT NULL,
  `perioxi` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `topologia`
--

INSERT INTO `topologia` (`trackingnumber`, `perioxi`) VALUES
('IR1505033189AL', 'IRAKLIO'),
('TH1505033218IR', 'THESSALONIKI'),
('TH1505033259IR', 'THESSALONIKI'),
('IO1505033337KA', 'IOANNINA'),
('AL1505033350KA', 'ALEXANDROUPOLI'),
('AL1505033360KA', 'ALEXANDROUPOLI'),
('AT1505033389AL', 'ATHENS'),
('AT1505033401AL', 'ATHENS'),
('AT1505033420AL', 'ATHENS'),
('AT1505033424AL', 'ATHENS'),
('IR1505033189AL', 'PATRA'),
('IR1505033189AL', 'IOANNINA'),
('IR1505033189AL', 'THESSALONIKI'),
('IR1505033189AL', 'ALEXANDROUPOLI'),
('TH1505228187AT', 'THESSALONIKI'),
('TH1505228187AT', 'ATHENS'),
('TH1505246658AT', 'THESSALONIKI'),
('TH1505246658AT', 'LARISSA'),
('TH1505246658AT', 'ATHENS'),
('IR1505663067IO', 'IRAKLIO'),
('IR1505663067IO', 'KALAMATA'),
('IR1505663067IO', 'PATRA'),
('IR1505663067IO', 'IOANNINA'),
('TH1506073002AT', 'THESSALONIKI'),
('TH1506073014AT', 'THESSALONIKI'),
('AL1506073033IR', 'ALEXANDROUPOLI'),
('IR1506073071AL', 'IRAKLIO'),
('IR1506073081AL', 'IRAKLIO'),
('IO1506073380KA', 'IOANNINA'),
('IO1506073468KA', 'IOANNINA');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

CREATE TABLE `user` (
  `username` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idiotia` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `identitycode` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `perioxi` varchar(26) COLLATE utf16_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`username`, `password`, `idiotia`, `name`, `lastname`, `identitycode`, `perioxi`) VALUES
('admin1', '12345', 'admin', 'Αλέξανδρος', 'Χριστόπουλος', 'ΑΜ5928', 'Καστοριά'),
('admin3', '12345', 'admin', 'Κωνσταντίνος', 'Χριστόπουλος', 'ΑΜ5929', 'Καλαμάτα'),
('admin2', '12345', 'admin', 'Παναγιώτης', 'Κάντας', 'AM5777', 'Πάτρα'),
('store1', '1234', 'store', 'Αλέξης', 'Άλφα', 'AAE16wss', 'Αθήνα1'),
('hubth', '1234', 'hub', 'Αλέξης', 'Άλφα', 'AD123654', 'THESSALONIKI'),
('hubat', '1234', 'hub', 'Νίκος', 'Χαμπ', 'AL54698', 'ATHENS'),
('storeir', '1234', 'store', 'Γιώργος', 'Βήτα', 'AR12334', 'Ηράκλειο'),
('hubio', '1234', 'hub', 'Αλέξανδρος', 'Χριστόπουλος', '235928', 'IOANNINA'),
('hubmi', '1234', 'hub', 'Κωνσταντίνος', 'Χριστόπουλος', '235929', 'MITILINI'),
('hubal', '1234', 'hub', 'Παναγιώτης', 'Κάντας', '235777', 'ALEXANDROUPOLI'),
('hubir', '1234', 'hub', 'Αλεξ', 'Χριστοπουλος', '235928', 'IRAKLIO'),
('hubpa', '1234', 'hub', 'Κώστας', 'Χριστόπουλοε', '235929', 'PATRA'),
('hubka', '1234', 'hub', 'Πάνος', 'Κάντας', '235777', 'KALAMATA'),
('hubla', '1234', 'hub', 'Αλέξ', 'Χ', '235928', 'LARISSA'),
('storeal', '1234', 'store', 'Alex', 'Alexandroupoli', '5555', 'Αλεξανδρούπολη1'),
('storekastoria', '1234', 'store', 'Αλέξανδρος', 'Χριστόπουλος', '5928', 'storekastoria'),
('storeio', '1234', 'store', 'dfdfdfdf', 'dfafddsdf', '222222', 'Ιωάννινα1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
