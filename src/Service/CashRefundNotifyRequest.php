<?php
namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;

/**
 * 提现退票通知
 */
class CashRefundNotifyRequest extends BaseService
{
    private $mchntCd;
    private $mchntTxnSsn;
    private $mchntTxnDt;
    private $mobileNo;
    private $amt;
    private $remark;
    private $signature;
    
    public function __construct($mchntCd, $mchntTxnSsn, $mchntTxnDt, $mobileNo, $amt, $remark, $signature)
    {
        $this->mchntCd = $mchntCd;
        $this->mchntTxnDt = $mchntTxnDt;
        $this->mchntTxnSsn = $mchntTxnSsn;
        $this->mobileNo = $mobileNo;
        $this->amt = $amt;
        $this->remark = $remark;
        $this->signature = $signature;
    }
}
