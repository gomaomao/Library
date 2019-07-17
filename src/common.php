<?php

if (!function_exists('randomColor')) {
	function randomColor()
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

if (!function_exists('randomMoney')) {
	function randomMoney($total, $num)
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
