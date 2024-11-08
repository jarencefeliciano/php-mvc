<?php

namespace Framework;

class Viewer
{
    public function render(string $template, array $data = []): string
    {
        extract($data, EXTR_SKIP);

        ob_start();

        require_once __DIR__ . '/../App/Views/' . $template;

        return ob_get_clean();
    }
}
