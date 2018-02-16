<?php

declare( strict_types= 1 );

namespace Datument\Examples\Relations\Clas\R;

////////////////////////////////////////////////////////////////

class Adviser extends \Datument\R\ABelongs
{

	/**
	 * Set Related model name.
	 *
	 * @var    string
	 */
	static protected $_related_model_= 'Teacher';

	/**
	 * Relating columns.
	 *
	 * @var array
	 */
	static protected $_on_= [
		[ 'school_id'=>'Teacher.school_id', ],
		[ 'adviser_id'=>'Teacher.id', ],
	];

}
