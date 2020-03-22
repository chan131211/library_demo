/*
 Navicat MySQL Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost:3306
 Source Schema         : library

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 22/03/2020 22:52:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'chan', '4297f44b13955235245b2497399d7a93');

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bookName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bookCode` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bookStock` int(10) UNSIGNED NOT NULL,
  `bookType` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `author` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bookInfo` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES (1, '史记', '11111111', 1, '历史', '小白', '中国历史源远流长，博大精深', '2020-03-21 17:07:16');
INSERT INTO `book` VALUES (4, '红楼梦', '11111113', 10, '国学古籍', '曹雪芹', '红楼梦》又名《石头记》《金玉缘》，以贾、王、史、薛四大家族背景，以贾宝玉和林黛玉的爱情故事为主线，围绕两个主要人物的感情纠葛，描写了大观园内外一系列青年男女的爱情故事。', '2020-03-21 20:39:10');
INSERT INTO `book` VALUES (6, '都挺好', '11111114', 1, '其他', '阿耐', ' 一个从小不受家人待见的女孩苏明玉，在孤独扭曲的环境中长大成人，通过自己的努力获得成功，却在无法割舍的亲情之下，被迫一次又一次面对那个曾抛弃自己的家庭，伸出援手。给伤害过自己的人以温暖，给羞辱过自己的人以希望。苏明玉，也在这种煎熬与纠结之中，了解了亲情的本质和血脉的力量……', '2020-03-21 20:42:27');
INSERT INTO `book` VALUES (7, '为人三会', '11111115', 11, '政治军事', ' 端木自在', ' 一个人的做人方式会在说话办事中得以体现，同样的，一个人的说话风格和办事水平也彰显出做人的风范和修养。会说话、会办事的人，在做人上必定领先一步，这样的人是成熟的、有魅力的，受人欢迎。而不会说话、办事能力差的人，在做人上便会稍逊一筹，这样的人是不成熟的、缺乏魅力的，令人反感。', '2020-03-21 20:43:40');
INSERT INTO `book` VALUES (8, '狼道全集', '11111116', 25, '心理学', '猎夫', '狼的生存，就是在恶劣的环境中坚强地创造生存空间；狼的团体，就是在充满争斗的对手中组织强大的团队力量；狼的智慧，就是在强者之列不断竞争、超越。狼以顽强的生命力，与天斗、与地斗、与人斗，在生存环境越来越恶劣的情况下，仍然傲立于世。', '2020-03-21 20:45:24');
INSERT INTO `book` VALUES (9, '人性的弱点大全集', '11111117', 8, '哲学宗教', '戴尔·卡耐基', '1937年出版的《人性的弱点》一夜轰动，在世界各地至少被译成58种文字，全球总销售量已达9000余万册，拥有4亿读者，除《圣经》之外，无出其右者，稳居成功励志类图书榜首。', '2020-03-21 20:46:27');
INSERT INTO `book` VALUES (11, '活法全书', '11111119', 7, '文化', '陈妙龄', '《活法全书》分为三篇30个章节，分别是：上篇——发现生命的喜悦：中篇——寻求成功的道路；下篇——走向心灵的回归。', '2020-03-21 20:48:27');
INSERT INTO `book` VALUES (14, 'imooc ', '11111121', 150, '其他', '小明', '这是一个添加功能的测试！', '2020-03-22 21:49:59');
INSERT INTO `book` VALUES (15, 'test', '11111122', 1, '其他', '图图', '这是一个修改成功的例子！', '2020-03-22 22:01:12');
INSERT INTO `book` VALUES (16, 'test2', '11111123', 1, '历史', '张三', '测试图书管理系统功能！', '2020-03-22 22:03:20');
INSERT INTO `book` VALUES (17, '浮生若梦', '11111124', 1, '心理学', '李四', '测试图书管理系统功能！', '2020-03-22 22:04:06');
INSERT INTO `book` VALUES (18, '浮生若梦2', '11111125', 1, '国学古籍', '王五', '测试图书管理系统功能！', '2020-03-22 22:04:34');
INSERT INTO `book` VALUES (19, '浮屠', '11111126', 1, '哲学宗教', '赵六', '测试图书管理系统功能！', '2020-03-22 22:04:58');
INSERT INTO `book` VALUES (20, '西游记', '11111127', 1, '社会科学', '张四', '测试图书管理系统功能！', '2020-03-22 22:05:35');
INSERT INTO `book` VALUES (21, '新西游记', '11111128', 1, '文化', '李三', '测试图书管理系统功能！', '2020-03-22 22:05:56');
INSERT INTO `book` VALUES (22, '红楼梦番外篇', '11111129', 1, '法律', '李一', '测试图书管理系统功能！', '2020-03-22 22:06:32');
INSERT INTO `book` VALUES (23, '射雕英雄传', '11111130', 1, '其他', '金庸', '测试图书管理系统功能！', '2020-03-22 22:07:33');

SET FOREIGN_KEY_CHECKS = 1;
