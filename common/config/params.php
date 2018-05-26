<?php
return [
    'adminEmail' => 'chungta.bb@gmail.com',
    'adminEmailPwd' => 'anhchung123',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'languages' => [
        'vi-VN' => Yii::t('app', 'Vietnamese'),
        'en-US' => Yii::t('app', 'English')
    ],
    'task.status' => [
        0 => Yii::t('app', 'Pending'),
        1 => Yii::t('app', 'Completed')
    ],
    'user.roles' => [
        'Admin' => Yii::t('app', 'Admin'),
        'Employee' => Yii::t('app', 'Employee')
    ],
    'user.status' => [
        0 => Yii::t('app', 'Inactive'),
        1 => Yii::t('app', 'Actived')
    ],
    'delete.status' => [
        0 => Yii::t('app', 'Not deleted'),
        1 => Yii::t('app', 'Deleted'),
    ],
    'time.months' => [
        Yii::t('app', 'Jan'), 
        Yii::t('app', 'Feb'), 
        Yii::t('app', 'Mar'), 
        Yii::t('app', 'Apr'), 
        Yii::t('app', 'May'), 
        Yii::t('app', 'Jun'), 
        Yii::t('app', 'Jul'), 
        Yii::t('app', 'Aug'), 
        Yii::t('app', 'Sep'), 
        Yii::t('app', 'Oct'), 
        Yii::t('app', 'Nov'), 
        Yii::t('app', 'Dec')
    ],
    // 'logo' => '/logo.png'
    'logo' => ''
];
