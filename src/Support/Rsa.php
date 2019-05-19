<?php
namespace Yaoqi\Fuyou\Support;

class Rsa  
{
    /**
 * 生成签名
 * @param    string     $signString 待签名字符串
 * @param    [type]     $priKey     私钥
 * @return   string     base64结果值
 */
public static function getSign($signString,$priKey){
    $privKeyId = openssl_pkey_get_private($priKey);
    $signature = '';
    openssl_sign($signString, $signature, $privKeyId);
    openssl_free_key($privKeyId);
    return base64_encode($signature);
}
 
/**
 * 校验签名
 * @param    string     $pubKey 公钥
 * @param    string     $sign   签名
 * @param    string     $toSign 待签名字符串
 * @return   bool
 */
public static function checkSign($pubKey,$sign,$toSign){
    $publicKeyId = openssl_pkey_get_public($pubKey);
    $result = openssl_verify($toSign, base64_decode($sign), $publicKeyId);
    openssl_free_key($publicKeyId);
    return $result === 1 ? true : false;
}
 
/**
 * 获取待签名字符串
 * @param    array     $params 参数数组
 * @return   string
 */
public static function getSignString($params){
    unset($params['sign']);
    ksort($params);
    reset($params);
 
    $pairs = array();
    foreach ($params as $k => $v) {
        if(!empty($v)){
            $pairs[] = "$k=$v";
        }
    }
 
    return implode('&', $pairs);
}

   
}
