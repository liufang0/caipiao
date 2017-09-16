<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Member;
use App\Models\PayRecord;
use App\Models\Recharge;
use App\Models\SystemConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PayService;
use Illuminate\Support\Facades\Log;

class PayController extends WebBaseController
{
    public function pay(Request $request)
    {
        $config_mod = SystemConfig::find(1);
        $data['version'] = $config_mod->third_version;
        $data['customerid'] = $config_mod->third_userid;
        $userkey = $config_mod->third_userkey;

        $data['notifyurl'] = route('pay.notify');
        $data['returnurl'] = route('pay.return');


        $tradeNo = getBillNo();
        $amount = $request->get('amount')?sprintf("%.2f", $request->get('amount')):0.01;
        $bankId = $request->get('bankcode')?:'ICBC';

        $data['sdorderno'] = $tradeNo;
        $data['total_fee'] = $amount;

        $data['paytype'] = $request->get('paytype')?:'bank'; //默认网银直连
        $data['bankcode'] = $bankId;

        $data['get_code'] = $request->get('get_code')?:0;
        $data['remark'] = $request->get('remark');
        $sign=md5('version='.$data['version'].'&customerid='.$data['customerid'].'&total_fee='.$data['total_fee'].'&sdorderno='.$data['sdorderno'].'&notifyurl='.$data['notifyurl'].'&returnurl='.$data['returnurl'].'&'.$userkey);

        $data['sign'] = $sign;
        $clientIp = $request->getClientIp();

        $member = $this->getMember();
        //产生支付记录
        PayRecord::create([
            'member_id' => $member->id,
            'order_no' => $tradeNo,
            'money' => $amount,
            'pay_type' => 1,
            'bankId' => $bankId,
            'clientIp' => $clientIp,
            'before_request_result' => json_encode($data)
        ]);
        //充值记录
        Recharge::create([
            'bill_no' => $tradeNo,
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $amount,
            'payment_type' => 4,
            'account' => '第三方支付',
            'status' => 1,
            'hk_at' => date('Y-m-d H:i:s')
        ]);

        // 生成表单数据
        echo $this->buildForm($data,$config_mod->third_pay_url);

    }

    public function pay_scan(Request $request)
    {
        $config = config('pay');
        $data['service'] = $config['APINAME_SCANPAY'];
        $data['version'] = $config['API_VERSION'];
        $data['merId'] = $config['MERCHANT_ID'];

        $tradeNo = getBillNo();
        $amount = $request->get('amount')?sprintf("%.2f", $request->get('amount')):0.01;
        $typeId = $request->get('typeId')?:1;
        $clientIp = $request->getClientIp();

        //
        if ($typeId == 1)
        {
            if ($amount> 2000 || $amount < 100)
                return respF('支付宝扫码充值范围100-2000元');
        } elseif ($typeId ==2) {
            if ($amount > 3000 || $amount < 100)
                return respF('微信扫码充值范围100-3000元');
        }


        $data['tradeNo'] = $tradeNo;
        $data['tradeDate'] = date('Ymd');
        $data['amount'] = $amount;
        $data['notifyUrl'] = route('pay.notify');
        $data['extra'] = '';
        $data['summary'] = '在线充值';
        $data['expireTime'] = 60;
        $data['clientIp'] = $clientIp;
        //类型 微信 支付宝
        $data['typeId'] = $typeId;

        $data = $this->transfer($data);
        // 初始化
        $pPay = new PayService($config['KEY'],$config['GATEWAY_URL']);
        // 准备待签名数据
        $str_to_sign = $pPay->prepareSign($data);
        // 数据签名
        $sign = $pPay->sign($str_to_sign);
        // 准备请求数据
        $to_requset = $pPay->prepareRequest($str_to_sign, $sign);

        $member = $this->getMember();
        //产生支付记录
        PayRecord::create([
            'member_id' => $member->id,
            'order_no' => $tradeNo,
            'money' => $amount,
            'pay_type' => 2,
            'typeId' => $typeId,
            'clientIp' => $clientIp,
            'before_request_result' => $to_requset
        ]);
        //充值记录
        Recharge::create([
            'bill_no' => $tradeNo,
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $amount,
            'payment_type' => 4,
            'account' => '第三方支付',
            'status' => 1,
            'hk_at' => date('Y-m-d H:i:s')
        ]);

        //请求数据
        $resultData = $pPay->request($to_requset);
        // 准备验签数据
        $to_verify = $pPay->prepareVerify($resultData);
        // 签名验证
        $resultVerify = $pPay->verify($to_verify[0], $to_verify[1]);
        if ($resultVerify) {
            // 响应吗
            preg_match('{<code>(.*?)</code>}', $resultData, $match);
            $respCode = $match[1];
            // 响应信息
            preg_match('{<desc>(.*?)</desc>}', $resultData, $match);
            $respDesc = $match[1];

            if ($respCode == '00')
            {
                preg_match('{<qrCode>(.*?)</qrCode>}', $resultData, $match);
                $respqrCode= $match[1];

            } else {
                echo $respDesc;exit;
            }


            $base64 =base64_decode($respqrCode);

            $value="http://www.useryx.com";
            $errorCorrectionLevel = "L"; // 纠错级别：L、M、Q、H
            $matrixPointSize = "4"; // 点的大小：1到10
            //echo  $base64;

            //EWM();
        } else {
            echo "验证签名失败";
            return false;
        }

        if ($request->has('is_m') && $request->get('is_m') == 1)
        {
            return view('wap.pay_scan', compact('base64', 'value', 'errorCorrectionLevel', 'matrixPointSize', 'typeId'));
        }

        return view('member.pay_scan', compact('base64', 'value', 'errorCorrectionLevel', 'matrixPointSize', 'typeId'));
    }

    public function success()
    {
        $r = route('member.customer_report').'?type=0';
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(strpos($agent,"comFront") || strpos($agent,"iPhone") || strpos($agent,"MIDP-2.0") || strpos($agent,"Opera Mini") || strpos($agent,"UCWEB") || strpos($agent,"Android") || strpos($agent,"Windows CE") || strpos($agent,"SymbianOS"))
        {
            $r = route('wap.recharge_record');
        }
        return view('member.pay_success', compact('r'));
    }

    public function notify(Request $request)
    {
        $res = $request->all();
        Log::info($res);
        // 请求数据赋值
        $data = [];

        // 订单状态，0-未支付，1-支付成功，2-失败，4-部分退款，5-退款，9-退款处理中
        $data['status'] = $res["status"];
        $data['sdorderno'] = $res["sdorderno"];
        $data['total_fee'] = $res['total_fee'];
        $data['paytype'] = $res['paytype'];
        $data['remark'] = $res['remark'];
        $data['sign'] = $res['sign'];

        $data['customerid'] = $res['customerid'];
        $data['sdpayno'] = $res['sdpayno'];

        //处理订单
        $mod = PayRecord::where('order_no', $data["sdorderno"])->first();
        if ($mod)
        {
            $member = Member::find($mod->member_id);
            $recharge = Recharge::where('bill_no', $data["sdorderno"])->first();

            $mod->update([
                'status' => $data["status"],
                'after_request_result' => json_encode($data)
            ]);


            //如果处理成功
            if ($recharge)
            {
                if ($data['status'] == 1 && $recharge->status != 2)
                {
                    //中心账户
                    $member->increment('money', $data["total_fee"]);
                    //支付记录
                    $recharge->update([
                        'status' =>2,
                        'confirm_at' => date('Y-m-d H:i:s'),
                    ]);
                } else {
                    $recharge->update([
                        'status' =>3,
                    ]);
                }
            }
        }


        return "SUCCESS";
    }

    public function pay_return(Request $request)
    {
        return redirect()->to(route('pay.success'));
    }

    protected  function buildForm($data, $gateway) {
        $sHtml = "<form id='paysubmit' name='bankPaySubmit' action='".$gateway."' method='post'>";
        while (list ($key, $val) = each ($data)) {
            $sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
        }
        $sHtml.= "</form>";
        $sHtml.= "<script>document.forms['bankPaySubmit'].submit();</script>";

        return $sHtml;
    }
}
