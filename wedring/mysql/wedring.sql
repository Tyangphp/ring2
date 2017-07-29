SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `wedring_access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `node_id` varchar(100) NOT NULL,
  `mark` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wedring_access` (`id`, `role_id`, `node_id`, `mark`) VALUES
(4, 1, '22,43', NULL),
(2, 2, '12,13,22,31,43', ''),
(3, 3, '11,12,13,21,22,31,32,41,42,43,51', ''),
(5, 4, '12,32', NULL);

CREATE TABLE `wedring_cart` (
  `id` int(12) NOT NULL,
  `uid` varchar(32) NOT NULL,
  `gid` int(32) NOT NULL,
  `create_time` varchar(32) DEFAULT NULL,
  `update_time` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wedring_cart` (`id`, `uid`, `gid`, `create_time`, `update_time`) VALUES
(3, '324235', 25, '2017-07-28 14:52:14', '2017-07-28 14:52:14'),
(2, '324235', 23, '2017-07-28 14:51:55', '2017-07-28 14:51:55'),
(4, '324235', 19, '2017-07-28 14:52:23', '2017-07-28 14:52:23'),
(5, '324235', 16, '2017-07-28 14:52:32', '2017-07-28 14:52:32'),
(9, '324236', 24, '2017-07-28 15:01:30', '2017-07-28 15:01:30');

CREATE TABLE `wedring_collection` (
  `cid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `gid` int(12) NOT NULL,
  `collection_date` date NOT NULL,
  `collection_state` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` date NOT NULL,
  `updatetime` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品收藏表';

CREATE TABLE `wedring_goods` (
  `gid` int(11) NOT NULL,
  `kid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `gname` varchar(32) NOT NULL,
  `color` varchar(32) DEFAULT NULL,
  `review` varchar(32) NOT NULL DEFAULT '0',
  `collected` int(11) NOT NULL DEFAULT '0',
  `size` varchar(32) NOT NULL,
  `quality` varchar(50) NOT NULL,
  `weight` varchar(32) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `sales` int(11) NOT NULL DEFAULT '0',
  `is_up` int(11) NOT NULL DEFAULT '1',
  `price_sale` int(12) NOT NULL,
  `cost_price` varchar(12) NOT NULL,
  `content` varchar(5000) DEFAULT NULL,
  `images` varchar(2000) NOT NULL,
  `create_time` varchar(32) DEFAULT NULL,
  `update_time` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wedring_goods` (`gid`, `kid`, `nid`, `gname`, `color`, `review`, `collected`, `size`, `quality`, `weight`, `count`, `sales`, `is_up`, `price_sale`, `cost_price`, `content`, `images`, `create_time`, `update_time`) VALUES
(1, 8, 2, '经典款', 'H色', '10', 1, '1*1cm', '白金', '50分', 19999, 5545, 1, 25700, '8000.00', NULL, '/index/images/2014090119350717386d7a1e.jpg', '2017-07-21 14:47:32', '2017-07-21 14:47:32'),
(2, 2, 4, '典雅', 'L色', '10', 1, '1.3*1.3cm', '白金', '40分', 20000, 2344, 1, 19999, '7600.00', NULL, '/index/images/201412081512070b82d519cb.jpg', '2017-07-21 14:47:32', '2017-07-21 14:47:32'),
(3, 8, 6, '简奢款', 'H色', '14', 1, '1v', '白金', '30分', 19999, 2344, 1, 28800, '9900.00', NULL, '/index/images/201412081516238b52b39cab.jpg', '2017-07-21 14:47:32', '2017-07-21 14:47:32'),
(4, 8, 4, '纯爱', 'M色', '15', 1, '1.1*1.1cm', '白金', '40分', 20000, 734, 1, 26600, '11000.00', NULL, '/index/images/201412031648134faa47945e.jpg', '2017-07-21 14:47:32', '2017-07-21 14:47:32'),
(5, 8, 3, '奢华款', 'H色', '18', 1, '0.9*0.9cm', '黄金', '70分', 19999, 233, 1, 23300, '8000.00', NULL, '/index/images/201502031541470f549eecb4.jpg', '2017-07-21 14:47:32', '2017-07-21 14:47:32'),
(6, 1, 6, '典雅', 'E色', '13', 1, '1.5*1.5cm', '白金', '30分', 19999, 6352, 1, 15700, '6000.00', NULL, '/index/images/2015012911164499edc9d9cc.jpg', '2017-07-21 14:47:32', '2017-07-21 14:47:32'),
(7, 3, 5, '简奢款', 'H色', '19', 1, '1.3*1.3cm', '白金', '30分', 20000, 7752, 1, 13140, '5000.00', NULL, '/index/images/20141208151342d086aedadc.jpg', '2017-07-21 14:47:32', '2017-07-21 14:47:32'),
(8, 3, 6, '经典款', 'D色', '11', 1, '1.2*1.2cm', '白金', '25分', 20000, 988, 1, 23344, '1000.00', NULL, '/index/images/20141208151441cc5ac80d54.jpg', '2017-07-21 14:47:32', '2017-07-21 14:47:32'),
(16, 4, 3, '锁住一生 LOCK套链', 'H色', '10', 1, '1*1cm', '白金', '0.006克拉*45颗', 19999, 5545, 1, 25700, '8000.00', NULL, '/index/images/2015012110590914b2fee4b2.jpg', '2017-07-21 15:22:22', '2017-07-21 15:22:22'),
(17, 4, 5, '简约款套链', 'D色', '10', 5, '1.3*1.3cm', '18k金', '40分', 20000, 2344, 1, 19999, '7600.00', NULL, '/index/images/1469512838.jpg', '2017-07-21 15:22:22', '2017-07-21 15:22:22'),
(18, 5, 3, '心心相印套链', 'H色', '14', 1, '1v', '黄金', '30分', 20000, 2344, 1, 28800, '9900.00', NULL, '/index/images/1469512838.jpg', '2017-07-21 15:22:22', '2017-07-21 15:22:22'),
(19, 5, 4, '初心套链', 'E色', '15', 1, '1.1*1.1cm', 'PT95 18k金', '40分', 19998, 734, 1, 26600, '11000.00', NULL, '/index/images/1477451664.jpg', '2017-07-21 15:22:22', '2017-07-21 15:22:22'),
(23, 7, 7, '初心耳饰', 'H色', '10', 1, '1*1cm', '18k金', '20分', 19999, 5545, 1, 25700, '8000.00', NULL, '/index/images/1477451467.jpg', '2017-07-21 15:48:36', '2017-07-21 15:48:36'),
(24, 7, 4, '奢华耳钉', 'L色', '10', 5, '1.3*1.3cm', '18k金', '20分', 19999, 2344, 1, 19999, '7600.00', NULL, '/index/images/1477451745.jpg', '2017-07-21 15:48:36', '2017-07-21 15:48:36'),
(25, 6, 3, '一生一世手链', 'H色', '14', 1, '16.5+2.5cm', '白18k金', '0.006克拉*5颗', 19999, 2344, 1, 28800, '9900.00', NULL, '/index/images/1477451532.jpg', '2017-07-21 15:48:36', '2017-07-21 15:48:36'),
(26, 6, 4, '四叶草幸运手链', 'M色', '15', 1, '16.5+2.5cm', '白18k金', '40分', 20000, 734, 1, 26600, '11000.00', NULL, '/index/images/1477451776.jpg', '2017-07-21 15:48:36', '2017-07-21 15:48:36'),
(27, 1, 2, '大哥结婚戒指', NULL, '0', 0, '大号', '铁', '五斤', 12311, 0, 1, 12321, '123', NULL, '/uploads/20170724\\e0b904405388d5d2bf0ca786b15e14b4.png', '2017-07-24 15:04:19', '2017-07-24 15:04:19');

CREATE TABLE `wedring_goods_kind` (
  `id` int(11) NOT NULL,
  `sid` int(12) NOT NULL COMMENT '所属系列id',
  `classname` varchar(20) NOT NULL COMMENT '种类名称',
  `create_time` varchar(32) DEFAULT NULL,
  `update_time` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品种类表';

INSERT INTO `wedring_goods_kind` (`id`, `sid`, `classname`, `create_time`, `update_time`) VALUES
(1, 2, '对戒', '2017-07-21 11:56:42', '2017-07-21 11:56:42'),
(2, 2, '男戒', '2017-07-21 11:56:42', '2017-07-21 11:56:42'),
(3, 2, '女戒', '2017-07-21 11:56:42', '2017-07-21 11:56:42'),
(4, 2, '吊坠', '2017-07-21 11:56:42', '2017-07-21 11:56:42'),
(5, 2, '项链', '2017-07-21 11:56:42', '2017-07-21 11:56:42'),
(6, 2, '手链', '2017-07-21 11:56:42', '2017-07-21 11:56:42'),
(7, 2, '耳钉/耳环', '2017-07-21 11:56:42', '2017-07-21 11:56:42'),
(8, 1, '求婚钻戒', '2017-07-21 11:56:42', '2017-07-21 11:56:42'),
(11, 1, '结婚对戒', '2017-07-21 11:56:42', '2017-07-21 11:56:42');

CREATE TABLE `wedring_goods_nav` (
  `id` int(12) NOT NULL,
  `sid` char(12) NOT NULL COMMENT '所属分类id',
  `nname` varchar(50) NOT NULL COMMENT '种类名称',
  `create_time` varchar(32) DEFAULT NULL,
  `update_time` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COMMENT='商品系列表';

INSERT INTO `wedring_goods_nav` (`id`, `sid`, `nname`, `create_time`, `update_time`) VALUES
(2, '1', '稀世粉钻系列', '2017-07-21 11:50:52', '2017-07-21 11:50:52'),
(3, '1,2', 'Forever系列', '2017-07-21 11:50:52', '2017-07-21 11:50:52'),
(4, '1,2', 'My Heart系列', '2017-07-21 11:50:52', '2017-07-21 11:50:52'),
(5, '1,2', 'True Love系列', '2017-07-21 11:50:52', '2017-07-21 11:50:52'),
(6, '1,2', 'I Swear系列', '2017-07-21 11:50:52', '2017-07-21 11:50:52'),
(7, '1,2', 'Just You系列', '2017-07-21 11:50:52', '2017-07-21 11:50:52'),
(9, '2', '大傻逼系列', '2017-07-24 11:19:18', '2017-07-24 11:19:18');

CREATE TABLE `wedring_goods_series` (
  `id` int(12) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `create_time` varchar(32) DEFAULT NULL,
  `update_time` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品分类表';

INSERT INTO `wedring_goods_series` (`id`, `sname`, `create_time`, `update_time`) VALUES
(1, '求婚钻戒', '2017-07-21 11:43:15', '2017-07-21 11:43:15'),
(2, '爱的礼物', '2017-07-21 11:43:15', '2017-07-21 11:43:15');

CREATE TABLE `wedring_liulan` (
  `id` int(12) NOT NULL,
  `uid` varchar(32) NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wedring_liulan` (`id`, `uid`, `gid`) VALUES
(1, '324235', 19),
(2, '324235', 3),
(3, '324235', 5),
(4, '324235', 5),
(5, '324235', 23),
(6, '324235', 25),
(7, '324235', 19),
(8, '324235', 16),
(9, '324236', 27),
(10, '324236', 1),
(11, '324236', 6),
(12, '324236', 6),
(13, '324236', 24);

CREATE TABLE `wedring_login` (
  `lid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `account_number` varchar(50) NOT NULL COMMENT '账号',
  `login_name` varchar(50) NOT NULL,
  `access_token` varchar(50) NOT NULL,
  `openId` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='第三方登录表';

CREATE TABLE `wedring_manage` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `tel` char(11) NOT NULL,
  `create_time` varchar(32) DEFAULT '2017-07-28 16:27:17',
  `email` varchar(32) DEFAULT NULL,
  `is_stop` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

INSERT INTO `wedring_manage` (`id`, `username`, `password`, `tel`, `create_time`, `email`, `is_stop`) VALUES
(1, 'yangge', '3989d3484956855d6df29da183574beb', '13821321', '2017-07-19 03:12:24', '324324@qq.com', 0),
(2, 'ceshi', '3989d3484956855d6df29da183574beb', '21312', '2017-07-25 20:21:43', NULL, 0),
(3, 'asd', 'asda', 'asd', '2017-07-25 20:22:02', NULL, 0),
(22, 'asd', 'asda', 'asd', '2017-07-25 20:22:16', NULL, 1),
(27, 'ceshi2', '202cb962ac59075b964b07152d234b70', '123', '2017-07-26 21:24:21', '123@qq.com', 0),
(29, 'asda', '202cb962ac59075b964b07152d234b70', '12321321', '2017-07-27 15:12:06', '2132131231@qq.com', 0);

CREATE TABLE `wedring_manage_sign` (
  `sid` int(11) NOT NULL,
  `mname` varchar(32) NOT NULL,
  `logtime` varchar(32) NOT NULL DEFAULT '2017-07-28 16:27:17'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wedring_manage_sign` (`sid`, `mname`, `logtime`) VALUES
(1, 'yangge', '2017-07-20 19:23:17'),
(2, 'yangge', '2017-07-20 19:25:50'),
(3, 'yangge', '2017-07-24 20:36:49'),
(4, 'yangge', '2017-07-25 16:24:04'),
(5, 'yangge', '2017-07-26 17:19:09'),
(6, 'ceshi', '2017-07-26 19:06:04'),
(7, 'yangge', '2017-07-26 19:06:52'),
(8, 'yangge', '2017-07-27 08:58:02'),
(9, 'yangge', '2017-07-28 13:38:16'),
(10, 'yangge', '2017-07-28 13:54:28'),
(11, 'ceshi2', '2017-07-28 13:55:43'),
(12, 'yangge', '2017-07-28 13:58:29'),
(13, 'ceshi', '2017-07-28 13:58:45'),
(14, 'ceshi2', '2017-07-28 13:59:20');

CREATE TABLE `wedring_news` (
  `nid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `create_time` varchar(32) NOT NULL DEFAULT '2017-07-28 16:27:17',
  `update_time` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品详情表';

INSERT INTO `wedring_news` (`nid`, `title`, `content`, `picture`, `count`, `create_time`, `update_time`, `is_delete`) VALUES
(5, '唐嫣佩戴Darry Ring璀璨臻品,拍摄《时尚新娘》大片', '唐嫣首登《时尚新娘》六月刊封面，并佩戴一生仅能定制一枚的Darry Ring（DR真爱戒指）璀璨臻品，化为幸福小女人。了解更多请点击index.html/ty.html', '/index/images/2015061114302742b5f2b237.jpg', 0, '2017-07-19 17:27:59', NULL, 0),
(6, '娄艺潇佩戴Darry Ring登《芭莎珠宝》', '在《芭莎珠宝》大片拍摄中，娄艺潇佩戴一生仅能定制一枚的DarryRing浪漫臻品，倾情演绎只因坚守真爱唯一的信念。更多详情点击index.html/lyx.html', NULL, 0, '2017-07-19 17:29:06', NULL, 0),
(7, '《小时代4》陆烧林萧求婚钻戒 ', '小时代4陆烧林萧求婚钻戒，Darry Ring钻戒顶级定制！无论是回到相爱的那一年，还是走到生命灵魂的尽头，陪伴才是一辈子最美的承诺。', NULL, 0, '2017-07-19 17:29:40', NULL, 0),
(8, '山驴逼何旭峰', '2333', '/uploads/20170721\\7c112a5fcdd54432fc56fd2ad1c697ab.jpg', 0, '2017-07-21 14:30:08', NULL, 0);

CREATE TABLE `wedring_node` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) UNSIGNED DEFAULT NULL,
  `pid` smallint(6) UNSIGNED NOT NULL,
  `level` tinyint(1) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wedring_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`) VALUES
(10, NULL, '商品管理', 0, NULL, NULL, 0, 2),
(11, '/admin/product/s_product', '产品管理', 0, NULL, NULL, 10, 3),
(12, '/admin/product/s_category', '种类管理', 0, NULL, NULL, 10, 3),
(13, '/admin/product/s_series', '系列管理', 0, NULL, NULL, 10, 3),
(20, NULL, '订单管理', 0, NULL, NULL, 0, 2),
(21, '/admin/order/s_order', '订单列表', 0, NULL, NULL, 20, 3),
(22, '/admin/order/s_omanage', '订单处理', 0, NULL, NULL, 20, 3),
(30, '', '会员管理', 0, NULL, NULL, 0, 2),
(31, '/admin/member/s_member', '会员列表', 0, NULL, NULL, 30, 3),
(32, '/admin/member/s_reply', '意见箱', 0, NULL, NULL, 30, 3),
(40, NULL, '管理员管理', 0, NULL, NULL, 0, 2),
(41, '/admin/admin/s_adm', '权限设置', 0, NULL, NULL, 40, 3),
(42, '/admin/admin/s_admlist', '管理员列表', 0, NULL, NULL, 40, 3),
(43, '/admin/admin/s_adminfo', '个人信息', 0, NULL, NULL, 40, 3),
(50, NULL, '系统管理', 0, NULL, NULL, 0, 2),
(51, '/admin/close/close', '关闭站点', 0, NULL, NULL, 50, 3);

CREATE TABLE `wedring_order` (
  `oid` char(32) NOT NULL,
  `uid` varchar(32) NOT NULL,
  `order_state` tinyint(4) NOT NULL COMMENT 'o待付款，1待发货，2已发货，3已收货',
  `text` varchar(255) DEFAULT '无备注',
  `total_price` varchar(32) NOT NULL,
  `tel` varchar(122) NOT NULL,
  `oaddress` varchar(200) NOT NULL,
  `fms` varchar(32) NOT NULL DEFAULT '未发货',
  `fmsnum` varchar(32) NOT NULL DEFAULT '未发货',
  `create_time` varchar(32) DEFAULT NULL,
  `update_time` varchar(32) DEFAULT '2017-07-28 16:27:17',
  `pay_state` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户订单表';

INSERT INTO `wedring_order` (`oid`, `uid`, `order_state`, `text`, `total_price`, `tel`, `oaddress`, `fms`, `fmsnum`, `create_time`, `update_time`, `pay_state`) VALUES
('20170728399130', '324236', 2, '', '41400', '13154385438', '廊坊省廊坊市廊坊村浪浪浪小区333 ', '未发货', '未发货', '2017-07-28 15:00:51', '2017-07-28 15:00:51', 1),
('20170728560382', '324236', 0, '', '19999', '13154385438', '廊坊省廊坊市廊坊村浪浪浪小区333 ', '未发货', '未发货', '2017-07-28 15:02:05', '2017-07-28 15:02:05', 0),
('20170728868273', '324235', 1, '', '106800', '15152698858', '河北省廊坊市京南第一县闷骚村222 ', '未发货', '未发货', '2017-07-28 14:52:46', '2017-07-28 14:52:46', 0),
('20170728955313', '324235', 2, '', '23300', '15152698858', '河北省廊坊市京南第一县闷骚村222 ', '未发货', '未发货', '2017-07-28 14:51:25', '2017-07-28 14:51:25', 1),
('20170728997747', '324236', 4, '', '12321', '13154385438', '廊坊省廊坊市廊坊村浪浪浪小区333 ', '未发货', '未发货', '2017-07-28 14:56:27', '2017-07-28 14:56:27', 1);

CREATE TABLE `wedring_order_address` (
  `id` int(11) NOT NULL,
  `uid` varchar(32) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postcode` varchar(32) NOT NULL,
  `create_time` varchar(32) NOT NULL DEFAULT '2017-07-28 16:27:17',
  `update_time` varchar(32) NOT NULL DEFAULT '2017-07-28 16:27:17'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户收货地址表';

INSERT INTO `wedring_order_address` (`id`, `uid`, `realname`, `tel`, `address`, `postcode`, `create_time`, `update_time`) VALUES
(1, '324235', '骚春阳', '15152698858', '河北省廊坊市京南第一县闷骚村222', '062500', '2017-07-28 14:43:41', '2017-07-28 14:43:41'),
(2, '324236', '一言不合就退群', '13154385438', '廊坊省廊坊市廊坊村浪浪浪小区333', '385438', '2017-07-28 14:56:22', '2017-07-28 14:56:22'),
(3, '324236', '123', '13212312312', '123123', '385438', '2017-07-28 14:57:27', '2017-07-28 14:57:27');

CREATE TABLE `wedring_order_goods` (
  `id` int(11) NOT NULL,
  `oid` varchar(32) NOT NULL,
  `gid` int(11) NOT NULL,
  `unit_price` varchar(32) NOT NULL,
  `order_count` int(32) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wedring_order_goods` (`id`, `oid`, `gid`, `unit_price`, `order_count`) VALUES
(1, '20170728955313', 5, '23300', 1),
(2, '20170728868273', 25, '28800', 1),
(3, '20170728868273', 23, '25700', 1),
(4, '20170728868273', 19, '26600', 1),
(5, '20170728868273', 16, '25700', 1),
(6, '20170728997747', 27, '12321', 1),
(7, '20170728399130', 1, '25700', 1),
(8, '20170728399130', 6, '15700', 1),
(9, '20170728560382', 24, '19999', 1);

CREATE TABLE `wedring_preserve` (
  `yangge` int(11) NOT NULL,
  `is_close` int(11) NOT NULL DEFAULT '0',
  `create_time` varchar(32) NOT NULL DEFAULT '2017-07-28 16:27:17',
  `update_time` varchar(32) NOT NULL DEFAULT '2017-07-28 16:27:17'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wedring_preserve` (`yangge`, `is_close`, `create_time`, `update_time`) VALUES
(1, 0, '2017-07-24 17:50:49', '2017-07-24 17:50:49');

CREATE TABLE `wedring_role` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wedring_role` (`id`, `name`, `pid`, `status`, `remark`) VALUES
(3, '店长', NULL, NULL, '拥有至高无上的权利,操作系统的所有权限'),
(2, '管理员', NULL, NULL, '拥有网站的系统大部分使用权限，没有权限管理功能。'),
(4, '撒旦', NULL, NULL, '阿斯达'),
(1, '员工', NULL, NULL, '普通员工，主要负责打印报表');

CREATE TABLE `wedring_role_user` (
  `role_id` mediumint(9) UNSIGNED DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wedring_role_user` (`role_id`, `user_id`) VALUES
(3, '1'),
(2, '2'),
(1, '3'),
(1, '22'),
(2, '27'),
(4, '29');

CREATE TABLE `wedring_suggest` (
  `id` int(11) NOT NULL,
  `uname` varchar(32) NOT NULL DEFAULT '不便透露',
  `stime` varchar(32) NOT NULL DEFAULT '2017-07-28 16:27:17',
  `email` varchar(32) NOT NULL,
  `contnet` varchar(500) NOT NULL,
  `is_rd` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `wedring_suggest` (`id`, `uname`, `stime`, `email`, `contnet`, `is_rd`) VALUES
(1, '刘春阳', '2017-07-20 12:01:48', '806065923@qq.com', '阳哥太帅了', 0),
(2, '不便透露', '2017-07-20 15:45:23', '806065923@qq.com', '何旭峰2222222', 1);

CREATE TABLE `wedring_user` (
  `id` int(12) NOT NULL,
  `tel` char(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` varchar(32) NOT NULL DEFAULT '2017-07-28 16:27:17',
  `update_time` varchar(32) NOT NULL DEFAULT '2017-07-28 16:27:17'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户登录注册表';

INSERT INTO `wedring_user` (`id`, `tel`, `email`, `password`, `create_time`, `update_time`) VALUES
(324235, NULL, '123@qq.com', '4297f44b13955235245b2497399d7a93', '2017-07-28 14:07:23', '2017-07-28 14:07:23'),
(324234, '123', '213213', '213123', '2017-07-21 17:54:44', '2017-07-21 17:54:44'),
(324236, '17600662353', NULL, '4297f44b13955235245b2497399d7a93', '2017-07-28 14:53:31', '2017-07-28 14:53:31');

CREATE TABLE `wedring_users` (
  `id` int(12) NOT NULL,
  `uid` int(12) NOT NULL COMMENT '用户注册时的id',
  `username` varchar(12) NOT NULL COMMENT '用户真实姓名',
  `nickname` varchar(32) NOT NULL COMMENT '用户昵称',
  `sex` int(11) NOT NULL DEFAULT '0',
  `image` varchar(300) NOT NULL COMMENT '用户头像',
  `tel` varchar(32) NOT NULL COMMENT '电话号码',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `create_time` varchar(32) NOT NULL DEFAULT '2017-07-28 16:27:17',
  `update_time` varchar(32) NOT NULL DEFAULT '2017-07-28 16:27:17',
  `is_stop` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户详情表';

INSERT INTO `wedring_users` (`id`, `uid`, `username`, `nickname`, `sex`, `image`, `tel`, `email`, `create_time`, `update_time`, `is_stop`) VALUES
(2, 121, '121', '121', 0, '1212', '121', '1211', '2017-07-21 16:17:31', '2017-07-21 16:17:31', 1),
(3, 121, '121', '121', 0, '1212', '121', '1211', '2017-07-21 16:17:39', '2017-07-21 16:17:39', 1),
(4, 121, '121', '121', 0, '1212', '121', '1211', '2017-07-21 16:17:49', '2017-07-21 16:17:49', 1),
(5, 121, '121', '121', 0, '1212', '121', '1211', '2017-07-21 16:17:55', '2017-07-21 16:17:55', 1),
(6, 121, '121', '121', 0, '1212', '121', '1211', '2017-07-21 16:18:04', '2017-07-21 16:18:04', 1),
(7, 123, '何旭峰', '233', 0, '2332', '2333', '2333@qq.com', '2017-07-21 16:18:28', '2017-07-21 16:18:28', 0),
(8, 123, '何旭峰', '233', 0, '2332', '2333', '2333@qq.com', '2017-07-21 16:18:34', '2017-07-21 16:18:34', 0),
(9, 123, '何旭峰', '233', 0, '2332', '2333', '2333@qq.com', '2017-07-21 16:18:41', '2017-07-21 16:18:41', 0);


ALTER TABLE `wedring_access`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wedring_cart`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wedring_collection`
  ADD PRIMARY KEY (`cid`);

ALTER TABLE `wedring_goods`
  ADD PRIMARY KEY (`gid`),
  ADD UNIQUE KEY `gid` (`gid`);

ALTER TABLE `wedring_goods_kind`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wedring_goods_nav`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wedring_goods_series`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wedring_liulan`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wedring_login`
  ADD PRIMARY KEY (`lid`);

ALTER TABLE `wedring_manage`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wedring_manage_sign`
  ADD PRIMARY KEY (`sid`);

ALTER TABLE `wedring_news`
  ADD PRIMARY KEY (`nid`);

ALTER TABLE `wedring_node`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`),
  ADD KEY `pid` (`pid`),
  ADD KEY `status` (`status`),
  ADD KEY `name` (`name`);

ALTER TABLE `wedring_order`
  ADD PRIMARY KEY (`oid`);

ALTER TABLE `wedring_order_address`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wedring_order_goods`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wedring_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `status` (`status`);

ALTER TABLE `wedring_role_user`
  ADD KEY `group_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `wedring_suggest`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wedring_user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wedring_users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `wedring_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `wedring_cart`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `wedring_collection`
  MODIFY `cid` int(12) NOT NULL AUTO_INCREMENT;
ALTER TABLE `wedring_goods`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
ALTER TABLE `wedring_goods_kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
ALTER TABLE `wedring_goods_nav`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `wedring_goods_series`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `wedring_liulan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
ALTER TABLE `wedring_manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
ALTER TABLE `wedring_manage_sign`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
ALTER TABLE `wedring_news`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
ALTER TABLE `wedring_node`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
ALTER TABLE `wedring_order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `wedring_order_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `wedring_role`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `wedring_suggest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `wedring_user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324237;
ALTER TABLE `wedring_users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
