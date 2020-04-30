-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 04:44 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtintuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
(1, 'Thời sự', 0),
(2, 'Thể thao', 0),
(3, 'Gỉải trí', 0),
(4, 'Giáo dục', 0),
(5, 'Đời sống', 0),
(6, 'Bóng đá', 2),
(7, 'Các môn khác', 2),
(8, 'Âm nhạc', 3),
(9, 'Điện ảnh', 3),
(10, 'Sách', 3),
(11, 'Tiếng Anh', 4),
(12, 'Giáo dục 4.0', 4),
(13, 'Tiêu dùng', 5),
(14, 'Gia đình', 5),
(15, 'Sức khỏe', 5),
(23, 'Giao thông', 1),
(24, 'Nông nghiệp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `created_by_id` bigint(20) NOT NULL,
  `content` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `created_by_id`, `content`, `date_created`, `post_id`) VALUES
(1, 12, 'Hay lắm', '2020-04-26 08:54:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `content` text NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by_id` bigint(20) NOT NULL,
  `tag_id` bigint(20) NOT NULL,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-no, 1-yes',
  `cate_id` int(20) NOT NULL,
  `views` bigint(20) NOT NULL,
  `likes` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `content`, `avatar`, `date_created`, `created_by_id`, `tag_id`, `is_featured`, `cate_id`, `views`, `likes`) VALUES
(26, 'post 1', 'post 1', 'post 1', './../uploads/15879747973.jpg', '2020-04-27 08:06:36', 4, 1, 0, 6, 0, 0),
(28, 'post 3', 'sadhfjh', 'dfkajdsklf', './../uploads/158797499358057789_2719534031397003_1884235576190697472_n.jpg', '2020-04-27 08:09:53', 4, 5, 0, 5, 0, 0),
(29, 'post 4', 'kldjfajf', 'kljdskfjasdklfjs', './../uploads/15879750326 (1).jpg', '2020-04-27 08:10:32', 4, 6, 0, 11, 0, 0),
(32, 'post 5', 'kdjkfdsjkd', 'kadsjfkjkfasd', './../uploads/158797948747067121_587438331709354_2299649979905474560_n.jpg', '2020-04-27 09:24:47', 8, 7, 0, 9, 0, 0),
(33, 'post 6', 'kdjkfsdfkl', 'ksđfjdsjhfuah', './../uploads/158797953247380397_2172703219659112_6699597151476908032_n.jpg', '2020-04-27 09:25:32', 13, 7, 0, 8, 0, 0),
(34, 'post 7', 'kdfsduhisdu', 'dsifasdfhasu', './../uploads/158797956943458468_2214880355436754_3054182344043790336_n.jpg', '2020-04-27 09:26:09', 13, 1, 0, 7, 0, 0),
(35, 'post 8', 'kdjkfa', 'jsdfjahsdjha', './../uploads/158797959644940561_1593423670804542_2399902801586028544_n.jpg', '2020-04-27 09:26:35', 13, 11, 0, 10, 0, 0),
(36, 'Ronaldinho lần đầu chia sẻ về những ngày tháng phải ngồi tù: Tôi sốc nặng khi biết mình bị tống giam. Thật không thể tưởng tượng nổi!', 'Cựu danh thủ người Brazil cho biết anh đã cầu nguyện từng giây từng phút cho tới ngày được ra khỏi tù.', '<p>H&ocirc;m 6/3, <strong>Ronaldinho </strong>cùng anh trai ru&ocirc;̣t đã bị t&ocirc;́ng giam tại Paraguay sau khi nh&acirc;̣p cảnh vào qu&ocirc;́c gia này bằng h&ocirc;̣ chi&ecirc;́u trái phép. Sau 32 ngày ng&ocirc;̀i sau song sắt, cựu danh thủ người Brazil mới được chuy&ecirc;̉n ra ngoài đ&ecirc;̉ quan thúc tại khách sạn 4 sao Palmagora.</p>\r\n\r\n<p>Lúc này, <strong>Ronaldinho </strong>mới được thoải mái và thảnh thơi&nbsp;hơn v&ecirc;̀ mặt tinh th&acirc;̀n. Mới đ&acirc;y, chủ nh&acirc;n của 2 Quả bóng vàng đã ch&acirc;́p nh&acirc;̣n y&ecirc;u c&acirc;̀u xin phỏng v&acirc;́n của m&ocirc;̣t đài truy&ecirc;̀n hình địa phương qua đó có l&acirc;̀n đ&acirc;̀u ti&ecirc;n chia sẻ chính thức v&ecirc;̀ quãng thời gian ng&ocirc;̀i nhà khám.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/the-thao/bb12dofg-158619062827849394513.jpg\" style=\"height:175px; width:310px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Ronaldinho bị t&ocirc;́ng giam vào ngày 6/3.</em></p>\r\n\r\n<p>&quot;Chúng t&ocirc;i ngớ người khi bi&ecirc;́t những gi&acirc;́y tờ của mình kh&ocirc;ng hợp l&ecirc;̣. Sau đó, t&ocirc;i và anh trai c&ocirc;́ gắng hợp tác cùng cơ quan chức năng đ&ecirc;̉ tìm ra sự th&acirc;̣t. Nh&acirc;̣n tin sắp phải ng&ocirc;̀i tù, t&ocirc;i th&acirc;́y th&acirc;̣t t&ocirc;̀i t&ecirc;̣. T&ocirc;i kh&ocirc;ng bao giờ nghĩ mình sẽ rơi vào tình cảnh như th&ecirc;́. T&ocirc;i đã kh&ocirc;ng ngừng c&acirc;̀u nguy&ecirc;̣n cho mọi thứ được nhanh chóng bình &ocirc;̉n trở lại&quot;, Ronaldinho h&ocirc;̀i tưởng.</p>\r\n\r\n<p>Dù cu&ocirc;̣c s&ocirc;́ng trong tù kh&ocirc;ng d&ecirc;̃ chịu với m&ocirc;̣t ng&ocirc;i sao như Ronaldinho, tuy nhi&ecirc;n, nhà v&ocirc; địch World Cup 2002 thừa nh&acirc;̣n bản th&acirc;n được đ&ocirc;́i xử r&acirc;́t t&ocirc;́t và nh&acirc;̣n được nhi&ecirc;̀u tình cảm của những người xung quanh. Anh được chơi bóng, được ký tặng và th&acirc;̣m chí được t&ocirc;̉ chức cả sinh nh&acirc;̣t.</p>\r\n\r\n<p>&quot;Chơi bóng đá, ký tặng mọi người và chụp ảnh chung là m&ocirc;̣t ph&acirc;̀n của cu&ocirc;̣c đời t&ocirc;i. Bản th&acirc;n t&ocirc;i kh&ocirc;ng có lý do gì đ&ecirc;̉ ngừng làm vi&ecirc;̣c đó cả, đặc bi&ecirc;̣t với những người đang rơi vào tình cảnh khó khăn như t&ocirc;i&quot;, Ronaldinho ti&ecirc;́t l&ocirc;̣ th&ecirc;m.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/the-thao/08349593-15863377098441783692028.jpg\" style=\"height:207px; width:310px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Ronaldinho sau đó đã chi ra 1,6 tri&ecirc;̣u euro ti&ecirc;̀n bảo lãnh.</em></p>\r\n\r\n<p style=\"text-align:center\"><em><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/the-thao/179176786-15863361290671447408021.jpg\" style=\"height:207px; width:310px\" /></em></p>\r\n\r\n<p style=\"text-align:center\"><em>Khách sạn Palmagora, nơi Ronaldinho cùng anh trai đang bị quản thúc.</em></p>\r\n\r\n<p>Được ra tù nhưng Ronaldinho v&acirc;̃n chưa an toàn. Cựu ng&ocirc;i sao của Barca cùng anh trai v&acirc;̃n đang bị đi&ecirc;̀u tra v&ecirc;̀ nghi án li&ecirc;n quan tới vi&ecirc;̣c rửa ti&ecirc;̀n. Trong b&ocirc;́i cảnh hoạt đ&ocirc;̣ng tư pháp ở Paraguay bị ảnh hưởng do tác đ&ocirc;̣ng của dịch Covid-19, Ronaldinho nhi&ecirc;̀u khả năng phải chờ th&ecirc;m m&ocirc;̣t khoảng thời gian nữa. Khi được hỏi đi&ecirc;̀u đ&acirc;̀u ti&ecirc;n sẽ làm n&ecirc;́u thoát t&ocirc;̣i, Ronaldinho đã nhắc đ&ecirc;́n mẹ.</p>\r\n\r\n<p>&quot;T&ocirc;i mu&ocirc;́n gửi m&ocirc;̣t nụ h&ocirc;n tới mẹ. Bà đã trải qua quãng thời gian khó khăn vì dịch b&ecirc;̣nh.&quot;, Ronaldinho tr&acirc;̀n tình.</p>\r\n', './../uploads/1588010548bb12dofg-158619062827849394513.jpg', '2020-04-27 17:14:03', 8, 1, 1, 6, 86, 30),
(37, 'Ngắn ngủi 10 \"ĐỪNG\" trong cuộc sống, tóm gọn cách làm người an nhàn: Đừng quá mệt mỏi chính là lương thiện lớn nhất với chính mình!', 'Hãy tử tế với sinh mệnh, nhớ bao dung với người khác, nhưng cũng đừng quên học cách lương thiện với chính mình!', '<p><strong>- 01 -</strong></p>\r\n\r\n<p><strong>Đừng tự l&agrave;m kh&oacute; m&igrave;nh, l&agrave; b&aacute;o đ&aacute;p tốt nhất cho bản th&acirc;n.</strong></p>\r\n\r\n<p>Người sống tr&ecirc;n đời, ngo&agrave;i sinh tử, kh&ocirc;ng c&oacute; kh&oacute; khăn n&agrave;o kh&ocirc;ng thể vượt qua được. Khi bạn c&agrave;ng lớn c&agrave;ng hiểu ra rằng, cuộc sống l&agrave; một ph&eacute;p trừ, kh&ocirc;ng ai biết trước được gi&acirc;y tiếp theo sẽ xảy ra chuyện g&igrave;.</p>\r\n\r\n<p>Một đời ngắn ngủi, kh&ocirc;ng cần thiết phải lo được lo mất qu&aacute; nhiều. Việc g&igrave; kh&ocirc;ng hiểu, kh&ocirc;ng cần cố t&igrave;m t&ograve;i; người n&agrave;o nh&igrave;n kh&ocirc;ng thấu, kh&ocirc;ng cần gắng theo đuổi; c&oacute; một v&agrave;i đạo l&yacute; chỉ cần nghe, kh&ocirc;ng cần hiểu.</p>\r\n\r\n<p>D&ugrave; gặp chuyện g&igrave;, nhớ đừng bao giờ l&agrave;m kh&oacute; ch&iacute;nh m&igrave;nh.</p>\r\n\r\n<p>H&atilde;y đi con đường bản th&acirc;n muốn đi, l&agrave;m việc ch&iacute;nh m&igrave;nh muốn l&agrave;m, y&ecirc;u người bạn muốn y&ecirc;u.</p>\r\n\r\n<p><strong>- 02 -</strong></p>\r\n\r\n<p><strong>Đừng than v&atilde;n, l&agrave; lời động vi&ecirc;n hay nhất cho bản th&acirc;n.</strong></p>\r\n\r\n<p><strong>Roman Rowland</strong> từng n&oacute;i:</p>\r\n\r\n<blockquote>\r\n<h3>Người th&ocirc;ng minh thực sự đều&nbsp;kh&ocirc;ng l&agrave;m 5 việc n&agrave;y, h&atilde;y xem bạn đ&atilde; bỏ được mấy việc!</h3>\r\n</blockquote>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>&quot;Chỉ c&oacute; nắm chắc t&acirc;m trạng b&aacute;o o&aacute;n trong tay, h&oacute;a giải n&oacute; th&agrave;nh năng lượng l&agrave;m việc, mới l&agrave; đảm bảo lớn nhất cho th&agrave;nh c&ocirc;ng.&quot;</em></p>\r\n\r\n<p>Than phiền l&agrave; một chất độc c&oacute; thể ph&aacute; hủy &yacute; ch&iacute; v&agrave; cắt giảm sự nhiệt t&igrave;nh của bạn.</p>\r\n\r\n<p>D&ugrave; cuộc sống kh&oacute; khăn đến đ&acirc;u, sống khổ thế n&agrave;o đi nữa, muốn đau khổ qua mau, h&atilde;y cố gắng đừng ph&agrave;n n&agrave;n!</p>\r\n\r\n<p>Bạn phải biết rằng, tr&ecirc;n đời n&agrave;y kh&ocirc;ng c&oacute; đồng tiền n&agrave;o rơi từ tr&ecirc;n trời xuống, chỉ c&oacute; trả gi&aacute; mới c&oacute; thu hoạch.</p>\r\n\r\n<p>Ngay từ b&acirc;y giờ, h&atilde;y bu&ocirc;ng bỏ tất cả những lời b&aacute;o o&aacute;n kh&ocirc;ng cần thiết. Sống ki&ecirc;n cường, lạc quan, t&iacute;ch cực, v&agrave; nhiệt t&igrave;nh với cuộc sống n&agrave;y hơn!</p>\r\n\r\n<p><strong>- 03 -</strong></p>\r\n\r\n<p><strong>Đừng tức giận, l&agrave; c&aacute;ch tự chăm s&oacute;c m&igrave;nh ho&agrave;n hảo nhất.</strong></p>\r\n\r\n<p>Trước đ&acirc;y, c&oacute; một con lạc đ&agrave; đi tr&ecirc;n sa mạc.</p>\r\n\r\n<p>&Aacute;nh mặt trời buổi trưa giống như một quả cầu lửa lớn khiến n&oacute; cảm thấy vừa đ&oacute;i vừa kh&aacute;t, vừa lo lắng vạn phần. Tức giận trong l&ograve;ng t&iacute;ch tụ ng&agrave;y một lớn, kh&ocirc;ng biết n&ecirc;n xả đ&acirc;u cho hết.</p>\r\n\r\n<p>Người sống tr&ecirc;n đời, ngo&agrave;i sinh tử, kh&ocirc;ng c&oacute; kh&oacute; khăn n&agrave;o kh&ocirc;ng thể vượt qua được.</p>\r\n\r\n<p>Khi bạn c&agrave;ng lớn c&agrave;ng hiểu ra rằng, cuộc sống l&agrave; một ph&eacute;p trừ, kh&ocirc;ng ai biết trước được gi&acirc;y tiếp theo sẽ xảy ra chuyện g&igrave;.</p>\r\n\r\n<p>Con lạc đ&agrave; đ&atilde; rất mệt, n&ecirc;n liền ph&aacute;t hỏa. N&oacute; nhấc ch&acirc;n hung hăng đ&aacute; những mảnh vỡ kia đi, nhưng kh&ocirc;ng cẩn thận l&agrave;m vết thương s&acirc;u th&ecirc;m, m&aacute;u tươi nhuộm đỏ c&aacute;t v&agrave;ng.</p>\r\n\r\n<p>Con lạc đ&agrave; giận dữ bước đi khập khiễng, chẳng mấy chốc, vết m&aacute;u đ&atilde; thu h&uacute;t những con kền kền đang bay tr&ecirc;n bầu trời.</p>\r\n\r\n<p>Con lạc đ&agrave; mệt mỏi chạy về ph&iacute;a r&igrave;a sa mạc.</p>\r\n\r\n<p>Vừa mệt lại đang chảy m&aacute;u, n&oacute; yếu ớt chạy đến gần một tổ kiến.</p>\r\n\r\n<p>Những con kiến ăn thịt n&agrave;y bị m&aacute;u thu h&uacute;t k&eacute;o nhanh về ph&iacute;a lạc đ&agrave;.</p>\r\n\r\n<p>Chỉ một l&aacute;t sau, ch&uacute; lạc đ&agrave; tội nghiệp m&aacute;u tươi đầy m&igrave;nh, nằm tr&ecirc;n đất, kh&ocirc;ng bao giờ tỉnh lại nữa.</p>\r\n\r\n<p>Trước khi chết n&oacute; từng rất hối hận, phải chi đừng tức giận với mảnh thủy tinh nhỏ th&igrave; c&oacute; lẽ đ&atilde; kh&ocirc;ng mất mạng.</p>\r\n\r\n<p>Thế n&ecirc;n mới n&oacute;i, khi ch&uacute;ng ta gặp phải những chuyện kh&ocirc;ng vui, điều cần nhất l&agrave; b&igrave;nh tĩnh, l&yacute; tr&iacute;, để đầu &oacute;c s&aacute;ng suốt m&agrave; xử l&yacute; c&ocirc;ng việc.</p>\r\n\r\n<p>H&atilde;y tử tế với sinh mệnh, nhớ bao dung với người kh&aacute;c, nhưng cũng đừng qu&ecirc;n học c&aacute;ch lương thiện với ch&iacute;nh m&igrave;nh!</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/doi-song/photo-1-1588042595827635781228.jpg\" style=\"height:424px; width:620px\" /></p>\r\n\r\n<p><strong>- 04 -</strong></p>\r\n\r\n<p><strong>Đừng giấu qu&aacute; nhiều t&acirc;m sự trong l&ograve;ng, l&agrave; c&aacute;ch bảo vệ bản th&acirc;n cừ nhất</strong></p>\r\n\r\n<p>Sống một đời, c&oacute; ai m&agrave; kh&ocirc;ng gặp phải những chuyện phiền muộn, kh&ocirc;ng được như &yacute;, hay những người v&ocirc; duy&ecirc;n, v&ocirc; t&acirc;m!</p>\r\n\r\n<p>C&oacute; đ&ocirc;i l&uacute;c, c&aacute;i g&igrave; đ&aacute;ng nhịn h&atilde;y nhịn, c&ograve;n những việc kh&ocirc;ng đ&aacute;ng nhịn th&igrave; đừng tự khiến m&igrave;nh tủi th&acirc;n, chịu thiệt.</p>\r\n\r\n<p>Kh&ocirc;ng vui h&atilde;y n&oacute;i ra, kh&ocirc;ng muốn th&igrave; đừng l&agrave;m, c&oacute; những người kh&ocirc;ng đ&aacute;ng để bạn phải tự tổn thương ch&iacute;nh m&igrave;nh như thế.</p>\r\n\r\n<p>Muốn tho&aacute;t khỏi lớp vỏ bọc v&ocirc; vị cũ, c&aacute;ch tốt nhất l&agrave; kh&ocirc;ng phụ l&ograve;ng người kh&aacute;c cũng chẳng tự l&agrave;m khổ ch&iacute;nh m&igrave;nh.</p>\r\n\r\n<p>Nếu bạn kh&ocirc;ng học c&aacute;ch y&ecirc;u bản th&acirc;n m&igrave;nh trước, l&agrave;m sao c&oacute; thể biết y&ecirc;u người kh&aacute;c thế n&agrave;o cho đ&uacute;ng?</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/doi-song/photo-1-1588042602702444752306.jpg\" style=\"height:320px; width:620px\" /></p>\r\n\r\n<p><strong>- 05 -</strong></p>\r\n\r\n<p><strong>Đừng vội v&atilde;, l&agrave; sự dịu d&agrave;ng cao nhất cho ch&iacute;nh m&igrave;nh.</strong></p>\r\n\r\n<p>Phần đời c&ograve;n lại, đừng sống qu&aacute; vội v&atilde;. Chậm một ch&uacute;t, mới c&oacute; thể nh&igrave;n thấy c&agrave;ng nhiều cảnh đẹp hơn nữa<strong>.</strong></p>\r\n\r\n<p>Khương Tử Nha 80 tuổi mới gặp được minh chủ, Tư M&atilde; &Yacute; 60 tuổi mới được trọng dụng, Lưu Bang 40 tuổi c&ograve;n ở B&aacute;i l&agrave;m Đ&igrave;nh trưởng.</p>\r\n\r\n<p>Minhong Yu - chủ tịch của New Oriental Education từng n&oacute;i trong một b&agrave;i ph&aacute;t biểu rằng:</p>\r\n\r\n<p><em>&quot;Việc c&aacute;c bạn c&oacute; thể l&agrave;m trong 5 năm, t&ocirc;i d&ugrave;ng 10 năm để l&agrave;m; việc c&aacute;c bạn d&ugrave;ng 10 năm để l&agrave;m, t&ocirc;i sẽ d&ugrave;ng 20 năm để ho&agrave;n th&agrave;nh. Nếu như thế vẫn kh&ocirc;ng th&agrave;nh, t&ocirc;i sẽ cố gắng giữ g&igrave;n sức khỏe, t&acirc;m trạng vui vẻ, đợi đến sau 80 tuổi, khi c&aacute;c bạn đ&atilde; mất đi, t&ocirc;i vẫn sẽ tiếp tục ho&agrave;n thiện n&oacute;.&quot;</em></p>\r\n\r\n<p>Từ xưa đến nay, những người thực sự lợi hại, trước giờ đều kh&ocirc;ng bao giờ &quot;gấp&quot;.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/doi-song/photo-2-1588042602705838386533.jpg\" style=\"height:465px; width:620px\" /></p>\r\n\r\n<p><strong>- 06 -</strong></p>\r\n\r\n<p><strong>Đừng lo lắng, l&agrave; sự an ủi lớn nhất cho bản th&acirc;n.</strong></p>\r\n\r\n<p>Tr&ecirc;n mạng c&oacute; một chủ đề thế n&agrave;y: &quot;<em>Từ khi n&agrave;o bạn bắt đầu nhận ra cuộc sống kh&ocirc;ng dễ d&agrave;ng?&quot;</em></p>\r\n\r\n<p>C&oacute; một b&igrave;nh luận được rất nhiều người like:</p>\r\n\r\n<p><em>&quot;Khi t&ocirc;i bắt đầu cảm thấy ăn khổ qua thật sự kh&ocirc;ng đắng, v&igrave; cuộc sống c&ograve;n đắng hơn khổ qua rất nhiều lần!&quot;</em></p>\r\n\r\n<p>Đ&uacute;ng vậy, thế giới của người trưởng th&agrave;nh, ban đ&ecirc;m d&ugrave; sụp đổ th&igrave; ban ng&agrave;y vẫn phải ki&ecirc;n cường bật dậy đi l&agrave;m. Đ&oacute; l&agrave; điều rất b&igrave;nh thường, kh&ocirc;ng ai l&agrave; kh&ocirc;ng khổ, chỉ c&oacute; điều nhiều người kh&ocirc;ng muốn kể ra th&ocirc;i.</p>\r\n\r\n<p>Nhưng bạn cũng kh&ocirc;ng được v&igrave; thế m&agrave; lo lắng, khi Thượng Đế đ&oacute;ng tất cả c&aacute;nh cửa đi nữa, nhất định vẫn sẽ chừa lại cho bạn một cửa sổ.</p>\r\n\r\n<p>Bạn phải tin rằng d&ugrave; h&ocirc;m nay c&oacute; tồi tệ thế n&agrave;o đi nữa, ng&agrave;y mai nhất định vẫn sẽ tốt hơn!</p>\r\n\r\n<p><strong>- 07 -</strong></p>\r\n\r\n<p><strong>Đừng miễn cưỡng m&igrave;nh, l&agrave; bao dung cao nhất cho ch&iacute;nh bạn.</strong></p>\r\n\r\n<p>Chắc chắn tr&ecirc;n thế giới n&agrave;y, sẽ c&oacute; v&agrave;i việc, d&ugrave; bạn c&oacute; nỗ lực đến đ&acirc;u đi nữa, cũng kh&ocirc;ng thể thay đổi được, bởi v&igrave; năng lực con người l&agrave; hữu hạn.</p>\r\n\r\n<p>Miễn l&agrave; bạn từng nỗ lực hết m&igrave;nh, vậy đừng n&ecirc;n hối tiếc hay tự tr&aacute;ch l&agrave;m g&igrave;.</p>\r\n\r\n<p>Đường kh&ocirc;ng c&oacute; lối đi, th&igrave; đổi lối kh&aacute;c; việc cố mấy vẫn kh&ocirc;ng th&agrave;nh, vậy kh&ocirc;ng cần miễn cưỡng.</p>\r\n\r\n<p>Thuận theo tự nhi&ecirc;n l&agrave; được, cố gắng hết m&igrave;nh l&agrave; đủ!</p>\r\n\r\n<p><strong>- 08 -</strong></p>\r\n\r\n<p><strong>Đừng k&eacute;o d&agrave;i bệnh, l&agrave; c&aacute;ch chịu tr&aacute;ch nhiệm thực tế nhất với ch&iacute;nh m&igrave;nh</strong></p>\r\n\r\n<p>L&agrave; người ai m&agrave; chẳng c&oacute; l&uacute;c mắc bệnh. Nhưng đừng bao giờ v&igrave; những l&yacute; do như: c&oacute; việc, để h&ocirc;m kh&aacute;c... m&agrave; tr&igrave; ho&atilde;n việc chữa trị.</p>\r\n\r\n<p>H&atilde;y cố gắng kiểm tra định k&igrave; đ&uacute;ng hạn, ph&ograve;ng ngừa cho bản th&acirc;n cũng l&agrave; ph&ograve;ng ngừa cho x&atilde; hội.</p>\r\n\r\n<p>Tiền hết c&oacute; thể kiếm, c&ocirc;ng việc mất c&oacute; thể t&igrave;m, nhưng sức khỏe kh&ocirc;ng c&ograve;n chẳng c&oacute; g&igrave; đền lại được.</p>\r\n\r\n<p><strong>- 09 -</strong></p>\r\n\r\n<p><strong>Đừng qu&aacute; tiết kiệm, đ&oacute; l&agrave; sự t&ocirc;n trọng tốt nhất cho bản th&acirc;n.</strong></p>\r\n\r\n<p>Tiết kiệm l&agrave; đức t&iacute;nh tốt, nhưng đừng qu&aacute; tiết kiệm, n&oacute; kh&ocirc;ng đ&aacute;ng.</p>\r\n\r\n<p>Mỗi người học c&aacute;ch kiếm tiền l&agrave; để c&oacute; tiền x&agrave;i, kh&ocirc;ng phải nhịn ăn nhịn uống rồi cho hết tiền lương v&agrave;o sổ tiết kiệm.</p>\r\n\r\n<p>Học c&aacute;ch tiết kiệm c&oacute; chừng mực, bởi v&igrave; bản th&acirc;n bạn đ&aacute;ng gi&aacute; được đối đ&atilde;i tốt hơn.</p>\r\n\r\n<p><strong>- 10 -</strong></p>\r\n\r\n<p><strong>Đừng qu&aacute; mệt mỏi, l&agrave; lương thiện lớn nhất cho ch&iacute;nh m&igrave;nh.</strong></p>\r\n\r\n<p>Một đời người, bận rộn cỡ n&agrave;o đi nữa, cũng nhớ ph&acirc;n thời gian nghỉ ngơi. Kiếm tiền tuy quan trọng, nhưng giấc ngủ cũng qu&yacute; kh&ocirc;ng k&eacute;m.</p>\r\n\r\n<p>Người c&ograve;n, việc c&ograve;n, đừng sống qu&aacute; mệt mỏi.</p>\r\n\r\n<p>Sống c&oacute; ch&iacute; cầu tiến, nhưng cũng phải s&aacute;ng suốt m&agrave; sống; hạnh ph&uacute;c, vui vẻ m&agrave; sống.</p>\r\n\r\n<p>Vui chỉ một l&uacute;c, buồn rồi cũng qua. Mệt qu&aacute; l&agrave;m chi, sống cho nhẹ nh&agrave;ng. T&acirc;m tho&aacute;ng đ&atilde;ng, nh&igrave;n đời b&igrave;nh thản. Việc kh&oacute; t&ugrave;y duy&ecirc;n, việc phiền để gi&oacute; cuốn. Hỉ, nộ, &aacute;i, ố đều trải nghiệm; cay, đắng, ngọt, b&ugrave;i đều nếm qua.</p>\r\n\r\n<p>Cả đời n&agrave;y coi như kh&ocirc;ng sống uổng!</p>\r\n', './../uploads/1588054621photo-1-1588042595827635781228.jpg', '2020-04-28 06:17:00', 1, 5, 1, 5, 50, 27),
(38, 'Người dân từ thành phố đổ về quê nghỉ lễ, các bến xe Hà Nội và Sài Gòn đông đúc sau thời gian giãn cách xã hội', 'Đón kỳ nghỉ lễ 30/4 - 1/5 kéo dài đến 4 ngày, khá đông người dân từ Hà Nội và TP.HCM đã kéo nhau về quê trong buổi chiều ngày 29/4 khiến cho nhiều tuyến đường và bến xe trở nên đông đúc. Cũng tại các bến xe, công tác khử khuẩn, giãn cách được thực hiện tương đối cẩn thận, đồng bộ.', '<p>Dịp nghỉ lễ 30/4 - 1/5 năm nay k&eacute;o d&agrave;i đến 4 ng&agrave;y, lại đ&uacute;ng thời điểm c&aacute;c địa phương đ&atilde; cơ bản nới lỏng c&aacute;c biện ph&aacute;p gi&atilde;n c&aacute;ch x&atilde; hội, do vậy kh&aacute; đ&ocirc;ng người d&acirc;n từ c&aacute;c th&agrave;nh phố lớn như H&agrave; Nội v&agrave; TP.HCM đ&atilde; tranh thủ trở về qu&ecirc;.</p>\r\n\r\n<p>Chiều 29/4 - ng&agrave;y l&agrave;m việc cuối c&ugrave;ng trước kỳ nghỉ lễ - nhiều tuyến đường cửa ng&otilde; th&agrave;nh phố v&agrave; c&aacute;c bến xe đ&atilde; trở n&ecirc;n đ&ocirc;ng đ&uacute;c.</p>\r\n\r\n<p><strong>Tại Bến xe Mỹ Đ&igrave;nh (H&agrave; Nội),</strong>&nbsp;c&oacute; kh&aacute; nhiều người đang tập trung chờ xe để về qu&ecirc;. Một nh&acirc;n vi&ecirc;n điều h&agrave;nh bến xe cho biết, thực hiện chỉ thị của Thủ tướng n&ecirc;n hiện tại bến xe chỉ c&ograve;n 50% xe so với ng&agrave;y thường. Mỗi ng&agrave;y c&aacute;c xe ra v&agrave;o bến đều được gi&aacute;m s&aacute;t chặt chẽ về quy định ph&ograve;ng chống dịch Covid-19.&nbsp;</p>\r\n\r\n<p>C&aacute;c xe v&agrave;o bến sẽ được phun khử tr&ugrave;ng, h&agrave;nh kh&aacute;ch mang khẩu trang đo th&acirc;n nhiệt mới được l&ecirc;n xe. So với mọi năm, lượng người về qu&ecirc; ở bến Mỹ Đ&igrave;nh giảm gần một nửa.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/xa-hoi/947743312315428146123094898070787002466304n-15881533898472073884559.jpg\" style=\"height:413px; width:620px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Bến xe kh&aacute;ch Mỹ Đ&igrave;nh kh&ocirc;ng c&oacute; t&igrave;nh trạng đ&ocirc;ng đ&uacute;c như mọi năm</em></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/xa-hoi/956146566573154415064254451371897338200064n-15881533898831367711852.jpg\" style=\"height:147px; width:220px\" />&nbsp;<img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/xa-hoi/948832522243905456620514096014566784237568n-1588153389850349418202.jpg\" style=\"height:147px; width:220px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>C&aacute;c chuyến xe đều được phun khử khuẩn trước khi ra v&agrave;o bến</em></p>\r\n\r\n<p style=\"text-align:center\"><em><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/xa-hoi/9524158730419106292039163166840263930806272n-1588153389872552163947.jpg\" style=\"height:413px; width:620px\" /></em></p>\r\n\r\n<p style=\"text-align:center\"><em>Nhiều bạn trẻ về qu&ecirc; nghỉ lễ</em></p>\r\n\r\n<p>Tại&nbsp;<strong>Bến xe Gi&aacute;p B&aacute;t,&nbsp;</strong>chiều&nbsp;29/4 đại diện bến xe cho biết số lượng h&agrave;nh kh&aacute;ch giảm đ&aacute;ng kể, nhiều xe rời bến chỉ với 13 h&agrave;nh kh&aacute;ch. Tất cả người d&acirc;n được y&ecirc;u cầu đo th&acirc;n nhiệt v&agrave; khai b&aacute;o y tế trước khi bắt đầu h&agrave;nh tr&igrave;nh.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/xa-hoi/95121046549101239373361592049988939284480n-15881551497491643296718.jpg\" style=\"height:413px; width:620px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Khu vực b&aacute;n v&eacute; kh&aacute; vắng vẻ</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trong khi đ&oacute;<strong>&nbsp;tại TP.HCM,</strong>&nbsp;chiều ng&agrave;y 29/4 người d&acirc;n đ&atilde; bắt đầu đổ ra c&aacute;c bến xe, tuyến đường cửa ng&otilde; để về qu&ecirc; v&agrave; đi du lịch nh&acirc;n dịp nghỉ lễ 30/4 - 1/5.</p>\r\n\r\n<p>Ghi nhận tại&nbsp;<strong>Bến xe Miền Đ&ocirc;ng</strong>&nbsp;(quận B&igrave;nh Thạnh), người d&acirc;n đến đ&acirc;y mua v&eacute; nhiều hơn so với v&agrave;i ng&agrave;y trước (thời điểm chưa nới lỏng gi&atilde;n c&aacute;ch x&atilde; hội) để về qu&ecirc; hoặc đi du lịch.</p>\r\n\r\n<p>Chiều ng&agrave;y 29/4, Sở GTVT TP. HCM đ&atilde; c&oacute; c&ocirc;ng văn hoả tốc cho ph&eacute;p c&aacute;c xe kh&aacute;ch chạy tuyến cố định được trở lại b&igrave;nh thường đến 100% số chuyến trong biểu đồ chạy xe đ&atilde; được ph&ecirc; duyệt đối với c&aacute;c tỉnh thuộc nh&oacute;m c&oacute; nguy cơ thấp v&agrave; tối đa 50% theo biểu đồ đối với c&aacute;c tỉnh thuộc nh&oacute;m c&oacute; nguy cơ.</p>\r\n\r\n<p>Tuy nhi&ecirc;n vẫn đảm bảo ph&ograve;ng chống dịch, cụ thể điều chỉnh mật độ tập trung người tr&ecirc;n c&aacute;c phương tiện xe kh&aacute;ch: Cần sắp xếp, bố tr&iacute; h&agrave;nh kh&aacute;ch ngồi gi&atilde;n c&aacute;ch tr&ecirc;n phương tiện c&aacute;ch nhau 1 ghế hoặc đảm bảo 1 m&eacute;t thay cho cho quy định mỗi chuyến xe vận chuyển tối đa kh&ocirc;ng qu&aacute; 50% số ghế như quy định trước đ&acirc;y.</p>\r\n\r\n<p style=\"text-align:center\"><em><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/xa-hoi/img7794-1588153962349867157366.jpg\" style=\"height:413px; width:620px\" /></em></p>\r\n\r\n<p style=\"text-align:center\"><em>Dịp lễ n&agrave;y, Bến xe Miền Đ&ocirc;ng đ&atilde; đề xuất bố tr&iacute; từ 1.000 - 1.200 xe/ng&agrave;y để phục vụ nhu cầu đi lại của người d&acirc;n. Gi&aacute; v&eacute; cũng tăng l&ecirc;n 40% so với ng&agrave;y thường.</em></p>\r\n\r\n<p>Ngo&agrave;i ra, Sở GTVT TP. HCM sẽ chủ động li&ecirc;n hệ, phối hợp đồng bộ với c&aacute;c đơn vị thực hiện kế hoạch phục vụ vận chuyển h&agrave;nh kh&aacute;ch, h&agrave;nh h&oacute;a tại s&acirc;n bay quốc tế T&acirc;n Sơn Nhất, ga đường sắt S&agrave;i G&ograve;n, Cảng C&aacute;t L&aacute;i,... trong dịp lễ 30/4 &ndash; 1/5.</p>\r\n', './../uploads/1588167372img7794-1588153962349867157366.jpg', '2020-04-29 13:36:12', 1, 10, 1, 23, 0, 0),
(39, 'Chuyện bữa sáng của số đông người trẻ hiện đại: không bỏ bữa thì cũng ăn qua loa, cần lắm giải pháp cho chuỗi ngày bận bịu', 'Ngay cả những người biết cách ăn ngon, biết thưởng thức ẩm thực nhưng trong việc cơ bản như chuẩn bị cho bản thân một bữa sáng đủ đầy cũng chưa chắc đã làm được.', '<p style=\"text-align:start\">Từ hồi c&ograve;n đi học cấp 2, đ&atilde; nhiều lần t&ocirc;i nhịn ăn s&aacute;ng để d&agrave;nh dụm số tiền m&igrave;nh cần, mua những m&oacute;n đồ chơi như bao thiếu ni&ecirc;n c&ugrave;ng trang lứa, đến khi bố mẹ ph&aacute;t hiện ra, t&ocirc;i bị đ&aacute;nh một trận đ&ograve;n kh&oacute;i lửa. Khi đ&oacute;, d&ugrave; đ&atilde; lớn tồng ngồng m&agrave; vẫn bị bố đ&aacute;nh như con n&iacute;t. Đau chứ, giận bố mẹ chứ. Hồi ấy ấm ức m&atilde;i v&igrave; đ&atilde; nghĩ l&agrave; khi bố mẹ biết chuyện th&igrave; sẽ được khen v&igrave; t&iacute;nh tiết kiệm, ai d&egrave; lại bị &ldquo;nhừ tử&rdquo;.</p>\r\n\r\n<p style=\"text-align:start\">Cho đến b&acirc;y giờ nh&igrave;n lại, thật &ldquo;ngốc x&iacute;t&rdquo; m&agrave;.</p>\r\n\r\n<p style=\"text-align:start\">Khi đ&atilde; ra trường, đi l&agrave;m v&agrave; &ldquo;chiến đấu&rdquo; ở nơi l&agrave;m việc mỗi ng&agrave;y, ch&uacute;ng ta mới hiểu được tầm quan trọng của việc cung cấp đủ chất cho cơ thể, chẳng phải đ&acirc;u xa, đ&oacute; ch&iacute;nh l&agrave; những bữa ăn bổ dưỡng, đầy đủ, ngon miệng. Nhưng với những &ldquo;con thi&ecirc;u th&acirc;n&rdquo; v&igrave; c&ocirc;ng việc như đại đa số người trẻ ng&agrave;y nay, c&oacute; một bữa s&aacute;ng tử tế th&ocirc;i cũng đ&atilde; l&agrave; một điều xa xỉ!&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/doi-song/dta7484-15881525754391355178175.jpg\" style=\"height:418px; width:620px\" /></p>\r\n\r\n<p style=\"text-align:start\">Khoan vội tr&aacute;ch cứ v&igrave; nghe l&yacute; do cũng&hellip; hợp l&yacute; lắm chứ. V&igrave; đ&ecirc;m h&ocirc;m trước thức khuya chạy deadlines, s&aacute;ng dậy mệt lả chẳng muốn l&agrave;m g&igrave;. V&igrave; tối qua lỡ xem phim kinh dị n&ecirc;n mất ngủ, s&aacute;ng lại thức dậy sau c&aacute;i đồng hồ n&ecirc;n ba ch&acirc;n bốn cẳng chạy cho kịp chấm c&ocirc;ng. V&igrave; c&atilde;i v&atilde; với người y&ecirc;u, kh&ocirc;ng c&ograve;n đ&acirc;u t&acirc;m trạng ăn uống. V&igrave; lập gia đ&igrave;nh rồi, s&aacute;ng dậy c&oacute; 7749 việc kh&ocirc;ng t&ecirc;n n&ecirc;n cũng chẳng kịp nấu nướng&hellip; N&oacute;i chung l&agrave; ai cũng c&oacute; l&yacute; do, nếu kh&ocirc;ng phải v&igrave; lười, th&igrave; người trẻ cũng đ&atilde; d&agrave;nh sự ưu ti&ecirc;n cho c&ocirc;ng việc, cho đời sống tinh thần, cho 1001 khủng hoảng phải xử l&yacute;, th&agrave;nh ra đ&ocirc;i l&uacute;c c&aacute;i chuyện ăn uống chỉ l&agrave; tạm bợ, hoặc thậm ch&iacute; c&ograve;n&hellip; chẳng nhớ l&agrave; phải ăn.</p>\r\n\r\n<p style=\"text-align:start\">&Eacute;o le ở chỗ đ&oacute;, d&ugrave; l&agrave; những người biết ăn ngon, biết thưởng thức, biết nấu nướng, biết b&agrave;y biện đấy, nhưng chẳng mấy ai trong số những người trẻ ch&uacute;ng ta c&oacute; đủ t&acirc;m huyết v&agrave; sự tập trung để l&uacute;c n&agrave;o cũng chuẩn bị cho bản th&acirc;n những bữa ăn s&aacute;ng đủ chất, đủ no.</p>\r\n\r\n<p style=\"text-align:start\">Nhưng kh&oacute; kh&ocirc;ng c&oacute; nghĩa l&agrave; v&ocirc; phương cứu v&atilde;n. Khi nhịp sống hiện đại ng&agrave;y c&agrave;ng th&ocirc;i th&uacute;c con người phải chạy đua, th&igrave; những s&aacute;ng tạo, những sản phẩm cũng được ra đời để phục vụ nhu cầu đ&oacute;: nhanh, gọn, chất lượng. Trong mảng ăn uống, ch&uacute;ng ta c&oacute; những thực phẩm tiện lợi được ưa th&iacute;ch v&agrave; trở th&agrave;nh phương thức&nbsp; &ldquo;cứu nguy&rdquo; cho bao người trẻ hiện đại.</p>\r\n\r\n<p style=\"text-align:start\">Nhưng để t&igrave;m được một m&oacute;n ăn ho&agrave;n chỉnh về dinh dưỡng, về t&iacute;nh tiện lợi th&igrave; kh&ocirc;ng phải đơn giản. V&igrave; thế thương hiệu Omachi đ&atilde; cho ra đời loạt sản phẩm vừa tiện, vừa chất để phục vụ nhu cầu của người trẻ n&oacute;i ri&ecirc;ng v&agrave; người Việt n&oacute;i chung, nổi bật gần đ&acirc;y l&agrave; OMACHI &ndash; BỮA ĂN 1 Đ&Ocirc;. M&oacute;n ăn n&agrave;y ch&iacute;nh l&agrave;&nbsp; bạn th&acirc;n mới của h&agrave;ng vạn người trẻ Việt khi cung cấp một bữa ăn đủ đầy thịt rau, c&oacute; 60gr b&ograve; real nguy&ecirc;n miếng đậm đ&agrave;, sợi m&igrave; khoai t&acirc;y kh&ocirc;ng n&oacute;ng, an to&agrave;n cho sức khoẻ.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/webtintuc/uploads/ckeditor/images/doi-song/8cebab4e-89bd-4033-a91c-fc7697b1102a-copy-1588152575432792066010.jpg\" style=\"height:827px; width:620px\" /></p>\r\n\r\n<p style=\"text-align:start\">Độ dinh dưỡng của OMACHI &ndash; BỮA ĂN 1 Đ&Ocirc; c&oacute; thể thay thế một t&ocirc; phở, hủ tiếu. Vừa ho&agrave;n chỉnh, vừa chất lượng như vậy, lại c&ograve;n tiện lợi, nhanh gọn, sau v&agrave;i ph&uacute;t l&agrave; c&oacute; thể thưởng thức được rồi!</p>\r\n\r\n<p style=\"text-align:start\">Ngay khi vừa ra mắt, OMACHI &ndash; BỮA ĂN 1 Đ&Ocirc; đ&atilde; g&acirc;y được sự ch&uacute; &yacute; với d&acirc;n t&igrave;nh v&igrave; chất lượng thượng hạng, đặc biệt l&agrave; c&oacute; g&oacute;i thịt b&ograve; 60gr &ldquo;h&agrave;ng xịn&rdquo; chứ kh&ocirc;ng chỉ l&agrave; &ldquo;h&igrave;nh ảnh mang t&iacute;nh chất minh hoạ&rdquo;. M&igrave; khoai t&acirc;y b&igrave;nh thường đ&atilde; ngon, giờ c&oacute; th&ecirc;m thịt b&ograve; thật th&igrave; c&agrave;ng th&ecirc;m hấp dẫn. Chưa kể, từ thiết kế hộp m&igrave; đ&atilde; to&aacute;t ra vẻ hiện đại, cao cấp, b&agrave;y biện một ch&uacute;t th&igrave; lại c&oacute; bức ảnh sống ảo xịn s&ograve; với bữa s&aacute;ng chất lượng 100% n&agrave;y!</p>\r\n', './../uploads/1588167634dta7484-15881525754391355178175.jpg', '2020-04-29 13:40:34', 1, 23, 1, 15, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Thể thao'),
(2, 'Bóng đá'),
(3, 'Gia đình'),
(4, 'Sức khỏe'),
(5, 'Hạnh phúc'),
(6, 'Ngôn ngữ'),
(7, 'Funny'),
(8, 'Tình cảm'),
(9, 'Học tập'),
(10, 'Thời sự'),
(11, 'Ẩm thực'),
(13, 'Nông thôn'),
(14, 'Người nổi tiếng'),
(18, 'abc'),
(19, 'Thành công'),
(20, 'Giàu có'),
(21, 'viên mãn'),
(22, 'Scandal'),
(23, 'Ăn uống'),
(24, 'Du lịch'),
(25, 'Đi chơi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `role` smallint(5) NOT NULL DEFAULT 1 COMMENT '0-admin, 1-normal user',
  `fullname` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `gender` tinyint(6) NOT NULL COMMENT '1-male, 2-female',
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `avatar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `role`, `fullname`, `dob`, `gender`, `email`, `phone`, `address`, `avatar`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 'Trần Văn Hiệp', '1997-07-30', 1, 'tranhieptvh@gmail.com', '0985250657', 'Vĩnh Phúc', './../uploads/1587821346HUY_5517-01-02.jpeg'),
(2, 'tranhieptvh', '580e65a47a052b806804c121b5dedd9d', 1, 'Trần Văn Hiệp', '1997-07-30', 1, 'tranhieptvh@gmail.com', '0985250657', 'Vĩnh Phúc', './../uploads/1587822269IMG_20190319_13023831.jpg'),
(3, 'hiepdz', '21232f297a57a5a743894a0e4a801fc3', 1, 'Hiệp Trần', '1997-07-30', 1, 'tranhiep@gmail.com', '0123456745', 'Vĩnh Phúc', './../uploads/1587822295IMG_20180220_122351-03-Recovered.jpg'),
(4, 'huyenamy', '21232f297a57a5a743894a0e4a801fc3', 0, 'Huyền Amy', '1997-09-07', 2, 'huyen@gmail.com', '0987654321', 'Việt Nam', './../uploads/158782237488131326_1592883840877541_2700927786528276480_o.jpg'),
(8, 'hiepadmin', '21232f297a57a5a743894a0e4a801fc3', 0, 'Hiệp Trần Văn', '1997-07-30', 1, 'hiepadmin@gmail.com', '0985250657', 'Vĩnh Phúc, Việt Nam', './../uploads/1587897518dell_uong.jpg'),
(9, 'hiepuser', 'ee11cbb19052e40b07aac0ca060c23ee', 1, 'Trần Văn Hiệp', '1997-07-30', 1, 'hiepuser@gmail.com', '0987654675', 'Việt Nam', ''),
(10, 'huyenadmin', '21232f297a57a5a743894a0e4a801fc3', 0, 'Trương Huyền', '1997-07-30', 2, 'huyenadmy1@gmail.com', '0986578462', 'Việt Nam', ''),
(11, 'huyenuser', 'ee11cbb19052e40b07aac0ca060c23ee', 1, 'Huyền Trương Thị Thu', '1997-01-01', 2, 'huyenuser@gmail.com', '09364822748', 'Việt Nam', ''),
(12, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 1, 'User', '1997-01-01', 2, 'user@gmail.com', '0969696969', 'Việt Nam', ''),
(13, 'tvh', 'ee11cbb19052e40b07aac0ca060c23ee', 0, 'Trần Văn Hiệp', '1997-07-30', 1, 'tvh@gmail.com', '03735242637', 'Việt Nam', ''),
(20, 'luannt', 'b012c22744cbb5f09882ec102d462ea0', 1, 'Nguyễn Thành Luân', '1992-02-22', 1, 'ntl@gmail.com', '0298743625', 'VN', './../uploads/158782757369109127_126373558679920_8812553729183055872_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
