<?php

namespace Source\Members;

class Config
{
	public const COMPANY = "UpInside";
	protected const DOMAIN = "UpInside.com.br";
	private const SETOR = "Educação";

	public static $company;
	public static $domain;
	public static $setor;

	public static function setConfig($company, $domain, $setor)
	{
      self::$company = $company;
      self::$domain = $domain;
      self::$setor = $setor;
	}
}

?>