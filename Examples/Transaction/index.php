<?php

declare( strict_types= 1 );

namespace Datument\Examples\Transaction;

use Datument\Transaction as T;

////////////////////////////////////////////////////////////////

/**
 * With callable (basic and recommended).
 */
T::do(
	function(){
		$foo= Foo::lock( 'R' )->find( 1 );
		$bar= $foo->Bar->lock( 'W' )->get();
		$baz= $foo->Baz->lock( 'W' )->get();

		$bar->increate( 'bar' );
		$baz->increate( 'baz' );
	}
);

// The transaction will be rolled back if a \Throwable been throwed,
// but will be commited otherwise.


// Nesting.
T::do(
	function(){
		T::do(
			function(){
				// Sub-transaction 0...
			}
		);

		T::do(
			function(){
				// Sub-transaction 1...
			}
		);
	}
);

// The transaction will be commited if all sub-transactions are commited,
// but will be rolled back otherwise.




/**
 * Manually using.
 */

T::start();

// transaction code...

if( $needCommit )
	T::commit();
else
	T::rollback();


// Nesting.

T::start();
{
	T::start();

	// Sub-transaction 0...

	if( $needCommit )
		T::commit();
	else
		T::rollback();
}
{
	T::start();

	// Sub-transaction 1...

	if( $needCommit )
		T::commit();
	else
		T::rollback();
}

T::commit();

// When count of ::commit() calling matches count of ::start(), the transaction will be commited.
// When a ::rollback() called, the transaction will be rolled back. And Datument will skip all
// queries until count of ::commit() or ::rollback() calling equals count of ::start() calling.
