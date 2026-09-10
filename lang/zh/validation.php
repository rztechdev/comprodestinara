<?php

return [
    'required' => ':attribute 为必填项。',
    'string' => ':attribute 必须为文本。',
    'max' => [
        'string' => ':attribute 长度不能超过 :max 个字符。',
    ],
    'email' => ':attribute 必须是有效的电子邮箱地址。',

    'attributes' => [
        'full_name' => '申请人姓名',
        'institution' => '所在学校/机构',
        'whatsapp' => '联系电话/WhatsApp',
        'topic' => '研学课题方向',
        'notes' => '团队说明与期望',
        'email' => '电子邮箱地址',
    ],
];
