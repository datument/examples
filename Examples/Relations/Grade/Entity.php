<?php

declare( strict_types= 1 );

namespace Datument\Examples\Relations\Grade;

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
	private $title;

	/**
	 * @column string 8
	 * @unique
	 */
	private $short_title;

	/**
	 * @column integer +1
	 * @index
	 * @default 0
	 */
	private $level;

}
