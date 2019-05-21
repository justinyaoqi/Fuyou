<?php
namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;

/**
 * 转账请求参数
 */
class TransferAccountRequest extends BaseService
{
    public $outCustNo;
    public $loginId;
    public $purpose;
    public $mchntTxnNum;
    public $srcFuiouOrderNo;

    public $inCustNo;
    public $amt;
    public $splitSsn;
    public $type;

    public function __construct($outCustNo, $loginId, $purpose, $mchntTxnNum, $srcFuiouOrderNo, $inCustNo, $amt, $splitSsn, $type)
    {
        $this->outCustNo = $outCustNo;
        $this->loginId = $loginId;
        $this->purpose = $purpose;
        $this->mchntTxnNum = $mchntTxnNum;
        $this->srcFuiouOrderNo = $srcFuiouOrderNo;

        $this->inCustNo = $inCustNo;
        $this->splitSsn = $splitSsn;
        $this->type = $type;
        $this->amt = $amt;
    }

    public function getSecret()
    {
        return $this->mchntCd . "|" . $this->inCustNo . "|" . $this->amt . "|" . $this->outCustNo . "|" . $this->splitSsn;
    }
}
