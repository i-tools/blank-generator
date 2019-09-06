<?php

declare(strict_types=1);

namespace Blanks;

use Blanks\Interfaces\IBlankSource;

class JsonBlankSource implements IBlankSource
{
    private $file = '';
    private $data = [];

    public function __construct(string $fileName)
    {
        $this->file = $fileName;
        $this->load($this->file);
    }

    /**
     * Загрузка данных из JSON файла.
     * @param $order
     * @return bool
     */
    public function load($order): bool
    {
        $jsonFile = new \SplFileObject($this->file);

        $jsonSource = "";

        $jsonFile->fseek(0);
        while (!$jsonFile->eof()) {
            $jsonSource .= $jsonFile->fread(1024);
        }

        $this->data = json_decode($jsonSource, true);

        return true;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }
}
