<?php
namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;
use Yaoqi\Fuyou\Support\SplitConstant;
use yaoqi\Fuyou\Support\Curl;
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
    public  $splitInfo  = array();
    public $autoSplit = 0;
    public $splitStartTim = "";

    public function __construct($mchntName, $splitCause, $splitInfo)
    {
        $this->mchntName = $mchntName;
        $this->splitCause = $splitCause;
        $this->splitInfo = $splitInfo;
    }
    public function getSecret()
    {
        return $this->mchntCd . "|" . $this->autoSplit;
    }
    function Request()
    {
        $wxpayurl = SplitConstant::$ADD_RULE;
        $this->mchntCd = SplitConstant::$mchntCd;
        $this->setMchntTxnSsn($this->getOrder());
        $this->setRem("规则导入");
        $data = Curl::post($wxpayurl, json_encode($this));
        return $data;
    }
}
