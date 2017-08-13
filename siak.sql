/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - siak
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`b5_20456378_smp_bina_utama` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `b5_20456378_smp_bina_utama`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nm_admin` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `gambar` text,
  PRIMARY KEY (`id_admin`),
  KEY `FK_jurusan_jenjang` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nm_admin`,`username`,`password`,`createdBy`,`gambar`) values (1,'ijat','ijat','827ccb0eea8a706c4c34a16891f84e7b',1,NULL),(2,'rafles','rafles','827ccb0eea8a706c4c34a16891f84e7b',1,'images.jpg'),(3,'rafles','rafles','827ccb0eea8a706c4c34a16891f84e7b',1,NULL),(5,'rere','rere',NULL,NULL,NULL),(15,'christinaaaaa','christinaaaa','dc0fa7df3d07904a09288bd2d2bb5f40',NULL,'gallery.jpg'),(16,'alan','alan','827ccb0eea8a706c4c34a16891f84e7b',NULL,'walk-2162937_1920.jpg');

/*Table structure for table `berita` */

DROP TABLE IF EXISTS `berita`;

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_berita` datetime DEFAULT NULL,
  `judul_berita` varchar(200) DEFAULT NULL,
  `isi_berita` text,
  `gambar` text,
  `createdBy` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `berita` */

insert  into `berita`(`id_berita`,`tgl_berita`,`judul_berita`,`isi_berita`,`gambar`,`createdBy`) values (1,'2017-07-29 09:45:14','Seperti Finlandia, Sekolah di New Zealand Seperti ','<p>Liputan6.com, Jakarta Bila masyarakat mengenal Finlandia sebagai negara dengan pendidikan terbaik, ternyata New Zealand juga memiliki kualitas yang setara. Bahkan di negara yang berada di selatan bumi ini, hubungan antara pelajar dan gurunya sangat dekat.</p>\r\n\r\n<p>Bagaimana bisa? \"Untuk peringkat pendidikan terbaik, Finlandia dan New Zealand selalu berada di posisi tiga teratas. Hal ini menunjukkan bahwa sistem pendidikan di New Zealand sudah diakui menjadi salah satu yang terbaik di dunia,\" ungkap Karmela Christy, Marketing and Strategic Relations Manager Indonesia Education New Zealand. Karmela juga mengungkapkan, kedekatan antara dosen dan mahasiswa sangat terasa dalam proses belajar mengajar.</p>\r\n\r\n<p>Tidak hanya berdiri dan menjabarkan pelajaran saja, dosen juga ikut serta dalam setiap kegiatan yang diselenggarakan di kelas. Sehingga para dosen duduk setara dengan mahasiswa dan boleh bertanya apa saja mengenai pelajaran tersebut. \"Karena sangat dekat, para dosen masih mau menjawab pertanyaan mahasiswanya, meski dikirim jam 11 malam,\" ujar Karmela yang dahulunya juga menuntut ilmu di New Zealand. Tidak hanya itu, kemudahan pendidikan di New Zealand juga didukung dengan sarana dan prasarana terbaik.</p>\r\n\r\n<p>Sehingga mahasiswa nantinya diberi kesempatan seluas-luasnya untuk mencari ilmu dan berkolaborasi bersama dengan dosen dan mahasiswa lainnya. Sedangkan di sekolah dasar dan menengah, para siswa sudah diberikan kebebasan untuk memilih apa yang ingin mereka lakukan. Sehingga praktik di workshop menjadi kegiatan bermain yang menyenangkan, ketika menempuh pendidikan di New Zealand.</p>\r\n','1.jpg',''),(2,'2017-07-31 03:57:58','Bantu Perkembangan Indonesia Timur, Selandia Baru ','<p>Liputan6.com, Jakarta Beasiswa menjadi salah satu kesempatan yang dibuka oleh New Zealand, untuk membantu perkembangan di Indonesia Timur.</p>\r\n\r\n<p>Hal ini menjadi perhatian yang diungkapkan oleh Duta Besar New Zealand untuk Indonesia, Dr Trevor Matheson, pada pertemuan New Zealand Education di Fairmont Hotel, Selasa (13/6/2017).</p>\r\n\r\n<p>\"Hubungan pendidikan Indonesia dan New Zealand itu sangat kuat karena kita punya visi Asia Pasifik yg sama, untuk mempersiapkan generasi muda untuk menghadapi masa depan. Nanti kita pilih 60 yang terbaik untuk diberikan beasiswa,\" ungkap Dr Trevor Matheson.</p>\r\n\r\n<p>Lalu bidang apa saja yang berpeluang mendapatkan beasiswa dari pemerintah New Zealand? Dr Trevor mengungkapkan beberapa bidang di sosial ekonomi, agrisbisnis, geotermal, dan penanganan bencana punya dukungan khusus dari pemerintah New Zealand. Tidak hanya itu saja, nantinya akan ada pelatihan bahasa Inggris untuk mempermudah mahasiswa dalam proses belajar.</p>\r\n\r\n<p>Tentunya, bidang-bidang yang diambil diharapkan bisa diterapkan langsung ke daerah asal mahasiswa. Selain itu, para mahasiswa juga berkesempatan bekerja untuk mematangkan ilmunya di New Zealand. Baik itu melalui proyek yang langsung diterapkan sesuai dengan bidang studi, maupun bekerja paruh waktu selama kuliah.</p>\r\n\r\n<p>\"Kualitas pendidikan di New Zealand sesuai untuk karir sukses di abad ke 21. Kita berharap orangTua dapat memilih New Zealand karena keadaanya yang aman dan budaya belajar. Sehingga dapat meningkatkan cara pikir pola pikir, sesuai dengan apa yg mereka inginkan,\" tutup Dr Trevor.</p>\r\n','0,,16867260_303,00.jpg',''),(3,'2017-07-29 09:47:09','Demokrasi ala Republik Anak SD Kanisius Kenalan','<p>Liputan6.com, Jakarta Di lereng Gunung Menoreh yang sejuk, tepatnya di Dusun Wonolelo, Kenalan, Kecamatan Borobudur Magelang, Jawa Tengah berdiri sebuah sekolah yang berbeda dari sekolah dasar pada umumnya. Keunikan serta kekhasan metode pendidikan yang diterapkan di sekolah ini menjadikannya bertahan sampai sekarang.</p>\r\n\r\n<p>Maklum sekolah yang berdiri sejak tahun 1930 ini sempat terancam ditutup karena alasan kekurangan murid dan ketiadaan biaya. SD Katolik Kanisius Kenalan, demikian namanya.</p>\r\n\r\n<p>Sekolah ini menerapkan metode sekolah kehidupan yang berwawasan lingkungan pedesaan, pengembangan diri, pemberdayaan orangtua dan gerakan orangtua asuh yang dinamai Gerakan Mengasuh Anak Tani (GEMATI). Para guru di sekolah ini telah berhasil menciptakan kurikulum pendidikan alternatif yang menghindarkan para siswa dari konsep pembelajaran teoritis yang membosankan melalui pembelajaran luar ruang yang terkait langsung dengan lingkungan. Sehingga praktik menjadi kegiatan rutin para siswa. “</p>\r\n\r\n<p>Siswa kami ajak untuk belajar langsung pada alam. Siswa tidak hanya belajar dari buku-buku pelajaran saja tapi juga belajar dari lingkungan. Mereka akan melihat, mencari, mengamati dan merasakan sendiri lingkungan sekitarnya mulai dari belajar jenis-jenis satwa, tanaman, tanah, dan air. Dengan demikian akan menumbuhkan rasa mencintai dan memiliki terhadap alam sekitarnya,” ujar Kepala Sekolah SDK Kanisius Kenalan, Yosef Onesimus Mayono, di Gua Maria Sendang Sono,</p>\r\n\r\n<p>Desa Banjaroyo, Kecamatan Kalibawang, Kabupaten Kulon Progo, DI Yogyakarta, Senin(2/5/2017). SD Katolik Kanisius Kenalan berhasil mengintegrasikan kurikulum reguler nasional dengan kurikulum alternatif khas SD Kenalan dengan menerapkan metode pembelajaran tematik. Tak hanya itu sekolah yang memilik enam ruang kelas, 60 murid dan tujuh guru ini juga merintis kegiatan komunitas basis bernama Republik Anak Kenalan (RAK). “Layaknya sebuah republik sungguhan, RAK juga mempunyai presiden, wakil presiden, dan menteri-menteri dalam kabinet. Seluruh siswa dan guru SDK Kenalan diposisikan sebagai rakyat. Presiden dipilih langsung oleh siswa.</p>\r\n\r\n<p>Murid yang menjadi calon presiden dan wakil presiden masing-masing juga menyampaikan visi dan misi serta berkampanye layaknya pemilu,” lanjut Yoseph Onesimus Maryono yang biasa disapa Pak Guru Simus. Kandidat presiden berasal dari siswa. Ada enam kandidat dari enam partai siswa. Keenamnya berasal dari organisasi Republik Anak Kenalan, lanjut Simus.</p>\r\n\r\n<p>Organisasi RAK membawahi berbagai bidang kegiatan komunitas pengembangan diri dalam bentuk kegiatan ekstrakurikuler. 1. Bidang pertanian ada basis komunitas Wiji Thukul yang fokus pada aktivitas bercocok tanam, hingga pembuatan pupuk organik. 2. Lalu ada Blekothek (Biar Jelek Otak harus Melek) dan Kembang Latar yang mengajarkan kesenian dan estetika. Blekothek adalah sejenis musik perkusi dimana alat-alat musik berasal dari barang-barang bekas seperti botol kaca, botol air mineral, drum, galon dan sebagainya dimainkan oleh para siswa. Membawakan lagu-lagu bertema lingkungan. 3. Sedangkan Basis Lintang Menoreh fokus pada kegiatan literasi.</p>\r\n\r\n<p>Produk yang dihasilkan adalah Republikana yang terbit sebulan sekali, memuat tulisan-tulisan pendek para siswa. 4. Sementara untuk komunitas rohani ada kegiatan Guyub Maryam yakni ziarah ke Goa Maria khususnya pada bulan-bulan Maria. 5. Ada pula komunitas Canthang Kumandang atau paduan suara, Turangga Siswa Arga yang fokus pada tarian tradisional 6. Dan yang terakhir kegiatan Pramuka.</p>\r\n\r\n<p>Enam komunitas basis tersebut akan mengirimkan kandidat mereka untuk maju dalam pemilihan presiden yang berlangsung setiap semester. Menurut pria berusia 41 tahun ini , pesta demokrasi ala SD Kenalan tersebut bertujuan untuk membentuk karakter anak sehingga mampu bertanggungjawab atas tugas yang diberikan guru. “Anak menjadi berani untuk bertanya dan menyampaikan pendapatnya,” terang Simus yang telah 10 tahun mengabdikan dirinya di SD Kenalan.</p>\r\n\r\n<p>Untuk memperkuat pendidikan demokrasi di sekolah, ada forum anak yang mirip rapat kabinet. Forum tersebut dihadiri oleh para guru dan seluruh siswa setiap hari Kamis. Dalam rapat itu dibahas sejumlah persoalan atau kasus yang terjadi di sekolah. Kegiatan tematik Selain kegiatan komunitas basis, SD Kenalan menerapkan beragam kegiatan lain yang bersifat tematik. Seperti misalnya Sabawana. Saba artinya jalan-jalan, wana berarti hutan. Sabawana merupakan kegiatan rutin SD Kenalan. Biasanya dilakukan bertepatan dengan hari bumi. Siswa diajak pergi ke hutan dengan tujuan agar murid melihat langsung kondisi hutan, satwa, tanaman dan tentu pesan lingkungan.</p>\r\n\r\n<p>“Kita lebih banyak menanam atau menebang? Program ini akan mendekatkan siswa agar lebih peduli, merasakan dan handarbeni. Merasa memiliki hutan sehingga mau menjaga,” terang Simus. Ada juga Mlipir Kutho, jalan-jalan bersama ke kota. Tilik Belik mengajak siswa untuk melihat dan mengamati sumber air yang ada di sekitar sekolah, sekaligus mencari mata air baru. Kegiatan lain yang juga menarik adalah Remen Peken (remen=suka, peken = pasar) yaitu suatu kegiatan dimana anak-anak beraktivitas di pasar tradisional setiap Sabtu Legi. Tujuannya agar siswa semakin mencintai pasar tradisional. Kepala SD Kanisius Kenalan Onesimus Maryono (kanan bertopi) sedang memerhatikan anak-anak didiknya bermain musik dari kaleng (blek) (Foto: Dokumentasi SDK Kenalan) Satu lagi PekOK (Pekan Olah Raga Kenalan).</p>\r\n\r\n<p>Kegiatan ini digelar saat bertepatan dengan Hari Olah Raga Nasional yang jatuh setiap tanggal 9 September. Dalam dua pekan seluruh siswa akan bertanding memperebutkan juara yang berhadiah medali emas, perak, dan perunggu, (tentu bukan medali emas sungguhan melainkan terbuat dari kayu yang dipahat seperti medali). Sementara cabang yang dipertandingkan adalah 8 cabang permainan tradisional. Seperti Gobak Sodor, Tarik Tambang, Bekel, Egrang, Dam-daman, Dakon, Ingkling dan Boi-Boinan yang eksistensinya mulai punah.</p>\r\n\r\n<p>“Sebagaimana pesta PON. Pembukaan dimulai dengan upacara Nyuwun Gromo (pengambilan api) di Gunung Gajah Mungkur. Kemudian dilanjutkan dengan estafet geni kapitayan menuju SDK Kenalan,” terang Pak Guru Simus. Simus mengungkapkan bahwa kegiatan semacam ini bukan tanpa alasan, selain agar anak-anak tak lupa akan akar budaya Jawa mereka juga diajak pula untuk belajar rasa kebersamaan, melatih kejujuran, bertanggung jawab dan menumbuhkan sikap gotong royong dan disiplin.</p>\r\n\r\n<p>Selain itu Simus menekankan bahwa pemakaian istilah-istilah Jawa dalam setiap kegiatan di sekolah yang ia pimpin juga merupakan bagian dalam upayanya untuk tetap memelihara budaya serta kearifan masyarakat setempat. Putus hanya sampai SD Lokasi SD Kenalan yang berada di lereng gunung Menoreh bisa dikatakan sangat terpencil. Dari pusat kota Yogyakarta berjarak 40 kilometer dengan jarak tempuh kendaraan kurang lebih 1.5 jam. Meski demikian dapat diakui bahwa sekolah ini memiliki program pendidikan karakter yang dapat diandalkan. Ini diakui oleh banyak orangtua murid pun siswa tamatan SD Kanisius Kenalan. Namun karena penerapan metode pembelajaran seperti ini baru ada di sekolah ini maka yang terjadi ketika para siswa ini lulus dan melanjutkan SMP, anak-anak ini seperti kehilangan sesuatu.</p>\r\n\r\n<p>“Banyak siswa yang telah tamat, amat merindukan momen kembali ke SD Kenalan lagi. Karena di SMP mereka tidak memperoleh metode pembelajaran yang sama. Ini yang menjadi perhatian saya,”ungkap Simus. Pria lulusan Pendidikan Bahasa Prancis, Universitas Negeri Yogyakarta ini pun memutar otak mengupayakan bagaimana program-programnya dapat diterima dan dilanjutkan di SMP. Harapan lain yang ia sampaikan adalah membangun asrama untuk mengakomodasi para orangtua yang ingin menyekolahkan anak-anak mereka di sini.</p>\r\n','4.jpg',''),(4,'2017-07-29 09:46:17','Jokowi: Kurikulum di Perguruan Tinggi Harus Fleksi','<p>Bantul - Presiden Joko Widodo menjadi pembicara dalam kuliah umum di Universitas Ahmad Dahlan, Bantul, Yogyakarta. Di hadapan para mahasiswa dan dosen, Jokowi mengatakan perguruan tinggi harus berani melakukan perubahan dan inovasi. \"Seluruh universitas termasuk UAD (Universitas Ahmad Dahlan) harus mau berubah. Jangan sampai kita melakukan rutinitas, linier tanpa terobosan,\"</p>\r\n\r\n<p>ujar Jokowi di Universitas Ahmad Dahlan, Sabtu (22/7/2017). Salah satu terobosan untuk mengikuti perkembangan zaman yakni menjadikan kurikulum di perguruan tinggi lebih fleksibel, sesuai perkembangan zaman.</p>\r\n\r\n<p>\"Kurikulum misalnya harus fleksibel. Padahal perubahannya sudah sangat cepat sekali. Fakultas Ekonomi, Fakultas Hukum pasti ada (di semua universitas). Mestinya harus ada yang bersifat kekinian, misalnya Fakultas Logistik, karena platform logistik baik Retail Platform diperlukan sekali, dan sangat spesifik,\" kata Jokowi.</p>\r\n\r\n<p>Jokowi melanjutkan, dengan era digital seperti sekarang dan dengan perkembangan media sosial yang begitu cepat, hal itu bisa jadi peluang bagi perguruan tinggi.</p>\r\n\r\n<p>\"Juga karena berkembang media sosial. Misalnya ada Fakultas Animasi, yang nanti jurusannya &#39;meme&#39;. Filofosi dasar ekonomi bisa diajarkan, tapi satu semester lah. Yang lain bagaimana membangun Retail Platform, itu harus dipelajari,\" ucapnya. Selain itu, Jokowi menyebutkan tiga hal yang bisa menjadi senjata buat memenangkan persaingan di era global.</p>\r\n\r\n<p>Ketiga hal ini menurut dia harus diajarkan ke kalangan mahasiswa. \"Hal-hal yang bisa memenangkan persaingan ada tiga hal, pertama inovasi yang terus-menerus tidak berhenti, kedua kreatifitas, ketiga enterpreneurship. Semestinya diajarkan hal-hal yang seperti ini. Kemudian belajar-belajar di luar ruangan harus dihargai,\" pungkasnya.</p>\r\n','5.jpg',''),(5,'2017-07-29 09:44:58','Jokowi: Jangan Sampai Anak-anak Kita Didik Oleh Me','<p>Yogyakarta - Di hadapan ribuan guru,</p>\r\n\r\n<p>Presiden Joko Widodo mengingatkan agar siswa di Indonesia tidak dididik oleh media sosial. Peran guru begitu penting dalam mendidik serta membangun karakter para siswa. Kendati begitu, bukan berarti proses pendidikan tidak memanfaatkan teknologi yang terus berkembang.</p>\r\n\r\n<p>\"Jangan sampai anak-anak kita didik oleh medsos. Jangan sampai anak-anak kita dididik oleh perubahan-perubahan yang merusak karakter kita. Perubahan tidak bisa kita tolak,\"kata Jokowi pada Rakor Pimnas 2017</p>\r\n\r\n<p>Persatuan Guru Republik Indonesia(PGRI) di hotel Sahid Jaya, Babarsari, Sleman, Yogyakarta, Sabtu(23/7/2017). \"Tapi bagaimana agar perubahan itu bisa dikendalikan, dikontrol, bisa kita menangkan dengan mengisi anak-anak kita dengan hal-hal yang berkaitan dengan karakter,\" lanjutnya. Jokowi mengatakan, guru memiliki tugas untuk mengajak peserta didik pada kebenaran dan kebaikan.</p>\r\n\r\n<p>Peran guru begitu penting dalam mengontrol para siswa dalam memanfaatkan teknologi, khususnya menggunakan media sosial yang kini tengah menjamur. \"Hati-hati. Mereka bisa mendidik anak-anak kita kalau kita tidak membekali anak-anak kita dengan isi yang baik,\"kata Jokowi. (nkn/nkn)</p>\r\n','5.jpg','');

/*Table structure for table `calon_siswa` */

DROP TABLE IF EXISTS `calon_siswa`;

CREATE TABLE `calon_siswa` (
  `id_calon` int(10) NOT NULL AUTO_INCREMENT,
  `tgl_daftar` datetime DEFAULT NULL,
  `nm_calon` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_calon`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `calon_siswa` */

insert  into `calon_siswa`(`id_calon`,`tgl_daftar`,`nm_calon`,`email`,`password`) values (5,'2017-07-30 08:16:13','rafles','rafles@gmail.com','827ccb0eea8a706c4c34a16891f84e7b'),(6,'2017-07-30 08:16:39','alan','alan@gmail.com','827ccb0eea8a706c4c34a16891f84e7b');

/*Table structure for table `detail_kelas` */

DROP TABLE IF EXISTS `detail_kelas`;

CREATE TABLE `detail_kelas` (
  `id_detail_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` varchar(20) DEFAULT NULL,
  `id_siswa` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_detail_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `detail_kelas` */

insert  into `detail_kelas`(`id_detail_kelas`,`id_kelas`,`id_siswa`) values (1,'Diploma I',NULL),(2,'Diploma III',NULL),(3,'Sarjana',NULL),(4,'Magister',NULL),(5,'Doktor',NULL);

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `nm_gallery` varchar(50) DEFAULT NULL,
  `tgl_upload` datetime DEFAULT NULL,
  `gambar` text,
  `ket_gallery` varchar(100) DEFAULT NULL,
  `createdBy` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `gallery` */

insert  into `gallery`(`id_gallery`,`nm_gallery`,`tgl_upload`,`gambar`,`ket_gallery`,`createdBy`) values (1,'Lorem ipsum dolor sit amet','2017-07-17 05:12:29','1.jpg','ds',NULL),(2,'Kunjungan menteri','2017-07-17 05:12:29','2.jpg','wefewcvdwsc',NULL),(3,'Lorem ipsum dolor sit amet','2017-07-17 05:12:29','3.jpg','ewfewf',NULL),(4,'Kunjungan menteri','2017-07-17 05:12:29','1.jpg','bfgngh m',NULL),(5,'Lorem ipsum dolor sit amet','2017-07-17 05:12:29','praktek.jpg','sdvsdv',NULL),(6,'Kunjungan menteri','2017-07-17 05:12:29','praktek2.jpg','vdsv',NULL),(7,'Kunjungan menteri','2017-07-17 05:12:29','praktek2.jpg','sdvds',NULL),(8,'Lorem ipsum dolor sit amet','2017-07-17 05:12:29','praktek.jpg','sdvsdv',NULL),(10,'hahahah','2017-07-29 07:31:37','bichon-frise.jpg','wewewewe','');

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `nm_guru` varchar(100) DEFAULT NULL,
  `jabatan` varchar(10) DEFAULT NULL,
  `almt_guru` varchar(200) DEFAULT NULL,
  `telpon` varchar(24) DEFAULT NULL,
  `gambar` text,
  `createdby` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `guru` */

insert  into `guru`(`nip`,`nm_guru`,`jabatan`,`almt_guru`,`telpon`,`gambar`,`createdby`) values ('098980','Derry','1','jakarta barat','08776767676','noimage.png',NULL),('1212','sandi','4','jakarta','09187821711','bichon-frise.jpg',NULL),('DS003','Iksan Derry S','2','Cengkareng','098276272672','noimage.png',NULL),('DS004','Surya','3','Cengkareng','098276272672','noimage.png',NULL),('DS005','Budi santoso','3','Cengkareng','098276272672','noimage.png',NULL);

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jabatan` varchar(50) NOT NULL,
  `createdBy` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id_jabatan`,`nm_jabatan`,`createdBy`) values (1,'Kepala Sekolah',NULL),(2,'Wakil kepala sekolah',NULL),(3,'Pengajar',NULL),(4,'Staff TU',NULL);

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` varchar(20) NOT NULL,
  `nm_kelas` varchar(50) DEFAULT NULL,
  `jumlah_tampung` int(5) DEFAULT NULL,
  `wali_kelas` varchar(20) DEFAULT NULL,
  `createdBy` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kelas`,`nm_kelas`,`jumlah_tampung`,`wali_kelas`,`createdBy`) values ('1A','Kelas 1A',22,'DS003',NULL),('5B','kelas 5B',90,'DS005',NULL),('R01','Ruangan 1',11,'1212',NULL),('R03','Ruangan 3',NULL,'098980',NULL);

/*Table structure for table `pendaftaran` */

DROP TABLE IF EXISTS `pendaftaran`;

CREATE TABLE `pendaftaran` (
  `nomor_daftar` varchar(20) NOT NULL,
  `id_calon` varchar(15) DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL,
  `nm_pendaftar` varchar(100) DEFAULT NULL,
  `almt_pendafar` text,
  `jns_kelamin` enum('pria','wanita') DEFAULT NULL,
  `nm_ibu` varchar(100) DEFAULT NULL,
  `nm_bapak` varchar(100) DEFAULT NULL,
  `telpon` varchar(24) DEFAULT NULL,
  `no_ijasah` varchar(20) DEFAULT NULL,
  `nilai_raport` float DEFAULT NULL,
  PRIMARY KEY (`nomor_daftar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pendaftaran` */

/*Table structure for table `profil` */

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nm_profil` varchar(50) DEFAULT NULL,
  `ket_profil` text,
  `gambar` text,
  `createdBy` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `profil` */

insert  into `profil`(`id_profil`,`nm_profil`,`ket_profil`,`gambar`,`createdBy`) values (1,'Visi & misi','Beasiswa menjadi salah satu kesempatan yang dibuka oleh New Zealand, untuk membantu perkembangan di Indonesia Timur. Hal ini menjadi perhatian yang diungkapkan oleh Duta Besar New Zealand untuk Indonesia, Dr Trevor Matheson, pada pertemuan New Zealand Education di Fairmont Hotel, Selasa (13/6/2017). \"Hubungan pendidikan Indonesia dan New Zealand itu sangat kuat karena kita punya visi Asia Pasifik yg sama, untuk mempersiapkan generasi muda untuk menghadapi masa depan. Nanti kita pilih 60 yang terbaik untuk diberikan beasiswa,\" ungkap Dr Trevor Matheson. Lalu bidang apa saja yang berpeluang mendapatkan beasiswa dari pemerintah New Zealand? Dr Trevor mengungkapkan beberapa bidang di sosial ekonomi, agrisbisnis, geotermal, dan penanganan bencana punya dukungan khusus dari pemerintah New Zealand. Tidak hanya itu saja, nantinya akan ada pelatihan bahasa Inggris untuk mempermudah mahasiswa dalam proses belajar. Tentunya, bidang-bidang yang diambil diharapkan bisa diterapkan langsung ke daerah asal mahasiswa. Selain itu, para mahasiswa juga berkesempatan bekerja untuk mematangkan ilmunya di New Zealand. Baik itu melalui proyek yang langsung diterapkan sesuai dengan bidang studi, maupun bekerja paruh waktu selama kuliah. \"Kualitas pendidikan di New Zealand sesuai untuk karir sukses di abad ke 21. Kita berharap orangTua dapat memilih New Zealand karena keadaanya yang aman dan budaya belajar. Sehingga dapat meningkatkan cara pikir pola pikir, sesuai dengan apa yg mereka inginkan,\" tutup Dr Trevor.','1.jpg',NULL),(2,'Sejarah Sekolah','Beasiswa menjadi salah satu kesempatan yang dibuka oleh New Zealand, untuk membantu perkembangan di Indonesia Timur. Hal ini menjadi perhatian yang diungkapkan oleh Duta Besar New Zealand untuk Indonesia, Dr Trevor Matheson, pada pertemuan New Zealand Education di Fairmont Hotel, Selasa (13/6/2017). \"Hubungan pendidikan Indonesia dan New Zealand itu sangat kuat karena kita punya visi Asia Pasifik yg sama, untuk mempersiapkan generasi muda untuk menghadapi masa depan. Nanti kita pilih 60 yang terbaik untuk diberikan beasiswa,\" ungkap Dr Trevor Matheson. Lalu bidang apa saja yang berpeluang mendapatkan beasiswa dari pemerintah New Zealand? Dr Trevor mengungkapkan beberapa bidang di sosial ekonomi, agrisbisnis, geotermal, dan penanganan bencana punya dukungan khusus dari pemerintah New Zealand. Tidak hanya itu saja, nantinya akan ada pelatihan bahasa Inggris untuk mempermudah mahasiswa dalam proses belajar. Tentunya, bidang-bidang yang diambil diharapkan bisa diterapkan langsung ke daerah asal mahasiswa. Selain itu, para mahasiswa juga berkesempatan bekerja untuk mematangkan ilmunya di New Zealand. Baik itu melalui proyek yang langsung diterapkan sesuai dengan bidang studi, maupun bekerja paruh waktu selama kuliah. \"Kualitas pendidikan di New Zealand sesuai untuk karir sukses di abad ke 21. Kita berharap orangTua dapat memilih New Zealand karena keadaanya yang aman dan budaya belajar. Sehingga dapat meningkatkan cara pikir pola pikir, sesuai dengan apa yg mereka inginkan,\" tutup Dr Trevor.','2.jpg',NULL),(3,'Stuktur organisasi','Beasiswa menjadi salah satu kesempatan yang dibuka oleh New Zealand, untuk membantu perkembangan di Indonesia Timur. Hal ini menjadi perhatian yang diungkapkan oleh Duta Besar New Zealand untuk Indonesia, Dr Trevor Matheson, pada pertemuan New Zealand Education di Fairmont Hotel, Selasa (13/6/2017). \"Hubungan pendidikan Indonesia dan New Zealand itu sangat kuat karena kita punya visi Asia Pasifik yg sama, untuk mempersiapkan generasi muda untuk menghadapi masa depan. Nanti kita pilih 60 yang terbaik untuk diberikan beasiswa,\" ungkap Dr Trevor Matheson. Lalu bidang apa saja yang berpeluang mendapatkan beasiswa dari pemerintah New Zealand? Dr Trevor mengungkapkan beberapa bidang di sosial ekonomi, agrisbisnis, geotermal, dan penanganan bencana punya dukungan khusus dari pemerintah New Zealand. Tidak hanya itu saja, nantinya akan ada pelatihan bahasa Inggris untuk mempermudah mahasiswa dalam proses belajar. Tentunya, bidang-bidang yang diambil diharapkan bisa diterapkan langsung ke daerah asal mahasiswa. Selain itu, para mahasiswa juga berkesempatan bekerja untuk mematangkan ilmunya di New Zealand. Baik itu melalui proyek yang langsung diterapkan sesuai dengan bidang studi, maupun bekerja paruh waktu selama kuliah. \"Kualitas pendidikan di New Zealand sesuai untuk karir sukses di abad ke 21. Kita berharap orangTua dapat memilih New Zealand karena keadaanya yang aman dan budaya belajar. Sehingga dapat meningkatkan cara pikir pola pikir, sesuai dengan apa yg mereka inginkan,\" tutup Dr Trevor.','3.jpg',NULL),(4,'Fasilitas','Beasiswa menjadi salah satu kesempatan yang dibuka oleh New Zealand, untuk membantu perkembangan di Indonesia Timur. Hal ini menjadi perhatian yang diungkapkan oleh Duta Besar New Zealand untuk Indonesia, Dr Trevor Matheson, pada pertemuan New Zealand Education di Fairmont Hotel, Selasa (13/6/2017). \"Hubungan pendidikan Indonesia dan New Zealand itu sangat kuat karena kita punya visi Asia Pasifik yg sama, untuk mempersiapkan generasi muda untuk menghadapi masa depan. Nanti kita pilih 60 yang terbaik untuk diberikan beasiswa,\" ungkap Dr Trevor Matheson. Lalu bidang apa saja yang berpeluang mendapatkan beasiswa dari pemerintah New Zealand? Dr Trevor mengungkapkan beberapa bidang di sosial ekonomi, agrisbisnis, geotermal, dan penanganan bencana punya dukungan khusus dari pemerintah New Zealand. Tidak hanya itu saja, nantinya akan ada pelatihan bahasa Inggris untuk mempermudah mahasiswa dalam proses belajar. Tentunya, bidang-bidang yang diambil diharapkan bisa diterapkan langsung ke daerah asal mahasiswa. Selain itu, para mahasiswa juga berkesempatan bekerja untuk mematangkan ilmunya di New Zealand. Baik itu melalui proyek yang langsung diterapkan sesuai dengan bidang studi, maupun bekerja paruh waktu selama kuliah. \"Kualitas pendidikan di New Zealand sesuai untuk karir sukses di abad ke 21. Kita berharap orangTua dapat memilih New Zealand karena keadaanya yang aman dan budaya belajar. Sehingga dapat meningkatkan cara pikir pola pikir, sesuai dengan apa yg mereka inginkan,\" tutup Dr Trevor.','3.jpg',NULL);

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nm_siswa` varchar(200) DEFAULT NULL,
  `almt_siswa` varchar(300) DEFAULT NULL,
  `jk_kelamin` enum('pria','waita') DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `ibu_siswa` varchar(100) DEFAULT NULL,
  `ayah_siswa` varchar(100) DEFAULT NULL,
  `telpon` varchar(24) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `siswa` */

/*Table structure for table `slide` */

DROP TABLE IF EXISTS `slide`;

CREATE TABLE `slide` (
  `id_slide` int(10) NOT NULL AUTO_INCREMENT,
  `judul_slide` varchar(50) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `ket_slide` text,
  `gambar` text,
  `createdBy` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_slide`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `slide` */

insert  into `slide`(`id_slide`,`judul_slide`,`tgl_upload`,`ket_slide`,`gambar`,`createdBy`) values (1,'Penerimaan siswa baru tahun 2017','2017-07-30','dalam rangka pemberian beasisswa bagi murid2 berpestasi\r\n','1.jpg',''),(2,'Pemberan beasiswa anak berprestasi',NULL,'alam rangka pemberian beasisswa bagi murid2 berpestasi\r\n','2.jpg',NULL),(3,'Lorem ipsum dolor sit amet',NULL,'dalam rangka pemberian beasisswa bagi murid2 berpestasi\r\n','3.jpg',NULL),(4,'Acara kelulusan para siswa','2017-07-30','dalam rangka pemberian beasisswa bagi murid2 berpestasi\r\n','4.jpg','');

/*Table structure for table `verifikasi_daftar` */

DROP TABLE IF EXISTS `verifikasi_daftar`;

CREATE TABLE `verifikasi_daftar` (
  `id_verifikasi` varchar(20) NOT NULL,
  `nomor_daftar` varchar(20) DEFAULT NULL,
  `tgl_verifikasi` datetime DEFAULT NULL,
  `status_verifikasi` enum('valid','no_valid') DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_verifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `verifikasi_daftar` */

insert  into `verifikasi_daftar`(`id_verifikasi`,`nomor_daftar`,`tgl_verifikasi`,`status_verifikasi`,`id_admin`) values ('MK01','Database','0000-00-00 00:00:00',NULL,NULL),('MK02','MTQ','0000-00-00 00:00:00',NULL,NULL),('W01','Web Programming','0000-00-00 00:00:00',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
