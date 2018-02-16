<?php

declare( strict_types= 1 );

namespace Datument\Examples\Relations\Clas\R;

////////////////////////////////////////////////////////////////

class Grade extends \Datument\R\ABelongs
{

	/**
	 * Relating columns.
	 *
	 * @var array
	 */
	static protected $_on_= [
		[ 'grade_id'=>'Grade.id', ],
	];

}
