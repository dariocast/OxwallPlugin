<?php

BOL_LanguageService::getInstance()->addPrefix('likecounter', 'Like Counter');
OW::getLanguage()->importPluginLangs(OW::getPluginManager()->getPlugin('likecounter')->getRootDir().'langs.zip', 'likecounter');