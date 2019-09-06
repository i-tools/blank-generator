<?php

declare(strict_types=1);

namespace Blanks;

use Blanks\Interfaces\ITemplateEngine;
use Blanks\Interfaces\IBlankSource;
use Blanks\Interfaces\IPDFGenerator;

/**
 * Class BaseBlank - Базовый класс для создания PDF файла с печатной формой.
 * @package Blanks
 */
class BaseBlank implements Interfaces\IBlank
{
    private $source = null;
    private $render = null;
    private $generator = null;

    /**
     * BaseBlank constructor.
     * @param IBlankSource $dataSource
     * @param ITemplateEngine $htmlRender
     * @param IPDFGenerator $pdfGenerator
     */
    public function __construct(IBlankSource $dataSource, ITemplateEngine $htmlRender, IPDFGenerator $pdfGenerator)
    {
        $this->source = $dataSource;
        $this->render = $htmlRender;
        $this->generator = $pdfGenerator;
    }

    /**
     * Установка ассоциативного масива с данными бланка.
     * @param array $rawData
     */
    public function setRawData(array $rawData)
    {
        $this->source->setData($rawData);
    }

    public function getRawData(): array
    {
        return $this->source->getData();
    }

    /**
     * Чтение данных бланка из источника данных.
     * @param mixed $order
     * @return bool
     */
    public function load($order): bool
    {
        $this->source->load($order);

        return true;
    }

    /**
     * @param string $outputFile
     * @return bool
     */
    public function save(): bool
    {
        $this->render->setData(
            $this->source->getData()
        );

        $this->generator->save(
            $this->render->render()
        );

        return true;
    }
}

