<?php
namespace Admin\Model;
use Think\Model;

class DeptModel extends Model{
         //批量验证    
       // protected $patchValidate = true;
   
    //字段映射
    protected  $_map=array(
        //映射规则，键是表单中的name值 = 值是数据表中的字段名
        'abc' => 'name',
        'wasd' => 'sort'
        
            );


    //自动验证定义
         protected $_validate =array(
          array('name','require','部门名称不能为空'),
          array('name','','部门名称已存在',0,'unique'),
          array('sort','number','排序必须是数字'),
            //使用函数的方式来验证排序是否是数字  
          //array('sort','is_numeric','排序必须是数字',0,'function'), 
              
        );
}