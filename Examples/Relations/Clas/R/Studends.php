<?php

declare( strict_types= 1 );

namespace Datument\Examples\Relations\Clas\R;

////////////////////////////////////////////////////////////////

class Studends extends \Datument\R\AHasLot
{

	/**
	 * Relating columns.
	 *
	 * @var array
	 */
	static protected $_on_= [
		[ 'id'=>'Student.class_id', ],
	];

}
