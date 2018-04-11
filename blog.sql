-- phpMyAdmin SQL Dump
-- version 4.7.0-beta1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-04-11 08:55:48
-- 服务器版本： 5.5.53
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_admin`
--

CREATE TABLE `tp_admin` (
  `id` smallint(6) NOT NULL,
  `username` varchar(30) NOT NULL COMMENT '管理员名称',
  `password` char(32) NOT NULL COMMENT '管理员密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_admin`
--

INSERT INTO `tp_admin` (`id`, `username`, `password`) VALUES
(1, '小卢', '123456'),
(2, 'aaaaaaa', '0913e65f537d8cb6ee740aea0a5089bd'),
(4, 'admin', '111'),
(6, 'rfdsf', '1131156'),
(7, 'hjhjh', '156151'),
(9, 'dalao', '111111222'),
(13, '561561', 'fsd fsd f');

-- --------------------------------------------------------

--
-- 表的结构 `tp_article`
--

CREATE TABLE `tp_article` (
  `id` mediumint(9) NOT NULL COMMENT '文章id',
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `author` varchar(30) NOT NULL COMMENT '文章作者',
  `desc` varchar(255) NOT NULL COMMENT '文章简介',
  `keywords` varchar(255) NOT NULL COMMENT '文章关键词',
  `content` text NOT NULL COMMENT '文章内容',
  `pic` varchar(100) NOT NULL COMMENT '缩略图',
  `click` int(10) NOT NULL DEFAULT '0' COMMENT '点击数',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不推荐 1：推荐',
  `time` int(10) NOT NULL COMMENT '发布时间',
  `cateid` mediumint(9) NOT NULL COMMENT '所属栏目'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_article`
--

INSERT INTO `tp_article` (`id`, `title`, `author`, `desc`, `keywords`, `content`, `pic`, `click`, `state`, `time`, `cateid`) VALUES
(18, '我是网络的文章', 'erwerwe', '我是网络的文章我是网络的文章我是网络的文章我是网络的文章', '网络，第一篇', '<p>我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章我是网络的第一篇文章</p>', 'default.png', 134, 1, 1521259430, 11),
(13, 'dfasdf', 'dfsdaf', 'dsfsdaf', 'dfasdf', '<p>dfsad fasd</p>', '20180315\\a9c04ae97ff278f719fd9aba8c18831f.jpg', 20, 0, 1521094126, 10),
(14, '地方撒地方', '浮点数', '地方df', '的是非得失', '<p>地方多少分</p>', '20180316\\b2753fb93e3e5b44963a718c4e4d005f.jpg', 1, 1, 1521170441, 14),
(19, '415615151', 'f23d1', '我是操作系统的文章我是操作系统的文章我是操作系统的文章我是操作系统的文章', '操作系统，第一篇', '<p>我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章我是操作系统的第一篇文章</p>', 'default.png', 4, 1, 1521259533, 12),
(17, 'e 绕弯儿翁rwe', '人味儿群翁r', '二维认为', '而且翁任务', '<p>额人情味认为</p>', '20180316\\d04efb2121d6a2c7abe31ae5e5b7b21f.jpg', 2, 1, 1521189177, 14),
(20, '为 东方闪电', ' 辅导费', '水电费as发送端发送到发送到发送到发送端方式的', '未分类，文章', '<p>我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章我是未分类的文章</p>', 'default.png', 5, 0, 1521259594, 0),
(21, 'fd sfds', 'fd fds', '这里是简介啊这里是简介啊这里是简介啊这里是简介啊这里是简介啊这里是简介啊这里是简介啊这里是简介啊', 'df dfds ', '<p>这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊这里是内容啊</p>', 'default.png', 1, 1, 1521279205, 12),
(22, '分段个', '法的', ' 发的发的法法是打发打发的 ', '分段分段', '<p><img src=\"/ueditor/php/upload/image/20180317/1521279366.jpg\" title=\"1521279366.jpg\" alt=\"qrcode_for_gh_cb9fc8701040_258.jpg\"/></p><pre class=\"brush:php;toolbar:false\">&lt;?php\r\n\r\n&nbsp;echo&nbsp;&quot;11111&quot;\r\n&nbsp;?&gt;</pre><p>法的是非得失浮点数分段分段分段浮点数发送端分段法法f</p><p><img src=\"http://img.baidu.com/hi/jx2/j_0002.gif\"/></p>', '20180317\\9aafc3cdf79c6ca6416e6e9ad180e967.jpg', 9, 1, 1521279446, 0),
(23, 'linux操作系统', 'mclink', '这是搞笑的一篇文章哦', 'linux，系统，Fun', '<p>我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，我说过，这是一篇十分搞笑的文章，</p>', 'default.png', 2, 1, 1522383847, 12);

-- --------------------------------------------------------

--
-- 表的结构 `tp_auth_group`
--

CREATE TABLE `tp_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_auth_group`
--

INSERT INTO `tp_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1, '超级管理员', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13'),
(2, '链接管理员', 1, '6,11,12,13'),
(3, '文章管理员', 1, '3,4,5,7');

-- --------------------------------------------------------

--
-- 表的结构 `tp_auth_group_access`
--

CREATE TABLE `tp_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_auth_group_access`
--

INSERT INTO `tp_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1),
(2, 2),
(4, 2),
(6, 2),
(7, 2),
(9, 2),
(13, 3);

-- --------------------------------------------------------

--
-- 表的结构 `tp_auth_rule`
--

CREATE TABLE `tp_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_auth_rule`
--

INSERT INTO `tp_auth_rule` (`id`, `name`, `title`, `type`, `status`, `condition`) VALUES
(1, 'admin/add', '增加管理员', 1, 1, ''),
(2, 'admin/del', '删除管理员', 1, 1, ''),
(3, 'article/add', '文章添加', 1, 1, ''),
(4, 'article/del', '文章删除', 1, 1, ''),
(5, 'article/edi', '文章修改', 1, 1, ''),
(6, 'links/add', '链接添加', 1, 1, ''),
(7, 'article/lst', '文章管理', 1, 1, ''),
(8, 'Cate/lst', '栏目管理', 1, 1, ''),
(9, 'admin/lst', '管理员管理', 1, 1, ''),
(10, 'admin/edi', '修改管理员', 1, 1, ''),
(11, 'Links/edi', '链接修改', 1, 1, ''),
(12, 'Links/del', '链接删除', 1, 1, ''),
(13, 'Links/lst', '链接管理', 1, 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `tp_cate`
--

CREATE TABLE `tp_cate` (
  `id` mediumint(9) NOT NULL COMMENT '栏目id',
  `catename` varchar(30) NOT NULL COMMENT '栏目名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_cate`
--

INSERT INTO `tp_cate` (`id`, `catename`) VALUES
(10, '编程语言'),
(11, '网络'),
(12, '操作系统'),
(14, '影视'),
(0, '未分类');

-- --------------------------------------------------------

--
-- 表的结构 `tp_links`
--

CREATE TABLE `tp_links` (
  `id` mediumint(9) NOT NULL COMMENT '链接id',
  `title` varchar(30) NOT NULL COMMENT '链接标题',
  `url` varchar(60) NOT NULL COMMENT '链接地址',
  `desc` varchar(255) NOT NULL COMMENT '链接说明'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_links`
--

INSERT INTO `tp_links` (`id`, `title`, `url`, `desc`) VALUES
(1, '百度', 'http://www.baidu.com', '百度网'),
(3, '慕课网', 'http://www.imooc.com', ''),
(6, '解决', 'http://www.yzmedu.com', '合同谈判'),
(5, 'mclink技术官网', 'http://123.207.234.115/index.php', '我的个人网站');

-- --------------------------------------------------------

--
-- 表的结构 `tp_tags`
--

CREATE TABLE `tp_tags` (
  `id` mediumint(9) NOT NULL COMMENT 'tag标签id',
  `tagname` varchar(30) NOT NULL COMMENT 'tag标签名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_tags`
--

INSERT INTO `tp_tags` (`id`, `tagname`) VALUES
(1, '趣事'),
(2, '奇闻2'),
(4, '测试');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_admin`
--
ALTER TABLE `tp_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_article`
--
ALTER TABLE `tp_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_auth_group`
--
ALTER TABLE `tp_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_auth_group_access`
--
ALTER TABLE `tp_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `tp_auth_rule`
--
ALTER TABLE `tp_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tp_cate`
--
ALTER TABLE `tp_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_links`
--
ALTER TABLE `tp_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_tags`
--
ALTER TABLE `tp_tags`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tp_admin`
--
ALTER TABLE `tp_admin`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `tp_article`
--
ALTER TABLE `tp_article`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章id', AUTO_INCREMENT=24;
--
-- 使用表AUTO_INCREMENT `tp_auth_group`
--
ALTER TABLE `tp_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `tp_auth_rule`
--
ALTER TABLE `tp_auth_rule`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `tp_cate`
--
ALTER TABLE `tp_cate`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '栏目id', AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `tp_links`
--
ALTER TABLE `tp_links`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '链接id', AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `tp_tags`
--
ALTER TABLE `tp_tags`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT 'tag标签id', AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
