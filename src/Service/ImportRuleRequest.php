<?php
namespace Yaoqi\Fuyou\Service;
use Yaoqi\Fuyou\Service\BaseService;

class ImportRuleRequest extends BaseService 
{
    /**
     * 商户名
     *
     * @var [type]
     */
    public $mchntName;
    public $splitCause;
    /**
     * 分账详细信息
     *
     * @var array
     */
    public $splitInfo=array();
    public $splitStartTime;
    public $autoSplit;
    public $accessory1;
    public $accessory2;
    public $splitSsn;
    public $subType;
    

    public function __construct($mchntName,$splitCause,$splitInfo=array(),$splitStartTime,$autoSplit,$accessory1,$accessory2,$splitSsn,$subType)
    {
        $this->mchntName=$mchntName;
        $this->splitCause=$splitCause;
        $this->splitInfo=$splitInfo;
        $this->splitStartTime=$splitStartTime;
        $this->autoSplit=$autoSplit;
        $this->accessory1=$accessory1;
        $this->accessory2=$accessory2;
        $this->splitSsn;
        $this->subType=$subType;
    }
    public function getSecret()
    {
        return $this->mchntCd."|".$this->autoSplit;
    }
}
