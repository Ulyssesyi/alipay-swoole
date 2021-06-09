<?php
declare(strict_types=1);

namespace Alipay\EasySDKSwoole\Kernel\Functions;

use Alipay\EasySDKSwoole\Member\Identification\Client as identificationClient;

class Member
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function identification(): identificationClient
    {
        return new identificationClient($this->kernel);
    }
}
