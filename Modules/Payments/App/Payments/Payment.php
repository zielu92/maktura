<?php

namespace Modules\Payments\App\Payments;

abstract class Payment
{
    protected $haveURL = false;

    /**
     * @return mixed
     */
    public function isAvailable()
    {
        return $this->getConfigValue('active');
    }

    /**
     * Retrieve information from payment methods config
     *
     * @param  string $field
     * @return mixed
     */
    public function getConfigValue(string $field): mixed
    {
        return config('paymentmethods.' . $this->getCode() . '.' . $field);
    }

    /**
     * Get the code of the instance
     * @return string
     */
    public function getCode(): string
    {
        if(empty($this->code)) {
            // throw exception
        }
        return $this->code;
    }

    /**
     * Return payment method description
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->getConfigValue('title');
    }

    /**
     * Return payment method description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getConfigValue('description');
    }

    /**
     * Return payment method sort order
     *
     * @return int
     */
    public function getSortOrder(): int
    {
        return $this->getConfigValue('sort');
    }

    /**
     * new service register, default make valid status
     * Some services might require token or an auth method first
     * before we can use them
     *
     */
    public function registerService($id) {
        return null;
    }

    /**
     * return link for payment
     * @param int $id
     * @return string
     */
    public function getPaymentURL(int $id): string
    {
        return 'not available';
    }

    /**
     * If store have URL link
     * @return mixed
     */
    public function haveURL(): mixed
    {
        return $this->haveURL;
    }

}
