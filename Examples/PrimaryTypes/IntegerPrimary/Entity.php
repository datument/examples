<?php

declare( strict_types= 1 );

namespace Datument\Examples\PrimaryTypes\IntegerPrimary;

////////////////////////////////////////////////////////////////

class Entity implements \Datument\IEntity
{
	use \Datument\TToBeEntity;

	/**
	 * @primary
	 * @column integer
	 */
	private $id;

	/**
	 * @column string
	 */
	private $column;

}
