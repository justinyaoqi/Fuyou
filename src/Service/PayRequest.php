<?php

namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;
use Yaoqi\Fuyou\Support\SplitContstant;

/**
 * 微信支付类
 */
class PayRequest extends BaseService
{
    private $paymentType;
    private $channel;
    private $intoAccount;
    private $amt;
    private $purpose;
    private $goodsType;
    private $subject;
    private $goodsDes;
    private $goodsTag;
    private $goodsQuanity;
    /**
     * 分账编号
     *
     * @var [type]
     */
    private $splistSsn;
    private $splitType;
    private $termIp;
    private $reserveddeviceInfo;
    private $addnInfo;
    private $notifyUrl;
    private $frontnotifyUrl;
    private $limitPay;
    private $orderType;
    private $openId;
    private $subOpenId;
    private $subAppid;
    private $reservedFyTermId;
    private $reservedExpireMinute;
    private $reservedUserCreid;
    private $reservedUserTrueName;
    private $reservedUserMobile;

    /**
     * 微信支付初始化
     * 
     *
     * @param array $arr
     */
    public function __construct($arr)
    {
        $this->paymentType = $arr['paymentType'];
        $this->channel = $arr['channel'];
        $this->intoAccount = $arr['intoAccount'];
        $this->amt = $arr['amt'];
        $this->purpose = $arr['purpose'];
        $this->goodsType = $arr['goodsType'];
        $this->subject = $arr['subject'];
        $this->goodsDes = $arr['goodsDes'];
        $this->goodsTag = $arr['goodsTag'];
        $this->goodsQuanity = $arr["goodsQuanity"]; //商品数量
        $this->splistSsn = $arr['splistSsn'];
        $this->splitType = $arr["splitType"];
        $this->termIp = $arr["termIp"];
        $this->reserveddeviceInfo = $arr["reserveddeviceInfo"];
        $this->addnInfo = $arr["addnInfo"];
        $this->notifyUrl = $arr["notifyUrl"];
        $this->frontnotifyUrl = $arr["frontnotifyUrl"];
        $this->limitPay = $arr[""];
        $this->orderType = $arr["orderType"];
        $this->openId = $arr[""];
        $this->subOpenId = $arr[""];
        $this->subAppid = $arr[""];
        $this->reservedFyTermId = $arr["reservedFyTermId"];
        $this->reservedExpireMinute = $arr["reservedExpireMinute"];
        $this->reservedUserCreid = $arr["reservedUserCreid"];
        $this->reservedUserTrueName = $arr["reservedUserTrueName"];
        $this->reservedUserMobile = $arr["reservedUserMobile"];

    }
    /**
     * 签名排序
     *
     * @return void
     */
    public function getSecret()
    {
        return $this->intoAccount . "|"
        . $this->mchntTxnSsn . "|"
        . $this->mchntCd . "|"
        . $this->paymentType . "|"
        . $this->termIp . "|"
        . $this->amt;
    }
    public function request()
    {
       $wxpayurl= SplitContstant::$WX_PAY;
       $this->setVer(SplitContstant::$ver);
       $this->setMchntCd(SplitContstant::$mchntCd);
      // $this->setMchntTxnSsn($this->getOrder());
       $data=Curl::post($wxpayurl,json_encode(self));
       return $data;
    }
}
