<?php
namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;
/**
 * 冻结请求参数
 */
class FreezeRequest extends BaseService
{
    private $loginId;
    private $amt;
    public function __construct($loginId, $amt)
    {
        $this->loginId = $loginId;
        $this->amt = $amt;

    }

    public function getSecret()
    {
        return $this->mchntCd . "|"
        . $this->loginId . "|"
        . $this->amt;
    }
}
