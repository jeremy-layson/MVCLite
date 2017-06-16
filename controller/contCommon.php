<?php 

/**
 * base controller class
 *
 * @since 03. 07. 2017
 * @version 1.0
 */
abstract class contCommon
{

    /**
     * @var Array aJsImports
     */
    protected $aJsImports;

    /**
     * @var Array aCssImports
     */
    protected $aCssImports;

    /**
     * @var Array of Object
     */
    protected $session;

    /**
     * @var String js_import
     */
    private $js_import;

    /**
     * @var String css_import
     */
    private $css_import;



    public function __construct()
    {
        session_start();
        $this->session = $_SESSION;
    }

    /**
     * inserts the view file
     *
     * @param String sFileName
     * @param Array aVariables
     */
    protected function view($sFileName, $aVariables = NULL)
    {
        if (($aVariables !== NULL) && (count($aVariables) > 0)) {
            foreach ($aVariables as $sKey => $mVal) {
                $$sKey = $mVal;
            }
        }

        $this->js_import = $this->getJs();
        $this->css_import = $this->getCss();

        ob_start(array($this, "loadResources"));
        include_once('../view/' . $sFileName . '.php');
        ob_end_flush();
    }

    /**
     * loads the js and css files into the file
     */
    private function loadResources($buffer)
    {
        return (str_replace('</head>', $this->js_import . $this->css_import . '</head>', $buffer));
    }

    /**
     * templating function
     */
    protected function template($sFileName)
    {

    }

    /**
     * concatenates the js imports
     *
     * @return String
     */
    private function getJs()
    {
        if (count($this->aJsImports) === 0) {
            return '';
        }
        $sReturn = '';

        foreach ($this->aJsImports as $sJsImports) {
            $sReturn = $sReturn . '<script type="text/javascript" src="/resource/js/' . $sJsImports . '.js"></script>';
        }

        return $sReturn;
    }

    /**
     * concatenates the css imports
     *
     * @return String
     */
    private function getCss()
    {
        if (count($this->aCssImports) === 0) {
            return '';
        }
        $sReturn = '';

        foreach ($this->aCssImports as $cssImports) {
            $sReturn = $sReturn . '<link rel="stylesheet" href="/resource/css/' . $cssImports . '.css">';
        }

        return $sReturn;
    }

    /**
     * returns an instance of the specified model
     *
     * @param String sModelName
     * @return Object
     */
    protected function model($sModelName)
    {
        $sModelName = ucfirst($sModelName);

        include_once('../model/model' . $sModelName . '.php');

        $sClassName =  $sModelName;
        return $sClassName::instance();
    }

    /**
     * returns an instance of a library
     *
     * @param String sLibName
     * @return Object
     */
    protected function lib($sLibName)
    {
        $sLibName = ucfirst($sLibName);

        include_once('../lib/lib' . $sLibName . '.php');

        $sClassName = $sModelName;
        return $sClassName::instance();
    }

    /**
     * setter for the js imports
     *
     * @param String sFileName
     */
    protected function js($sFileName)
    {
        $this->aJsImports[] = $sFileName;
    }

    /**
     * setter for the js imports
     *
     * @param String sFileName
     */
    protected function css($sFileName)
    {
        $this->aCssImports[] = $sFileName;
    }

    /**
     * redirect to a url
     */
    protected function go($sLocation, $aParams)
    {
        $sParams = '';

        foreach ($aParams as $sKey => $sParam) {
            $sParams = $sParams . '&' . $sKey . '=' . $sParam;
        }

        header('Location: ' . $sLocation . '?' . substr($sParams, 1));
    }
}
?>