<?php


namespace Xyu\HyperfCaptcha;


use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;
use Psr\SimpleCache\CacheInterface;

class CaptchaFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        $cache = $container->get(CacheInterface::class);
        return make(Captcha::class, compact('config', 'cache'));
    }
}
