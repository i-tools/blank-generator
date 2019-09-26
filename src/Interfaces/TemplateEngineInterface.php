<?php

declare(strict_types=1);

namespace Blanks\Interfaces;

/**
 * Interface TemplateEngineInterface
 * @package Blanks\Interfaces
 */
interface TemplateEngineInterface
{
    /**
     * Установка переменных для шаблонизатораю
     * @param array $rawData
     * @return mixed
     */
    public function setData(array $rawData);

    /**
     * Установкак имени шаблона.
     * @param string $templateName
     * @return mixed
     */
    public function setTemplateName(string $templateName);

    /**
     * Получение текущего имени шаблона.
     * @return string
     */
    public function getTemplateName(): string;

    /**
     * Установка директории шаблонов.
     * @param string $templateDir
     * @return mixed
     */
    public function setTemplateDirectory(string $templateDir);

    /**
     * Получение директории шаблонов.
     * @return string
     */
    public function getTemplateDirectory(): string;

    /**
     * Генерация HTML.
     * @return mixed
     */
    public function render(): string;
}

