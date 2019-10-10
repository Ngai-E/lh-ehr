CREATE TABLE IF NOT EXISTS `form_pews_score` (
  `id` bigint(20) NOT NULL auto_increment,
  `date` datetime,
  `pid` bigint(20) DEFAULT NULL,
  `encounter` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `groupname` varchar(255) DEFAULT NULL,
  `authorized` tinyint(4) DEFAULT NULL,
  `activity` tinyint(4) DEFAULT NULL,
  `pews_behavior` tinyint(4) DEFAULT NULL,
  `pews_card` tinyint(4) DEFAULT NULL,
  `pews_resp` tinyint(4) DEFAULT NULL,
  `pews_total` tinyint(4) DEFAULT NULL , 
  `pews_interventions` text ,
  `pews_disposition` text,
  PRIMARY KEY (id)
) ENGINE=InnoDB;