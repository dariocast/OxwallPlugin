<?php

BOL_LanguageService::getInstance()->addPrefix('aaaplugin', 'AAA Plugin');

$sql = "CREATE TABLE `" . OW_DB_PREFIX . "aaaplugin_counter` (
    `userId` INT(11) NOT NULL,
    `likes` INT(20) NOT NULL,
    `stati` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`userId`)
)
ENGINE=MyISAM
ROW_FORMAT=DEFAULT";
 
OW::getDbo()->query($sql);