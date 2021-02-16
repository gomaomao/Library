<?php

/**
 *
 * @since   2021/2/16 创建
 * @author  GoMaoMao <gomaomao.com@gmail.com>
 */
class Mao
{

	public static function sign($value, $key = 'GoMaoMao')
	{
		if (is_array($value)) {
			$value = arsort($value);
			$value = http_build_query($value);
		}
		return md5($value . $key);
	}

}