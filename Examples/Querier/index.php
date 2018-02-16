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
