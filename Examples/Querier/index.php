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


/***
 * Middle methods.
 */

// Set selected model.
$querier->from( 'User' );
$querier->from( User::class );

// Set selected columns
$querier->select( '*' );
$querier->select( 'column', 'another_column' );
$querier->selectExcept( 'column' );

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
	function( $q ){
		$q->where( 'column', null );
		$q->where( 'column', 'IN', [ 1, 2, ] );
		$q->nested(
			function( $q ){
				$q->where( 'another_column', '!=', null );
				$q->where( 'another_column', '=@', 'column' );
			}, 'AND'
		);
	}, 'OR'
);
