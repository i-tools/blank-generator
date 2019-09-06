<?php

declare(strict_types=1);

namespace Blanks\Interfaces;

interface IPDFGenerator
{
    public function setOutputFile(string $fileName);
    public function save(string $html);
}

