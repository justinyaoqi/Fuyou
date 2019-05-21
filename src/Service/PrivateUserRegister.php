<?php
namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;
use Yaoqi\Fuyou\Support\SplitConstant;
//开户
class PrivateUserRegister extends BaseService
{
  public $certifType; //证件类型
  public $certifId; //身份证号码
  public $mobileNo;
  public $email;
  public $cityId;
  public $parentBankId;
  public $bankNm;
  public $artifNm; //户名
  public $capAcntNo; //账号
  public $accessory1; //正面
  public $accessory2; //正面
  public $accessory3;
  public function __construct($certifType, $certifId, $mobileNo, $email, $cityId, $parentBankId, $bankNm, $artifNm, $capAcntNo, $accessory1, $accessory2, $accessory3)
  {
    $this->certifType = $certifType;
    $this->certifId = $certifId;
    $this->mobileNo = $mobileNo;
    $this->email = $email;
    $this->cityId = $cityId;
    $this->parentBankId = $parentBankId;
    $this->bankNm = $bankNm;
    $this->artifNm = $artifNm;
    $this->capAcntNo = $capAcntNo;
    $this->accessory1 = $accessory1;
    $this->accessory2 = $accessory2;
    $this->accessory3 = $accessory3;
    $this->setVer(SplitConstant::$ver);
    $this->setMchntCd(SplitConstant::$mchntCd);
    $this->setMchntTxnSsn($this->getOrder());
    $this->agreement = "1";
  }
  /**
   * 签名
   *
   * @return void
   */
  public function getSecret()
  {
    return    $this->artifNm . "|" . $this->mchntCd . "|" . $this->mchntTxnSsn . "|" . $this->bankNm . "|" . $this->certifId . "|" . $this->mobileNo . "|" . $this->ver;
  }
  public function Request()
  {
    $url = SplitConstant::$ADD_PRI_USER;
    //      var_dump($this);
    $data = Curl::post($url, $this);
    //      var_dump($data);
    return $data;
  }
}
