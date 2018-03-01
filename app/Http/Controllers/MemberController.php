<?php

namespace App\Http\Controllers;
use App\Member;
use Illuminate\Support\Facades\DB;

class MemberController extends  Controller{
    public function info($id){
       return Member::getMember();
        //return 'member-info-'.$id;
        //return route('memberinfo');
    }
    //使用查询构造器操作数据库,query1()是插入、query2()是修改、query3()是删除
    public function query1(){
        /*一般的插入数据
         $flag=DB::table('t_user')->insert(
            ['name'=>'duo.Li','pwd'=>'123456','age'=>'23','sex'=>'女']);
        var_dump($flag);*/
        //插入数据后得到其自增的id
       /* $id=DB::table('t_user')->insertGetId(
            ['name'=>'fxh','pwd'=>'123456','age'=>'22','sex'=>'女']
        );
         var_dump($id);
       */

         //插入多条数据
        $flag=DB::table('t_user')->insert([
            ['name'=>'cheng','pwd'=>'123456','age'=>'18','sex'=>'男'],
            ['name'=>'yuan','pwd'=>'123456','age'=>'15','sex'=>'男']
        ]);
        var_dump($flag);
    }
    //使用查询构造器更新数据
    public  function query2(){
        //更新操作，更新一定要加上条件
      /* $num= DB::table('t_user')
            ->where('id',10)
            ->update(['age'=>'30']);
       var_dump($num);*/
       //$num=DB::table('t_user')->increment('age');默认将某字段的值全部自增1
        //$num=DB::table('t_user')->increment('age',3);//将某字段的值全部自增3
        //DB::table('t_user')->decrement('age');默认将某字段自减1
        //带有where条件的自减操作
       /* $num=DB::table('t_user')
            ->where('id',10)
            ->decrement('age',8);*/
       //在自增的同时，修改其他字段的值
        $num=DB::table('t_user')
            ->where('id',10)
            ->decrement('age',8,['pwd'=>'111']);
        var_dump($num);
    }
    //使用查询构造器删除数据
    public function query3(){
        //删除指定id的值
        /*$num=DB::table('t_user')
            ->where('id',8)
            ->delete();*/
        //删除大于等于某个值的数据
       /* $num=DB::table('t_user')
            ->where('id','>=',13)
            ->delete();*/
       DB::table('t_user')->trancate();//是将整个表的数据全部删除，谨慎使用
    }
    public function query4(){

    }
}
