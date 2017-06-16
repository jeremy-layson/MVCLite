<?php

/**
 * homepage class
 *
 * @since 03. 08. 2017
 * @version 1.0
 */
class contHome extends contCommon
{
    /**
     * @var Object
     */
    private $oModel;

    public function exec($aParams)
    {
        /**
         * Adding JS and CSS files
         * $this->js('path + filename without .js')
         * $this->css('path + filename without .css')
         */

        /**
         * Importing a model
         * $variable = $this->model('filename without .php')
         * Example: $oModel = $this->model('database');
         *          imports database.php from /model folder
         */

        /**
         * Importing a library
         * $variable = $this->lib('filename without .php')
         * Example: $oModel = $this->lib('encrypt');
         *          imports encrypt.php from /lib folder
         */

        /**
         * Redirect to a url
         * $this->go('url', 'array of parameters')
         * Example $this->go('/', array('id' => 1, 'type' => 'admin'))
         */

        /**
         * Adding a view
         * $this->view('filename without .php', array('key' => 'data'))
         * Example: $this->view('home', array('name' => 'Jeremy Layson'));
         */
        $this->js('test');
        $this->view('home');
    }
}

?>