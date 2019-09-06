<?php

declare(strict_types=1);

namespace Blanks;

use Blanks\Interfaces\ITemplateEngine;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Class TwigEngine Шаблонизатор на базе Twig.
 * @package Blanks
 */
class TwigEngine implements ITemplateEngine
{
    private $twig = null;
    private $data = [];
    private $templateDirectory = '';
    private $templateName = '';

    /**
     * TwigEngine constructor.
     * @param string $templateDirectory
     * @param string $templateNames
     */
    public function __construct(string $templateDirectory, string $templateName)
    {
        $this->templateDirectory = $templateDirectory;
        $this->templateName = $templateName;

        $this->twig = new Environment(
            new FilesystemLoader($templateDirectory)
        );
    }

    public function getTemplateDirectory(): string
    {
        return $this->templateDirectory;
    }

    public function setTemplateDirectory(string $templateDir)
    {
        $this->templateDirectory = $templateDir;
        // todo: обновление директории в twig
    }

    public function getTemplateName(): string
    {
        return $this->templateName;
    }

    public function setTemplateName(string $templateName)
    {
        $this->templateName = $templateName;
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }

    public function render(): string
    {
        return $this->twig->render(
            $this->templateName,
            [
                'data' => $this->data
            ]
        );
    }
}
