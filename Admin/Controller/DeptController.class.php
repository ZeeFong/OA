<?php
namespace Admin\Controller;
use Think\Controller;

class DeptController extends Controller{
    
    public function tianjia(){
        $model=M('Dept');
        $update=array(
            array(
             'name'=>'公关部',
            'pod'=>'0',
            'sort'=>'3',
            'remark'=>'这是公共关系部'
            ),
            array(
               'name'=>'总裁办',
            'pod'=>'0',
            'sort'=>'4',
            'remark'=>'权利最高的部门' 
            )
            
        );
       $resul= $model->addAll($update);
       dump($resul);
    }
    
    public function xiugai(){
        $model =M('Dept');
        $data=array(
          'id'=>'2',
           'sort'=>'22',
            'remark'=>'今天发工资'
            );
        $model->save($data);
        dump($data);
    }
    
    public function chaxun() {
        $model=M('Dept');
        
        //select
       $data=$model->select();
//        $data=$model->select(3);
//        $data=$model->select('1,3');
//        dump($data);
        
        //find
        
       // $data=$model->find();
        //$model->find(1);
        echo $model->_sql();
        dump($data);
    }
    
    public function shanchu(){
        $model=M('Dept');
        //$result=$model->delete(3);
        $result=$model->delete('2,4');
        dump($result);
        
    }
    
    public function ar(){
        //AR模式CURD
        $model=M('Dept');
        $model->name='财务部';
        $model->pid='0';
        $model->sort=2;
        $model->remark='这是财务部';
        $result=$model->add();
        dump($result);
    }
    
    public function add() {
        if(IS_POST){
        $dept=M('Dept');
        $data=I('post.');
        $result=$dept->add($data);
        if($result){
            $this->success('添加成功',U('showList'),3);
        }else{
            $this->error('添加失败');
        }
        } else {  
        $dept=M('Dept');
        $list=$dept->where('pid=0')->select();
        $this->assign('list',$list);
        $this->display();
        }
        
        
    }
    public function showList(){
       $dept=M('Dept');
       $list=$dept->order('id asc')->select();
        
       $this->assign('list',$list);
       $this->display();
    }
}

