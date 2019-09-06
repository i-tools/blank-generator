<?php

declare(strict_types=1);

namespace Blanks\Interfaces;

/**
 * Interface IBlank
 * @package Blanks\Interfaces
 */
interface IBlank
{
    /**
     * Установка ассоциативного масива с данными бланка.
     * @param array $rawData
     */
    public function setRawData(array $rawData);

    public function getRawData(): array;

    /**
     * Генерация PDF файла.
     * @return bool
     */
    public function save(): bool;
}
