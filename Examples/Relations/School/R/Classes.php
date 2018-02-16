<?php

declare( strict_types= 1 );

namespace Datument\Examples\Relations\School\R;

////////////////////////////////////////////////////////////////

class Classes extends \Datument\R\AHasLot
{

	/**
	 * Relating columns.
	 *
	 * @var array
	 */
	static protected $_on_= [
		[ 'id'=>'Class.school_id', ],
	];

}
