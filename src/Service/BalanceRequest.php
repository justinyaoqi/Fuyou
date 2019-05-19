<?php
namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;

class BalanceRequest extends BaseService 
{
    private $mchntTxnDt;
    private $custNo;
    
    public function getSecret()
    {
        return $this->mchntCd."|".$this->custNo;
    }
}
