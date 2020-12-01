<?php
namespace panthsoni\pinduoduo;

use panthsoni\pinduoduo\lib\PddClient;

class Pdd
{
    /**
     * 基本配置参数
     * @var array
     */
    protected static $options = [];

    /**
     * 初始化
     * Tao constructor.
     * @param array $options
     */
    public function __construct(array $options=[]){
        self::$options = array_merge(self::$options,$options);
    }

    /**
     * 初始化
     * @param array $options
     * @return PddClient
     */
    public static function init(array $options=[]){
        self::$options = array_merge(self::$options,$options);
        return new PddClient(self::$options);
    }
}