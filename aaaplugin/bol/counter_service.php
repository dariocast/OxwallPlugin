<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of counter_service
 *
 * @author darcas
 */
class AAAPLUGIN_BOL_CounterService {
    /*
     * Constructor
     */
    private function __construct() {
        
    }
    /*
     * Singleton instance
     * @var AAAPLUGIN_BOL_CounterService
     */
    private static $classInstance;
    
    /**
     * 
     * Returns an instance of class (singleton pattern implementation).
     *
     * @return AAAPLUGIN_BOL_CounterService
     */
    public static function getInstance() {
        if ( self::$classInstance === null )
        {
            self::$classInstance = new self();
        }
 
        return self::$classInstance;
    }
    
    public function getLikesCounter($userId) {
        return AAAPLUGIN_BOL_CounterDao::getInstance()->getLikes($userId);
    }
    
    public function addLikeToUser($userId,$qt) {
        AAAPLUGIN_BOL_CounterDao::getInstance()->addLike($userId, $qt);
    }
    public function addStatusIdToUser($userId,$id) {
        AAAPLUGIN_BOL_CounterDao::getInstance()->addStatusId($userId, $id);
    }
    
    public function getStatusIdList($userId) {
        return AAAPLUGIN_BOL_CounterDao::getInstance()->statusLikedIds($userId);
    }
}
