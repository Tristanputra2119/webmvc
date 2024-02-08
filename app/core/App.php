<?php
class App
{

    //Property
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        //path_info url
        $url = $this->parseUrl($_SERVER);

        //Setup Controller and routing
        if (!empty($url) && file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params/data and setup the controller
        $this->params = $url ? array_values($url) : [];
        call_user_func_array(
            [$this->controller, $this->method],
            $this->params
        );
    }

    public function parseURL($server)
    {
        //save path_info value
        $path_info = $_SERVER['PATH_INFO'] ?? '';

        // Remove leading and trailing slashes
        $path_info = trim($path_info, '/');

        // Remove any occurrences of '/index.php'
        $path_info = str_replace('/index.php', '', $path_info);

        // Explode the remaining path into an array
        $url = explode('/', $path_info);

        // Sanitize each element of $url if necessary
        foreach ($url as &$part) {
            $part = filter_var($part, FILTER_SANITIZE_URL);
        }
        return $url;
    }
}
