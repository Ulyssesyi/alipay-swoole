<?php


namespace Alipay\EasySDKSwoole\Test\multipleFactory;

use Alipay\EasySDKSwoole\Kernel\MultipleFactory;
use Alipay\EasySDKSwoole\Test\TestAccount;
use PHPUnit\Framework\TestCase;

class ClientTest  extends TestCase
{
    public function testSDKExecute()
    {

        $bizParams = array(
            "subject" => "Iphone6 16G",
            "out_trade_no" => "f4833085-0c46-4bb0-8e5f-622a02a4cffc",
            "total_amount" => "0.10"
        );
        $textParams = array();

        $account = new TestAccount();
        MultipleFactory::setOptions($account->getTestAccount());
        $result = MultipleFactory::util()->generic()->sdkExecute("alipay.trade.app.pay", $textParams, $bizParams);
        $this->assertEquals(true, strpos($result->body, 'alipay_sdk=alipay-easysdk-php') > 0);
        $this->assertEquals(true, strpos($result->body, 'app_id=2019022663440152') > 0);

        MultipleFactory::setOptions($account->getTestCertAccount());
        $result2 = MultipleFactory::util()->generic()->sdkExecute("alipay.trade.app.pay", $textParams, $bizParams);
        $this->assertEquals(true, strpos($result2->body, 'alipay_sdk=alipay-easysdk-php') > 0);
        $this->assertEquals(true, strpos($result2->body, 'app_id=2019051064521003') > 0);

    }

}
