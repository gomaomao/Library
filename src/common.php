<?php
if (!function_exists('random_color')) {
	/**
	 * 获取随机颜色
	 * @return string
	 */
	function random_color()
	{
		$str = '#';
		for ($i = 0; $i < 6; $i++) {
			$randNum = rand(0, 15);
			switch ($randNum) {
				case 10:
					$randNum = 'A';
					break;
				case 11:
					$randNum = 'B';
					break;
				case 12:
					$randNum = 'C';
					break;
				case 13:
					$randNum = 'D';
					break;
				case 14:
					$randNum = 'E';
					break;
				case 15:
					$randNum = 'F';
					break;
			}
			$str .= $randNum;
		}
		return $str;
	}
}

if (!function_exists('random_money')) {
	/**
	 * 返回随机红包分布
	 * @param number $total 总红包金额
	 * @param number $num 红包数量
	 * @return array|bool 红包数组或出错
	 */
	function random_money($total, $num)
	{
		$bao = [];
		$min = 1;
		if ($total < 1 || $num < 1)
			return false;
		for ($i = 1; $i < $num; $i++) {
			$safe_total = ($total - ($num - $i) * $min) / ($num - $i);//随机安全上限
			$money      = mt_rand($min, $safe_total);
			$total      = $total - $money;
			$bao[]      = $money;
//			echo '第' . $i . '个红包：' . $money . ' 元，余额：' . $total . ' 元 <br />';
		}
		$bao[] = $total;
		return $bao;
	}
}


if (!function_exists('get_sign')) {
	/**
	 * @param string|array $value
	 * @param string $key
	 * @return string
	 */
	function get_sign($value, $key = 'GoMaoMao')
	{
		if (is_array($value)) {
			$value = arsort($value);
			$value = http_build_query($value);
		}
		return md5($value . $key);
	}
}