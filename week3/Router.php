<?php
class Router{
    private static array $list=[];
    // Get route
    public static function get(string $page,Closure $closure){
        static::$list[]=[
            'page'=>$page,
            'method'=>'GET',
            'logic'=>$closure

        ];

    }
    // post route
    public static function post(string $page, Closure $closure){
        static::$list[]=[
            'page'=>$page,
            'method'=>'POST',
            'logic'=>$closure

        ];


    }

    public static function run(){
        // var_dump(self::$list);
        // TODO:$_SERVER->method,page
        $method=$_SERVER['REQUEST_METHOD'];
        $page=trim($_SERVER['REQUEST_URI'],characters:"/");

        foreach(self::$list as $item){
            if($item['page']==$page && $item['method']==$method){
                $item['logic']();
                return;
            }
        }
        die("Not Found");
        // TODO: search in list
        // TODO: logic execute

    }

}