<?php

namespace Yaoqi\Fuyou\Service;

//use Yaoqi\Fuyou\Support\Log;
//use Yaoqi\Fuyou\Support\Json;

class BaseService
{
    public $ver;
    public $mchntCd;
    public $mchntTxnSsn;
    public $signature;
    public $rem; //备注信息

    //设置备注信息
    public function setRem($rem)
    {
        $this->rem = $rem;
    }
    //设置版本号
    public function getVer()
    {
        return $this->ver;

    }
    public function setVer($ver)
    {
        $this->ver = $ver;
    }
    //公共字段

    public function setMchntCd($cd)
    {
        $this->mchntCd = $cd;
    }
    public function setMchntTxnSsn($ms)
    {
        $this->mchntTxnSsn = $ms;
    }
    public function getMchntTxnSsn()
    {
        return $this->mchntTxnSsn;

    }

    public function setSignature($sign)
    {
        $this->signature = $sign;
    }
    public function getSignature()
    {
        return $this->signature;
    }

    public function getOrder()
    {
        $order_id_main = date('YmdHis') . rand(10000000, 99999999);

        $order_id_len = strlen($order_id_main);

        $order_id_sum = 0;

        for ($i = 0; $i < $order_id_len; $i++) {

            $order_id_sum += (int) (substr($order_id_main, $i, 1));

        }
        $osn = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100, 2, '0', STR_PAD_LEFT);
        return $osn;
    }

}
