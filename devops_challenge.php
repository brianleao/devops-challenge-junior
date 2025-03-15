<?php
/**
 * @package Devops_challenge_Junior
 * @version 1.0
 */
/*
Plugin Name: Devops challenge Júnior
Plugin URI: https://apiki.com/
Description: Sabe de nada, inocente! Ordinária!!
Author: Apiki WordPress
Version: 1.0
*/

global $global_lyrics;
$global_lyrics = "Pau que nasce torto nunca se endireita\nMenina que requebra a mãe pega na cabeça\n
	Pau que nasce torto nunca se endireita\nMenina que requebra a mãe pega na cabeça\n
	Domingo ela não vai (vai, vai)\nDomingo ela não vai não (vai, vai, vai)\nOlha, domingo ela não vai (vai, vai)\n
	Domingo ela não vai não (vai, vai, vai)\nO pau que nasce torto nunca se endireita\nMenina que requebra a mãe pega na cabeça\n
	Pau que nasce torto nunca se endireita\nMenina que requebra a mãe pega na cabeça\nSegure o tchan\nAmare o tchan\n
	Segure o tchan tchan tchan tchan\nDepois de nove meses você vê o resultado\nEsse é o Gera Samba arrebentando no pedaço\n
	Joga ela no meio, mete em cima, mete embaixo";

function apiki_segura_o_tchan() {

	global $global_lyrics;
	$lyrics = explode( "\n", $global_lyrics );

	return wptexturize( $lyrics[ mt_rand( 0,count( $lyrics ) - 1 ) ] );
}

function devops_challenge() {
	$chosen = apiki_segura_o_tchan();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="devop">%s <span%s>%s</span></p>',
		esc_html__( 'Segure o Tchan, by Apiki WordPress:', 'devops-challenge' ),
		$lang,
		esc_html( $chosen ) 
	);
}

add_action( 'admin_notices', 'devops_challenge' );

function devop_css() {
	echo "
	<style type='text/css'>
	#devop {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #devop {
		float: left;
	}
	.block-editor-page #devop {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#devop,
		.rtl #devop {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'devop_css' );
