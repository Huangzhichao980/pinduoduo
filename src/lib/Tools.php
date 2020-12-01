<?php
namespace panthsoni\pinduoduo\lib;

class Tools extends CommonTools
{
    public function __construct(){
        parent::__construct();
    }

    /**
     * 组建请求
     * @param $url
     * @param $requestParams
     * @param $requestWay
     * @param $secret
     * @param bool $isBackUrl
     * @param string $method
     * @return bool|mixed|string
     */
    public static function buildRequest($url,$requestParams,$requestWay,$secret,$isBackUrl=false,$method=''){
        /*生成签名*/
        if (!in_array($method,['merchant_auth','mobile_auth','guest_auth'])){
            $requestParams['sign'] = self::makeSign($requestParams,$secret,$requestWay);
        }

        /*是否返回链接*/
        $url = self::buildGetUrl($url,$requestParams);
        if ($isBackUrl) return $url;

        return self::httpCurl($url,'GET',$requestParams);
    }

    /**
     * 组建get请求链接
     * @param $url
     * @param $requestParams
     * @return bool|string
     */
    protected static function buildGetUrl($url,$requestParams){
        $url = $url.'?';
        $string = '';
        foreach ($requestParams as $key=>$val){
            $string .= "{$key}={$val}&";
        }

        /*去除掉最后一个字符*/
        return substr($url.$string,0,strlen($url.$string)-1);
    }

    /**
     * 生成签名
     * @param $data
     * @param $secret
     * @param $requestWay
     * @return string
     */
    protected static function makeSign($data,$secret,$requestWay){
        if ($requestWay === false && isset($data['access_token'])) unset($data['access_token']);
        ksort($data);
        $str = '';
        foreach ($data as $k => $v) {
            $str .= $k . $v;
        }
        $str = $secret . $str . $secret;
        $sign = strtoupper(md5($str));

        return $sign;
    }

    /**
     * curl请求
     * @param string $url
     * @param string $requestWay
     * @param array $params
     * @return bool|mixed
     */
    protected static function httpCurl($url='',$requestWay='GET',$params=[]){
        if (!$url) return false;

        /*curl请求*/
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);//设置header
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        if ($requestWay == 'POST'){
            curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        }
        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return json_decode($data,true);
    }
}