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




/**
 * Manually using.
 */

T::start();

// transaction code...

if( $needCommit )
	T::commit();
else
	T::rollback();
