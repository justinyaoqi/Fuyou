<?php
namespace Yaoqi\Fuyou\Service;

use Yaoqi\Fuyou\Service\BaseService;

class RuleDetail extends BaseService
{
    public $rowId;
    public $splitSsn;
    public $contractName;
    public $contractSsn;
    public $participant;
    public $startDate;
    public $endDate;
    public $splitScale;
    public $splitAmt;
    public $splitAccount;

    public $priorityLev;
    public $accessory1;
    public $accessory2;

    public function __construct($rowId, $splitSsn, $contractName,
        $contractSsn, $participant, $startDate, $endDate, $splitScale,
        $splitAmt, $splitAccount, $priorityLev, $accessory1, $accessory2) {
        $this->rowId = $rowId;
        $this->splitSsn = $splitSsn;
        $this->contractName = $contractName;
        $this->contractSsn = $contractSsn;
        $this->participant = $participant;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->splitScale = $splitScale;
        $this->splitAmt = $splitAmt;
        $this->splitAccount = $splitAccount;
        $this->priorityLev = $priorityLev;
        $this->accessory1 = $accessory1;
        $this->accessory2 = $accessory2;
    }
}
