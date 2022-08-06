<?php

use Gloudemans\Shoppingcart\Facades\Cart;

if (!function_exists('subdomain_asset')) {

    function subdomain_asset($path, $secure = null)
    {
        return app('url')->assetFrom(config('kiakoo.subdomain'), $path, $secure);
    }
}

if (!function_exists('kiakoo_color')) {

    function kiakoo_color($color)
    {
        $x = strtolower($color);

        return match ($x) {
            'blanc' => 'white',
            'rouge' => 'red',
            'bleue' => 'blue',
            'noir' => 'black',
            default => ''
        };
    }
}

if (!function_exists('kiakoo_stars')) {

    function kiakoo_stars($rv)
    {
        $res = [
            1 => 'fa fa-star-o',
            2 => 'fa fa-star-o',
            3 => 'fa fa-star-o',
            4 => 'fa fa-star-o',
            5 => 'fa fa-star-o',
        ];

        if ($rv > 0 && $rv <= 0.5) {
            $res = [
                1 => 'fa fa-star-half-o',
                2 => 'fa fa-star-o',
                3 => 'fa fa-star-o',
                4 => 'fa fa-star-o',
                5 => 'fa fa-star-o',
            ];
        } elseif ($rv > 0.5 && $rv <= 1) {
            $res = [
                1 => 'fa fa-star',
                2 => 'fa fa-star-o',
                3 => 'fa fa-star-o',
                4 => 'fa fa-star-o',
                5 => 'fa fa-star-o',
            ];
        } elseif ($rv > 1 && $rv <= 1.5) {
            $res = [
                1 => 'fa fa-star',
                2 => 'fa fa-star-half-o',
                3 => 'fa fa-star-o',
                4 => 'fa fa-star-o',
                5 => 'fa fa-star-o',
            ];
        } elseif ($rv > 1.5 && $rv <= 2) {
            $res = [
                1 => 'fa fa-star',
                2 => 'fa fa-star',
                3 => 'fa fa-star-o',
                4 => 'fa fa-star-o',
                5 => 'fa fa-star-o',
            ];
        } elseif ($rv > 2 && $rv <= 2.5) {
            $res = [
                1 => 'fa fa-star',
                2 => 'fa fa-star',
                3 => 'fa fa-star-half-o',
                4 => 'fa fa-star-o',
                5 => 'fa fa-star-o',
            ];
        } elseif ($rv > 2.5 && $rv <= 3) {
            $res = [
                1 => 'fa fa-star',
                2 => 'fa fa-star',
                3 => 'fa fa-star',
                4 => 'fa fa-star-o',
                5 => 'fa fa-star-o',
            ];
        } elseif ($rv > 3 && $rv <= 3.5) {
            $res = [
                1 => 'fa fa-star',
                2 => 'fa fa-star',
                3 => 'fa fa-star',
                4 => 'fa fa-star-half-o',
                5 => 'fa fa-star-o',
            ];
        } elseif ($rv > 3.5 && $rv <= 4) {
            $res = [
                1 => 'fa fa-star',
                2 => 'fa fa-star',
                3 => 'fa fa-star',
                4 => 'fa fa-star',
                5 => 'fa fa-star-o',
            ];
        } elseif ($rv > 4 && $rv <= 4.5) {
            $res = [
                1 => 'fa fa-star',
                2 => 'fa fa-star',
                3 => 'fa fa-star',
                4 => 'fa fa-star',
                5 => 'fa fa-star-half-o',
            ];
        } elseif ($rv > 4.5 && $rv < 5) {
            $res = [
                1 => 'fa fa-star',
                2 => 'fa fa-star',
                3 => 'fa fa-star',
                4 => 'fa fa-star',
                5 => 'fa fa-star-o',
            ];
        } elseif ($rv >= 5) {
            $res = [
                1 => 'fa fa-star',
                2 => 'fa fa-star',
                3 => 'fa fa-star',
                4 => 'fa fa-star',
                5 => 'fa fa-star',
            ];
        }

        return $res;
    }
}

if (!function_exists('stars_percentage')) {

    function stars_percentage($totalCount, $starCount)
    {
        if ($totalCount == 0) {

            $x = 0;
        } else {

            $x = ($starCount / $totalCount) * 100;
        }

        return roundUp($x, 1);
    }
}

if (!function_exists('discount_total')) {

    function discount_total()
    {
        $carts = Cart::instance('default')->content();

        $sum  = $carts->map(function ($cart) {

            return $cart->options->first();
        })->flatten()->sum();

        return roundUp((int) $sum);
    }
}

if (!function_exists('subtotal_one')) {

    function subtotal_one()
    {
        return total_ht() - discount_total();
    }
}

if (!function_exists('subtotal_two')) {

    function subtotal_two()
    {
        return subtotal_one() - promotion();
    }
}

if (!function_exists('tax')) {

    function tax()
    {
        return roundUp(subtotal_one() * .18);
    }
}

if (!function_exists('total_final')) {

    function total_final()
    {
        return subtotal_two() + tax();
    }
}

if (!function_exists('format_price')) {

    function format_price($value)
    {
        return number_format($value, 0, '', ' ');
    }
}

if (!function_exists('promotion')) {

    function promotion()
    {
        $promotion = 0;

        if (session('kiakoo_promocode')) {
            $promotion = roundUp(subtotal_one() * session('kiakoo_promocode.reward') / 100);
        }

        return $promotion;
    }
}

if (!function_exists('total_ht')) {

    function total_ht()
    {
        $total_ht  = str_replace(' ', '', Cart::subtotal());

        return roundUp((int) $total_ht);
    }
}

/** round to the nearest 5. Src: stackoverflow */
if (!function_exists('roundUp')) {

    function roundUp($n, $x = 5)
    {
        return (ceil($n) % $x === 0) ? ceil($n) : round(($n + $x / 2) / $x) * $x;
    }
}

if (!function_exists('shipping_cost')) {

    function shipping_cost()
    {
        $shippingCost = 0;

        if (session('kiakoo_shipping_cost')) {
            $shippingCost = session('kiakoo_shipping_cost.amount');
        }

        return $shippingCost;
    }
}

if (!function_exists('total_ttc')) {

    function total_ttc()
    {
        return total_final() + shipping_cost();
    }
}
