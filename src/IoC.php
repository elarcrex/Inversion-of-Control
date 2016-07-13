<?php
class IoC {

	protected static $registry = [];


	public static function bind ($class, Callable $resolver)
	{
		static::$registry[$class] = $resolver;
	}

    public static function make($class) 
    {
        if (isset(static::$registry[$class])) 
        {
            $resolver = static::$registry[$class];

            return $resolver();
        }

        return static::attempResolve($class);
    }

    public static function attempResolve($class) 
    {
        $reflector = new ReflectionClass($class);
        
        $constructor = $reflector->getConstructor();
        
        if (is_null($constructor))
        {
            return new $class;
        }
        
        $dependencies = static::getDependencies($constructor->getParameters());
        
        return $reflector->newInstanceArgs($dependencies);
    }

    protected static function getDependencies($dependencies) 
    {
        $array = [];

        foreach ($dependencies as $dependency) 
        {
            if ( is_null( $dependency->getClass() ) ) 
            {
                array_push( $array, $dependency->getDefaultValue());
            } 
            else 
            {
                array_push( $array, static::make($dependency->getClass()->name));
            }
        }

        return $array;
    }

}