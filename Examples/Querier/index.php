<?php

declare( strict_types= 1 );

namespace Datument\Examples\Querier;

use Datument\Querier as Q;

////////////////////////////////////////////////////////////////

/***
 * Get a querier.
 */

// Create with constructor
$querier= new Q;

// Create with static magic methods from Querier class.
$querier= Q::from( 'User' );

// Create with static magic methods from Model class.
$querier= User::where( 'age', '>', 5 );

// From entity set.
$users= User::getBy( 'age', 8 );
$querier= $users->querier;

// From clone.
$new_querier= clone $querier;


/***
 * Middle methods.
 */

// Set selected model.
$querier->from( 'User' );
$querier->from( User::class );

// Set selected columns
$querier->select( '*' );
$querier->select( 'column', 'another_column' );
$querier->selectEx( 'column' );

// Set where conditions.
$querier->where( 'column', 'value' );
$querier->where( 'column', '=', 'value' );
$querier->where( 'column', '>', 'value' );
$querier->where( 'column', '>@', 'another_column' );
$querier->where( 'column', null );
$querier->where( 'column', '!=', null );
$querier->where( 'column', 'IN', [ 1, 2, 3, ] );
$querier->where( 'column', '!IN', [ 4, 5, 6, ] );
$querier->where( 'column', 'IN_SET', '1,2,3' );
$querier->where( 'column', '!IN_SET@', 'set_column' );
$querier->where( 'column', 'BETWEEN', 1, 8 );
$querier->where( 'column', '!BETWEEN', 2, 4 );
$querier->where( 'DATE:created_at', '2018-2-14' );

// Set AND/OR between conditions. AND by default.
$querier->or()->where( 'column', '<', 1 )->where( 'column', '>', 2 );
$querier->and()->where( 'column', '>', 1 )->where( 'column', '<', 2 );

// Nested conditions, array style.
$querier->nested(
	[
		[ 'column', null, ],
		[ 'column', 'IN', [ 1, 2, ], ],
		[
			[
				[ 'another_column', '!=', null, ],
				[ 'another_column', '=@', 'column', ],
			], 'AND',
		],
	], 'OR'
);
// Nested conditions, function style.
$querier->nested(
	function( $cs ){
		$cs->where( 'column', null );
		$cs->where( 'column', 'IN', [ 1, 2, ] );
		$cs->nested(
			function( $cs ){
				$cs->where( 'another_column', '!=', null );
				$cs->where( 'another_column', '=@', 'column' );
			}, 'AND'
		);
	}, 'OR'
);

/**
 * Set order.
 */

$querier->orderBy( 'column', 'ASC' );
$querier->orderBy( 'column', 'DESC' );

// For time column DESC by default, for other columns ASC by defualt.
$querier->orderBy( 'column' );

// Multi-order by array, first as first.
$querier->orderByM( [ 'first_order_column'=>'DESC', 'second_order_column'=>'ASC', ] );
// Multi-order by multi-call, last as first.
$querier->orderBy( 'second_order_column', 'ASC' )->orderBy( 'first_order_column', 'DESC' );


/**
 * Limit
 */
$querier->limit( 5 );
$querier->limit( 5, 10 );
$querier->limit( 5 )->offset( 10 );

$querier->unlimit();

// Distinct
$querier->distinct();



/**
 * Union
 */
$unioned= Q::union( ...$queriers );


/**
 * Lock
 */
// Reading lock
$querier->lock( 'R' );
// Writing lock
$querier->lock( 'W' );



/***
 * Aggregated querier.
 */

// Make a aggregated querier.
$aggregated= $querier->agg();
$grouped= $querier->groupBy( 'grouped_column' );

// Select aggregated column.
$aggregated->select( 'SUM:column', 'AVG:column' );
$grouped->select( 'grouped_column', 'COUNT:column', 'AVG:column' );

// Where with aggregated column.
$grouped->having( 'grouped_column', '>@', 'SUM:another_column' );
$grouped->having( 'COUNT:column', '>', 2 );


// $returned= $origin->where( ... );     $returned === $origin;
// $returned= $origin->orderBy( ... );   $returned === $origin;
// ...
//
// $returned= $origin->agg();            $returned !== $origin;
// $returned= $origin->groupBy( ... );   $returned !== $origin;



/***
 * Reading method (chain calling terminator).
 */

// Get first record and return a entity.
$querier->first();
// Get nth record and return a entity.
$querier->nth( 8 );

// Get first record and return a entity. Return null instead of throw exception when record not found.
$querier->firstOrNull();
// Get nth record and return a entity. Return null instead of throw exception when record not found.
$querier->nthOrNull( 8 );

// Get all record and return a set of entities.
$querier->list();

// Get specific column.
$querier->column( 'id' );

// Get mapping between two column.
$querier->mapping( 'id', 'label' );

// Aggregated statistics.
$querier->agg()->count();
$querier->agg()->sum();
$querier->agg()->avg();
$querier->agg()->max();
$querier->agg()->min();
$querier->agg()->implode( ',' );
