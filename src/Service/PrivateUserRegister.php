<?php
namespace Yaoqi\Fuyou\Service;
use Yaoqi\Fuyou\Service\BaseService;
use Yaoqi\Fuyou\Support\SplitConstant;
use Yaoqi\Fuyou\Support\Curl;
//开户
class PrivateUserRegister extends BaseService
{
    private $certifType; //证件类型
    private $certifId; //身份证号码
    private $mobileNo;
    private $email;
    private $cityId;
    private $parentBankId;
    private $bankNm;
    private $artifNm; //户名
    private $capAcntNo; //账号
    private $accessory1; //正面
    private $accessory2; //正面
    private $accessory3;
    public function __construct($certifType,$certifId,$mobileNo,$email,$cityId,$parentBankId,$bankNm,$artifNm,$capAcntNo,$accessory1,$accessory2,$accessory3)
    {
      $this->certifType=$certifType;
      $this->certifId=$certifId;
      $this->mobileNo=$mobileNo;
      $this->email=$email;
      $this->cityId=$cityId;
      $this->parentBankId=$parentBankId;
      $this->bankNm=$bankNm;
      $this->artifNm=$artifNm;
      $this->capAcntNo=$capAcntNo;
      $this->accessory1=$accessory1;
      $this->accessory2=$accessory2;
      $this->accessory3=$accessory3;
    }
/**
 * 签名
 *
 * @return void
 */
    public function getSecret(){
      return    $this->artifNm."|".$this->mchntCd."|".$this->mchntTxnSsn."|".$this->bankNm."|".$this->certifId."|".$this->mobileNo."|".$this->ver;
    }
    public function Request()
    {
        $url=SplitConstant::$ADD_PRI_USER;
        $this->setVer(SplitConstant::$ver);
        $this->setMchntCd(SplitConstant::$mchntCd);
        $this->setMchntTxnSsn($this->getOrder());
        $data=Curl::post($url,json_encode(self));
        return $data;
    }
}
