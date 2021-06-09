<?php
declare(strict_types=1);


namespace Alipay\EasySDKSwoole\Kernel;


class Factory
{
    public $config = null;
    public $kernel = null;
    protected $base;
    protected $marketing;
    protected $member;
    protected $payment;
    protected $security;
    protected $util;

    public function __construct($config)
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
        self::$base = new Base($kernel);
        self::$marketing = new Marketing($kernel);
        self::$member = new Member($kernel);
        self::$payment = new Payment($kernel);
        self::$security = new Security($kernel);
        self::$util = new Util($kernel);
    }
}
