<?php


namespace Alipay\EasySDKSwoole\Test\base\video;


use Alipay\EasySDKSwoole\Kernel\Factory;
use Alipay\EasySDKSwoole\Kernel\Util\ResponseChecker;
use Alipay\EasySDKSwoole\Test\TestAccount;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testUpload(){
        $account = new TestAccount();
        $responseChecker = new ResponseChecker();
        Factory::setOptions($account->getTestAccount());
        $filePath = $account->getResourcesPath() . '/resources/fixture/sample.mp4';
        $result = Factory::base()->video()->upload("测试视频", $filePath);
        $this->assertEquals(true, $responseChecker->success($result));
        $this->assertEquals('10000', $result->code);
        $this->assertEquals('Success', $result->msg);
    }
}
