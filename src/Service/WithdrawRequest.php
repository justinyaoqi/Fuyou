<?php 

namespace Yaoqi\Fuyou\Service;
use Yaoqi\Fuyou\Service\BaseService;
use Yaoqi\Fuyou\Support\Curl;
use Yaoqi\Fuyou\Support\SplitContstant;

class WithdrawRequest extends BaseService 
{
    private $loginId;
    private $amt;
    private $pageNotifyUrl;
    private $backNotifyUrl;
    private $channel;

    public function __construct($loginId,$amt,$pageNotifyUrl,$backNotifyUrl,$channel)
    {
        $this->loginId=$loginId;
        $this->amt=$amt;
        $this->pageNotifyUrl=$pageNotifyUrl;
        $this->backNotifyUrl=$backNotifyUrl;
        $this->channel=$channel;
    }
    public function getSecret()
    {
       return $this->mchntCd."|"
        .$this->loginId."|"
        .$this->amt."|"
        .$this->pageNotifyUrl."|"
        .$this->backNotifyUrl>"|"
        .$this->amt;
    }

    public function Request()
    {
        $url=SplitContstant::$WITHDRAW;
        $this->setVer(SplitContstant::$ver);
        $this->setMchntCd(SplitContstant::$mchntCd);
        $this->setMchntTxnSsn($this->getOrder());
        $data=Curl::post($url,json_encode(self));
        return $data;
    }

}
