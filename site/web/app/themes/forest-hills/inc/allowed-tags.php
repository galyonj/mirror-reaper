<?php
/**
 * function to prevent certain html tags
 * from being stripped out of the editor
 * on save in a multisite installation
 * @param $tags
 *
 * @return mixed
 */

function galyon_allowed_tags( $tags ) {

	$tags['audio'] = array(
		'autoplay'  => true,
		'controls'  => true,
		'loop'      => true,
		'muted'     => true,
		'preload'   => true,
		'src'       => true
	);

	$tags['button'] = array(
		'autofocus'       => true,
		'class'           => true,
		'disabled'        => true,
		'form'            => true,
		'formaction'      => true,
		'formenctype'     => true,
		'formmethod'      => true,
		'formnovalidate'  => true,
		'formtarget'      => true,
		'name'            => true,
		'type'            => true,
		'value'           => true
	);

	$tags['embed'] = array(
		'class'   => true,
		'height'  => true,
		'src'     => true,
		'style'   => true,
		'type'    => true,
		'width'   => true
	);

	$tags['form'] = array(
		'accept'      => true,
		'action'      => true,
		'autcomplete' => true,
		'method'      => true,
		'name'        => true,
		'target'      => true
	);

	$tags['fieldset'] = array(
		'disabled'  => true,
		'form'      => true,
		'name'      => true
	);

	$tags['iframe'] = array(
		'allowfullscreen' => true,
		'frameborder'     => true,
		'height'          => true,
		'name'            => true,
		'src'             => true,
		'style'           => true,
		'width'           => true
	);

	$tags['input'] = array(
		'accept'          => true,
		'autocomplete'    => true,
		'autofocus'       => true,
		'class'           => true,
		'disabled'        => true,
		'form'            => true,
		'formaction'      => true,
		'formenctype'     => true,
		'formmethod'      => true,
		'formnovalidate'  => true,
		'formtarget'      => true,
		'height'          => true,
		'id'              => true,
		'list'            => true,
		'max'             => true,
		'maxlength'       => true,
		'min'             => true,
		'multiple'        => true,
		'name'            => true,
		'pattern'         => true,
		'placeholder'     => true,
		'readonly'        => true,
		'required'        => true,
		'size'            => true,
		'src'             => true,
		'step'            => true,
		'type'            => true,
		'value'           => true,
		'width'           => true
	);

	$tags['label'] = array(
		'for'   => true,
		'form'  => true
	);

	$tags['legend'] = array(
		'align' => true
	);

	$tags['object'] = array(
		'data'    => true,
		'form'    => true,
		'height'  => true,
		'name'    => true,
		'type'    => true,
		'width'   => true
	);

	$tags['optgroup'] = array(
		'disabled'  => true,
		'label'     => true
	);

	$tags['option'] = array(
		'disabled'  => true,
		'label'     => true,
		'selected'  => true,
		'value'     => true
	);

	$tags['param'] = array(
		'name'      => true,
		'type'      => true,
		'value'     => true,
		'valuetype' => true
	);

	$tags['select'] = array(
		'autofocus' => true,
		'disabled'  => true,
		'form'      => true,
		'multiple'  => true,
		'name'      => true,
		'required'  => true,
		'size'      => true
	);

	$tags['script'] = array(
		'async'   => true,
		'charset' => true,
		'defer'   => true,
		'src'     => true,
		'type'    => true
	);

	$tags['textarea'] = array(
		'autofocus'   => true,
		'cols'        => true,
		'dirname'     => true,
		'disabled'    => true,
		'form'        => true,
		'maxlength'   => true,
		'name'        => true,
		'placeholder' => true,
		'readonly'    => true,
		'required'    => true,
		'rows'        => true,
		'wrap'        => true
	);

	$tags['video'] = array(
		'autoplay'  => true,
		'controls'  => true,
		'height'    => true,
		'loop'      => true,
		'muted'     => true,
		'poster'    => true,
		'preload'   => true,
		'src'       => true,
		'width'     => true
	);

	return $tags;

}
add_filter('wp_kses_allowed_html', 'galyon_allowed_tags', 1);
