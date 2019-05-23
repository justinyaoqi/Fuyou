<?php
namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;
//use Yaoqi\Fuyou\Support\Rsa;
use Yaoqi\Fuyou\Support\SplitConstant;

/**
 * 开户注册请求实体类
 */
class UserRegister extends BaseService
{
    public $custNm;
    public $brandName;
    public $unifiedCode;
    public $businessLicense;
    /**
     * 营业执照有效期
     *
     * @var [type]
     */
    public $licenseIndate;
    /**
     * 税务登记号
     *
     * @var [type]
     */
    public $taxNum;
    /**
     * 税务登记号
     *
     * @var [type]
     */
    public $orgNum;
    /**
     * 法人姓名
     *
     * @var [type]
     */
    public $artifNm;

    public $contact;
    public $certifId;
    public $mobileNo;
    public $email;
    public $bankLicense;
    public $cityId;
    public $bankNm;
    public $agreemnet;
    /**
     * 账号
     *
     * @var [type]
     */
    public $capacntno;
    public $accessory1;
    public $accessory2;
    public $companyOrgNum;
    public $parentBankId;

    public function __construct(
        $custNm,
        $brandName,
        $unifiedCode,
        $businessLicense,
        $licenseIndate,
        $taxNum,
        $orgNum,
        $companyOrgNum,
        $artifNm,
        $contact,
        $certifId,
        $mobileNo,
        $email,
        $bankLicense,
        $cityId,
        $parentBankId,
        $bankNm,
        $agreement,
        $capacntno,
        $accessory1,
        $accessory2
    ) {
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
            . $this->cityId . "|"
            . $this->taxNum . "|"
            . $this->licenseIndate . "|"
            . $this->custNm . "|"
            . $this->ver;
    }
    public function getSignMd5()
    {
        $str = $this->artifNm . "|"
            . $this->bankLicense . "|"
            . $this->mchntCd . "|"
            . $this->mchntTxnSsn . "|"
            . $this->bankNm . "|"
            . $this->brandName . "|"
            . $this->capacntno . "|"
            . $this->certifId . "|"
            . $this->cityId . "|"
            . $this->taxNum . "|"
            . $this->licenseIndate . "|"
            . $this->custNm . "|"
            . $this->ver;

        return md5($str);
    }

    public function Request()
    {
        $url = SplitConstant::$WITHDRAW;
        $this->setVer(SplitConstant::$ver);
        $this->setMchntCd(SplitConstant::$mchntCd);
        $this->setMchntTxnSsn($this->getOrder());

        $data = Curl::post($url, json_encode(self));
        return $data;
    }
}
