<?php

declare( strict_types= 1 );

namespace Datument\Examples\Basic;

use Datument\Datument as D;

////////////////////////////////////////////////////////////////

/**
 * Creating
 */

Grade::create( [ 'title'=>'Grade 1', 'short_title'=>'G1', 'level'=>1, ] );

Grade::createLot( [
	[ 'title'=>'Grade 2', 'short_title'=>'G2', 'level'=>2, ],
	[ 'title'=>'Grade 3', 'short_title'=>'G3', 'level'=>3, ],
	[ 'title'=>'Grade 4', 'short_title'=>'G4', 'level'=>4, ],
	[ 'title'=>'Gride 5', 'short_title'=>'G5', 'level'=>5, ],
	[ 'title'=>'Grade 6', 'short_title'=>'g6', 'level'=>6, ],
] );

D::flush();


/**
 * Reading
 */

// Find by primary key.
Grade::find( 1 );

// Get the first record.
Grade::first();

// Find by other columns.
Grade::findBy( 'level', 4 );
Grade::findBy( [ 'level'=>4, 'short_title'=>'G4', ] );

// Return null instead of throw not found exception.
Grade::findOrNull( 8 );
Grade::firstOrNull();
Grade::findByOrNull( 'level', 4 );

// Find many primary key.
Grade::findMany( 1, 2, 6 );

// Find many by other columns.
Grade::listBy( 'level', 4 );
Grade::listBy( [ 'level'=>4, 'short_title'=>'G4', ] );

// Use query builder.
Grade::where( 'id', 3 )->first();
Grade::where( 'id', '<=', 3 )->list();



/**
 * Updating
 */

$grade= Grade::find( 5 );

$grade->title= 'Grode 5';

$grade->set( 'title', 'Grude 5' );

$grade->set( [ 'title'=>'Grade 5', ] );

$grade->increase( 'level' );
$grade->decrease( 'level' );
$grade->increase( 'level', 2 );
$grade->increase( 'level', -1 );

Grade::where( 'short_title', 'g6' )->set( [ 'short_title'=>'G6', ] );

D::flush();



/**
 * Deleting
 */

Grade::find( 3 )->delete();

Grade::delete( 6 );

Grade::deleteBy( 'short_title', 'G5' );
Grade::deleteBy( [ 'level'=>4, ] );

Grade::where( 'level', '!=', 2 )->delete();

Grade::deleteAll();

Grade::truncate();

D::flush();

$school= School::find( 'MIT' );

$school->users;
