<?php

include_once(APP_PATH . 'Base/Request.php');
include_once(APP_PATH . 'Base/DBConnection.php');
include_once(APP_PATH . 'Base/Model.php');
include_once(APP_PATH . 'Models/User.php');
include_once(APP_PATH . 'Helpers.php');
include_once(APP_PATH . 'Base/Validation/Validator.php');
include_once(DIRECTORY_ROOT . 'routes/web.php');

class Bootstrap
{
    /**
     * @throws HttpException
     */
    public function run()
    {
        $uri = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

        echo Route::get($uri);
    }
}
