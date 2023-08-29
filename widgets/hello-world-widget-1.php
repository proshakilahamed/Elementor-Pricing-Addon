<?php


class Elementor_Pricing_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Blank widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'blank_widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Blank widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __( 'Blank Widget', 'ebe' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Blank widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'fa fa-code';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Blank widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'basic' ];
	}

	

	/**
	 * Register Blank widget content ontrols.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Heading', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( ' Heading' , 'textdomain' ),
				'label_block' => true,
			]
		);
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( ' Title' , 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( ' Description' , 'textdomain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'pricing',
			[
				'label' => esc_html__( 'Pricing', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( ' Pricing' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'button_title',
			[
				'label' => esc_html__( 'Button Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Title' , 'textdomain' ),
				'show_label' => false,
			]
		);
		$repeater->add_control(
			'button_url',
			[
				'label' => esc_html__( 'Button Url', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Button' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'pricings',
			[
				'label' => esc_html__( 'Pricings', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title' => '{{{title }}}',
			]
		);

		$this->end_controls_section();

	}




	/**
	 * Render Blank widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings   = $this->get_settings_for_display(); 
		$heading= $settings['heading'];
		$pricings=$this->get_settings_for_display('pricings');

		?>
		<section class="fdb-block" style="background-image: url(<?php echo plugins_url( '../assets/imgs/hero/blue.svg',__FILE__ ); ?>);">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col">
            <h1 class="text-white "><?php echo esc_html( $heading ); ?></h1>
          </div>
        </div>
    
        <div class="row  mt-5 align-items-center">
		 <?php if($heading){
			foreach($pricings as $pricing)
			{
			?>
				<div class="col-12  col-sm-10 col-md-8 m-auto col-lg-4 text-center">
            <div class="fdb-box p-4">
              <h2><?php echo esc_html( $pricing['title'] ); ?></h2>
              <p class="lead"><?php echo esc_html(  $pricing['description'] ); ?></p>
    
              <p class="h1 mt-5 mb-5"><?php echo esc_html(  $pricing['pricing'] ); ?></p>
    
              <p><a href="<?php echo esc_url(  $pricing['button_url'] ); ?>" class="btn btn-dark"><?php echo esc_html(  $pricing['button_title'] ); ?></a></p>
            </div>
          </div>


			<?php

			}
		 }
		 ?>
         
        </div>
      </div>
    </section>


		<?php
	}

	/**
	 * Render Blank widget output on the frontend.
	 *
	 * Written in JS and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
	
	}

}