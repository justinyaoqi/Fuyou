<?php

class fywxpay
{
    //公共参数
    protected $ver = "0.4";
    protected $mchntCd; //商户代码
    protected $mchntTxnSsn; //请求流水号，商户端唯一标识
    protected $signature; //签名

    protected $paymentType; //交易类型 M
    protected $channel; //交易来源   M
    protected $intoAccount; //入账户 M
    protected $amt; //交易金额 M
    protected $splitSsn; //分账编号 c
    protected $splitType; //直接分账 o

    protected $purpose; //交易用途 M
    protected $goodsType; //商品类型 M
    protected $subject; //商品名称 M
    protected $goodsDes; //交易具体描述 M
    protected $goodsQuanity; //商品标记 o
    protected $termIp; //移动端ip M

    protected $notifyUrl; //M
    protected $frontnotifyUrl; //前台通知Url 0
    protected $orderType; //订单类型 GZXS公众号线上 APP app支付 LPXS 小程序线上
    protected $openid; // M
    protected $subOpenid; //子商户用户标识
    protected $subAppid; //子商户公众号ID

    
    public function __construct($intoAccount, $amt, $goodsname, $goodsDes, $openid, $out_trade_no)
    {
        $this->mchntCd = "0002900F8001227";
        $this->mchntTxnSsn = $out_trade_no;

        $this->paymentType = "04";
        $this->channel = "5";
        $this->intoAccount = $intoAccount; //测试入账id
        $this->amt = $amt;
        $this->purpose = "01"; //交易用途
        $this->goodsType = "56";
        $this->subject = $goodsname;
        $this->goodsDes = $goodsDes;
        $this->termIp = "";
        $this->orderType = "LPXS";
        $this->openid = $openid;
    }
    //签名
    public function signature()
    {
        
        return md5($this->intoAccount . "|" . $this->mchntTxnSsn . "|" . $this->mchntCd . "|" . $this->paymentType . "|" . $this->termIp . "|" . $this->amt);
    }

    //统一下单
    public function unifiedorder()
    {
        $url = "http://180.168.100.155:8069/sub-account/pay/wxPay.html";
        $parameters = array(
            "ver" => $this->ver,
            "mchntCd" => $this->mchntCd,
            "mchntTxnSsn" => $this->mchntTxnSsn,
            "signature" => $this->signature(),
            "paymentType" => $this->paymentType,
            "channel" => $this->channel,
            "splitType" => "0",
            "orderType" => $this->orderType,
            "intoAccount" => $this->intoAccount,
            "subOpenid" => $this->subOpenid,
            "splitSsn" => $this->splitSsn,
            "openid" => $this->openid,
            "subAppid" => $this->subAppid,
            "purpose" => $this->purpose,
            "amt" => $this->amt,
            "goodsType" => $this->goodsType,
            "termIp" => $this->termIp,
            "notifyUr" => $this->notifyUrl,

        );
        $this->postJsonCurl($parameters, $url);
    }
    //
    public function pay()
    {

    }
//作用：产生随机字符串，不长于32位
    private function createNoncestr($length = 32)
    {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
    private static function postJsonCurl($json, $url, $second = 30)
    {
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //严格校验
        //设置header
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
        )
        );
        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //post提交方式
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_decode($json, true));

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_TIMEOUT, 40);
        set_time_limit(0);

        //运行curl
        $data = curl_exec($ch);
        //返回结果
        if ($data) {
            curl_close($ch);
            echojson($data);
            //return $data;
        } else {
            $error = curl_errno($ch);
            curl_close($ch);
            throw new WxPayException("curl出错，错误码:$error");
        }
    }

    private function echojson($data)
    {
        var_dump($data);
        return data;
    }

    //微信小程序接口
    private function weixinapp()
    {
        //统一下单接口
        $unifiedorder = $this->unifiedorder();
        // var_dump($unifiedorder);die();
        //        print_r($unifiedorder);
        $parameters = array(
            'appId' => $this->appid, //小程序ID
            'timeStamp' => '' . time() . '', //时间戳
            'nonceStr' => $this->createNoncestr(), //随机串
            'package' => 'prepay_id=' . $unifiedorder['prepay_id'], //数据包
            'signType' => 'MD5', //签名方式
        );
        //签名
        $parameters['paySign'] = $this->getSign($parameters);
        return $parameters;
    }

}
