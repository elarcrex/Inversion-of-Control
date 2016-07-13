<?php

function bind($classname, Callable $resolver)
{
	return IoC::bind($classname, $resolver);
}

function app($classname)
{
	return IoC::make($classname);
}