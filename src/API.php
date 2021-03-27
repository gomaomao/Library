<?php

namespace Mao;
/**
 * API接口返回处理
 * Class API
 * @package Mao
 */
class API
{
  static private $errorCode = [
    // 1000～1999 区间表示参数错误
    '1000' => '参数数量错误',
    // 2000～2999 区间表示用户错误
    '2001' => '用户名错误',
    '2002' => '密码错误',
    '2003' => 'Token错误',
    // 3000～3999 区间表示接口异常
  ];

  /**
   * 返回成功信息
   * @param        $data    返回数据
   * @param bool   $is_list 是否数组
   * @param string $msg     提示信息
   *
   * @return \think\response\Json
   */
  static function success($data, $is_list = true, $msg = "成功")
  {
    if (!!$is_list) {
      $data = ['code' => 0, 'data' => $data, 'msg' => $msg];
    } else {
      $data = array_merge(['code' => 0, 'msg' => $msg], $data);
    }
    return json($data);
  }

  /**
   * 返回数组形式的成功信息
   * @param        $data  返回数据
   * @param string $msg   提示信息
   *
   * @return \think\response\Json
   */
  static function list($data,$msg='成功'){
    return self::success($data,true,$msg);
  }


  /**
   * 返回分页形式的成功信息
   * @param        $data  含分页信息的数组
   * @param string $msg   提示信息
   *
   * @return \think\response\Json
   */
  static function page($data,$msg='成功'){
    return self::success($data,false,$msg);
  }

  /**
   * 返回一般形式的成功信息
   * @param        $data
   * @param string $msg   提示信息
   *
   * @return \think\response\Json
   */
  static function data($data,$msg='成功'){
    return self::success($data,false,$msg);
  }

  /**
   * 返回错误信息
   * @param       $code 错误代码
   * @param array $data 调试数据
   *
   * @return \think\response\Json
   */

  static function error($code, $data = [])
  {
    $msg = self::$errorCode;
    $msg = $msg[$code] ?? '未定义错误';
    return json(['code' => $code, 'data' => $data, 'msg' => $msg]);
  }
}

?>