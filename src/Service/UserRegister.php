<?php
namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;
use Yaoqi\Fuyou\Support\Rsa;
use Yaoqi\Fuyou\Support\SplitContstant;

/**
 * 开户注册请求实体类
 */
class UserRegister extends BaseService
{
    private $custNm;
    private $brandName;
    private $unifiedCode;
    private $businessLicense;
    /**
     * 营业执照有效期
     *
     * @var [type]
     */
    private $licenseIndate;
    /**
     * 税务登记号
     *
     * @var [type]
     */
    private $taxNum;
    /**
     * 税务登记号
     *
     * @var [type]
     */
    private $orgNum;
    /**
     * 法人姓名
     *
     * @var [type]
     */
    private $artifNm;

    private $contact;
    private $certifId;
    private $mobileNo;
    private $email;
    private $bankLicense;
    private $cityId;
    private $bankNm;
    private $agreemnet;
    /**
     * 账号
     *
     * @var [type]
     */
    private $capacntno;
    private $accessory1;
    private $accessory2;
    private $companyOrgNum;
    private $parentBankId;

    public function __construct($custNm, $brandName, $unifiedCode, $businessLicense,
        $licenseIndate, $taxNum, $orgNum, $companyOrgNum, $artifNm, $contact,
        $certifId, $mobileNo, $email, $bankLicense, $cityId, $parentBankId, $bankNm, $agreement, $capacntno, $accessory1, $accessory2) {
        $this->custNm = $custNm;
        $this->brandName = $brandName;
        $this->unifiedCode = $unifiedCode;
        $this->businessLicense = $businessLicense;
        $this->licenseIndate = $licenseIndate;
        $this->taxNum = $taxNum;
        $this->orgNum = $orgNum;
        $this->companyOrgNum = $companyOrgNum;
        $this->artifNm = $artifNm;
        $this->contact = $contact;
        $this->certifId = $certifId;
        $this->mobileNo = $mobileNo;
        $this->email = $email;
        $this->bankLicense = $bankLicense;
        $this->cityId = $cityId;
        $this->parentBankId = $parentBankId;
        $this->bankNm = $bankNm;
        $this->agreemnet = $agreement;
        $this->capacntno = $capacntno;
        $this->accessory1 = $accessory1;
        $this->accessory2 = $accessory2;
    }

    public function getSecret()
    {
        return $this->artifNm . "|"
        . $this->bankLicense . "|"
        . $this->mchntCd . "|"
        . $this->mchntTxnSsn . "|"
        . $this->bankNm . "|"
        . $this->brandName . "|"
        . $this->capacntno . "|"
        . $this->certifId . "|"
        . $this->taxNum . "|"
        . $this->licenseIndate . "|"
        . $this->custNm . "|"
        . $this->ver;
    }
    public function getSignMd5()
    {
        $str=$this->artifNm."|"
        .$this->bankLicense."|"
        .$this->mchntCd."|"
        .$this->mchntTxnSsn."|"
        .$this->bankNm."|"
        .$this->brandName."|"
        .$this->capacntno."|"
        .$this->certifId."|"
        .$this->cityId."|"
        .$this->taxNum."|"
        .$this->licenseIndate."|"
        .$this->custNm."|"
        .$this->ver;
        
        return md5($str);
    }

    public function Request()
    {
        $url=SplitContstant::$WITHDRAW;
        $this->setVer(SplitContstant::$ver);
        $this->setMchntCd(SplitContstant::$mchntCd);
        $this->setMchntTxnSsn($this->getOrder());

        //生成签名
        $sign=Rsa::getSign($this->getSignature,SplitContstant::$PRI_SIGN_KEY);
        $checksign= Rsa::checkSign(SplitContstant::$PUB_SIGN_KEY,$sign,$this->getSignature);
        var_dump($checksign);
        $this->setSignature($sign);
        $data=Curl::post($url,json_encode(self));
        var_dump($data);
    }
}
