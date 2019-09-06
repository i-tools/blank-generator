<?php

declare(strict_types=1);

namespace Blanks;

use Blanks\Interfaces\IPDFGenerator;
use Blanks\Traits\TPDFGenerator;
use Dompdf\Dompdf;

/**
 * Class DomPDFGenerator - Генератор PDF фалов на базе библиотеки dompdf
 * @package Blanks
 */
class DomPDFGenerator implements IPDFGenerator
{
    use TPDFGenerator;

    public function __construct(string $outputFile, array $options = null)
    {

        $this->outputFile = $outputFile;
        $this->fontsDir = $options['fontDir'];
        $this->fontName = $options['fontName'];
        $this->encoding = $options['encoding'];

        $this->document = new Dompdf([
            'fontDir' => $this->fontsDir,
            'fontName' => $this->fontName,
        ]);
    }

    public function setOutputFile(string $fileName)
    {
        $this->outputFile = $fileName;
    }

    public function save(string $html)
    {
        $this->document->loadHtml($html, $this->encoding);
        $this->document->setPaper('A4', 'portrait');
        $this->document->render();

        $output = $this->document->output();
        file_put_contents($this->outputFile, $output);
    }
}

