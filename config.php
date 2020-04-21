<?php
define('PATH_SITE',__DIR__);
define('URL_SITE','http://localhost/export');

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','dmitry13');
define('DB_NAME','words');

class Config {
	
	public $cells = array(
							'B'=>'word',
							'C'=>'patch_of_speech',
							'D'=>'frequency',
							// 'D'=>'order',
							// 'F'=>'date port',
							// 'B'=>'customer',
							// 'G'=>'country',
							// 'J'=>'products',
							// 'K'=>'grade',
							// 'U'=>'date',
							// 'M'=>'size',
							// 'P'=>'length',
							// 'Q'=>'quantity',
							// 'U'=>'date',
							// 'V'=>'gruzo',
							
							);
}
?>
<!-- 
							'B'=>'word',
							'C'=>'part_of_speech',
							'D'=>'customer', -->