<?php
class Region{
	//ajax 通过城市改变区
    public function getCityCArea(){
        $id = request()->param('id');
        $res = db('sys_region')->where('pid',$id)->select();
        echo json_encode($res);
    }

    public function edit(){
    	$region_level = 4;
        $province_list = model('sys_region')->getLevelList(1,0);
        $city_list = model('sys_region')->getLevelList(2,$article['province']);
        $area_list = model('sys_region')->getLevelList(3,$article['city']);
        $url = request()->domain().'/public/static/hlcom_org/code/'.$article['area'].'.json';
        $res = file_get_contents($url);
        $street_list = json_decode($res,true);
    }

    public static function getLevelList($level,$pid=0){
        return self::field('id,name')->where('level',$level)->where('pid',$pid)->select();
    }
}

//视图使用，直接
{include file='org/public/select_region' /}

