<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/23 0023
 * Time: 下午 16:58
 */

namespace app\lib\enum;


class OrderStatusEnum
{
    // 待支付
    const UNPAID = 1;

    // 已支付
    const PAID = 2;

    // 已发货
    const DELIVERED = 3;

    // 已支付，但库存不足
    const PAID_BUT_OUT_OF = 4;
}