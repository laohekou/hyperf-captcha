<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Xyu\HyperfCaptcha;


use Hyperf\Contract\ConfigInterface;
use Psr\SimpleCache\CacheInterface;
use Xyu\HyperfCaptcha\Handler\CaptchaHandler;

class Captcha implements CaptchaInterface
{
    /**
     * @var CaptchaHandler
     */
    private $handler;

    /**
     * @var ConfigInterface
     */
    private $config;


    public function __construct(ConfigInterface $config, CacheInterface $cache)
    {
        $this->config = $config;
        $this->handler = new CaptchaHandler($this->config, $cache);
    }

    public function create(): string
    {
        return $this->handler->create();
    }

    public function check(string $code): bool
    {
       return $this->handler->check($code);
    }

    public function setUseCurve(bool $flag = true): CaptchaInterface
    {
       $this->config->set('captcha.useCurve', $flag);
       return $this;
    }

    public function setUseNoise(bool $flag = true): CaptchaInterface
    {
        $this->config->set('captcha.useNoise', $flag);
        return $this;
    }

    public function setImageWidth(int $value = 0): CaptchaInterface
    {
        $this->config->set('captcha.imageW', $value);
        return $this;
    }

    public function setImageHeight(int $value = 0): CaptchaInterface
    {
        $this->config->set('captcha.imageH', $value);
        return $this;
    }

    public function setFontSize(int $fontSize = 25): CaptchaInterface
    {
        $this->config->set('captcha.fontSize', $fontSize);
        return $this;
    }

    public function setLength(int $length = 4): CaptchaInterface
    {
        $this->config->set('captcha.length', $length);
        return $this;
    }

    public function expire(int $expire = 600): CaptchaInterface
    {
        $this->config->set('captcha.expire', $expire);
        return $this;
    }
}
