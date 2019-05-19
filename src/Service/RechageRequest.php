<?php

namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;

class RechargeRequest extends BaseService
{
    private $loginId;
    private $amt;
    private $pageNotifyUrl;
    private $backNotifyUrl;
    private $channel;

    public function __construct($loginId, $amt, $pageNotifyUrl, $backNotifyUrl, $channel)
    {
        $this->loginId = $loginId;
        $this->amt = $amt;
        $this->pageNotifyUrl = $pageNotifyUrl;
        $this->backNotifyUrl = $backNotifyUrl;
        $this->channel = $channel;
    }

    public function getSecret()
    {
        //$this->mch
        return $this->mchntCd . "|"
        . $this->loginId . "|"
        . $this->amt . "|"
        . $this->pageNotifyUrl . "|"
        . $this->backNotifyUrl;
    }
}
