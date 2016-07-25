<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of counter
 *
 * @author darcas
 */
class AAAPLUGIN_BOL_Counter extends OW_Entity {
    /*
     * id dell'utente
     * @var int
     */
    public $userId;
    /*
     * numero di like
     * @var int
     */
    public $likes;
    /*
     * lista degli Id degli stati
     * @var String
     */
    public $stati;
}
