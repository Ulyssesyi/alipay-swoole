<?php
declare(strict_types=1);


namespace Alipay\EasySDKSwoole\Kernel;


use Alipay\EasySDKSwoole\Kernel\Functions\Base;
use Alipay\EasySDKSwoole\Kernel\Functions\Marketing;
use Alipay\EasySDKSwoole\Kernel\Functions\Member;
use Alipay\EasySDKSwoole\Kernel\Functions\Payment;
use Alipay\EasySDKSwoole\Kernel\Functions\Security;
use Alipay\EasySDKSwoole\Kernel\Functions\Util;

class Factory
{
    public $config = null;
    public $kernel = null;
    public $base;
    public $marketing;
    public $member;
    public $payment;
    public $security;
    public $util;

    public function __construct(Config $config)
    {
        if (!empty($config->alipayCertPath)) {
            $certEnvironment = new CertEnvironment();
            $certEnvironment->certEnvironment(
                $config->merchantCertPath,
                $config->alipayCertPath,
                $config->alipayRootCertPath
            );
            $config->merchantCertSN = $certEnvironment->getMerchantCertSN();
            $config->alipayRootCertSN = $certEnvironment->getRootCertSN();
            $config->alipayPublicKey = $certEnvironment->getCachedAlipayPublicKey();
        }

        $kernel = new EasySDKKernel($config);
        $this->base = new Base($kernel);
        $this->marketing = new Marketing($kernel);
        $this->member = new Member($kernel);
        $this->payment = new Payment($kernel);
        $this->security = new Security($kernel);
        $this->util = new Util($kernel);
    }
}
