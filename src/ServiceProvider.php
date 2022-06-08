<?php

namespace Xyu\HyperfCaptcha;

use Hanson\Foundation\Http;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Xyu\HyperfCaptcha\Handler\CaptchaHandler;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['handler'] = function (Captcha $captcha) {
            return new CaptchaHandler($captcha);
        };

        $pimple['access_token'] = function (TtApp $ttApp) {
            return (new AccessToken($ttApp))->setCache($ttApp->cache);
        };
    }
}