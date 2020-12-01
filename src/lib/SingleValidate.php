<?php


namespace panthsoni\pinduoduo\lib;


class SingleValidate extends CommonValidate
{
    protected $rule = [
        'response_type|授权类型response_type' => 'in:code',
        'client_id|客户端client_id' => 'length:0,50',
        'redirect_uri|回调地址redirect_uri' => 'length:0,255',
        'state|参数state' => 'length:0,128',
        'view|展示页面view' => 'in:h5,web',
        'access_token|access_token' => 'length:0,128',
        'timestamp|时间戳' => 'number',
        'data_type|响应格式data_type' => 'in:JSON,XML',
        'version|协议版本号version' => 'in:V1',
        'sign|签名sign' => 'length:0,128',
        'order_sn|订单号order_sn' => 'length:0,128',
        'order_state|订单状态order_state' => 'in:1,2',
        'waybill_no|运单号waybill_no' => 'length:0,128',
        'logistics_id|物流公司编码logistics_id' => 'length:0,128',
    ];

    public $scene = [
        'merchant_auth' => [
            'response_type' => 'require|in:code',
            'client_id' => 'require|length:0,50',
            'redirect_uri' => 'require|length:0,255',
            'state'
        ],
        'mobile_auth' => [
            'response_type' => 'require|in:code',
            'client_id' => 'require|length:0,50',
            'redirect_uri' => 'require|length:0,255',
            'state','view'
        ],
        'guest_auth' => [
            'response_type' => 'require|in:code',
            'client_id' => 'require|length:0,50',
            'redirect_uri' => 'require|length:0,255',
        ],
        'common' => [
            'client_id' => 'require|length:0,50',
            'timestamp' => 'require|length:0,50',
            'access_token','data_type','version'
        ],

        'pdd.erp.order.sync' => [
            'order_sn' => 'require|length:0,128',
            'order_state' => 'require|in:1,2',
            'waybill_no' => 'require|length:0,128',
            'logistics_id' => 'require|length:0,128',
        ],
        'pdd.order.basic.list.get' => [

        ],
        'pdd.order.information.get' => [

        ],
        'pdd.order.list.get' => [

        ],
        'pdd.order.number.list.increment.get' => [

        ],
        'pdd.order.promise.info.get' => [

        ],
        'pdd.order.status.get' => [

        ],
        'pdd.nextone.logistics.warehouse.update' => [

        ],
        'pdd.rdc.pddgenius.sendgoods.cancel' => [

        ],
        'pdd.refund.address.list.get' => [

        ],
        'pdd.refund.information.get' => [

        ],
        'pdd.refund.list.increment.get' => [

        ],
        'pdd.refund.status.check' => [

        ],
        'pdd.logistics.address.get' => [

        ],
        'pdd.logistics.companies.get' => [

        ],
        'pdd.logistics.isv.trace.notify.sub' => [

        ],
        'pdd.logistics.online.create' => [

        ],
        'pdd.logistics.online.send' => [

        ],
        'pdd.logistics.online.status.query' => [

        ],
        'pdd.logistics.ordertrace.get' => [

        ],
        'pdd.virtual.game.server.query' => [

        ],
        'pdd.virtual.mobile.charge.notify' => [

        ],
        'pdd.delete.draft.commit' => [

        ],
        'pdd.delete.goods.commit' => [

        ],
        'pdd.goods.add' => [

        ],
        'pdd.goods.authorization.cats' => [

        ],
        'pdd.goods.cat.rule.get' => [

        ],
        'pdd.goods.cat.template.get' => [

        ],
        'pdd.goods.cats.get' => [

        ],
        'pdd.goods.child.sku.edit' => [

        ],
        'pdd.goods.commit.detail.get' => [

        ],
        'pdd.goods.commit.list.get' => [

        ],
        'pdd.goods.commit.status.get' => [

        ],
    ];
}