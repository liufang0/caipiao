<?php

namespace Home\Controller;
use Think\Controller;

header('content-type:text/html;charset=utf-8');
class CaiController extends Controller{

	public function sc2(){
		$url = "http://www.bwlc.net/bulletin/trax.html";
		try {
			$cpk = http_get($url);
			if (!$cpk) {
				\Think\Log::write("API请求失败 [sc2]: 无法获取数据", 'ERROR');
				echo "API请求失败，无法获取数据\n";
				return;
			}
			preg_match_all('/<td>(.*?)<\/td>/',$cpk, $out); 
			if (isset($out[1]) && $out[1]) {
				$periodnumber = strval($out[1][0]);
				$awardnumbers = strval($out[1][1]);
				$awardtime = strval($out[1][2]) . ":30";
			}
			if ($periodnumber && $awardnumbers && $awardtime) {
				$data = array(
					'periodnumber' => $periodnumber,
					'awardnumbers' => $awardnumbers,
					'awardtime' => $awardtime,
					'game' => 'pk10',
					'addtime' => time()
				);

				$caijinum = M('caiji')->where("game = 'pk10'")->limit(0,1)->order("id desc")->find();
				if (strval($caijinum['periodnumber']) != $periodnumber && $periodnumber > $caijinum['periodnumber']) {
					M('caiji')->add($data);
					echo "数据采集成功: 期号 {$periodnumber}\n";
				}
			}
		} catch (Exception $e) {
			\Think\Log::write("API请求异常 [sc2]: " . $e->getMessage(), 'ERROR');
			echo "API请求异常: " . $e->getMessage() . "\n";
		}
	}


	public function cpkpk(){
		$url = "http://u7a.chengdashizheng.com/chatbet_v3/game/loginweb.php";
		try {
			$cpk = @file_get_contents($url);
			if (!$cpk) {
				\Think\Log::write("API请求失败 [cpkpk]: 无法连接到服务器", 'ERROR');
				echo "API请求失败，无法连接到服务器\n";
				return;
			}
			// var_dump($cpk);exit; // 调试用，已注释
			$cr_data = json_decode($cpk);
			if (!$cr_data) {
				\Think\Log::write("API数据解析失败 [cpkpk]: JSON格式错误", 'ERROR');
				echo "API数据解析失败\n";
				return;
			}
			foreach ($cr_data as $key => $value) {
				$periodnumber = $key;
				$awardtime = $value->dateline;
				$awardnumbers = $value->number;
				break;
			}

			if ($periodnumber && $awardnumbers && $awardtime) {
				$data = array(
					'periodnumber' => $periodnumber,
					'awardnumbers' => $awardnumbers,
					'awardtime' => $awardtime,
					'game' => 'pk10',
					'addtime' => time()
				);

				$caijinum = M('caiji')->where("game = 'pk10'")->limit(0,1)->order("id desc")->find();
				if (strval($caijinum['periodnumber']) != $periodnumber  && $periodnumber > $caijinum['periodnumber']) {
					M('caiji')->add($data);
					echo "数据采集成功: 期号 {$periodnumber}\n";
				}
			}
		} catch (Exception $e) {
			\Think\Log::write("API请求异常 [cpkpk]: " . $e->getMessage(), 'ERROR');
			echo "API请求异常: " . $e->getMessage() . "\n";
		}
	}
	
	public function ft1(){
		$url = "https://www.pk10tv.com/index.php?c=content&a=list&catid=138";
		$cpk = http_get($url);
		preg_match('/<tbody.*?id=\"reslist\">\s*<tr >\s*<td>(.*?)<\/td>\s*<td> (.*?) <\/td>/',$cpk, $num); 
		if (isset($num[1]) && $num[1]) {
			$awardtime = $num[1];
			$periodnumber = $num[2];
		}
		preg_match_all('/<span title="(.*?)" class="ball_pks_  ball_pks.*? ball_lenght10  ">\s*.*?<\/span>/',$cpk, $pnum); 
		$awardnumbers = array();
		if (isset($pnum[1]) && $pnum[1]) {
			$awardnumbers = array();
			foreach ($pnum[1] as $key => $value) {
				if ($key < 10) {
					continue;
				}
				if ($key >= 20) {
					break;
				}
				$awardnumbers[] = $value < 10 ? '0'.$value : $value;

			}
		}
		$awardnumbers = implode(',', $awardnumbers);
		if ($periodnumber && $awardnumbers && $awardtime) {
			$data = array(
				'periodnumber' => $periodnumber,
				'awardnumbers' => $awardnumbers,
				'awardtime' => $awardtime,
				'game' => 'xyft',
				'addtime' => time()
			);

			$caijinum = M('caiji')->where("game = 'xyft'")->limit(0,1)->order("id desc")->find();
			if (strval($caijinum['periodnumber']) != $periodnumber && $periodnumber > $caijinum['periodnumber']) {
				M('caiji')->add($data);
			}
		}
	}

	public function dd(){
				//pk10开奖采集,pk10tv
				$time = time();
				if ($time > strtotime("09:00::00") and $time < strtotime("23:59:59")) {
					$url = "http://www.pk10tv.com/index.php?c=content&a=list&catid=2";
					$cpk = file_get_contents($url);
					
					preg_match('/<tbody.*?id=\"reslist\">\s*<tr >\s*<td>(.*?)<\/td>\s*<td> (.*?) <\/td>/',$cpk, $num); 
					if (isset($num[1]) && $num[1]) {
						$awardtime = $num[1];
						$periodnumber = $num[2];
					}

					preg_match_all('/<span title="(.*?)" class="ball_pks_  ball_pks.*? ball_lenght10  ">\s*.*?<\/span>/',$cpk, $pnum); 

					$awardnumbers = array();
					if (isset($pnum[1]) && $pnum[1]) {
						$awardnumbers = array();
						foreach ($pnum[1] as $key => $value) {
							if ($key < 10) {
								continue;
							}
							if ($key >= 20) {
								break;
							}
							$awardnumbers[] = $value;

						}
					}
					$awardnumbers = implode(',', $awardnumbers);
					
					if ($periodnumber && $awardnumbers && $awardtime) {
						$data = array(
							'periodnumber' => $periodnumber,
							'awardnumbers' => $awardnumbers,
							'awardtime' => $awardtime,
							'game' => 'pk10',
							'addtime' => time()
						);

						$caijinum = M('caiji')->where("game = 'pk10'")->limit(0,1)->order("id desc")->find();
						if (strval($caijinum['periodnumber']) != $periodnumber  && $periodnumber > $caijinum['periodnumber']) {
							M('caiji')->add($data);
						}
					}			
				} 
	}

	public function sc1(){
		
		$url = "http://www.pk10tv.com/index.php?c=content&a=list&catid=2";
		$cpk = file_get_contents($url);
		
		preg_match('/<tbody.*?id=\"reslist\">\s*<tr >\s*<td>(.*?)<\/td>\s*<td> (.*?) <\/td>/',$cpk, $num); 
		if (isset($num[1]) && $num[1]) {
			$awardtime = $num[1];
			$periodnumber = $num[2];
		}

		preg_match_all('/<span title="(.*?)" class="ball_pks_  ball_pks.*? ball_lenght10  ">\s*.*?<\/span>/',$cpk, $pnum); 

		$awardnumbers = array();
		if (isset($pnum[1]) && $pnum[1]) {
			$awardnumbers = array();
			foreach ($pnum[1] as $key => $value) {
				if ($key < 10) {
					continue;
				}
				if ($key >= 20) {
					break;
				}
				$awardnumbers[] = $value;

			}
		}
		$awardnumbers = implode(',', $awardnumbers);
		if ($periodnumber && $awardnumbers && $awardtime) {
			$data = array(
				'periodnumber' => $periodnumber,
				'awardnumbers' => $awardnumbers,
				'awardtime' => $awardtime,
				'game' => 'pk10',
				'addtime' => time()
			);

			$caijinum = M('caiji')->where("game = 'pk10'")->limit(0,1)->order("id desc")->find();
			if (strval($caijinum['periodnumber']) != $periodnumber  && $periodnumber > $caijinum['periodnumber']) {
				M('caiji')->add($data);
			}
		}
	}
}

?>