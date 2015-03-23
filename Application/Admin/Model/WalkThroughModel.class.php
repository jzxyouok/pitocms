<?php
namespace Admin\Model;
use Think\Model;
use \Think\Page;
class WalkThroughModel extends Model
{
	protected $tableName = 'walkthrough'; 

	static function getOne($id)
	{		
		$M    = M('walkthrough');
		$data = $M->find($id);
	    return $data;
	}

	static function getList($condition)
	{
		$Model = M('walkthrough');	
		$list  = $Model->select();
		return $list; 
	}


	static function pageList($condition,$num)
	{
		$num   = $num?$num:10;
		$M     = M('walkthrough');
		$count = $M->count();				// 查询满足要求的总记录数
		$Page  = new \Think\Page($count,$num);  // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show  = $Page->show();					// 分页显示输出

		$list  = $M->limit($Page->firstRow.','.$Page->listRows)->select();

		$page['show'] = $show;
		$page['list'] = $list;

		return $page; 
	}

	static function store($data)
	{
		
		$flag       = 0;
		$M 		    = M('walkthrough');	
		$flag = $M->add($data);
		//echo $M->getLastSql();die;		
	    return $flag;
	}

	

	static function update($data)
	{
		$flag = 0;
		$M    = M('walkthrough');
		$id   = $data['id']	;	
	    $flag = $M->where("id=$id")->save($data); 
	    return $flag;
	}

	

	static function destroy($id)
	{
		$flag  = 0;
		$M     = M('walkthrough');		
		$flag  = $M->delete($id);
		return $flag;
	}

	static function remove($id)
	{
		$flag 		= 0;
		$M          = M('walkthrough');
		$data['rm'] = 1;		
	    $flag = $M->where("id=$id")->save($data); 
	    return $flag;
	}
}