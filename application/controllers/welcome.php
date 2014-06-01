<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $controllers    = array();

        $dir            = APPPATH.'/controllers/';
        $files          = scandir($dir);

        $controller_files = array_filter($files, function($filename) {
            return (substr(strrchr($filename, '.'), 1)=='php') ? true : false;
        });

        foreach ($controller_files as $filename)
        {
            require_once('./application/controllers/'.$filename);

            $classname = substr($filename, 0, strrpos($filename, '.'));
            $controller = new $classname();
            $methods = get_class_methods($controller);

            $controller_info = array(
                'filename' => $filename,
                'class_name' => $classname,
                'methods'  => $methods
            );
            array_push($controllers,$controller_info);
        }

        echo('<pre>');
        print_r($controllers);
        //$data['controllers'] = $controllers
        echo('</pre>');
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */