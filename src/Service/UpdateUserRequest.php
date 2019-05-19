<?php
namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;

class UpdateUserRequest extends BaseService
{
    private $loginId;
    private $userType;
    private $mobileNo;
    private $custNm; //企业名称
    private $bankLicense; //开户银行许可
    private $artifNm;
    private $cityId;
    private $parentBankId; //开户行行别
    private $bankNm;
    private $capacntno;

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
