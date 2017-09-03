<?php

namespace task\views;

use Exception;
use Throwable;

class View
{

    private $defaultFileExtension = 'php';

    private $layout = 'main';

    /**
     * @param string $extension
     */
    public function setDefaultExtension($extension)
    {
        $this->defaultFileExtension = $extension;
    }

    protected function getViewPath($path)
    {
        $file = 'views' . DIRECTORY_SEPARATOR . $path;

        if (pathinfo($file, PATHINFO_EXTENSION) !== '') {
            return $file;
        }

        $path = $file . '.' . $this->defaultFileExtension;
        if ($this->defaultFileExtension !== 'php' && !is_file($path)) {
            $path = $file . '.php';
        }

        return $path;
    }

    public function render($path, $params)
    {
        $viewPath =  $this->getViewPath($path);
        return $this->renderPhpFile($viewPath, $params);
    }

    /**
     * @return bool|string
     */
    public function findLayoutFile()
    {

        if (!isset($layout)) {
            return false;
        }

        $file = 'views' . DIRECTORY_SEPARATOR . $this->layout;

        if (pathinfo($file, PATHINFO_EXTENSION) !== '') {
            return $file;
        }

        $path = $file . '.' . $this->defaultFileExtension;
        if ($this->defaultFileExtension !== 'php' && !is_file($path)) {
            $path = $file . '.php';
        }

        return $path;
    }

    /**
     * @param $file
     * @param array $params
     * @return string
     * @throws Exception
     * @throws Throwable
     */
    public function renderPhpFile($file, $params = [])
    {
        $obCurrentLevel = ob_get_level();
        ob_start();
        ob_implicit_flush(false);
        extract($params, EXTR_OVERWRITE);
        try {
            require($file);
            return ob_get_clean();
        } catch (Exception $e) {
            while (ob_get_level() > $obCurrentLevel) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        } catch (Throwable $e) {
            while (ob_get_level() > $obCurrentLevel) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        }
    }

    /**
     * @param $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

}
