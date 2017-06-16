<?php

/**
 * Account model class
 *
 * @package account
 * @since 03. 28. 2017
 * @version 1.0
 */
class modelAccount extends modelCommon
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

    /**
     * Create a new account record
     *
     * @param Array aData
     */
    public function createAccount($aData)
    {
        $prepared = mysqli_prepare($this->dbConn, "INSERT INTO `user` VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, '0', 'default.png')");
        $prepared->bind_param('ssssssss', $aData['uName'], $aData['uUserName'], $aData['uPassword'], $aData['uEmail'], $aData['uActivated'], date('Y-m-d h:i:s'), date('Y-m-d h:i:s'), $aData['uType']);
        $prepared->execute();
    }

    /**
     * Update an existing record
     *
     * @param Array aData
     */
    public function updateAccount($aData)
    {
        $prepared = mysqli_prepare($this->dbConn, "UPDATE user SET u_name = ?, u_password = ?, u_email = ?, u_type = ? WHERE u_id = ?");
        $prepared->bind_param('sssss', $aData['uName'], $aData['uPassword'], $aData['uEmail'], $aData['uType'], $aData['u_id']);
        $prepared->execute();
    }

    /**
     * Get account information for various purpose
     *
     * @param String sId
     * @return Array
     */
    public function getAccount($sId)
    {
        $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM user WHERE (u_username = ? OR u_id = ?) AND u_deleted = 0 LIMIT 1");
        $prepared->bind_param('ss', $sId, $sId);
        $prepared->execute();
        
        $result = $prepared->get_result();
        
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    /**
     * Get account list
     *
     * @param String search
     * @param String offset
     * @return Array
     */
    public function getAccounts($search, $offset)
    {
        $aList = [];
        $offset = $offset * 20;

        if ($search === false) {
            $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM user WHERE u_deleted = 0 LIMIT 20 OFFSET ?");
            $prepared->bind_param('s', $offset);
        } else {
            $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM user WHERE (u_name LIKE ? OR u_username LIKE ?) AND u_deleted = 0 LIMIT 20 OFFSET ?");
            $search = '%' . $search . '%';
            $prepared->bind_param('sss', $search, $search, $offset);
        }
        
        $prepared->execute();
        
        $result = $prepared->get_result();
        
        while ($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $aList[] = $row;
        }

        $prepared->close();
        
        return $aList;
    }

    /**
     * Activate/Deactivate an account
     *
     * @param String id
     * @param String value
     */
    public function activateAccount($id, $value)
    {
        $prepared = mysqli_prepare($this->dbConn, "UPDATE user SET u_activated = ? WHERE u_id = ?");
        $prepared->bind_param('ss', $value, $id);
        $prepared->execute();

        return $value;
    }
}
?>