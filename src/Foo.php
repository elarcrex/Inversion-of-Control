<?php

class Foo {
	
	protected $bar;
	protected $baz;

	function __construct(Bar $bar, Baz $baz)
	{
		$this->bar = $bar;
		$this->baz = $baz;
	}

}