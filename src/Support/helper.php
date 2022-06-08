<?php


if (!function_exists('captcha_create')) {
    function captcha_create()
    {
        $captcha = new \Xyu\HyperfCaptcha\Captcha(
            \Hyperf\Utils\ApplicationContext::getContainer()
                ->get(\Hyperf\Contract\ConfigInterface::class),\Hyperf\Utils\ApplicationContext::getContainer()
            ->get(Psr\SimpleCache\CacheInterface::class)
        );
        return $captcha->create();
    }
}

if (!function_exists('captcha_check')) {
    function captcha_check(string $code)
    {
        $captcha = new \Xyu\HyperfCaptcha\Captcha(
            \Hyperf\Utils\ApplicationContext::getContainer()
                ->get(\Hyperf\Contract\ConfigInterface::class),\Hyperf\Utils\ApplicationContext::getContainer()
            ->get(Psr\SimpleCache\CacheInterface::class)
        );
        return $captcha->check($code);
    }
}
