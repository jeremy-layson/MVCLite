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

    /**
     * create a new record of music
     *
     * @param Array aData
     */
    public function createMusic($aData)
    {
        $prepared = mysqli_prepare($this->dbConn, "INSERT INTO music VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 0)");
        $prepared->bind_param('ssssssssss', $aData['current_user']['u_id'], $aData['mTitle'], $aData['mDesc'], $aData['mSinger'], $aData['mCover'], $aData['mAudio'], $aData['mVideo'], $aData['mGenre'], date('Y-m-d h:i:s'), date('Y-m-d h:i:s'));
        $prepared->execute();
    }

    /**
     * modifies an existing music
     *
     * @param aData aData
     */
    public function updateMusic($aData)
    {
        $prepared = mysqli_prepare($this->dbConn, "UPDATE music SET m_title = ?, m_description = ?, m_singers = ?, m_cover = ?, m_music_file = ?, m_video_embed = ?, m_genre = ?, m_updated = ? WHERE m_id = ?");
        $prepared->bind_param('sssssssss',
            $aData['mTitle'],
            $aData['mDesc'],
            $aData['mSinger'],
            $aData['mCover'],
            $aData['mAudio'],
            $aData['mVideo'],
            $aData['mGenre'],
            date('Y-m-d h:i:s'),
            $aData['id']);
        $prepared->execute();
    }

    /**
     * soft deletes a music
     *
     * @param String sID 
     */
    public function deleteMusic($sID)
    {
        $prepared = mysqli_prepare($this->dbConn, "UPDATE music set m_deleted = 1 where m_id = ?");
        $prepared->bind_param('s', $sID);
        $prepared->execute();

    }

    /**
     * restore soft-deleted music
     *
     * @param String sID 
     */
    public function restoreMusic($sID)
    {

    }

    /**
     * Activate/Deactivate a music
     *
     * @param String id
     * @param String value
     */
    public function activateMusic($id, $value)
    {
        $prepared = mysqli_prepare($this->dbConn, "UPDATE music SET m_approved = ? WHERE m_id = ?");
        $prepared->bind_param('ss', $value, $id);
        $prepared->execute();

        return $value;
    }

    /**
     * get all music sorted by genre
     *
     * @return Array aList
     */
    public function getMusicByAllGenre()
    {
        $aList = [];

        $sQuery = "SELECT * FROM music WHERE m_approved = 1 and m_deleted = 0 ORDER BY m_uploaded desc, m_genre";
        $aResult = mysqli_query($this->dbConn, $sQuery);
        while ($row = mysqli_fetch_array($aResult, MYSQLI_ASSOC)) {
            if (isset($aList[$row['m_genre']]) === false || count($aList[$row['m_genre']]) < 3) {
                $aList[$row['m_genre']][] = $row;
            }
        }

        return $aList;
    }
	
	/**
     * get all music of the same genre
     *
     * @return Array aList
     */
    public function getMusicByGenre($sGenre)
    {
		$aList = [];
        $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM music WHERE m_genre = ? AND m_approved = 1 AND m_deleted = 0  ORDER BY rand()");
        $prepared->bind_param('s', $sGenre);
        $prepared->execute();
		
		$result = $prepared->get_result();
		
		while ($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $aList[] = $row;
        }

        return $aList;
    }

    /**
     * search music by parameter
     *
     * @return Array aList
     */
    public function searchMusic($sSearch)
    {
        $aList = [];
        $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM music WHERE m_title LIKE ? OR m_description LIKE ? OR m_genre LIKE ? AND m_approved = 1 AND m_deleted = 0  ORDER BY rand()");
        $sSearch = '%' . $sSearch . '%';
        $prepared->bind_param('sss', $sSearch, $sSearch, $sSearch);
        $prepared->execute();
        
        $result = $prepared->get_result();
        
        while ($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $aList[] = $row;
        }

        return $aList;
    }

    /**
     * getter for single music
     *
     * @param String sId
     * @return Mixed Array or Boolean
     */
    public function getSpecificMusic($sId)
    {
        $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM music WHERE m_id = ? AND m_approved = 1 AND m_deleted = 0  LIMIT 1");
        $prepared->bind_param('s', $sId);
        $prepared->execute();
        
        $result = $prepared->get_result();

        $aReturn = $result->fetch_array(MYSQLI_ASSOC);
        
        return $aReturn;
    }

    /**
     * Add a new music stats
     *
     * @param String sId
     */
    public function createStats($sId)
    {
        $prepared = mysqli_prepare($this->dbConn, "INSERT INTO stats VALUES(NULL, ?, ?)");
        $prepared->bind_param('ss', $sId , date('Y-m-d h:i:s'));
        $prepared->execute();
    }

    /**
     * get the rankings
     */
    public function getHot()
    {
        $aList = [];
        $prepared = mysqli_prepare($this->dbConn, "SELECT count(s_id) as count, s_music FROM `stats` GROUP BY s_music ORDER by count(s_id) DESC");
        $prepared->execute();
        
        $result = $prepared->get_result();
        
        while ($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            if (count($aList) >= 12) {
                break;
            }
            
            $aMusic = $this->getSpecificMusic($row['s_music']);

            if (count($aMusic) !== 0) {
                $aList[] = $aMusic;
            }
        }
        

        return $aList;
    }

    /**
     * get suggestions
     */
    public function getSuggestion($sGenre, $sExcept)
    {
        $aList = [];
        $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM music WHERE m_genre = ? AND m_id != ? AND m_approved = 1 AND m_deleted = 0 ORDER BY rand() LIMIT 4");
        $prepared->bind_param('ss', $sGenre, $sExcept);
        $prepared->execute();
        
        $result = $prepared->get_result();
        
        while ($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $aList[] = $row;
        }

        return $aList;
    }

    /**
     * Get music list
     *
     * @param String search
     * @param String offset
     * @return Array
     */
    public function getAdminMusic($search, $offset)
    {
        $aList = [];
        $offset = $offset * 20;

        if ($search === false) {
            $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM music WHERE m_deleted = 0 LIMIT 20 OFFSET ?");
            $prepared->bind_param('s', $offset);
        } else {
            $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM music WHERE (m_title LIKE ? OR m_description LIKE ? OR m_singers LIKE ?) AND m_deleted = 0 LIMIT 20 OFFSET ?");
            $search = '%' . $search . '%';
            $prepared->bind_param('ssss', $search, $search, $search, $offset);
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
}

?>