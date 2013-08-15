<?php
function filter_string($input)
{
	$input=strip_tags($input);
	$input=preg_replace("/\'\"\//", "", $input);
	return $input;
}