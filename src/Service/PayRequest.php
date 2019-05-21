<?php

namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;
use Yaoqi\Fuyou\Support\SplitConstant;
use Yaoqi\Fuyou\Support\Curl;
/**
 * 微信支付类
 */
class PayRequest extends BaseService
{
    public $paymentType;
    public $channel;
    public $intoAccount;
    public $amt;
    public $purpose;
    public $goodsType;
    public $subject;
    public $goodsDes;
    public $goodsTag;
    public $goodsQuanity;
    /**
     * 分账编号
     *
     * @var [type]
     */
    public $splistSsn;
    public $splitType;
    public $termIp;
    public $reserveddeviceInfo;
    public $addnInfo;
    public $notifyUrl;
    public $frontnotifyUrl;
    public $limitPay;
    public $orderType;
    public $openId;
    public $subOpenId;
    public $subAppid;
    public $reservedFyTermId;
    public $reservedExpireMinute;
    public $reservedUserCreid;
    public $reservedUserTrueName;
    public $reservedUserMobile;

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
        $this->setVer(SplitConstant::$ver);
        $this->setMchntCd(SplitConstant::$mchntCd);

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
       $wxpayurl= SplitConstant::$WX_PAY;
      
      // $this->setMchntTxnSsn($this->getOrder());
       $data=Curl::post($wxpayurl,json_encode($this));
       return $data;
    }
}
