<?php
namespace Yaoqi\Fuyou\Service;
use Yaoqi\Fuyou\Service\BaseService;

class TransferRequest extends BaseService 
{
    public $loginId;
    public $purpose;
    public $amt;
    public $splitSsn;
    public $type;

public function __construct($loginId,$purpose,$amt,$splitSsn,$type)
{
   $this->loginId=$loginId;
   $this->purpose=$purpose;
   $this->amt=$amt;
   $this->splitSsn=$splitSsn;
   $this->type=$type;
}

    public function getSecret()
    {
        return $this->mchntCd."|".$this->amt."|".$this->splitSsn."|"
        .$this->type."|"
        .$this->loginId."|"
        .$this->purpose."|"
        .$this->mchntTxnSsn."|"
        .$this->ver;
    }
}
