/*
Target Server Type    : MYSQL
Target Server Version : 50735
File Encoding         : 65001

Date: 2021-09-28 11:29:00

Created By: Jason Stoyles for the purpose of storing popular PHP repos from Github
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `github_popular_php_repos`
-- ----------------------------
DROP TABLE IF EXISTS `github_popular_php_repos`;
CREATE TABLE `github_popular_php_repos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `github_id` int(11) NOT NULL,
  `github_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `github_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `github_created_date` datetime NOT NULL,
  `github_last_published_date` datetime NOT NULL,
  `github_description` text CHARACTER SET utf8mb4 NOT NULL,
  `github_star_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
