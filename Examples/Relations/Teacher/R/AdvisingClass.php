<?php

declare( strict_types= 1 );

namespace Datument\Examples\Relations\Teacher\R;

////////////////////////////////////////////////////////////////

class AdvisingClass extends \Datument\R\AHasOne
{

	/**
	 * Relating columns.
	 *
	 * @var bool
	 */
	static protected $_nullable_= true;

	/**
	 * Relating columns.
	 *
	 * @var array
	 */
	static protected $_on_= [
		[ 'id'=>'Class.adviser_id', ],
	];

}
