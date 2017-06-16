<?php

/**
 * router class
 *
 * @since 03. 06. 2017
 * @version 1.0
 */
class Router
{

    /**
     * @var aLinks
     * list of user-defined manual routings
     */
    private $aLinks;
    /**
     * execute the router class
     *
     * @return Array aReturn
     */
    public function exec()
    {
        $sUrl  = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : $_SERVER['REQUEST_URI'];
        $aParams['get'] = $_GET;
        $aParams['post'] = $_POST;
        $aParams['request'] = $_REQUEST;
        $aParams['files'] = $_FILES;
        $aReturn['params'] = $aParams;
        $aReturn['controller'] = $this->getFile($sUrl);

        return $aReturn;
    }

    /**
     * lets a user manually set the class destination of the url
     */
    public function set($sUrl, $sTarget)
    {
        $this->aLinks[$sUrl] = $sTarget;
    }
    
    /**
     * convert the slash separated url to file name
     *
     * @param  String sUrl
     * @return Array aReturn
     */
    private function getFile($sUrl)
    {
        $sFile = '';
        $sClass = '';
        //if the user set the link manually
        if (isset($this->aLinks[$sUrl]) === true) {
            $sFile = '../controller/' . $this->aLinks[$sUrl] . '.php';

            $aReturn['fileName'] = $sFile;
            $aReturn['className'] = $this->aLinks[$sUrl];
            return $aReturn;
        }

        $aUrl = explode('/', $sUrl);

        //create camel-cased version of the URL
        for ($i=0; $i<count($aUrl); $i++) {
            $sFile = $sFile . ucfirst($aUrl[$i]);
            $sClass = $sClass . ucfirst($aUrl[$i]);
        }

        //map it to the controller folder
        $sFile = '../controller/cont' . $sFile . '.php';

        $aReturn['fileName'] = $sFile;
        $aReturn['className'] = 'cont' . $sClass;
        return $aReturn;
    }
}
?>