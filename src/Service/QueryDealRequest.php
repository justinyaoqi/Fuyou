<?php
namespace Yaoqi\FuYou\Service;

use Yaoqi\Fuyou\Service\BaseService;

class QueryDealRequest extends BaseService
{
    private $tradeType;
    private $payType;
    private $startDay;
    private $endDay;
    private $txnSsn;
    private $mchntTxnNum;
    private $splitNum;
    private $custNo;
    private $txnSt;
    private $pageNo;
    private $pageSize;
    public function __construct($tradeType, $payType, $startDay, $endDay, $txnSsn, $mchntTxnNum, $splitNum, $custNo, $txnSt, $pageNo, $pageSize)
    {
        $this->tradeType = $tradeType;
        $this->payType = $payType;
        $this->startDay = $startDay;
        $this->endDay = $endDay;
        $this->txnSsn = $txnSsn;
        $this->mchntTxnNum = $mchntTxnNum;
        $this->splitNum = $splitNum;
        $this->custNo = $custNo;
        $this->txnSt = $txnSt;
        $this->pageNo = $pageNo;
        $this->pageSize = $pageSize;
    }
    public function getSecret()
    {
        return $this->mchntCd . "|"
        . $this->custNo > "|"
        . $this->payType;
    }
}
