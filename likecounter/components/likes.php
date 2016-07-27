<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of likes.php
 * @author darcas
 */
class LIKECOUNTER_CMP_Likes extends BASE_CLASS_Widget{
    private $myLikeAmount;
    private $newsfeedService;
    private $surfer;
    private $userId;
    private $likesOnMyActions;

    public function __construct(BASE_CLASS_WidgetParameter $paramObject) {
        parent::__construct();
        
        //service del plugin newsfeed
        $this->newsfeedService = NEWSFEED_BOL_Service::getInstance();

        //user id
        $this->userId = $paramObject->additionalParamList['entityId']; //OW::getUser()->getId();

        //trovo i like dell'utente
        $this->myLikeAmount = count($this->newsfeedService->findUserLikes($this->userId));

        $this->surfer = new LIKECOUNTER_CLASS_Surfer();
        $this->likesOnMyActions = $this->surfer->getLikes($this->userId);
        //tutte le azioni dell'utente
        /*$actions = $this->newsfeedService->findActionsByUserId($this->userId);
        $this->likesOnMyActions = 0;
        foreach ($actions as $action){
            $aLike = $this->newsfeedService->findEntityLikes($action->entityType, $action->entityId);
            $this->likesOnMyActions += count($aLike);
        }

        OW::getSession()->set('likes',$this->likesOnMyActions);*/
    }
    
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
        $this->assign('testoMyLikes', $this->text('likecounter','label_testo_my_likes'));
        $this->assign('like', $this->myLikeAmount);
        $this->assign('testoOtherLikes', $this->text('likecounter','label_testo_other_likes'));
        $this->assign('counter',$this->likesOnMyActions);
    }

    private function text( $prefix, $key, array $vars = null )
    {
        return OW::getLanguage()->text($prefix, $key, $vars);
    }
    
    
}
