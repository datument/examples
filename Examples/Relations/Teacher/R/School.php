<?php

declare( strict_types= 1 );

namespace Datument\Examples\Relations\Teacher\R;

////////////////////////////////////////////////////////////////

class School extends \Datument\R\ABelongs
{

	/**
	 * Relating columns.
	 *
	 * @var array
	 */
	static protected $_on_= [
		[ 'school_id'=>'School.id', ],
	];

}
