<?php

/**
 *
 * @since   2021/2/16 创建
 * @author  GoMaoMao <gomaomao.com@gmail.com>
 */
class Mao
{
	/**
	 * 签名
	 * @param $value
	 * @param string $key
	 * @return string
	 */
	public static function sign($value, $key = 'GoMaoMao')
	{
		if (is_array($value)) {
			$value = arsort($value);
			$value = http_build_query($value);
		}
		return md5($value . $key);
	}

}