<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace Login\App\Helper;

trait RenderTemplate
{
    /**
     * @param string $template
     * @param array $data
     * @return string
     */
    public function render(string $template, array $data): string
    {
        extract($data);
        ob_start();
        require_once __DIR__ . '/../../resources/template/' . $template;

        return ob_get_clean();
    }
}