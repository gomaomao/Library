<?php

namespace gomaomao\library\tools;

/**
 * 数据加密解密工具
 * Class Crypt
 * @package library\tools
 */
class Crypt
{
	public static function base64()
	{
		return ['A', 'B', 'C', 'D', 'E', 'F', /* 索引 0 ~ 5*/
				'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S',  /* 索引6 ~ 18*/
				'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f',  /* 索引 19 ~ 31*/
				'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',  /* 索引 32 ~ 44*/
				't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5',  /* 索引 45 ~ 57*/
				'6', '7', '8', '9', '+', '/'/* 索引 58 ~ 63*/];
	}

	public static function base64_rule()
	{
		return [
				'url' => ['A', 'B', 'C', 'D', 'E', 'F', /* 索引 0 ~ 5*/
						'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S',  /* 索引6 ~ 18*/
						'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f',  /* 索引 19 ~ 31*/
						'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',  /* 索引 32 ~ 44*/
						't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5',  /* 索引 45 ~ 57*/
						'6', '7', '8', '9', '-', '_'/* 索引 58 ~ 63*/],
				'cn'  => ['爱', '笔', '次', '得', '饿', '发', /* 索引 0 ~ 5*/
						'个', '好', '唉', '就', '看', '了', '吗', '你', '哦', '拍', '去', '日', '说',  /* 索引6 ~ 18*/
						'天', '勿', '未', '我', '想', '要', '再', '啊', '不', '吃', '的', '额', '否',  /* 索引 19 ~ 31*/
						'给', '和', '哎', '加', '开', '来', '没', '那', '噢', '跑', '亲', '热', '啥',  /* 索引 32 ~ 44*/
						'填', '物', '微', '网', '行', '严', '招', '零', '一', '二', '三', '四', '五',  /* 索引 45 ~ 57*/
						'六', '七', '八', '九', '上', '下'/* 索引 58 ~ 63*/],
		];
	}


	/**
	 * UTF8字符串加密
	 * @param string $string
	 * @return string
	 */
	public
	static function encode($string)
	{
		list($chars, $length) = ['', strlen($content = iconv('UTF-8', 'GBK//TRANSLIT', $string))];
		for ($i = 0; $i < $length; $i++) $chars .= str_pad(base_convert(ord($content[$i]), 10, 36), 2, 0, 0);
		return $chars;
	}

	/**
	 * UTF8字符串解密
	 * @param string $encode
	 * @return string
	 */
	public
	static function decode($encode)
	{
		$chars = '';
		foreach (str_split($encode, 2) as $char) {
			$chars .= chr(intval(base_convert($char, 36, 10)));
		}
		return iconv('GBK//TRANSLIT', 'UTF-8', $chars);
	}

	/**
	 * 对提供的数据进行urlsafe的base64编码。
	 * @param string $data 待编码的数据，一般为字符串
	 * @return string 编码后的字符串
	 */
	public
	static function base64EncodeByRule($data, $rule = 'url', $before = '', $after = '')
	{
		$rules   = self::base64_rule();
		$replace = $rules[$rule];
		return str_replace(self::base64(), $replace, base64_encode($before . $data . $after));
	}

	/**
	 * 对提供的urlsafe的base64编码的数据进行解码
	 * @param string $str 待解码的数据，一般为字符串
	 * @return string 解码后的字符串
	 */
	public
	static function base64DecodeByRule($str, $rule = 'url', $before = '', $after = '')
	{
		$rules  = self::base64_rule();
		$find   = $rules[$rule];
		$result = base64_decode(str_replace($find, self::base64(), $str));
		return str_replace([$before, $after], ['', ''], $result);
	}

}