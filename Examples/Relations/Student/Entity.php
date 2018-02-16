<?php

declare( strict_types= 1 );

namespace Datument\Examples\Relations\Student;

////////////////////////////////////////////////////////////////

class Entity implements \Datument\IEntity
{
	use \Datument\TToBeEntity;

	/**
	 * @primary
	 * @column increment
	 */
	private $id;

	/**
	 * @column foreign Class.id
	 */
	private $class_id;

	/**
	 * @column string 32
	 */
	private $name;

}
