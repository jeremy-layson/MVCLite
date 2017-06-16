<?php

/**
 * model common class
 *
 * @package music
 * @since 03. 10. 2017
 * @version 1.0
 */
class modelCommon
{
    /**
     * @var mySQL Connection
     */
    protected $dbConn;

    /**
     * create the sql connection
     */
    protected function __construct()
    {
        require('connection.php');
        $this->dbConn = $db;
    }

    public function closeConn()
    {
        mysqli_close($this->dbConn);
    }
}

?>