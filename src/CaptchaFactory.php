<?php


namespace Xyu\HyperfCaptcha;


use Hyperf\Contract\ConfigInterface;
use Hyperf\Contract\SessionInterface;
use Psr\Container\ContainerInterface;

class CaptchaFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        $session = $container->get(SessionInterface::class);
        return make(Captcha::class, compact('config', 'session'));
    }
}
