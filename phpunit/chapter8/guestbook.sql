

CREATE TABLE `guestbook` (
    `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
    `content` varchar(40) NOT NULL COMMENT '内容',
    `user` varchar(40) NOT NULL COMMENT '用户名',
    `created` int unsigned NOT NULL COMMENT '时间',
    PRIMARY KEY (`id`)
)ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_unicode_ci;
