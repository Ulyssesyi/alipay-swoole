<?php
declare(strict_types=1);

namespace Alipay\EasySDKSwoole\Kernel\Functions;

use Alipay\EasySDKSwoole\Security\TextRisk\Client as textRiskClient;

class Security
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function textRisk(): textRiskClient
    {
        return new textRiskClient($this->kernel);
    }
}
