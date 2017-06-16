<?php
    if (isResource() === true) {
        exit();
    }

    include_once('./routeClass.php');
    include_once('../controller/contCommon.php');
    include_once('../model/modelCommon.php');

    $oRoute = new Router();

    //set default page to contHome.php
    /**
     * Manually defined-routes
     * $oRoute->set('url', 'controllerfile without .php');
     * Example: $oRoute->set('/', 'contHome');
     *          Redirects the domain to contHome.php
     */
    $oRoute->set('/', 'contHome');
    //End of manual routing
    //*********************
    $sFileName = $oRoute->exec();
    
	if (file_exists($sFileName['controller']['fileName']) === true) {
		include_once($sFileName['controller']['fileName']);
	} else {
		Header("Location: /");
		return false;
	}	
   
    
    $oController = new $sFileName['controller']['className'];

    $oController->exec($sFileName['params']);


    function isResource()
    {
        if (strpos($_SERVER['REQUEST_URI'], '/resource/') > 0) {
            return true;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/template/') > 0) {
            return true;
        }
        return false;
    }
?>