<?php

    namespace Framework\View;

    class View 
    {
        protected static string $basePath = __DIR__ . '/../../resources/views';

        public static function render($template, $data = [])
        {
            $path = self::$basePath . '/' . str_replace('.', '/', $template) . '.php';

            if(!file_exists($path)){
                throw new \Exception("View [$template] não encontrada");
            }

            extract($data);
            ob_start();
            include $path;
            $content = ob_get_clean();

        }
    }