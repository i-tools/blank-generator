<?php

declare(strict_types=1);

namespace Forms\Interfaces;

/**
 * Интерфейс для работы с реквизитами компании.
 *
 * @package Forms\Interfaces
 */
interface IRequisites
{
    /**
     * Чтение наименования компании.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Установка наименования компании.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function setName(string $name);

    /**
     * Возвращает ИНН компании.
     *
     * @return int
     */
    public function getITN(): int;

    /**
     * Устанавливает ИНН компании.
     *
     * @param int $itnCode
     *
     * @return mixed
     */
    public function setITN(int $itnCode);

    /**
     * Возвращает КПП компании.
     *
     * @return int
     */
    public function getIEC(): int;

    /**
     * Устанавливает КПП компании.
     *
     * @param int $iecCode
     *
     * @return mixed
     */
    public function setIEC(int $iecCode);

    /**
     * Чтение почтового индекса компании.
     *
     * @return int
     */
    public function getPostCode(): int;

    /**
     * Установка почтового индекса компании.
     *
     * @param int $postCode
     *
     * @return mixed
     */
    public function setPostCode(int $postCode);

    /**
     * Чтение адреса компании.
     *
     * @return string
     */
    public function getAddress(): string;

    /**
     * Установка адреса компании.
     *
     * @param string $address
     *
     * @return mixed
     */
    public function setAddress(string $address);
}
