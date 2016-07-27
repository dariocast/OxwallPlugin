<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 27/07/2016
 * Time: 12:20
 */

class LIKECOUNTER_CLASS_Surfer
{

    private $likes;
    private $service;
    public function __construct()
    {
        $this->service = NEWSFEED_BOL_Service::getInstance();
    }

    public function getLikes($userId)
    {
        $actions = $this->service->findActionsByUserId($userId);
        $this->likes = 0;
        foreach ($actions as $action){
            $aLike = $this->service->findEntityLikes($action->entityType, $action->entityId);
            $this->likes += count($aLike);
        }
        return $this->likes;
    }


}