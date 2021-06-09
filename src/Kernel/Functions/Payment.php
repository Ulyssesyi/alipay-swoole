<?php
declare(strict_types=1);

namespace Alipay\EasySDKSwoole\Kernel\Functions;

use Alipay\EasySDKSwoole\Payment\App\Client as appClient;
use Alipay\EasySDKSwoole\Payment\Common\Client as commonClient;
use Alipay\EasySDKSwoole\Payment\FaceToFace\Client as faceToFaceClient;
use Alipay\EasySDKSwoole\Payment\Huabei\Client as huabeiClient;
use Alipay\EasySDKSwoole\Payment\Page\Client as pageClient;
use Alipay\EasySDKSwoole\Payment\Wap\Client as wapClient;

class Payment
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function app(): appClient
    {
        return new appClient($this->kernel);
    }

    public function common(): commonClient
    {
        return new commonClient($this->kernel);
    }

    public function faceToFace(): faceToFaceClient
    {
        return new faceToFaceClient($this->kernel);
    }

    public function huabei(): huabeiClient
    {
        return new huabeiClient($this->kernel);
    }

    public function page(): pageClient
    {
        return new pageClient($this->kernel);
    }

    public function wap(): wapClient
    {
        return new wapClient($this->kernel);
    }
}
