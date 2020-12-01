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
        'pdd.order.basic.list.get' => [
            'is_auth' => true
        ],
        'pdd.order.information.get' => [
            'is_auth' => true
        ],
        'pdd.order.list.get' => [
            'is_auth' => true
        ],
        'pdd.order.number.list.increment.get' => [
            'is_auth' => true
        ],
        'pdd.order.promise.info.get' => [
            'is_auth' => true
        ],
        'pdd.order.status.get' => [
            'is_auth' => true
        ],
        'pdd.nextone.logistics.warehouse.update' => [
            'is_auth' => true
        ],
        'pdd.rdc.pddgenius.sendgoods.cancel' => [
            'is_auth' => true
        ],
        'pdd.refund.address.list.get' => [
            'is_auth' => true
        ],
        'pdd.refund.information.get' => [
            'is_auth' => true
        ],
        'pdd.refund.list.increment.get' => [
            'is_auth' => true
        ],
        'pdd.refund.status.check' => [
            'is_auth' => true
        ],
        'pdd.logistics.address.get' => [
            'is_auth' => false
        ],
        'pdd.logistics.companies.get' => [
            'is_auth' => false
        ],
        'pdd.logistics.isv.trace.notify.sub' => [
            'is_auth' => false
        ],
        'pdd.logistics.online.create' => [
            'is_auth' => true
        ],
        'pdd.logistics.online.send' => [
            'is_auth' => true
        ],
        'pdd.logistics.online.status.query' => [
            'is_auth' => true
        ],
        'pdd.logistics.ordertrace.get' => [
            'is_auth' => false
        ],
        'pdd.virtual.game.server.query' => [
            'is_auth' => false
        ],
        'pdd.virtual.mobile.charge.notify' => [
            'is_auth' => true
        ],
        'pdd.delete.draft.commit' => [
            'is_auth' => true
        ],
        'pdd.delete.goods.commit' => [
            'is_auth' => true
        ],
        'pdd.goods.add' => [
            'is_auth' => true
        ],
        'pdd.goods.authorization.cats' => [
            'is_auth' => true
        ],
        'pdd.goods.cat.rule.get' => [
            'is_auth' => true
        ],
        'pdd.goods.cat.template.get' => [
            'is_auth' => true
        ],
        'pdd.goods.cats.get' => [
            'is_auth' => false
        ],
        'pdd.goods.child.sku.edit' => [
            'is_auth' => true
        ],
        'pdd.goods.commit.detail.get' => [
            'is_auth' => true
        ],
        'pdd.goods.commit.list.get' => [
            'is_auth' => true
        ],
        'pdd.goods.commit.status.get' => [
            'is_auth' => true
        ],
    ];
}