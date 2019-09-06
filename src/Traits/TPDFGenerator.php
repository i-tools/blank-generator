<?php

declare(strict_types=1);

namespace Blanks\Traits;

trait TPDFGenerator
{
    private $outputFile = '';
    private $document = null;

    private $fontsDir = '';
    private $fontName = '';
    private $encoding = 'UTF-8';
}
