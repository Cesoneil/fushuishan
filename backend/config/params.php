<?php

return [
    'adminEmail' => 'cxad1345@163.com',
    'adminAcronym' => '震豹',
    'adminName' => '欢迎访问OA-DATA管理系统',
    'adminTitle' => '优瑞电子商务',
    //system为系统默认主页  homepage为普通客服主页  main为超级管理员、总经理主页  组长主页captain
    'adminDefaultHomePage' => ['system'=>'main/system','homepage'=>'main/homepage','main'=>'main/main','captain'=> 'main/captain'], // 系统默认主页
    /** ------ 总管理员配置 ------ **/
    'adminAccount' => 1,// 系统管理员账号id
    'administratorPid' => [0,1], //普通超级管理员父级为0或1
    'captainPid' => 2, //组长级别父级为2
    'isMobile' => false, // 手机访问

    /** ------ 日志记录 ------ **/
    'user.log' => true,
    'user.log.level' => ['warning', 'error'], // 级别 ['success', 'info', 'warning', 'error']
    'user.log.except.code' => [404], // 不记录的code

    /** ------ 开发者信息 ------ **/
    'exploitDeveloper' => 'Cesoneil',
    'exploitFullName' => 'YouR应用基于RageFrame开发引擎',
    'exploitOfficialWebsite' => '<a href="http://40675xg972.wicp.vip/" target="_blank">http://40675xg972.wicp.vip/</a>',
    'exploitGitHub' => '<a href="https://github.com/Cesoneil/fushuishan" target="_blank">https://github.com/Cesoneil/fushuishan</a>',

    /**
     * 不需要验证的路由全称
     *
     * 注意: 前面以绝对路径/为开头
     */
    'noAuthRoute' => [
        '/main/index',// 系统主页
        '/main/system',// 默认系统首页

        '/main/homepage', // 默认坐席首页
        '/main/main',  //默认管理员、总经理首页
        '/main/captain', //默认组长进入首页

        '/main/member-between-count',
        '/main/member-credits-log-between-count',
    ],
];