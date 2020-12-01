<?php
namespace panthsoni\pinduoduo\lib;

class PddClient extends PddApi
{
    /**
     * 基本配置参数
     * @var array
     */
    protected static $options = [];

    /**
     * 必传参数
     * @var array
     */
    protected static $params = [];

    /**
     * 可选参数
     * @var array
     */
    protected static $bizParams = [];

    /**
     * 网关
     * @var string
     */
    protected static $domain = 'https://gw-api.pinduoduo.com/api/router';

    /**
     * 商家授权api
     * @var string
     */
    protected static $merchantAuthApi = 'https://fuwu.pinduoduo.com/service-market/auth';

    /**
     * 移动端授权api
     * @var string
     */
    protected static $mobileAuthApi = 'https://mai.pinduoduo.com/h5-login.html';

    /**
     * 多多客授权api
     * @var string
     */
    protected static $guestAuthApi = 'https://jinbao.pinduoduo.com/open.html';

    /**
     * 方法
     * @var string
     */
    protected static $method = '';

    /**
     * 是否返回链接
     * @var bool
     */
    protected static $isBackUrl = false;

    /**
     * 密钥
     * @var string
     */
    protected static $secret = '';

    /**
     * 初始化
     * TaoClient constructor.
     * @param array $options
     */
    public function __construct(array $options=[]){
        self::$options = array_merge(self::$options,$options);
    }

    /**
     * 设置配置
     * @param array $options
     * @return $this
     */
    public function setOptions($options=[]){
        self::$options = array_merge(self::$options,$options);
        return $this;
    }

    /**
     * 设置参数
     * @param array $params
     * @return $this
     */
    public function setParams($params=[]){
        self::$params = array_merge(self::$params,$params);
        return $this;
    }

    /**
     * 设置可选参数
     * @param array $bizParams
     * @return $this
     */
    public function setBizParams($bizParams=[]){
        self::$bizParams = array_merge(self::$bizParams,$bizParams);
        return $this;
    }

    /**
     * 设置方法
     * @param $method
     * @return $this
     */
    public function setMethod($method){
        self::$method = $method;
        return $this;
    }

    /**
     * 是否返回链接
     * @param bool $isBackUrl
     * @return $this
     */
    public function isBackUrl($isBackUrl=false){
        self::$isBackUrl = $isBackUrl;
        return $this;
    }

    /**
     * 设置密钥
     * @param $secret
     * @return $this
     */
    public function setSecret($secret){
        self::$secret = $secret;
        return $this;
    }

    /**
     * 获取结果
     * @return bool|mixed|string
     * @throws \Exception
     */
    public function getResult(){
        /*检测方法*/
        if (!self::$method){
            throw new \Exception('请求方法缺失',-10015);
        }

        /*检测密钥*/
        if (!in_array(self::$method,['merchant_auth','mobile_auth','guest_auth']) && !self::$secret){
            throw new \Exception('client_secret缺失',-10039);
        }

        /*判断方法是否授权*/
        if (!isset(self::$methodList[self::$method])){
            throw new \Exception('请求方法未授权',-10025);
        }

        /*接口域名*/
        $url = self::$domain;
        if (self::$method == 'merchant_auth') $url = self::$merchantAuthApi;
        if (self::$method == 'mobile_auth') $url = self::$mobileAuthApi;
        if (self::$method == 'guest_auth') $url = self::$guestAuthApi;

        /*验证公共请求参数*/
        $commonParams = [];
        if (!in_array(self::$method,['merchant_auth','mobile_auth','guest_auth'])){
            $commonParams = Tools::validate(array_merge(self::$options,self::$params,self::$bizParams,['type' => self::$method]),new SingleValidate(),'common');
        }

        /*参数验证*/
        $requestParamsList = Tools::validate(array_merge(self::$options,self::$params,self::$bizParams),new SingleValidate(),self::$method);

        return Tools::buildRequest($url,array_merge($commonParams,$requestParamsList),self::$methodList[self::$method]['is_auth'],self::$secret,self::$isBackUrl,self::$method);
    }
}