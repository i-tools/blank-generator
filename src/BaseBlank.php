<?php

declare(strict_types=1);

namespace Blanks;

use Blanks\Interfaces\TemplateEngineInterface;
use Blanks\Interfaces\BlankSourceInterface;
use Blanks\Interfaces\PDFGeneratorInterface;

/**
 * Class BaseBlank - Базовый класс для создания PDF файла с печатной формой.
 * @package Blanks
 */
class BaseBlank implements Interfaces\BlankInterface
{
    private $source = null;
    private $render = null;
    private $generator = null;

    /**
     * BaseBlank constructor.
     * @param BlankSourceInterface $dataSource
     * @param TemplateEngineInterface $htmlRender
     * @param PDFGeneratorInterface $pdfGenerator
     */
    public function __construct(BlankSourceInterface $dataSource, TemplateEngineInterface $htmlRender, PDFGeneratorInterface $pdfGenerator)
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

