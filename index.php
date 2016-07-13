<?php 

require 'src/IoC.php';
require 'src/Foo.php';
require 'src/Bar.php';
require 'src/Baz.php';
require 'helpers/functions.php';

bind('Foo', function(){
	return new Foo(new Bar, new Baz);
});

var_dump(app('Foo'));

