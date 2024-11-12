<?php

declare(strict_types=1);

namespace Framework;

class MVCTemplateViewer implements TemplateViewerInterface
{
    public function render(string $template, array $data = []): string
    {
        $code = file_get_contents(__DIR__ . '/../App/Views/' . $template);

        $code = $this->replaceVariables($code);

        return $code;

        // extract($data, EXTR_SKIP);

        // ob_start();

        // require_once __DIR__ . '/../App/Views/' . $template;

        // return ob_get_clean();
    }

    private function replaceVariables(string $code): string
    {
        return preg_replace("#{{\s*(\S+)\s*}}#", "<?= htmlspecialchars(\$$1) ?>", $code);
    }
}
