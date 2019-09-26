<?php

declare(strict_types=1);

namespace Blanks\Interfaces;

/**
 * Interface BlankSourceInterface
 * @package Blanks\Interfaces
 */
interface BlankSourceInterface
{
    /**
     * Загрузка данных из источника.
     * @param $order
     * @return mixed
     */
    public function load($order): bool;

    /**
     * Получение массива из источника.
     * @return array
     */
    public function getData(): array;

    /**
     * @param array $data
     * @return mixed
     */
    public function setData(array $data);
}
