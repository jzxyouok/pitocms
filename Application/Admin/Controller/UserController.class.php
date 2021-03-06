<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\UserModel  as User;
class UserController extends BaseController {
    
    
    public function index()
    {
      
        $list  = User::pageList($condition,10);

        $this->assign('list',$list);
        $this->display();
    }

    public function create()
    {
        $catelist = User::getList($keyword);

        $this->assign('catelist',$catelist);
        $this->display();
    }

    public function edit()
    {
        $id   = I('id');
        $data = User::getOne($id);
       

        $this->assign('data',$data);
      
        $this->display();
    }

    public function store()
    {
       
        $data['username'] = I('username');    
        $data['email']    = I('email'); 
        $data['password'] = md5(I('password'));
        $data['phone']    = I('phone'); 
        $data['created']  = time();      
      
        $flag  = User::store($data);
        
        if($flag)
        {
           $this->success('添加成功');
        }else
        {
            $this->error('添加失败');
        }
       
    }

    
    public function update()
    {
        $data['id']       = I('id');
        $data['username'] = I('username');    
        $data['email']    = I('email'); 
        $data['password'] = md5(I('password'));
        $data['phone']    = I('phone');      
        $data['updated']  = time();    
      
        $flag  = User::update($data);
       
        if($flag)
        {
           $this->success('修改成功');
        }else
        {
            $this->error('修改失败');
        }
       
    }

    public function remove($id)
	{
		$id    = I('id');
        $flag  = User::remove($id);
        if($flag)
        {
           $this->success('移除成功');
        }else
        {
            $this->error('移除失败');
        }
	}

    public function destroy()
    {
        $id    = I('id');
        $flag  = User::destroy($id);
        if($flag)
        {
           $this->success('删除成功');
        }else
        {
            
            $this->error('要删除此栏目请先删除下级栏目和内容');
        }
    }

    
}