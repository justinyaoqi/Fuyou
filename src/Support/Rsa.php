<?php
namespace Yaoqi\Fuyou\Support;

class Rsa
{
    /**
     * 生成签名 sha1withrsa
     * @param    string     $signString 待签名字符串
     * @param    [type]     $priKey     私钥
     * @return   string     base64结果值
     */
    public static function getSign($signString, $priKey)
    {
       // var_dump($signString);
        //var_dump($priKey);
        // $res = "-----BEGIN RSA PRIVATE KEY-----" . PHP_EOL .
        // wordwrap($priKey, 64, "\n", true) .
        //     "-----END RSA PRIVATE KEY-----";
        // ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');
        $privKeyId = openssl_pkey_get_private($priKey, '');
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
    public static function checkSign($pubKey, $sign, $toSign)
    {
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
    public static function getSignString($params)
    {
        unset($params['sign']);
        ksort($params);
        reset($params);

        $pairs = array();
        foreach ($params as $k => $v) {
            if (!empty($v)) {
                $pairs[] = "$k=$v";
            }
        }

        return implode('&', $pairs);
    }
    private function hextobin($hexstr)
    {
        $n = strlen($hexstr);
        $sbin = ””;
        $i = 0;
        while ($i < $n) {
            $a = substr($hexstr, $i, 2);
            $c = pack(“H * ”, $a);
            if ($i == 0) {
                $sbin = $c;
            } else {
                $sbin .= $c;
            }
            $i += 2;
        }
        return $sbin;
    }

/**
 * RSA私钥解密
 * @param $data 待解密内容
 */
    public function unsign($data, $privatekeyFile)
    {
        // $privatekeyFile = dirname(dirname(dirname(dirname(__DIR__)))) . '/conf/rsa_private_key2.pem';
        $decrypted = null;
        openssl_private_decrypt(base64_decode($data), $decrypted, file_get_contents($privatekeyFile));
        return $decrypted;
    }

/**
 * $input待加密内容
 * $key密钥
 */
    public function encrypt($input, $key)
    {
        $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
        $input = $this->pkcs5_pad($input, $size);
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, $key, $iv);
        $data = mcrypt_generic($td, $input);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        $data = base64_encode($data);
        return $data;
    }

/**
 * 填充方式
 */
    private function pkcs5_pad($text, $blocksize)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

/**
 * $sStr待解密内容
 * $sKey密钥
 */
    public function decrypt($sStr, $sKey)
    {
        $decrypted = mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128, $sKey, base64_decode($sStr), MCRYPT_MODE_ECB
        );

        $dec_s = strlen($decrypted);
        $padding = ord($decrypted[$dec_s - 1]);
        $decrypted = substr($decrypted, 0, -$padding);
        return $decrypted;
    }
}
