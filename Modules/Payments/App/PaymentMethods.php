<?php

namespace Modules\Payments\App;

use Illuminate\Support\Facades\Config;

class PaymentMethods
{
    /**
     * Returns all supported payment methods
     *
     * @return array
     */
    public function getPaymentMethods(): array
    {
        $paymentMethods = [];
        foreach (Config::get('payment_methods') as $paymentMethod) {
            $object = app($paymentMethod['class']);

            if ($object->isAvailable()) {
                $paymentMethods[] = [
                    'method' => $object->getCode(),
                    'method_title' => $object->getTitle(),
                    'description' => $object->getDescription(),
                    'sort' => $object->getSortOrder(),
                ];
            }
        }

        usort($paymentMethods, function ($a, $b) {
            if ($a['sort'] == $b['sort']) {
                return 0;
            }

            return ($a['sort'] < $b['sort']) ? -1 : 1;
        });

        return $paymentMethods;
    }


    /** Execute additional features (like auth, to external service or anything like this)
     * @param string $method
     * @param int $id
     * @return object
     */
    public static function registerMethod(string $method, int $id = null): object
    {
        $object = app(config('payment_methods.' . $method . '.class'));
        return $object->registerMethod($id);
    }

    /**
     * Get title of the payment methods
     * @parm string $method
     * @return object
     */
    public static function getTitle(string $method)
    {
        $object = app(config('payment_methods.' . $method . '.class'));
        return $object->getTitle();
    }

    /**
     * get the URL - if there is any
     * @param string $method
     * @param int $id
     * @return mixed
     */
    public static function getPaymentURL(string $method, int $id): object
    {
        $object = app(config('payment_methods.' . $method . '.class'));
        return $object->getChannelURL($id);
    }

    /**
     * check if payment method have url
     * @param string $method
     * @return object
     */
    public static function haveURL(string $method): object
    {
        $object = app(config('payment_methods.' . $method . '.class'));
        return $object->haveURL();
    }

}
