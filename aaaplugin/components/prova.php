<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of prova.php
 * @author darcas
 */
class AAAPLUGIN_CMP_Prova extends BASE_CLASS_Widget{
    private $testo;
    private $like;
    private $newsfeedService;
    private $counterService;
    private $counter;
    private $userId;
    private $lastStatus;
    private $idList;
    
    public function __construct(BASE_CLASS_WidgetParameter $paramObject) {
        parent::__construct();
        
        //service x info dal db riguardo agli stati postati
        $this->newsfeedService = NEWSFEED_BOL_Service::getInstance();
        //service x counter dei like
        $this->counterService = AAAPLUGIN_BOL_CounterService::getInstance();
        //user id
        $this->userId = $paramObject->additionalParamList['entityId'];
        $this->like = $this->newsfeedService->findUserLikes($this->userId);
        $this->lastStatus = $this->newsfeedService->findStatusDto('user', $this->userId);
        $this->counterService->addStatusIdToUser($this->userId, $this->lastStatus->getId());
        $this->idList = $this->counterService->getStatusIdList($userId);
        foreach ($this->idList as $id) {
            $this->counterService->addLikeToUser($this->userId, count($this->newsfeedService->findEntityLikes('user-status', $id)));
        }
        
        
        $this->counter = $this->counterService->getLikesCounter($this->userId);
        
        
        
        $params = $paramObject->customParamList;
        if ( !empty($params['testo']) )
        {
            $this->testo = $paramObject->customizeMode && !empty($_GET['disable-js']) ? UTIL_HtmlTag::stripJs($params['testo']) : $params['testo'];
        }
    }
    
    public static function getSettingList() 
    {
        $settingList = array(
            'testo' => array(
                'presentation' => self::PRESENTATION_TEXT, // Field type
                'label' => 'Inserisci testo',
                'value' => 'Numero di likes:'
            )
        );
 
        return $settingList;
    }
    
    /*public static function processSettingList($settingList, $place, $isAdmin) {
        
        if (isset($settingList['testo'])) {
            $settings['testo'] = UTIL_HtmlTag::sanitize($settings['testo']);
        }

        return $settings;
    }*/
    
    public static function getStandardSettingValueList() // If you redefine this method, you will be able to set default values for the standard widget settings. 
    {
        return array(
            self::SETTING_TITLE => 'Likes',
            self::SETTING_SHOW_TITLE => true,
            self::SETTING_ICON => self::ICON_HEART
        );
        
    }
    
    public static function getAccess()
    {
        return self::ACCESS_ALL;
    }
    
    public function onBeforeRender()
    {
        $this->assign('testo', $this->testo);
        $this->assign('like', count($this->like));
        $this->assign('nuovoTesto', 'Like Ricevuti');
        $this->assign('counter',$counter->likes);
    }
    
    
}
