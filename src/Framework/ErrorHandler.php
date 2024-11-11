<?php

declare(strict_types=1);

namespace Framework;

use Throwable;
use ErrorException;
use Framework\Exceptions\PageNotFoundException;

class ErrorHandler
{
    public static function handleError(
        int $errno,
        string $errstr,
        string $errfile,
        int $errline
    ): bool
    {
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }

    public static function handleException(Throwable $exception): void {

        if ($exception instanceof PageNotFoundException) {
            http_response_code(404);
            $template = "404.php";
        } else {
            http_response_code(500);
            $template = "500.php";
        }

        $show_erros = true;

        if ($show_erros) {
            ini_set("display_errors", "1");
        } else {
            ini_set("display_errors", "0");
            ini_set("log_errors", "1");
            // echo ini_get("error_log");
            require "../src/App/views/$template";
        }

        throw $exception;
    }
}
