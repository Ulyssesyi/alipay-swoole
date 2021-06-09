<?php
declare(strict_types=1);

namespace Alipay\EasySDKSwoole\Kernel\Functions;

use Alipay\EasySDKSwoole\Marketing\OpenLife\Client as openLifeClient;
use Alipay\EasySDKSwoole\Marketing\Pass\Client as passClient;
use Alipay\EasySDKSwoole\Marketing\TemplateMessage\Client as templateMessageClient;

class Marketing
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function openLife(): openLifeClient
    {
        return new openLifeClient($this->kernel);
    }

    public function pass(): passClient
    {
        return new passClient($this->kernel);
    }

    public function templateMessage(): templateMessageClient
    {
        return new templateMessageClient($this->kernel);
    }
}
