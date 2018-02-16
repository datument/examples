<?php

declare( strict_types= 1 );

namespace Datument\Examples\PrimaryTypes\StringStringPrimary;

////////////////////////////////////////////////////////////////

class Entity implements \Datument\IEntity
{
	use \Datument\TToBeEntity;

	/**
	 * @primary 0/2
	 * @column string
	 */
	private $foo_id;

	/**
	 * @primary 1/2
	 * @column string
	 */
	private $id;

	/**
	 * @column string
	 */
	private $column;

}
