<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! function_exists('overviewhere_php_cms_insert_php') )
{

	function overviewhere_php_cms_insert_php($content)
	{
		$overviewhere_php_cms_content = $content;
		preg_match_all('!\[php_start[^\]]*\](.*?)\[php_end[^\]]*\]!is',$overviewhere_php_cms_content,$overviewhere_php_cms_matches);
		$overviewhere_php_cms_nummatches = count($overviewhere_php_cms_matches[0]);
		for( $overviewhere_php_cms_i=0; $overviewhere_php_cms_i<$overviewhere_php_cms_nummatches; $overviewhere_php_cms_i++ )
		{
			ob_start();
			eval($overviewhere_php_cms_matches[1][$overviewhere_php_cms_i]);
			$overviewhere_php_cms_replacement = ob_get_contents();
			ob_clean();
			ob_end_flush();
			$overviewhere_php_cms_content = preg_replace('/'.preg_quote($overviewhere_php_cms_matches[0][$overviewhere_php_cms_i],'/').'/',$overviewhere_php_cms_replacement,$overviewhere_php_cms_content,1);
		}
		return $overviewhere_php_cms_content;
	} # function overviewhere_php_cms_insert_php()
}	
?>