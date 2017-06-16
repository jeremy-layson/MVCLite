<?php

/**
 * Music model class
 *
 * @package music
 * @since 03. 18. 2017
 * @version 1.0
 */
class modelMusic extends modelCommon
{
    /**
     *
     * @var oModel
     */
    private static $oModel;

    /**
     *
     * @return oModel
     */
    public static function instance()
    {
        if (is_object(self::$oModel) === false) {

                self::$oModel = new self;
        }

        return self::$oModel;
    }

    
}

?>