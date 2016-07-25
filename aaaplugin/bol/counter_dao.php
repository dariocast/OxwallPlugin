<?php

class AAAPLUGIN_BOL_CounterDao extends OW_BaseDao {
    //constructor
    protected function __construct()
    {
        parent::__construct();
    }
    /**
     * Singleton instance.
     *
     * @var AAAPLUGIN_BOL_CounterDao
     */
    private static $classInstance;
 
    /**
     * Returns an instance of class (singleton pattern implementation).
     *
     * @var AAAPLUGIN_BOL_CounterDao
     */
    public static function getInstance()
    {
        if ( self::$classInstance === null )
        {
            self::$classInstance = new self();
        }
 
        return self::$classInstance;
    }
 
    /**
     * @see OW_BaseDao::getDtoClassName()
     *
     */
    public function getDtoClassName()
    {
        return 'AAAPLUGIN_BOL_Counter';
    }
 
    /**
     * @see OW_BaseDao::getTableName()
     *
     */
    public function getTableName()
    {
        return OW_DB_PREFIX . 'aaaplugin_counter';
    }
    
    public function getLikes($userId)
    {
        $example = new OW_Example();
        $example->andFieldEqual('userId', $userId);
        $count = $this->findObjectByExample($example);
        return $count->likes;
    }
    
    public function addLike($userId,$qt)
    {
        $example = new OW_Example();
        $example->andFieldEqual('userId', $userId);
        $count = $this->findObjectByExample($example);
        $count->likes += $qt;
        $this->save($count);        
    }
    public function addStatusId($userId,$id)
    {
        $example = new OW_Example();
        $example->andFieldEqual('userId', $userId);
        $count = $this->findObjectByExample($example);
        $count->stati .= ' '.$id;
        $this->save($count); 
    }
    
    public function statusLikedIds($userId)
    {
        $example = new OW_Example();
        $example->andFieldEqual('userId', $userId);
        $count = $this->findObjectByExample($example);
        return explode(' ',$count->stati);
    }
    
    
}

