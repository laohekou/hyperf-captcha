<?php

declare(strict_types=1);

namespace Xyu\HyperfCaptcha;


use Psr\Http\Message\ResponseInterface;

interface CaptchaInterface
{
    public function create(): string;

    public function expire(int $expire = 600): CaptchaInterface;

    public function setUseCurve(bool $flag = true): CaptchaInterface;

    public function setUseNoise(bool $flag = true): CaptchaInterface;

    public function setImageWidth(int $value = 0): CaptchaInterface;

    public function setImageHeight(int $value = 0): CaptchaInterface;

    public function setFontSize(int $fontSize = 25): CaptchaInterface;

    public function setLength(int $length = 4): CaptchaInterface;

    public function check(string $code): bool;
}
