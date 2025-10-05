<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 本地API控制器 - 处理彩票数据采集的替代方案
 * 当外部API不可用时，使用本地生成的数据
 */
class LocalApiController extends Controller
{
    /**
     * 获取北京28数据
     */
    public function getBj28Data()
    {
        $time = time();
        $date = date('Ymd', $time);
        
        // 获取当前应该的期数
        $game_time = M('time');
        $current_period = $game_time->where("game='bj28' AND actionTime <= '" . date('H:i:s', $time) . "'")->order('actionNo DESC')->find();
        
        if ($current_period) {
            $periodnumber = date('ymd') . str_pad($current_period['actionno'], 3, "0", STR_PAD_LEFT);
            $awardtime = date('Y-m-d ') . $current_period['actiontime'];
            
            // 检查是否已经预设了开奖号码
            $caiji_admin = M('caiji_admin');
            $preset = $caiji_admin->where(array('periodnumber' => $periodnumber, 'game' => 'bj28'))->find();
            
            if ($preset) {
                $awardnumbers = $preset['awardnumbers'];
            } else {
                // 生成随机号码
                $awardnumbers = rand(0, 9) . ',' . rand(0, 9) . ',' . rand(0, 9);
            }
            
            $result = array(
                'preDrawIssue' => $periodnumber,
                'preDrawTime' => $awardtime,
                'next_term' => $current_period['actionno'] + 1 > 288 ? date('ymd', $time + 86400) . '001' : date('ymd') . str_pad($current_period['actionno'] + 1, 3, "0", STR_PAD_LEFT),
                'awardNumbers' => $awardnumbers,
                'opencode' => $awardnumbers
            );
            
            $this->ajaxReturn(array('code' => 0, 'data' => $result));
        } else {
            $this->ajaxReturn(array('code' => -1, 'msg' => '暂无数据'));
        }
    }
    
    /**
     * 获取加拿大28数据
     */
    public function getJnd28Data()
    {
        $time = time();
        $date = date('Ymd', $time);
        
        // 获取当前应该的期数
        $game_time = M('time');
        $current_period = $game_time->where("game='jnd28' AND actionTime <= '" . date('H:i:s', $time) . "'")->order('actionNo DESC')->find();
        
        if ($current_period) {
            $periodnumber = '1' . date('md') . str_pad($current_period['actionno'], 3, "0", STR_PAD_LEFT);
            $awardtime = date('Y-m-d ') . $current_period['actiontime'];
            
            // 检查是否已经预设了开奖号码
            $caiji_admin = M('caiji_admin');
            $preset = $caiji_admin->where(array('periodnumber' => $periodnumber, 'game' => 'jnd28'))->find();
            
            if ($preset) {
                $awardnumbers = $preset['awardnumbers'];
            } else {
                // 生成随机号码
                $awardnumbers = rand(0, 9) . ',' . rand(0, 9) . ',' . rand(0, 9);
            }
            
            $result = array(
                'preDrawIssue' => $periodnumber,
                'preDrawTime' => $awardtime,
                'next_term' => $current_period['actionno'] + 1 > 480 ? '1' . date('md', $time + 86400) . '001' : '1' . date('md') . str_pad($current_period['actionno'] + 1, 3, "0", STR_PAD_LEFT),
                'awardNumbers' => $awardnumbers,
                'opencode' => $awardnumbers,
                'issue' => $periodnumber,
                'time' => $awardtime
            );
            
            $this->ajaxReturn(array('code' => 0, 'data' => array($result)));
        } else {
            $this->ajaxReturn(array('code' => -1, 'msg' => '暂无数据'));
        }
    }
    
    /**
     * 测试本地API
     */
    public function test()
    {
        echo "本地API工作正常<br>";
        echo "北京28数据接口: /Home/LocalApi/getBj28Data<br>";
        echo "加拿大28数据接口: /Home/LocalApi/getJnd28Data<br>";
    }
}
