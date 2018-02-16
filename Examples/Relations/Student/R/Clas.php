<?php

declare( strict_types= 1 );

namespace Datument\Examples\Relations\Student\R;

////////////////////////////////////////////////////////////////

class Clas extends \Datument\R\ABelongs
{

	/**
	 * Reset model name.
	 *
	 * @var    string
	 */
	static protected $_name_= 'Class';

	/**
	 * Relating columns.
	 *
	 * @var array
	 */
	static protected $_on_= [
		[ 'class_id'=>'Class.id', ],
	];

}
