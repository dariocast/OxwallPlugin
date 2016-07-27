<?php

$widgetService = BOL_ComponentAdminService::getInstance();
 
$widget = $widgetService->addWidget('LIKECOUNTER_CMP_Likes', true);
$widgetPlace = $widgetService->addWidgetToPlace($widget, BOL_ComponentService::PLACE_PROFILE);
$widgetService->addWidgetToPosition($widgetPlace, BOL_ComponentService::SECTION_LEFT, 1);

$widgetLevel = $widgetService->addWidget('LIKECOUNTER_CMP_Level', true);
$widgetPlaceLevel = $widgetService->addWidgetToPlace($widgetLevel, BOL_ComponentService::PLACE_PROFILE);
$widgetService->addWidgetToPosition($widgetPlaceLevel, BOL_ComponentService::SECTION_LEFT, 0);
