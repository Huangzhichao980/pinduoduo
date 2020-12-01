<?php
namespace panthsoni\pinduoduo\lib;

class PddApi
{
    /**
     * 授权方法列表
     * @var array
     */
    protected static $methodList = [
        'merchant_auth' => [
            'is_auth' => true
        ],
        'mobile_auth' => [
            'is_auth' => true
        ],
        'guest_auth' => [
            'is_auth' => true
        ],
        'pdd.erp.order.sync' => [
            'is_auth' => true
        ]
    ];
}