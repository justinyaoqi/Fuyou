<?php 

namespace Yaoqi\Fuyou\Service;
use Yaoqi\Fuyou\Service\BaseService;
use Yaoqi\Fuyou\Support\Curl;
use Yaoqi\Fuyou\Support\SplitConstant;

class WithdrawRequest extends BaseService 
{
    public $loginId;
    public $amt;
    public $pageNotifyUrl;
    public $backNotifyUrl;
    public $channel;

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
        $url=SplitConstant::$WITHDRAW;
        $this->setVer(SplitConstant::$ver);
        $this->setMchntCd(SplitConstant::$mchntCd);
        $this->setMchntTxnSsn($this->getOrder());
        $data=Curl::post($url,json_encode(self));
        return $data;
    }

}
