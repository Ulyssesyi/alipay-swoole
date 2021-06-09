<?php
declare(strict_types=1);


namespace Alipay\EasySDKSwoole\Kernel\Functions;

use Alipay\EasySDKSwoole\Base\Image\Client as imageClient;
use Alipay\EasySDKSwoole\Base\OAuth\Client as oauthClient;
use Alipay\EasySDKSwoole\Base\Qrcode\Client as qrcodeClient;
use Alipay\EasySDKSwoole\Base\Video\Client as videoClient;

class Base
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function image(): imageClient
    {
        return new imageClient($this->kernel);
    }

    public function oauth(): oauthClient
    {
        return new oauthClient($this->kernel);
    }

    public function qrcode(): qrcodeClient
    {
        return new qrcodeClient($this->kernel);
    }

    public function video(): videoClient
    {
        return new videoClient($this->kernel);
    }
}
