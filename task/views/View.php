<?php

namespace task\View;

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

    }

    public function render()
    {

    }

}
