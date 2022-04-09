<?php

class TSSElementorGridWidget extends \Elementor\Widget_Base {


	private $rtControls = array();

	public function get_name() {
		return 'rt-testimonial-grid';
	}

	public function get_title() {
		return __( 'Testimonial Grid Layout', 'testimonial-slider-showcase' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid tss-element';
	}

	public function get_script_depends() {
		if ( \Elementor\Plugin::$instance->preview->is_preview_mode() || \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			return array( 'tss-image-load', 'tss-isotope', 'tss' );
		}

		return array();
	}

	public function get_style_depends() {
		return array( 'tss', 'tss-fontawsome', 'dashicons' );
	}

	public function get_categories() {
		return array( 'tss-elementor-widgets' );
	}

	protected function register_controls() {
		$this->controlTabs();

		if ( empty( $this->rtControls ) ) {
			return;
		}

		TSSPro()->tssAddElementorControls( $this->rtControls, $this );
	}

	private function controlTabs() {
		$tabs = array(
			TSSElementorGridContent::class,
			TSSElementorGridStyle::class,
		);

		$this->rtControls = TSSPro()->tssInitTabs( $tabs, $this->rtControls );
	}

	protected function render() {
		$data = $this->get_settings_for_display();

		$html = new TSSElementorRender();
		echo $html->testimonialRender( $data );
	}
}
