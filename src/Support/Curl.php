<?php
namespace Yaoqi\Fuyou\Support;

class Curl
{
  public static function get($url)
  {
    return self::execute($url, 'get');
  }
  /**
   * @param $url
   * @param string $method 'post' or 'get'
   * @param null $postData
   *      类似'para1=val1&para2=val2&...'，
   *      也可以使用一个以字段名为键值，字段数据为值的数组。
   *      如果value是一个数组，Content-Type头将会被设置成multipart/form-data
   *      从 PHP 5.2.0 开始，使用 @ 前缀传递文件时，value 必须是个数组。
   *      从 PHP 5.5.0 开始, @ 前缀已被废弃，文件可通过 \CURLFile 发送。
   * @param array $options
   * @param array $errors
   * @return mixed
   */
  public static function execute($url, $method = "post", $postData = null, $options = array(), &$errors = array())
  {

    $url = str_replace(' ', '+', $url);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 150); //设置cURL允许执行的最长秒数
    //curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt(
      $ch,
      CURLOPT_HTTPHEADER,
      array(
        'Content-Type: application/json; charset=utf-8',
        'Content-Length:' . strlen(json_encode($postData))
      )
    );
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

    $output = curl_exec($ch);


    curl_close($ch);
    return $output;
  }

  public static function post($url, $postData)
  {
    return self::execute($url, 'post', $postData);
  }
  public static function objtoarr($obj)
  {

    $ret = array();
    foreach ($obj as $key => $value) {
      if (gettype($value) == 'array' || gettype($value) == 'object') {
        $ret[$key] = objtoarr($value);
      } else {
        $ret[$key] = $value;
      }
    }
    return $ret;
  }

  // public static function file($url, $field, $filename, $postData = array())
  // {
  //   $filename = realpath($filename);

  //   //PHP 5.6 禁用了 '@/path/filename' 语法上传文件
  //   if (class_exists('\CURLFile')) {
  //     $postData[$field] = new \CURLFile($filename);
  //   } else {
  //     $postData[$field] = '@' . $filename;
  //   }

  //   return self::execute($url, 'post', $postData);
  // }
}
