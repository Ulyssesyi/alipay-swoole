<?php
declare(strict_types=1);

namespace Alipay\EasySDKSwoole\Kernel\Functions;

use Alipay\EasySDKSwoole\Util\Generic\Client as genericClient;
use Alipay\EasySDKSwoole\Util\AES\Client as aesClient;

class Util
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function generic(): genericClient
    {
        return new genericClient($this->kernel);
    }

    public function aes(): aesClient
    {
        return new aesClient($this->kernel);
    }
}
