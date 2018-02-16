<?php

declare( strict_types= 1 );

namespace Datument\Examples\Relations\Clas;

////////////////////////////////////////////////////////////////

class Entity implements \Datument\IEntity
{
	use \Datument\TToBeEntity;

	/**
	 * @primary 0/2
	 * @column foreign School.id
	 */
	private $school_id;

	/**
	 * @primary 1/2
	 * @column increment
	 */
	private $id;

	/**
	 * @column foreign Grade.id
	 */
	private $grade_id;

	/**
	 * @column foreign Teacher.id
	 */
	private $adviser_id;

}
