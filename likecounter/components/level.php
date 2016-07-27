<?php

/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 27/07/2016
 * Time: 10:03
 */
class LIKECOUNTER_CMP_Level extends BASE_CLASS_Widget
{
    private $myLevel;
    private $userId;
    private $likes;
    private $surfer;

    public function __construct(BASE_CLASS_WidgetParameter $paramObject)
    {
        parent::__construct();

        //user id
        $this->userId =  $paramObject->additionalParamList['entityId']; //OW::getUser()->getId();

        $this->myLevel = 0;
        $this->surfer = new LIKECOUNTER_CLASS_Surfer();
        $this->likes = $this->surfer->getLikes($this->userId);

        if ( $this->likes === null )
        {
            $this->setVisible(false);
        }
        else
        {
            switch ($this->likes)
            {
                case 1:
                    $this->myLevel = "1";
                    break;
                case 2:
                    $this->myLevel = "2";
                    break;
                case 3:
                    $this->myLevel = "3";
                    break;
                case 4:
                    $this->myLevel = "4";
                    break;
                case 5:
                    $this->myLevel = "5";
                    break;
                default:
                    $this->myLevel = "Max Level";
            }
        }
    }

    public static function getStandardSettingValueList() // If you redefine this method, you will be able to set default values for the standard widget settings.
    {
        return array(
            self::SETTING_TITLE => 'Livello utente',
            self::SETTING_SHOW_TITLE => true,
            self::SETTING_ICON => self::ICON_HEART
        );

    }

    public function onBeforeRender()
    {
        $this->assign('level',$this->myLevel);
    }
}