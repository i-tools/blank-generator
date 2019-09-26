<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Blanks\Interfaces\BlankSourceInterface;
use Blanks\Interfaces\TemplateEngineInterface;
use Blanks\Interfaces\PDFGeneratorInterface;
use Blanks\JsonSource;
use Blanks\TwigEngine;
use Blanks\DomPDFGenerator;

class DemoBlank extends Blanks\BaseBlank
{
    public function __construct(BlankSourceInterface $dataSource, TemplateEngineInterface $htmlRender, PDFGeneratorInterface $pdfGenerator)
    {
        parent::__construct($dataSource, $htmlRender, $pdfGenerator);
    }

    // todo: Ниже бизнес логика бланка
}

$blank = new DemoBlank(
    new JsonSource('./example1.json'),
    new TwigEngine(
        './templates/',
        'errand.twig'
    ),
    new DomPDFGenerator(
        'errand.pdf',
        [
            'fontDir' => './fonts/',
            'fontName' => 'DejaVu Sans, sans-serif',
            'encoding' => 'UTF-8'
        ]
    )
);

$blank->save();
