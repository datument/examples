<?php

declare( strict_types= 1 );

namespace Datument\Examples\Relations\Teacher;

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
	 * @column string 32
	 */
	private $name;

}
