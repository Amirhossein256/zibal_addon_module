<?php


class mainController
{
    protected function render($theme, $var = null)
    {

        $file = __DIR__ . "/../views/$theme.php";
        if (!file_exists($file)) {
            echo "$theme file is not exist in: $file";
            return false;
        }
        if ($var)
            extract($var);
//        global $var;
        require_once $file;
    }

    static function loadCss($file)
    {
        return "<link href='" . BASE_URL . "/theme/hrc/css/$file.css' type='text/css' rel='stylesheet'>";
    }

    protected function response(array $data, int $statusCode = 200)
    {

        $successStatusCode = [200, 201, 301];
        header('Content-Type: application/json');
        http_response_code($statusCode);
        if (in_array($statusCode, $successStatusCode)) {
            return json_encode([
                'data' => $data
            ]);
        }
        return json_encode([
            'errors' => $data
        ]);
    }
}
