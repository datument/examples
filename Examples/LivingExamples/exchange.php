<?php

declare( strict_types= 1 );

namespace Datument\Examples\LivingExamples;

////////////////////////////////////////////////////////////////

\Datument\Transaction::do(
	function()use( $user_id, $form_type, $to_type, $amount ){

		$rate= Rate::relate( 'FromType', $from_type )->relate( 'ToType', $to_type )->lock( 'R' )->first();
		$user= User::lock( 'R' )->find( $user_id );

		$from_account= $user->Accounts->typeOf( $from_type )->lock( 'W' )->get();
		$to_account= $user->Accounts->typeOf( $to_type )->lock( 'W' )->get();

		$from_account->decrease( 'amount', $amount );
		$to_account->increase( 'amount', $to_amount= $rate->access( $amount ) );

		$from_account->Logs->create(
			[
				'amount'=> $amount,
				'Reason'=> $from= ExchangeOut::create(
					[
						'Rate'=> $rate,
					]
				),
			]
		);

		$to_account->Logs->create(
			[
				'amount'=> $to_amount,
				'Reason'=> ExchangeIn::create(
					[
						'Rate'=> $rate,
						'From'=> $from,
					]
				),
				'From'=> $from_account,
			]
		);
	}
);
