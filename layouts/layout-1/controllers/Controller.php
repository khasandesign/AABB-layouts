<?php
namespace controllers;

use ReflectionMethod;
use Exception;

class Controller
{
    public $page;
    public $layout;

    public function __construct()
    {
        $this->page = isset($_GET['page']) ? $_GET['page'] : null;
        $this->layout = true;
    }

    /**
     * Render returned action file by its name
     * @param $view
     * @param array $props
     * @return false|string
     */
    public function render($view, array $props = [])
    {
        ob_start();
        foreach ($props as $key => $prop) {
            ${$key} = $prop;
        }
        $name_arr = explode('\\', get_class($this));
        $name = str_replace('controller', '', strtolower(end($name_arr)));
        require($_SERVER['DOCUMENT_ROOT'] . '/views/' . $name . '/' . $view . '.php');
        return ob_get_clean();
    }

    /** Get action according to the current page
     * @return string
     */
    public function getAction() {
        return 'action' . str_replace(' ', '', ucwords(str_replace('-', ' ', $this->page)));
    }

    /**
     * Call required action method and pass GET parametrs
     * @return mixed
     */
    public function getContent()
    {
        $action = $this->getAction();
        if (method_exists($this, $action)) {

            // Assign action's parameters according to GET parameters
            $ref = new ReflectionMethod($this, $action);
            $params = $ref->getParameters();
            $params_pass = [];
            foreach ($params as $param) {
                try {
                    if (isset($_GET[$param->getName()]) && $_GET[$param->getName()]) {
                        $params_pass[] = $_GET[$param->getName()];
                    } else {
                        if (!$param->isOptional()) {
                            throw new Exception('Missing required parameter <b>' . $param->getName() . '</b>');
                        }
                    }
                } catch (Exception $e)
                {
                    echo $e->getMessage();
                    die;
                }

            }

            return $this->$action(...$params_pass);
        } else {
            return $this->actionError();
        }
    }

    /**
     * Error displaying action
     * @param int $code
     * @return false|string
     */
    public function actionError($code = 404)
    {
        /**
         * @var $db
         */

        $title = '';
        $message = '';
        if ($code === 404) {
            $title = 'Page Not Found';
            $message = 'Sorry, this page doesn’t exist <br> or it was moved.';
        } else if ($code === 400) {
            $title = 'Bad request';
            $message = 'Link is incorrect or required parameters <br> missed. Please check it again.';
        } else {
            $title = 'Reconstruction';
            $message = 'Website is under reconstruction working <br> right now, we will finish soon.';
        }

        return $this->render('error', ['code' => $code, 'title' => $title, 'message' => $message]);
    }
}