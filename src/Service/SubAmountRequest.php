<?php
namespace Yaoqi\Fuyou\Service;
use Yaoqi\Fuyou\Service\BaseService;
/**
 * 分账
 */
class SubAmountRequest extends BaseService 
{
    public $custNm;
    public $spliteSsn;
    public $mchntTxnNum;
    public $orgNum;//机构号
    
    public function __construct($custNm,$spliteSsn,$mchntTxnNum,$orgNum)
    {
       $this->custNm=$custNm;
       $this->spliteSsn=$spliteSsn;
       $this->mchntTxnNum=$mchntTxnNum;
       $this->orgNum=$orgNum;
    }

    public function getSecret()
    {
        return $this->mchntCd."|".$this->spliteSsn."|".$this->mchntTxnNum;
    }
}
