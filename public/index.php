<?php

declare( strict_types= 1 );

$realFile= strtok( __DIR__.$_SERVER['REQUEST_URI'], '#?' );

if(
	file_exists( $realFile )
&&
	!is_dir( $realFile )
&&
	$realFile!==__FILE__
) return false;

define( 'BASE_PATH', dirname( __DIR__ ) );

require BASE_PATH.'/vendor/autoload.php';

$htsl= new Htsl\Htsl();

$viewPath= BASE_PATH.'/views';

$htsl->setBasePath( $viewPath );

$pathInfo= $_SERVER['PATHINFO']??strtok( $_SERVER['REQUEST_URI'], '#?' );

$filePath= rtrim( $viewPath.$pathInfo, '/' );

is_dir( $filePath ) and $filePath= $filePath.'/index';

$filePath.='.htsl';

$compiledPath= '/tmp/htsl_compiled/'.md5( $filePath );

file_exists( '/tmp/htsl_compiled' ) or mkdir( '/tmp/htsl_compiled' );

if( file_exists( $filePath ) )
{
	$htsl->compile( $filePath, $compiledPath );
}
else
{
	$compiledPath= '/tmp/htsl_compiled/404';
	$htsl->compile( '404.htsl', $compiledPath );
}

header( 'Content-type:'.mime_content_type( $compiledPath ) );

include $compiledPath;
