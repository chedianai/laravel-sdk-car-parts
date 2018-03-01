<?php
/**
 * Created by PhpStorm.
 * User: keal
 * Date: 2018/2/28
 * Time: 下午11:59
 */

return [

    'default' => [
        /*
         * 请求接口密钥
         */
        'client_id' => env('CAR_PARTS_CLIENT_ID', 'CAR_PARTS_CLIENT_ID'),
        'client_secret' => env('CAR_PARTS_CLIENT_SECRET', 'CAR_PARTS_CLIENT_SECRET'),

        /*
         * 指定 API 调用返回结果的类型：collection(default)/array/object/raw/自定义类名
         */
        'response_type' => \Chedianai\LaravelCarParts\Collection::class,

        /*
         * 接口请求相关配置，超时时间等，具体可用参数请参考：
         * http://docs.guzzlephp.org/en/stable/request-config.html
         *
         * - retries: 重试次数，默认 1，指定当 http 请求失败时重试的次数。
         * - retry_delay: 重试延迟间隔（单位：ms），默认 500
         * - log_template: 指定 HTTP 日志模板，请参考：https://github.com/guzzle/guzzle/blob/master/src/MessageFormatter.php
         */
        'http'          => [
            'retries'     => 1,
            'retry_delay' => 500,
            'timeout'     => 5.0,
            'base_uri' => env('CAR_PARTS_BASE_URI', 'http://carparts.chedianai.com/'), // 如果你在使用开发环境，则可以覆盖该参数
        ],
    ],

    /*
     * 使用 Laravel 的缓存系统
     */
    'use_laravel_cache' => env('CAR_PARTS_USE_LARAVEL_CACHE', true),
];