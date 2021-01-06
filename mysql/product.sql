-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-05-08 10:25:24
-- 伺服器版本: 10.1.25-MariaDB
-- PHP 版本： 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ncdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `p_id` mediumint(6) UNSIGNED NOT NULL,
  `p_type` smallint(5) UNSIGNED NOT NULL,
  `p_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `p_photo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `p_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_spec` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_price` mediumint(6) UNSIGNED NOT NULL,
  `p_status` tinyint(1) UNSIGNED NOT NULL,
  `p_on` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`p_id`, `p_type`, `p_name`, `p_photo`, `p_desc`, `p_spec`, `p_price`, `p_status`, `p_on`) VALUES
(1, 1, '玫瑰潤澤皂', 'soap01.jpg', '玫瑰精油加上珊瑚紅礦土，滋潤保濕肌膚效果佳。', '玫瑰精油、珊瑚紅礦土、椰子油、橄欖油、芥花油、棕櫚硬脂。', 179, 1, 1),
(2, 1, '尤加利清檸皂', 'soap02.jpg', '尤加利與檸檬草的天然清爽，結合出兼具清爽不黏膩的尤加利清檸皂，清潔力佳。', '檸檬草、尤加利精油、荷荷芭油、橄欖油、椰子油。', 239, 1, 1),
(3, 1, '檸檬薰衣草舒緩皂', 'soap03.jpg', '利用珍貴植物油中的特殊脂肪酸，不傷害刺激肌膚，加上檸檬與薰衣草的鎮靜，降低將肌膚的不適應感。', '檸檬精油、薰衣草精油、橄欖油、椰子油、甜杏仁油、乳油木果脂、米糠油。', 130, 1, 1),
(4, 1, '薄荷茶樹舒緩皂', 'soap04.jpg', '薄荷與茶樹的天然清爽，結合出兼具清爽又保濕的檸檬茶樹香，清潔力佳。', '薄荷精油、茶樹精油、橄欖油、椰子油、甜杏仁油、棕櫚油、乳油木果脂。', 110, 1, 1),
(5, 1, '紫草木果皂', 'soap05.jpg', '乳油木果、米糠油，含豐富的維他命、蛋白質，搭配紫草，對於老化肌膚的更生更顯柔軟舒適。', '紫草浸泡油、乳油木果脂、甜橙精油、橄欖油、椰子油、甜杏仁油、棕櫚油。', 160, 1, 1),
(6, 1, '洋甘菊護膚皂', 'soap06.jpg', '洋甘菊浸泡橄欖油，加入甜杏仁油及牛奶，散發清甜的香味。', '洋甘菊、橄欖油、牛奶、椰子油、甜杏仁油、棕櫚油、乳油木果脂。', 180, 1, 1),
(7, 1, '檸檬接骨木花皂', 'soap07.jpg', '天然清爽的檸檬與珍貴的接骨木花，清潔力佳，洗後散發著典雅清新的檸檬接骨木花香。', '接骨木花精油、檸檬精油、橄欖油、椰子油、甜杏仁油、棕櫚油、乳油木果脂。', 180, 1, 1),
(8, 1, '薰衣草舒敏皂', 'soap08.jpg', '薰衣草搭配乳油木果脂，有天然草本香氛。薰衣草針對肌膚的舒緩和改善。', '薰衣草油、橄欖油、椰子油、乳油木果脂、棕櫚油。', 140, 1, 1),
(9, 1, '薄荷清爽皂', 'soap09.jpg', '薄荷的涼爽加上可可脂的絶佳清潔性，伴隨甜杏仁的滋潤，讓您維持一整天的清爽舒適。', '薄荷油、可可脂、甜杏仁油、橄欖油、椰子油、乳油木果脂。', 99, 1, 1),
(10, 1, '海藻泥潤膚皂', 'soap10.jpg', '天然海藻泥散發淡淡的檸檬香，保濕、潔淨、不緊繃。', '天然海藻泥、檸檬精油、橄欖油、椰子油、甜杏仁油、乳油木果脂、米糠油。', 210, 1, 1),
(11, 1, '酪梨潤膚皂', 'soap11.jpg', '酪梨的豐富維生素，提升對肌膚傷害的保護力，吸收容易，可改善肌膚，滋潤保濕效果佳。', '酪梨油、橄欖油、椰子油、乳油木果脂、棕櫚油。', 199, 1, 1),
(12, 2, '義大利佛手柑精油', 'oil01.jpg', '止痛、抗沮喪、興奮、抗菌、退腸胃脹氣、促進傷口癒合、除臭、殺蟲、鎮靜、殺蠕蟲。', '18ml', 350, 1, 1),
(13, 2, '法國高山薰衣草精油', 'oil02.jpg', '止痛、舒緩神經、抗沮喪、消炎、抗菌、消毒、降低血壓、除臭、鎮靜、殺黴菌、抗病毒、袪腸胃脹氣、增進細胞活動、回復健康。', '18ml', 380, 1, 1),
(14, 2, '快樂鼠尾草精油', 'oil03.jpg', '抗抽搐、抗沮喪、抗炎、抗菌、抗痙攣、抑汗、催情、具香膠特質、袪腸胃脹氣、 除臭、助消化、通經、降低血壓、利神經、助產、鎮靜、利胃、緊實、利子宮。', '10ml', 500, 1, 1),
(15, 2, '德國野生洋甘菊精油', 'oil04.jpg', '止痛、抗過敏、抗抽搐、抗憂鬱、止吐、抗發炎、止癢、抗風濕、抗菌、抗痙攣', '15ml', 490, 1, 1),
(16, 2, '檸檬香茅精油', 'oil05.jpg', '抗沮喪、抗菌、抗壞血、退腸胃脹氣、除臭、幫助消化、殺菌、利尿、殺黴菌、殺蟲、殺蟲、催乳、預防疾病、激勵、補身。', '12ml', 410, 1, 1),
(17, 2, '澳洲頂極茶樹精油', 'oil06.jpg', '抗生素、抗搔癢、抗菌、抗病毒、具香膠特質、促結痂、興奮、袪痰、殺黴菌、殺蟲、激勵、促發汗、殺菌。', '9ml', 0, 1, 1),
(18, 2, '頂極檜木精油', 'oil07.jpg', '殺菌、殺蟲、鎮靜神經、提神、醫療', '6ml', 980, 1, 1),
(19, 2, '尤加利精油', 'oil08.jpg', '止痛、抗發炎、殺菌、消腫、淨化', '10ml', 399, 1, 1),
(20, 2, '花利木精油', 'oil09.jpg', '止痛、抗沮喪、抗菌、催情、殺菌、利腦、除臭、殺蟲、激勵、補身。', '15ml', 650, 1, 1),
(21, 2, '馬鞭草精油', 'oil10.jpg', '提神、止痛、舒緩神經、抗沮喪、消炎、抗菌、消毒', '12ml', 750, 1, 1),
(22, 2, '甜橙精油', 'oil11.jpg', '抗沮喪、抗菌、抗痙攣、袪腸胃脹氣、利消化、退燒、鎮靜、利胃、補身。', '9ml', 499, 1, 1),
(23, 2, '迷迭香精油', 'oil12.jpg', '抗風濕、抗菌、止痛、收斂、抗痙攣、祛腸胃脹氣、幫助消化、防昆蟲、利尿、激勵。', '6ml', 580, 1, 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `p_id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
