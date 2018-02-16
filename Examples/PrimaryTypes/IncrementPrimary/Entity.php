<?php

declare( strict_types= 1 );

namespace Datument\Examples\PrimaryTypes\IncrementPrimary;

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
	 * @column string
	 */
	private $column;

}
