<?php

$widgetService = BOL_ComponentAdminService::getInstance();
 
$widget = $widgetService->addWidget('AAAPLUGIN_CMP_Prova', true);
$widgetPlace = $widgetService->addWidgetToPlace($widget, BOL_ComponentService::PLACE_PROFILE);
$widgetService->addWidgetToPosition($widgetPlace, BOL_ComponentService::SECTION_LEFT, 0);