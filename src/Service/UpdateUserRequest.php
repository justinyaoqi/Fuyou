<?php
namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;

class UpdateUserRequest extends BaseService
{
    public $loginId;
    public $userType;
    public $mobileNo;
    public $custNm; //企业名称
    public $bankLicense; //开户银行许可
    public $artifNm;
    public $cityId;
    public $parentBankId; //开户行行别
    public $bankNm;
    public $capacntno;

    public function __construct($loginId, $userType, $mobileNo, $custNm, $bankLicense, $artifNm, $cityId, $parentBankId, $bankNm, $capacntno)
    {
        $this->loginId = $loginId;
        $this->userType = $userType;
        $this->mobileNo = $mobileNo;
        $this->custNm = $custNm;
        $this->bankLicense = $bankLicense;
        $this->artifNm = $artifNm;
        $this->cityId = $cityId;
        $this->parentBankId = $parentBankId;
        $this->bankNm = $bankNm;
        $this->capacntno = $capacntno;
    }

    public function getSecret()
    {
        return $this->artifNm . "|"
        . $this->bankLicense . "|"
        . $this->mchntCd . "|"
        . $this->mchntTxnSsn . "|"
        . $this->loginId . "|"
        . $this->capacntno . "|"
        . $this->parentBankId . "|"
        . $this->cityId . "|"
        . $this->userType . "|"
        . $this->mobileNo . "|"
        . $this->ver;
    }
}
