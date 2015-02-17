CREATE TABLE IF NOT EXISTS magicaster_access (
  id int(11) NOT NULL auto_increment,
  adminName varchar(256) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_accessCache (
  sessionId int(11) NOT NULL,
  accessId int(11) NOT NULL,
  granted timestamp NULL default NULL,
  PRIMARY KEY  (sessionId,accessId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_accessPublishWindow (
  id int(11) NOT NULL auto_increment,
  accessId int(11) NOT NULL,
  `start` datetime default NULL,
  `end` datetime default NULL,
  PRIMARY KEY  (id),
  KEY accessId (accessId)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_broadcastMessage (
  id int(11) NOT NULL auto_increment,
  channel varchar(255) NOT NULL,
  stamp timestamp NOT NULL default CURRENT_TIMESTAMP,
  `data` text NOT NULL,
  PRIMARY KEY  (id),
  KEY `type` (channel)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_client (
  id int(11) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_clientAccess (
  clientId int(11) NOT NULL,
  accessId int(11) NOT NULL,
  PRIMARY KEY  (clientId,accessId)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_counter (
  id varchar(255) NOT NULL,
  clientId int(11) NOT NULL default '0',
  `value` int(11) NOT NULL,
  updated timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (id,clientId),
  KEY `value` (`value`),
  KEY updated (updated)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_counterGraphNode (
  id varchar(255) NOT NULL,
  clientId int(11) NOT NULL default '0',
  stamp timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `value` int(11) NOT NULL,
  PRIMARY KEY  (id,clientId,`value`),
  KEY id (id),
  KEY clientId (clientId),
  KEY stamp (stamp)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_magicast (
  id int(11) NOT NULL auto_increment,
  adminName varchar(256) NOT NULL,
  `data` longtext NOT NULL,
  public tinyint(1) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_magicastBackup (
  id int(11) NOT NULL auto_increment,
  stamp timestamp NOT NULL default CURRENT_TIMESTAMP,
  magicastId int(11) NOT NULL,
  adminName varchar(255) collate utf8_unicode_ci NOT NULL,
  `data` longtext collate utf8_unicode_ci NOT NULL,
  public tinyint(1) NOT NULL,
  PRIMARY KEY  (id),
  KEY magicastId (magicastId)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_path (
  id int(11) NOT NULL auto_increment,
  adminName varchar(256) collate utf8_unicode_ci NOT NULL,
  weight int(11) NOT NULL,
  accessId int(11) default NULL,
  search varchar(255) collate utf8_unicode_ci NOT NULL,
  `data` text collate utf8_unicode_ci NOT NULL,
  seo text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (id),
  KEY accessId (accessId,search)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_searcher_keyword (
  id int(11) NOT NULL auto_increment,
  adminName varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_searcher_result (
  id int(11) NOT NULL auto_increment,
  adminName varchar(255) collate utf8_unicode_ci NOT NULL,
  accessId int(11) NOT NULL,
  `data` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (id),
  KEY accessId (accessId)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_searcher_resultSearcher_keyword (
  searcher_resultId int(11) NOT NULL,
  searcher_keywordId int(11) NOT NULL,
  PRIMARY KEY  (searcher_resultId,searcher_keywordId)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_session (
  id int(11) NOT NULL auto_increment,
  clientId int(11) NOT NULL,
  `key` char(32) collate utf8_unicode_ci NOT NULL,
  secret char(32) collate utf8_unicode_ci NOT NULL,
  ip char(15) collate utf8_unicode_ci NOT NULL,
  userAgent varchar(255) collate utf8_unicode_ci NOT NULL,
  browserCookie char(32) collate utf8_unicode_ci NOT NULL,
  `data` text collate utf8_unicode_ci NOT NULL,
  created timestamp NOT NULL default '0000-00-00 00:00:00',
  updated timestamp NULL default NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY `key` (`key`),
  KEY clientId (clientId),
  KEY updated (updated)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_sessionAccess (
  sessionId int(11) NOT NULL,
  accessId int(11) NOT NULL,
  granted timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  grantOrDeny tinyint(1) NOT NULL,
  PRIMARY KEY  (sessionId,accessId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_sessionCount (
  clientId int(11) NOT NULL,
  stamp timestamp NOT NULL default CURRENT_TIMESTAMP,
  `value` int(11) NOT NULL,
  PRIMARY KEY  (clientId,stamp),
  KEY stamp (stamp)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_UGC_context (
  id int(11) NOT NULL auto_increment,
  adminName varchar(256) collate utf8_unicode_ci NOT NULL,
  accessId int(11) default NULL,
  `name` varchar(256) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_UGC_item (
  id int(11) NOT NULL auto_increment,
  UGC_contextId int(11) NOT NULL,
  UGC_itemTypeId int(11) NOT NULL,
  UGC_sentItemId int(11) default NULL,
  published timestamp NOT NULL default CURRENT_TIMESTAMP,
  created timestamp NOT NULL default '0000-00-00 00:00:00',
  `data` longtext NOT NULL,
  PRIMARY KEY  (id),
  KEY published (published),
  KEY UGC_contextId (UGC_contextId)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_UGC_itemType (
  id int(11) NOT NULL auto_increment,
  adminName varchar(256) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_UGC_sentItem (
  id int(11) NOT NULL auto_increment,
  UGC_contextId int(11) NOT NULL,
  UGC_sentItemTypeId int(11) NOT NULL,
  UGC_itemId int(11) default NULL,
  `hash` char(32) collate utf8_unicode_ci default NULL,
  `data` longtext collate utf8_unicode_ci NOT NULL,
  created timestamp NOT NULL default CURRENT_TIMESTAMP,
  ip char(15) collate utf8_unicode_ci NOT NULL,
  clientId int(11) NOT NULL,
  browserCookie char(32) collate utf8_unicode_ci NOT NULL,
  moderated timestamp NOT NULL default '0000-00-00 00:00:00',
  deleted timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id),
  UNIQUE KEY `hash` (`hash`),
  KEY stamp (created),
  KEY UGC_contextId (UGC_contextId),
  KEY `type` (UGC_sentItemTypeId),
  KEY UGC_itemId (UGC_itemId)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS magicaster_UGC_sentItemType (
  id int(11) NOT NULL auto_increment,
  adminName varchar(256) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;