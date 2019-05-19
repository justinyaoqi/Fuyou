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
    public static $PRI_SIGN_KEY = "
    -----BEGIN RSA PRIVATE KEY-----
    MIICXQIBAAKBgQDONMzr8CAfYu9m/s+uGea9/BDveOirx1CMVZd5sKfghQZTPPEF
    CB5Z1VfMMi6l1XJE9H4qDNBZuqTaQmrZpB4AoQNMeikL1bYNS07Fm1Rf/ybgJL8k
    nHuOwtFdQ+PTZD2VGytbYF+zL6fHYD6OjrfrKgZYjpYFtaSSmgerOfhnEQIDAQAB
    AoGBALW27/LnG9es3t27pRZ+usknTWFLAncGYOQaNS9GztnbQDSwGpFdkymFCSbn
    /hWjoFxFvLyfqCe6g7XXG8QJjWlYQX1cQ/8a97papSaBPXyZANrleksBvR47lIqb
    nKvQPOWDr7fx9nxkLi0mjaelH7z56XTJWhK/CXXRhFKc/jdFAkEA+MLzhSsEnox7
    cZkEzSjAWcm3tPl9anKMVMuOVXaBFsqJZ5pMGMiK2t6BAY93hCv2p2QDRDbeMZOs
    rhWcp58qFwJBANQ02dDYwtZXHlDPJI+UxY5wyCYPdHV+1ZzFR/b41Du9/pCZx8cU
    vOpwhJ+cMVGtEjcU7qzQJIccPxSbFTpnuRcCQG0488FJpQqUNfMns4L83I/P0LhG
    PvnI97KXeZQupvlBzljN15GeI9F7lnr/6gL/ZpoSgJin2qE77Lq2xISYjtsCQGT7
    fYfADv/W10tXN6vH/TcqfmR2SFI9eEOxMezaPozrff+r3oDjYn8h6krWFjYq6Rcj
    M+0y458UFwSkRDbV8yMCQQCtd1lrAIaIryoR7E2V7Xs2Y4yefUkyE5W3eMlDnuMC
    AqCtwxAjdjDK9/3yI88w0OdkHDowuC3drat/wyRQo5vE
    -----END RSA PRIVATE KEY-----
    ";
}
