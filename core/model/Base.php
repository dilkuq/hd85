<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/7
 * Time: 21:52
 */
namespace core\model;

class Base{
    protected $table;
    protected static $pdo;
    protected $where='';

    public function __construct($config,$table)
    {
        $this->connect($config);
        $this->table = $table;
    }

    public function connect($config){
        if(!is_null(self::$pdo)){
            return;
        }
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
        $username = $config['username'];
        $password = $config['password'];
        try{
            $pdo = new \PDO($dsn,$username,$password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            $pdo->query("set names utf8");
            //将当前实例化出来的$pdo存给当前属性,后面其他方法才能使用
            self::$pdo = $pdo;
        }catch (\PDOException $e){
            die($e->getMessage());
        }
    }
    //获取所有数据
    public function get(){
        $sql="select * from {$this->table} {$this->where}";
        $result=self::$pdo->query($sql);
        $data=$result->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }
    //where方法
    public function where($where){
        $this->where="where {$where}";
        return $this;
    }
    //获取单条数据 ，单条数据代表着查找某个唯一字段
    public function find($pri){
        //先整理sql语句 select * from student where 主键=$pri
        //第一步：获取当前表的主键名称
        $prikey=$this->getprikey();
        //组合sql
        $sql="select * from {$this->table} {$this->where}";
        $result=self::$pdo->query($sql);
        $data=$result->fetch(\PDO::FETCH_ASSOC);
        $this->shuju=$data;
        return $this;
    }
    //获取数组形式的单条数据
    public function findArray($pri){
        $obj = $this->find($pri);
        return $obj->shuju;
    }

    public function getPrikey(){
        //需要使用 desc wish 查看表结构
        $sql = "desc {$this->table}";
        $result = self::$pdo->query($sql);
        $data = $result->fetchAll(\PDO::FETCH_ASSOC);
        $priKey = '';
        foreach ($data as $v){
            if($v['Key'] == 'PRI'){
                $priKey = $v['Field'];
                return $priKey;
            }
        }
    }

    //获取统计数据方法
    public function count($field="*"){
        //整理思路
        $sql="select count({$field}) as c from {$this->table} {$this->where}";
        $result=self::$pdo->query($sql);
        $data=$result->fetchAll(\PDO::FETCH_ASSOC);
        return $data[0]["c"];

    }
    //执行有结果集的操作
    public function query($sql){
        try{
            $result = self::$pdo->query($sql);
            $data = $result->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        }catch (\PDOException $e){
            die($e->getMessage());
        }
    }

    //执行没有结果集的操作
    public function exec($sql){
        try{
            return self::$pdo->exec($sql);
        }catch (\PDOException $e){
            die($e->getMessage());
        }
    }

}
