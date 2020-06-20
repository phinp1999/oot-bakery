<?php

return array(
	'default' => array(
		'(/<controller>(/<action>(/<id>)))', 
		array(
			'controller' => 'TrangChu',
			'action' => 'index'
		)
	),
	'about' => array('/about', array(
		'controller' => 'About',
		'action' => 'index'
		)
	),
	'contact' => array('/contact', array(
		'controller' => 'Contact',
		'action' => 'index'
		)
	),
	'form' => array('/form', array(
		'controller' => 'Form',
		'action' => 'index'
		)
	),
	'profile' => array('/profile', array(
		'controller' => 'Profile',
		'action' => 'index'
		)
	),
	'cart' => array('/cart', array(
		'controller' => 'Cart',
		'action' => 'index'
		)
	),
	'payment' => array('/payment', array(
		'controller' => 'Payment',
		'action' => 'index'
		)
	)
);