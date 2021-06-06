<?php

namespace App\Services;

/**
 * Class View
 * @package App\Services
*/
class View
{
    private $viewName;
    private $layoutName;
    private $data = [];

    /**
     * @return array|false|string|string[]
    */
    public function render()
    {
        $layoutHtml = $this->getLayoutHtml();
        $viewHtml = $this->getViewHtml();
        $html = str_replace('@body', $viewHtml, $layoutHtml);
        print $html;
        return $html;
    }

    /**
     * @return false|string
    */
    private function getLayoutHtml()
    {
        ob_start();
        if(null !== $this->layoutName) {
            $layoutPath = $this->layoutPath();
            include $layoutPath;
        }
        return ob_get_clean();
    }

    /**
     * @return false|string
    */
    private function getViewHtml()
    {
        ob_start();
        \extract($this->data);
        $viewPath = $this->viewPath();
        include $viewPath;
        return ob_get_clean();
    }

    /**
     * @return string
    */
    private function viewPath()
    {
        $viewName = str_replace('.', '/', $this->viewName) . '.php';
        return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.'Resource'.DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR.$viewName;
    }

    /**
     * @return string
    */
    private function layoutPath()
    {
        $layoutName = str_replace('.', '/', $this->layoutName) . '.php';
        return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.'Resource'.DIRECTORY_SEPARATOR.'Layout'.DIRECTORY_SEPARATOR.$layoutName;
    }

    /**
     * @param array $data
     * @return $this
    */
    public function setData($data = [])
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param $viewName
     * @return $this
    */
    public function setView($viewName)
    {
        $this->viewName = $viewName;
        return $this;
    }

    /**
     * @param $layoutName
     * @return $this
    */
    public function setLayout($layoutName)
    {
        $this->layoutName = $layoutName;
        return $this;
    }

    /**
     * @param $propertyName
     * @return mixed|null
    */
    public function __get($propertyName)
    {
        return $this->data[$propertyName] ?? null;
    }
}