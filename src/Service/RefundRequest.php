<?php
namespace Yaoqi\Fuyou\Service;
use Yaoqi\Fuyou\Service\BaseService;
/**
 * 退款请求参数
 */
class RefundRequest extends BaseService 
{
    private $mchntTxnNum;
    private $paymentType;
    private $orderType;
    private $amt;
    private $refundAmt;
    private $refundReason;
    private $rebates;
    
    public function __contrust($mchntTxnNum,$paymentType,$orderType,$amt,$refundAmt,$refundReason,$rebates)
    {
        $this->mchntTxnNum=$mchntTxnNum;
        $this->paymentType=$paymentType;
        $this->orderType=$orderType;
        $this->amt=$amt;
        $this->refundAmt=$refundAmt;
        $this->refundReason=$refundAmt;
        $this->rebates=$rebates;
    }
    public function getSecret()
    {
      return  $this->mchntCd."|".$this->mchntTxnNum."|".$this->amt."|".$this->mchntTxnSsn;
    }
}
