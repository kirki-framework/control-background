<?php
/**
 * Override field methods
 *
 * @package   kirki-framework/control-background
 * @copyright Copyright (c) 2019, Ari Stathopoulos (@aristath)
 * @license   https://opensource.org/licenses/MIT
 * @since     1.0
 */

namespace Kirki\Field;

use Kirki;
use Kirki\Field;

/**
 * Field overrides.
 *
 * @since 1.0
 */
class Background extends Field {

	/**
	 * Extra logic for the field.
	 *
	 * Adds all sub-fields.
	 *
	 * @access public
	 * @param array $args The arguments of the field.
	 */
	public function init( $args ) {

		$args['required'] = isset( $args['required'] ) ? (array) $args['required'] : [];
		$config_id        = isset( $args['kirki_config'] ) ? $args['kirki_config'] : 'global';
		/**
		 * Add a hidden field, the label & description.
		 */
		new \Kirki\Field\Generic(
			wp_parse_args(
				[
					'type'        => 'kirki-generic',
					'default'     => '',
					'choices'     => [
						'type' => 'hidden',
					],
				],
				$args
			)
		);

		/**
		 * Background Color.
		 */
		new \Kirki\Field\Color(
			[
				'type'           => 'kirki-color',
				'settings'       => $args['settings'] . '[background-color]',
				'parent_setting' => $args['settings'],
				'label'          => '',
				'description'    => esc_html__( 'Background Color', 'kirki' ),
				'default'        => isset( $args['default']['background-color'] ) ? $args['default']['background-color'] : '',
				'section'        => $args['section'],
				'choices'        => [
					'alpha' => true,
				],
			]
		);

		/**
		 * Background Image.
		 */
		new \Kirki\Field\Image(
			[
				'type'           => 'kirki-image',
				'settings'       => $args['settings'] . '[background-image]',
				'parent_setting' => $args['settings'],
				'label'          => '',
				'description'    => esc_html__( 'Background Image', 'kirki' ),
				'default'        => isset( $args['default']['background-image'] ) ? $args['default']['background-image'] : '',
				'section'        => $args['section'],
			]
		);

		/**
		 * Background Repeat.
		 */
		new Kirki\Field\Select(
			[
				'type'           => 'kirki-select',
				'settings'       => $args['settings'] . '[background-repeat]',
				'parent_setting' => $args['settings'],
				'label'          => '',
				'description'    => esc_html__( 'Background Repeat', 'kirki' ),
				'section'        => $args['section'],
				'default'        => isset( $args['default']['background-repeat'] ) ? $args['default']['background-repeat'] : '',
				'choices'        => [
					'no-repeat' => esc_html__( 'No Repeat', 'kirki' ),
					'repeat'    => esc_html__( 'Repeat All', 'kirki' ),
					'repeat-x'  => esc_html__( 'Repeat Horizontally', 'kirki' ),
					'repeat-y'  => esc_html__( 'Repeat Vertically', 'kirki' ),
				],
				'required'       => array_merge(
					$args['required'],
					[
						[
							'setting'  => $args['settings'],
							'operator' => '!=',
							'value'    => '',
							'choice'   => 'background-image',
						],
					]
				),
			]
		);

		/**
		 * Background Position.
		 */
		new Kirki\Field\Select(
			[
				'type'           => 'kirki-select',
				'settings'       => $args['settings'] . '[background-position]',
				'parent_setting' => $args['settings'],
				'label'          => '',
				'description'    => esc_html__( 'Background Position', 'kirki' ),
				'default'        => isset( $args['default']['background-position'] ) ? $args['default']['background-position'] : '',
				'section'        => $args['section'],
				'choices'        => [
					'left top'      => esc_html__( 'Left Top', 'kirki' ),
					'left center'   => esc_html__( 'Left Center', 'kirki' ),
					'left bottom'   => esc_html__( 'Left Bottom', 'kirki' ),
					'center top'    => esc_html__( 'Center Top', 'kirki' ),
					'center center' => esc_html__( 'Center Center', 'kirki' ),
					'center bottom' => esc_html__( 'Center Bottom', 'kirki' ),
					'right top'     => esc_html__( 'Right Top', 'kirki' ),
					'right center'  => esc_html__( 'Right Center', 'kirki' ),
					'right bottom'  => esc_html__( 'Right Bottom', 'kirki' ),
				],
				'required'       => array_merge(
					$args['required'],
					[
						[
							'setting'  => $args['settings'],
							'operator' => '!=',
							'value'    => '',
							'choice'   => 'background-image',
						],
					]
				),
			]
		);

		/**
		 * Background size.
		 */
		new Kirki\Field\Radio_Buttonset(
			[
				'type'           => 'kirki-radio-buttonset',
				'settings'       => $args['settings'] . '[background-size]',
				'parent_setting' => $args['settings'],
				'label'          => '',
				'description'    => esc_html__( 'Background Size', 'kirki' ),
				'default'        => isset( $args['default']['background-size'] ) ? $args['default']['background-size'] : '',
				'section'        => $args['section'],
				'choices'        => [
					'cover'   => esc_html__( 'Cover', 'kirki' ),
					'contain' => esc_html__( 'Contain', 'kirki' ),
					'auto'    => esc_html__( 'Auto', 'kirki' ),
				],
				'required'       => array_merge(
					$args['required'],
					[
						[
							'setting'  => $args['settings'],
							'operator' => '!=',
							'value'    => '',
							'choice'   => 'background-image',
						],
					]
				),
			]
		);

		/**
		 * Background attachment.
		 */
		new Kirki\Field\Radio_Buttonset(
			[
				'type'           => 'kirki-radio-buttonset',
				'settings'       => $args['settings'] . '[background-attachment]',
				'parent_setting' => $args['settings'],
				'description'    => esc_html__( 'Background Attachment', 'kirki' ),
				'label'          => '',
				'default'        => isset( $args['default']['background-attachment'] ) ? $args['default']['background-attachment'] : '',
				'section'        => $args['section'],
				'choices'        => [
					'scroll' => esc_html__( 'Scroll', 'kirki' ),
					'fixed'  => esc_html__( 'Fixed', 'kirki' ),
				],
				'required'       => array_merge(
					$args['required'],
					[
						[
							'setting'  => $args['settings'],
							'operator' => '!=',
							'value'    => '',
							'choice'   => 'background-image',
						],
					]
				),
			]
		);
	}

	/**
	 * Sets the $sanitize_callback
	 *
	 * @access protected
	 * @since 1.0
	 * @return void
	 */
	protected function set_sanitize_callback() {

		// If a custom sanitize_callback has been defined,
		// then we don't need to proceed any further.
		if ( ! empty( $this->sanitize_callback ) ) {
			return;
		}
		$this->sanitize_callback = [ '\Kirki\Field\Background', 'sanitize' ];
	}

	/**
	 * Sanitizes background controls
	 *
	 * @static
	 * @access public
	 * @since 1.0
	 * @param array $value The value.
	 * @return array
	 */
	public static function sanitize( $value ) {
		if ( ! is_array( $value ) ) {
			return [];
		}
		$sanitized_value = [
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => '',
			'background-position'   => '',
			'background-size'       => '',
			'background-attachment' => '',
		];
		if ( isset( $value['background-color'] ) ) {
			$sanitized_value['background-color'] = \Kirki\Field\Color::sanitize( $value['background-color'] );
		}
		if ( isset( $value['background-image'] ) ) {
			$sanitized_value['background-image'] = esc_url_raw( $value['background-image'] );
		}
		if ( isset( $value['background-repeat'] ) ) {
			$sanitized_value['background-repeat'] = in_array(
				$value['background-repeat'],
				[
					'no-repeat',
					'repeat',
					'repeat-x',
					'repeat-y',
				],
				true
			) ? $value['background-repeat'] : '';
		}
		if ( isset( $value['background-position'] ) ) {
			$sanitized_value['background-position'] = in_array(
				$value['background-position'],
				[
					'left top',
					'left center',
					'left bottom',
					'center top',
					'center center',
					'center bottom',
					'right top',
					'right center',
					'right bottom',
				],
				true
			) ? $value['background-position'] : '';
		}
		if ( isset( $value['background-size'] ) ) {
			$sanitized_value['background-size'] = in_array(
				$value['background-size'],
				[
					'cover',
					'contain',
					'auto',
				],
				true
			) ? $value['background-size'] : '';
		}
		if ( isset( $value['background-attachment'] ) ) {
			$sanitized_value['background-attachment'] = in_array(
				$value['background-attachment'],
				[
					'scroll',
					'fixed',
				],
				true
			) ? $value['background-attachment'] : '';
		}
		return $sanitized_value;
	}

	/**
	 * Sets the $js_vars
	 *
	 * @access protected
	 * @since 1.0
	 * @return void
	 */
	protected function set_js_vars() {

		// Typecast to array.
		$this->js_vars = (array) $this->js_vars;

		// Check if transport is set to auto.
		// If not, then skip the auto-calculations and exit early.
		if ( 'auto' !== $this->transport ) {
			return;
		}

		// Set transport to refresh initially.
		// Serves as a fallback in case we failt to auto-calculate js_vars.
		$this->transport = 'refresh';

		$js_vars = [];

		// Try to auto-generate js_vars.
		// First we need to check if js_vars are empty, and that output is not empty.
		if ( empty( $this->js_vars ) && ! empty( $this->output ) ) {

			// Start going through each item in the $output array.
			foreach ( $this->output as $output ) {

				// If 'element' is not defined, skip this.
				if ( ! isset( $output['element'] ) ) {
					continue;
				}
				if ( is_array( $output['element'] ) ) {
					$output['element'] = implode( ',', $output['element'] );
				}

				// If there's a sanitize_callback defined, skip this.
				if ( isset( $output['sanitize_callback'] ) && ! empty( $output['sanitize_callback'] ) ) {
					continue;
				}

				// If we got this far, it's safe to add this.
				$js_vars[] = $output;
			}

			// Did we manage to get all the items from 'output'?
			// If not, then we're missing something so don't add this.
			if ( count( $js_vars ) !== count( $this->output ) ) {
				return;
			}
			$this->js_vars   = $js_vars;
			$this->transport = 'postMessage';
		}
	}

	/**
	 * Override parent method. No need to register any setting.
	 *
	 * @access public
	 * @since 0.1
	 * @param WP_Customize_Manager $wp_customize The customizer instance.
	 * @return void
	 */
	public function add_setting( $wp_customize ) {}

	/**
	 * Override the parent method. No need for a control.
	 *
	 * @access public
	 * @since 0.1
	 * @param WP_Customize_Manager $wp_customize The customizer instance.
	 * @return void
	 */
	public function add_control( $wp_customize ) {}
}
