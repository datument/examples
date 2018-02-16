<?php

declare( strict_types= 1 );

namespace Datument\Examples\PrimaryTypes;

use Datument\Datument as D;

////////////////////////////////////////////////////////////////

/**
 * Datument allows several types of primary key.
 *   simple
 *     increment (default)
 *     integer
 *     string
 *
 *   complex
 *     ...
 */


/**
 * Creating
 */

// increment
$inc= IncrementPrimary::create( [ 'column'=>'value', ] );

D::flush();

$inc->_key_;
// returns like 1

// integer
IntegerPrimary::create( 1, [ 'column'=>'value', ] );

D::flush();

// string
StringPrimary::create( 'id', [ 'column'=>'value', ] );

D::flush();

// complex without increment. [string,string,]
StringStringPrimary::create( [ 'foo', 'bar', ], [ 'column'=>'value', ] );

D::flush();

// complex with increment. [string,increment,]
$cpx= StringIncrementPrimary::create( [ 'foo', null, ], [ 'column'=>'value', ] );

D::flush();

$cpx->_key_;
// returns like [ 'foo', 1, ]


/**
 * Finding
 */

// increment
IncrementPrimary::find( 1 );

// integer
IntegerPrimary::find( 1 );

// string
StringPrimary::find( 'id' );

// complex without increment. [string,string,]
StringStringPrimary::find( [ 'foo', 'bar', ] );

// complex with increment. [string,increment,]
StringIncrementPrimary::find( [ 'foo', 8, ] );
