<?php

declare( strict_types= 1 );

namespace Datument\Examples\Relations\School;

////////////////////////////////////////////////////////////////

class Entity implements \Datument\IEntity
{
	use \Datument\TToBeEntity;

	/**
	 * @primary
	 * @column string
	 */
	private $id;

	/**
	 * @column string
	 */
	private $column;

}
