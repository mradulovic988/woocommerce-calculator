<?php
/**
 * Define the calculator functionality
 *
 * Loads all method for the calculator on the product page
 *
 * @package Calculator
 * @author Marko
 * @version 1.0.0
 */

if ( !class_exists( 'Calculator' ) ) {

	/**
	 * Define the calculator functionality
	 *
	 * @package Calculator
	 * @author Marko 
	 * @version 1.0.0
	 */
	class Calculator
	{

		/**
         * Declaring length of the package which
         * will we use across the calculator project
         *
		 * @var string $length Declaring length of the package
		 */
		protected $length;

		/**
		 * Declaring width of the package which
		 * will we use across the calculator project
		 *
		 * @var string $width Declaring width of the package
		 */
		protected $width;

		/**
		 * Declaring value of the package which
		 * will we use across the calculator project
		 *
		 * @var int $totalValue Declaring value of the package
		 */
		protected $totalValue = 0;

		/**
		 * Declaring value of the package which
		 * will we use across the calculator project
		 *
		 * @var int $dividePrice Declaring number for dividing of the package
		 */
		protected $dividePrice = 0;

		/**
		 * Selector for passing width data
		 *
		 * @var string $selector Declaring number for dividing of the package
		 */
		protected $selectorWidth;

		/**
		 * Selector for passing length data
		 *
		 * @var string $selector Declaring number for dividing of the package
		 */
		protected $selectorLength;

		/**
		 * Selector for passing length data
		 *
		 * @var string $selector Declaring number for dividing of the package
		 */
		protected $message;

		/**
		 * Calculator constructor.
         *
         * Using this to initializing all of the
         * necessary method inside Calculator class
		 */
		public function __construct(){}

		/**
         * Calculator destructor.
         *
		 * Implement __destruct() method. Using this to
         * destruct all of the necessary method
         * inside Calculator class
		 */
		public function __destruct(){}

		/**
		 * Passing all necessary parameters for calculator
		 *
		 * @package calculation
         * @param string $categorySlug Slug of the product category
		 */
		public function calculation( $categorySlug, $shippingRate, $nameLength, $nameWidth, $message )
		{
			if ( is_product() && has_term( $categorySlug, 'product_cat' ) ) {

                $this->length = isset( $_POST[ 'length' ] ) ? $_POST[ 'length' ] : NULL;
                $this->width = isset( $_POST[ 'width' ] ) ? $_POST[ 'width' ] : NULL;

                $this->totalValue;
                $this->totalValue = $this->length + $this->width;
                $this->dividePrice;

                $shippingBoxPlate = $shippingRate;
                define( 'DIVIDE', $shippingBoxPlate );

                $this->dividePrice = $this->length * $this->width / DIVIDE;

				/**
                 * Passing length parameter from calculatorForm()
                 *
				 * @param string $nameLength Passing argument for length
				 */
                $this->selectorLength = $nameLength;

				/**
				 * Passing width parameter from calculatorForm()
				 *
				 * @param string $nameWidth Passing argument for width
				 */
                $this->selectorWidth = $nameWidth;

				/**
				 * Passing message parameter from calculatorData()
				 *
				 * @param string $nameWidth Passing argument for message
				 */
				$this->message = $message;

				/**
				 * Passing calculatorForm() method
				 *
				 * @package calculatorForm
				 */
                $this->calculatorForm();

				/**
				 * Passing calculatorData() method
				 *
				 * @package calculatorData
				 */
                $this->calculatorData();
			}
		}

		/**
		 * HTML form for the calculation package
		 *
		 * @package calculatorForm
		 * @return mixed
		 */
		protected function calculatorForm()
        {
	        ?>
            <div class="calculatorWrapper">
                <form class="calculatorForm" role="form" method="post">
                    <table class="custom_math_table">
                        <tr class="">
                            <td><?= __( $this->selectorLength, 'calculator' ); ?>:</td>
                            <td><input id='start' class="custom_field" type="number" name="length"></td>
                        </tr>
                        <tr class="">
                            <td><?= __( $this->selectorWidth, 'calculator' ); ?>:</td>
                            <td><input class="custom_field" type="number" name="width"></td>
                        </tr>
                    </table>
                    <input class="custom_input_button" type="submit" value="Total" name="submit">
                </form>

	        <?php
        }

		/**
		 * Passing messages and targeting the box
         * after the form was submitted
		 *
		 * @package calculatorData
		 * @return mixed
		 */
		private function calculatorData()
        {
            if (isset( $_POST[ 'submit' ] ) ) { ?>

                <script>

                    /* Anchor link after page refresh */
                    $( function(){
                        $( 'html, body' ).animate( {
                            scrollTop: $( "#start" ).offset().top
                        }, 2000);
                    });
                </script>

                <?php
                echo '<p class="custom_message"><b>' . __( ceil( $this->dividePrice ), 'calculator' ) . ' ' . __( $this->message, 'calculator' ) . '</b></p>';
                echo '<p class="small_message">' . __( 'Please add 10% for waste.', 'calculator') . '</p>';
                echo '<div class="horizontal_line"></div></div>';
            }
		}
	}
}