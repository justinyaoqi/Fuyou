<?php
namespace Yaoqi\Fuyou\Service;
use Yaoqi\Fuyou\Service\BaseService;
use Yaoqi\Fuyou\Support\SplitConstant;
use Yaoqi\Fuyou\Support\Curl;

/**
 * 分账
 */
class SubAmountRequest extends BaseService 
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    public $custNm;
    public $spliteSsn;
    public $mchntTxnNum;
   // public $orgNum;//机构号
    
    public function __construct($custNm,$spliteSsn,$mchntTxnNum)
    {
       $this->custNm=$custNm;
       $this->spliteSsn=$spliteSsn;
       $this->mchntTxnNum=$mchntTxnNum;
       //$this->orgNum=$orgNum;
    }

    public function getSecret()
    {
        return $this->mchntCd."|".$this->spliteSsn."|".$this->mchntTxnNum;
    }
    public function Request()
    {
        $url=SplitConstant::$SUB_ACCOUNT;
        $this->mchntCd=SplitConstant::$mchntCd;
        return Curl::post($url,json_encode($this));
    }
}
