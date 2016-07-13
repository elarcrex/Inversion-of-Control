# Inversion-of-Control
## IoC Container

Object-oriented programming ah chuan class kan nei teuh thin a, kan application chhunga kan object te kha fing taka khawsa tura kan duh chuan kan class te kha kan in hmelhriattir a ngai thin a; kan in mamawh tawn tir a ni ber ang chu. Hetia class pakhatin class a mamawh tih avanga class constructor emaw methods chhunga class instance siamna hard-code ai chuan Dependency Injection hmangin class kan instance kan thun mai thin a ni. Dependency Injection han tih hian thil ho ve tak mai a ni a, a tawngkam hi a changkang vang hian mi tam tak hian hriatchian emaw zir chian an tumlo (peihlo) fo thin. Dependency Injection chu class methods ah arguments pek a ni mai a, mahse Dependency Injection kan tih deuh bik hi chuan class **methods** (heng ho pawh hi function kan tih tho kha a ni) ah class dang instance arguments anga kan pek kha a ni mai. 

Awle, tikhan a thuhma chu zo sela, kan Inversion-of-Control (IoC) class tangkaina leh hman dan han sawi teh ang:

Class pakhat `Foo` tih lo nei ta ila, a hnuai ami ang hian:

```php
<?php

class Foo {
	public function __construct(Bar $bar, Baz $bar)
	{
		
	}
}
```

A chunga  class `Foo` khian class `Bar` leh `Baz` a mamawh a ni. `Foo` instance kan siam dawn apiangin a hnuai ang hian kan tih angai ang:

```php
$foo = new Foo(new Bar, new Baz);
```
Han en mai chuan code tlem te chu a ni naa, mahse `Foo` khian class dang mamawh belh ta sela, entirnan class paruk instance te lo mamawh ta sela, 
```php
$foo = new Foo(new Bar, new Baz, new Two, new Three, new Four, new Five, new Six);
```
Class pakhat instantiate ringawt tur chuan ziah tur tam zia khi. Chu ai chuan IoC container nei ta ila, kan mamawh ang class instance kan bind theih anga, kan mamawh hunah kan bind sa, kan IoC container registry chhunga awmsa kha hmang ta mai ila, a chunga thui deuh chhu nawn seklo khian.

```php
IoC::bind('Foo', function(){
	return new Foo(new Bar, new Baz, new Two, new Three, new Four, new Five, new Siz);
});
```

Tikhian vawikhat kan register a, kan duh duh hunah class `Foo` kan hmang mai thei tawh a ni. A hnuai ami ang hian:

```php
//After binding
$foo = IoC::make('Foo');
$foo->someFooMethod();
```

A awlsam zawk nan tiin, kan mithiam te tih dan angin, kan IoC container ah kan register te te duhlo takin tih thu ah `Reflection` class kan hmang tangkai thei bawk. A chunga ka example pek zawng zawng khi theihnghilh ula, heti mai hian `Foo` kan instantiate thei bawk a ni (eng ang zat dependency pawh nei sela):

```php
//Without binding
$foo = IoC::make('Foo');
$foo->someFooMethod();
```

He class te reuh te hi in tangkaipuia in mamawh dan azira in modify theih ngei ka beisei. 


