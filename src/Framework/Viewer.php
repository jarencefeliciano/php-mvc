<?php

namespace Framework;

class Viewer
{
    public function render(string $template, array $products)
    {
        require "../src/views/$template";
    }
}
