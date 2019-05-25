<?php
namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Support\SplitConstant;
use Yaoqi\Fuyou\Support\Curl;

class WxOffline extends BaseService
{
    /**
     * 开户时返回的loginid
     *
     * @var string
     */
    public $loginId;
    /**
     * 后台通知接口
     *
     * @var string
     */
    public $backNotifyUrl;
    /**
     * 商户名称
     *
     * @var string
     */
    public $custNm;
    public $brandNm;
    public $realName; //商户真实名称
    public $liceneType;
    public $licenseNo;
    public $licenseExpireDt;
    public $certifId;
    public $certifIdExpireDt;
    public $contactPerson;
    public $contactPhone;
    /**
     *新开户必填必附件 1：微信经营范围代码
     *
     * @var [type]
     */
    public $business;
    public $cityCd;
    public $countyCd;
    public $acntType;
    public $parentBankId;
    /**
     * 联行号
     *
     * @var 
     */
    public $interBankNo;
    public $bankNm;
    public $acntNm;
    public $acntNo;
    public $actiNm; //法人姓名
    /**
     * 是否法人入账
     *
     * @var [type]
     */
    public $acntArtifFlag;
    /**
     * 入账身份证类型
     *
     * @var string
     */
    public $acntCertifTp; //非法人必填身份证号,法人为0
    /**
     * 入账证件类型
     *
     * @var [type]
     */
    public $acntCertifId; //同上
    public $acntCertifExpireDt;
    public $contactAddr;
    public $mcc; //富友户经营范围
    public $contactMobile;
    public $contactEmail;
    public function __construct($arr)
    {
        $this->loginId = $arr['loginId'];
        $this->backNotifyUrl = $arr['backNotifyUrl'];
        $this->custNm = $arr['custNm'];
        $this->brandNm = $arr['bandNm'];
        $this->realNm = $arr['realNm'];
        $this->licenseType = $arr['licenseType'];
        $this->licenseNo = $arr['licenseNo'];
        $this->licenseExpireDt = $arr['licenseExpireDt'];
        $this->certifId = $arr['certifId'];
        $this->certifIdExpireDt = $arr['certifIdExpireDt'];
        $this->contactPerson = $arr['contactPerson'];
        $this->contactPhone = $arr['contactPhone'];
        $this->business = $arr['business'];
        $this->cityCd = $arr['cityCd'];
        $this->acntType = $arr['acntType'];
        $this->parentBankId = $arr['parentBankId'];
        $this->interBankNo = $arr['interBankNo'];
        $this->bankNm = $arr['bankNm'];
        $this->acntNm = $arr['acntNm'];
        $this->acntNo = $arr['acntNo'];
        $this->artifNm = $arr['artifNm'];
        $this->acntArtifFlag = $arr['acntArtifFlag'];
        $this->acntCertifTp = $arr['acntCertifTp'];
        $this->acntCertifId = $arr['acntCertifId'];
        $this->acntCertifExpireDt = $arr['acntCertifExpireDt'];
        $this->contactAddr = $arr['contactAddr'];
        $this->mcc = $arr['mcc'];
        $this->contactMobile = $arr['contactMobile'];
        $this->contactEmail = $arr['contactEmail'];
        $this->countyCd = $arr['countyCd'];
    }


    public function getSecret()
    {
        return  $this->loginId . "|"
            . $this->mchntCd . "|"
            . $this->mchntTxnSsn . "|"
            . $this->custNm . "|"
            . $this->brandNm . "|"
            . $this->realName . "|"
            . $this->contactPhone . "|"
            . $this->contactMobile . "|"
            . $this->contactEmail . "|"
            . $this->business . "|"
            . $this->cityCd . "|"
            . $this->countyCd . "|"
            . $this->parentBankId . "|"
            . $this->interBankNo . "|"
            . $this->bankNm . "|"
            . $this->acntNm . "|"
            . $this->acntNo . "|"
            . $this->contactPerson . "|"
            . $this->ver;
    }

    public function Request()
    {
        $url = SplitConstant::$WX_OFFELINE_ADD;

        $this->mchntTxnSsn = $this->getOrder();
        return Curl::post($url, json_encode($this));
    }
}
