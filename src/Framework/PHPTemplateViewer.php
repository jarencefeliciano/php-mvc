<?php

declare(strict_types=1);

namespace Framework;

class PHPTemplateViewer
{
    public function render(string $template, array $data = []): string
    {
        extract($data, EXTR_SKIP);

        ob_start();

        require_once __DIR__ . '/../App/Views/' . $template;

        return ob_get_clean();
    }
}
