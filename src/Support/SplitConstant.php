<?php
namespace Yaoqi\Fuyou\Support;
const HTTP_URL = "http://180.168.100.155:8069/sub-account";
  class SplitConstant
{
    
    public static $ver="0.44";
    public static $mchntCd="0002900F8001227";
    public static $mchntTxnSsn="";
    public static $ADD_USER = HTTP_URL . "/splitUser/addUser.html";
    public static $ADD_PRI_USER=HTTP_URL."/splitUser/addPriUser.html";
    public static $UPDATE_USER = HTTP_URL . "/splitUser/updateUser.html";
    public static $ADD_RULE = HTTP_URL . "/splitRule/addRule.html";
    public static $SUB_ACCOUNT = HTTP_URL . "/balance/subaccount.html";
    public static $EBANK_RECHARGE = HTTP_URL . "";
    public static $WX_PAY = HTTP_URL . "/pay/wxPay.html";
    public static $WX_REFUND = HTTP_URL . "/refund/wxRefund.html";
    public static $WITHDRAW = HTTP_URL . "/withdraw/withdraw.html";
    public static $QUERY_BALANCE = HTTP_URL . "/balance/qeryBalance.html";
    public static $QUERY_USER = HTTP_URL . "/splitUser/queryUser.html";
    public static $QUERY_DEAL_LOG = HTTP_URL . "/balance/queryDealLog.html";
    public static $FREEZE = HTTP_URL . "/balance/freeze.html";
    public static $UNFREEZE = HTTP_URL . "/balance/unfreeze.html";
    public static $TRANSFER_ACCOUNT = HTTP_URL . "/balance/transferAccount.html";
    public static $WX_OFFELINE_ADD = HTTP_URL . "/wxOffline/wxOfflineAdd.html";
    public static $PUB_SIGN_KEY = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCKgZfP1KFhlHfdjZgMgr4+09GkhuqFMd7PNWNEn3k1H+2uoPaDLV4nEhhs1YgvyQwqggabGvRbIQocHcxN8SXh2f17RRfM76WdnH9mYLn70MON7ug1GJoBsGMNC+SXk9CVpr4lrqIQBLKFe0nTSZNgck8/y1NBdDeIc7lhEezqvwIDAQAB";
    public static $PRI_SIGN_KEY ="";
   }
