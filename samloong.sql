-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 05:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samloong`
--

-- --------------------------------------------------------

--
-- Table structure for table `bos`
--

CREATE TABLE `bos` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bos`
--

INSERT INTO `bos` (`id`, `email`, `username`, `perusahaan`, `password`) VALUES
(1, 'taufik@gmail.com', 'Taufik', 'PT Gramedia Asri Media', '$2y$10$jad13Ov/GYsAKfpRFIs7/OJbOBqx1lV56GJftKYDUVj0YphX3ekjS');

-- --------------------------------------------------------

--
-- Table structure for table `devosi`
--

CREATE TABLE `devosi` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(100) NOT NULL,
  `ayat` varchar(100) NOT NULL,
  `teks` longtext NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `kodeguru` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devosi`
--

INSERT INTO `devosi` (`id`, `tanggal`, `judul`, `ayat`, `teks`, `sumber`, `kodeguru`) VALUES
(1, '2023-04-07', 'Remaja yang bijaksana', 'Mazmur 90:12', 'Khotbah\nMazmur 90:12 mencatat satu doa yang pernah dinaikkan oleh Musa yang berbunyi, \"Ajarlah kami \nmenghitung hari-hari kami sedemikian, sehingga kami beroleh hati yang bijaksana\". Tentu ini \nbukan saja menjadi doa Musa, tetapi menjadi doa setiap kita. Ketika Salomo ditanya oleh Tuhan, \nmau minta apa dari pada-Ku, Salomo? Dia tidak minta kekayaan, emas dan harta dunia. Tapi dia \nmenjawab: \"Tuhan bagaimana saya dapat memimpin bangsa yang begini besar? Berilah saya \nhikmat untuk dapat membedakan yang baik dan yang jahat, untuk mengerti kehendak-Mu ( 1 \nRaja-raja 3:5-9)\nKemudian Apa itu bijaksana?\nKBBI memberikan penjelasan mengenai bijaksana yaitu:\nSelalu menggunakan akal budinya (pengalaman dan pengetahuannya); arif; tajam pikiran;\nCermat dan teliti bila menghadapi masalah dan kesulitan.\nJadi bijaksana adalah menggunakan akal budi dan pemikiran yang sehat sehingga menghasilkan \nperilaku yang tepat.\nCiri Remaja yang Bijaksana\nBerpikir sebelum berkata-kata\n“Perkataan yang diucapkan tepat pada waktunya, adalah seperti buah apel emas di \npinggan perak” ( Amsal 25:11 ) dan juga di dalam kitab Amsal 10:19 memiliki bunyi “Di \ndalam banyak bicara,pasti ada pelanggaran, tetapi siapa menahan bibirnya, berakal budi”\nIngat, mulutmu, harimaumu kita harus memikirkan perkataan kita terlebih dahulu sebelum \nberkata keluar dikarenakan masa depan kita ada dimulut kita dan kita juga harus hindari \nperkataan dusta.\nBerpikir sebelum bertindak\nSesal dahulu pendapatan, sesal kemudian tiada gunanya, atau pikir-pikir dahulu \n–\n–\n–\n3.\n–\n–\n4.\npendapatan, sesal kemudian tada guna. Artinya, \"Hendaklah perpikir masak-masak \nsebelum bertindak atau mengambil suatu keputusan”. Orang yang bijak adalah orang yang \nberpikir masak-masak sebelum berpiiak.\nJangan \"grusa-grusu\" Contoh: Esau adalah orang yang grusa-grusu, terburu-buru \nmengambil keputusan, tanpa mempertimbangkan dengan benar ( Kejadian 25:29-34)\nPertimbangkan manfaat dari setiap tindakan yang kita lakukan.\nKita harus menjadi orang yang cerdik seperti yang ada di kitab Amsal 13:16 yang berbunyi “Orang \ncerdik bertindak dengan pengetahuan, tapi orang bebal membeberkan kebodohan”\nMempergunakan waktu dengan bijak\n“Ajarlah kami menghitung hari-hari kami sedemikian, hingga kami beroleh hati yang \nbijaksana. (Mazmur 90:12)\nPergunakanlah waktu yang ada, karena hari-hari ini adalah jahat (Efesus 5:16)\nDikarenakan waktu adalah pemberian Tuhan yang patut kita syukuri dan kita pergunakan dengan \nbaik\nTidak egois\nKita tidak boleh hanya jangan mencari kepentingan sendiri, seperti yang diajarkan di kitab Filipi \n2:1-5 kemudian remaja bijaksana adalah harus bergaul dengansmeua orang, tapi yang perlu \ndigaris bawahi adalah jangan gampang terpengaruh\nBiarlah Tuhan memampukan kita untuk memiliki keempat sikap ini. Dengan demikian, kita akan \ntetap teguh dalam pekerjaan Tuhan atau yang kita sebut dengan pelayanan. Percayalah, jerih \npayah kita tidak akan sia-sia', 'Josevien', 'SE'),
(2, '2023-04-08', '123', '123', '123123122222222222222222222222222222222222222222222222222222222222222222222222222312312312222222222222222222222222222222222222222222222222222222222222222222222222231231231222222222222222222222222222222222222222222222222222222222222222222222222223123123122222222222222222222222222222222222222222222222222222222222222222222222222312312312222222222222222222222222222222222222222222222222222222222222222222222222231231231222222222222222222222222222222222222222222222222222222222222222222222222223', '123', 'SE'),
(4, '2023-04-09', 'Hai kawanku...', 'Mazmur 1:1', 'Hai kawanku yang berbahagia', 'pontianakmedia', 'SE');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kode` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis-kelamin` tinyint(1) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode`, `nama`, `jenis-kelamin`, `mapel`, `jurusan`) VALUES
('HT', 'Herman Tio', 1, 'Pemograman Lanjutan', 'Teknologi Komputer dan Jaringan'),
('SE', 'Sondang Elisabeth', 0, 'Matematika', 'Teknologi Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran_magang`
--

CREATE TABLE `kehadiran_magang` (
  `id` int(11) NOT NULL,
  `nisSiswa` int(11) NOT NULL,
  `idBos` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `persetujuan` tinyint(1) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran_magang`
--

INSERT INTO `kehadiran_magang` (`id`, `nisSiswa`, `idBos`, `status`, `deskripsi`, `persetujuan`, `tanggal`) VALUES
(1, 6883, 1, 'Hadir', 'Menyusun buku', 0, '2023-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `login_guru`
--

CREATE TABLE `login_guru` (
  `kode` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_guru`
--

INSERT INTO `login_guru` (`kode`, `email`, `password`) VALUES
('HT', 'herman@gmail.com', '$2y$10$jZShv3/XXNtYWzDhMlQsQOzfeqtaJdp1DdS3rXe3hZu3DMfD6py1.'),
('SE', 'sondang@gmail.com', '$2y$10$L3kLgqpOizc5YdGsS7wJou9XGa3cA6lAgxkI1vwQBno0lHP7MOEhy');

-- --------------------------------------------------------

--
-- Table structure for table `login_siswa`
--

CREATE TABLE `login_siswa` (
  `nis` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_siswa`
--

INSERT INTO `login_siswa` (`nis`, `email`, `password`) VALUES
(6883, 'alvin@gmail.com', '$2y$10$orNV530Y4uIAC1YGw.s0y./QnRZyXRbGGtutwlwNZDRaxj6oqt3vS');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id`, `nama`, `jurusan`) VALUES
(1, 'Matematika', 'Umum'),
(2, 'Pemograman Lanjutan', 'Teknologi Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `pembelajaran`
--

CREATE TABLE `pembelajaran` (
  `id` int(11) NOT NULL,
  `kodeguru` varchar(11) NOT NULL,
  `idPelajaran` int(11) NOT NULL,
  `materi` varchar(100) NOT NULL,
  `isi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelajaran`
--

INSERT INTO `pembelajaran` (`id`, `kodeguru`, `idPelajaran`, `materi`, `isi`) VALUES
(1, 'HT', 2, '12345', '123455555'),
(2, 'HT', 2, 'yahaha', 'yahahaha'),
(3, 'SE', 1, 'Turunan', 'Dalam matematika, turunan atau derivatif dari sebuah fungsi adalah cara mengukur sensitivitas perubahan nilai fungsi terhadap perubahan pada nilai variabelnya. Sebagai contoh, turunan dari posisi sebuah benda bergerak terhadap waktu mengukur kecepatan benda bergerak ketika waktu berjalan.');

-- --------------------------------------------------------

--
-- Table structure for table `pengumpulan_tugas`
--

CREATE TABLE `pengumpulan_tugas` (
  `id` int(11) NOT NULL,
  `nisSiswa` int(11) NOT NULL,
  `idTugas` int(11) NOT NULL,
  `fileTugas` longtext NOT NULL,
  `nilai` int(3) DEFAULT NULL,
  `tanggal_pengumpulan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumpulan_tugas`
--

INSERT INTO `pengumpulan_tugas` (`id`, `nisSiswa`, `idTugas`, `fileTugas`, `nilai`, `tanggal_pengumpulan`, `catatan`) VALUES
(1, 6883, 1, '20230407_110411_hiihm_alvin_valentino.docx', 100, '2023-04-07 12:02:04', 'test'),
(2, 6883, 3, '20230408_070445_ib34c_alvin_valentino.docx', 90, '2023-04-08 07:43:41', 'bagus');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis-kelamin` tinyint(1) NOT NULL,
  `ttl` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) NOT NULL,
  `idBos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jenis-kelamin`, `ttl`, `jurusan`, `idBos`) VALUES
(6883, 'Alvin Valentino', 1, 'Pontianak, 25 Oktober 2005', 'Teknologi Komputer dan Jaringan', 1),
(6885, 'Calvin Rey Fok', 1, NULL, 'Teknologi Komputer dan Jaringan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `kodeguru` varchar(11) NOT NULL,
  `idPelajaran` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `kodeguru`, `idPelajaran`, `judul`, `deskripsi`, `deadline`) VALUES
(1, 'HT', 2, 'Tugas PL', '100 form crud', '2023-04-21 17:10:00'),
(2, 'HT', 2, 'Project Devla', 'Tugas akhir 1 kelas', '2023-04-29 23:59:00'),
(3, 'SE', 1, 'Integral 40 soal', 'Nilai ulangan harian', '2023-04-22 15:16:00'),
(4, 'SE', 1, 'Turunan 50 soal', 'harus selesai', '2023-04-22 23:59:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bos`
--
ALTER TABLE `bos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bos_email` (`email`),
  ADD UNIQUE KEY `perusahaan_magang` (`perusahaan`);

--
-- Indexes for table `devosi`
--
ALTER TABLE `devosi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tanggal` (`tanggal`),
  ADD KEY `kodeguru` (`kodeguru`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `kehadiran_magang`
--
ALTER TABLE `kehadiran_magang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_magang` (`nisSiswa`),
  ADD KEY `bos_magang` (`idBos`);

--
-- Indexes for table `login_guru`
--
ALTER TABLE `login_guru`
  ADD PRIMARY KEY (`kode`),
  ADD UNIQUE KEY `unique_guru` (`email`);

--
-- Indexes for table `login_siswa`
--
ALTER TABLE `login_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD UNIQUE KEY `unique_siswa` (`email`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelajaran_kodeguru` (`kodeguru`),
  ADD KEY `idPelajaran` (`idPelajaran`);

--
-- Indexes for table `pengumpulan_tugas`
--
ALTER TABLE `pengumpulan_tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis_pengumpulan` (`nisSiswa`),
  ADD KEY `tugas_pengumpulan` (`idTugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `idBos` (`idBos`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_kodeguru` (`kodeguru`),
  ADD KEY `tugas_pelajaran` (`idPelajaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bos`
--
ALTER TABLE `bos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `devosi`
--
ALTER TABLE `devosi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kehadiran_magang`
--
ALTER TABLE `kehadiran_magang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_siswa`
--
ALTER TABLE `login_siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6884;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengumpulan_tugas`
--
ALTER TABLE `pengumpulan_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6886;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devosi`
--
ALTER TABLE `devosi`
  ADD CONSTRAINT `devosi_kodeguru` FOREIGN KEY (`kodeguru`) REFERENCES `guru` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran_magang`
--
ALTER TABLE `kehadiran_magang`
  ADD CONSTRAINT `bos_magang` FOREIGN KEY (`idBos`) REFERENCES `bos` (`id`),
  ADD CONSTRAINT `siswa_magang` FOREIGN KEY (`nisSiswa`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD CONSTRAINT `pembelajaran_kodeguru` FOREIGN KEY (`kodeguru`) REFERENCES `guru` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelajaran_pelajaran` FOREIGN KEY (`idPelajaran`) REFERENCES `pelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengumpulan_tugas`
--
ALTER TABLE `pengumpulan_tugas`
  ADD CONSTRAINT `nis_pengumpulan` FOREIGN KEY (`nisSiswa`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `tugas_pengumpulan` FOREIGN KEY (`idTugas`) REFERENCES `tugas` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `bos_siswa` FOREIGN KEY (`idBos`) REFERENCES `bos` (`id`);

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_kodeguru` FOREIGN KEY (`kodeguru`) REFERENCES `guru` (`kode`),
  ADD CONSTRAINT `tugas_pelajaran` FOREIGN KEY (`idPelajaran`) REFERENCES `pelajaran` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
