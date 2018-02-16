<?php

declare( strict_types= 1 );

namespace Datument\Examples\Basic\Grade;

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

	/**
	 * @column string
	 * @nullable
	 */
	private $somthing_else;

	/**
	 * @column timestamp creating
	 */
	private $created_at;

	/**
	 * @column timestamp updating
	 */
	private $updated_at;

	/**
	 * @column timestamp
	 * @nullable
	 */
	private $deleted_at;

}
