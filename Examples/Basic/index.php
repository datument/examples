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
