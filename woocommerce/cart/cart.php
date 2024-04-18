<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

?>

<?php do_action( 'woocommerce_before_cart' ); ?>


<div class="sleekyCartTable">
  <div class="container">
  <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <table class="sleekyCartTable__table">
      <thead>
        <tr>
          <td><p>Your cart<span><?php echo WC()->cart->get_cart_contents_count(); ?> items</span></p></td>
          <td>Quantity</td>
          <td>Price</td>
          <td>Subtotal</td>
        </tr>
      </thead>
      <tbody>

      <?php do_action( 'woocommerce_before_cart_contents' ); ?>
      <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) { ?>
        <?php $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key ); ?>
        <?php $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key ); ?>
        <?php $product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ); ?>
      
        <?php if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) { ?>
          <?php $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key ); ?>

          <tr class="sleekyCartTable__item woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
          
          <td class="product-information sleekyCartTable__information">
            <div class="sleekyCartTable__information__thumbnail">
            <?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>
            </div>
            <div class="sleekyCartTable__information__description">
              <h2>
              <?php
              if ( ! $product_permalink ) {
                echo wp_kses_post( $product_name . '&nbsp;' );
              } else {
                /**
                * This filter is documented above.
                *
                * @since 2.1.0
                */
                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
              }
              ?>
              </h2>
              <?php echo $_product->get_description(); ?>
            </div>
          </td>

          <td class="product-quantity sleekyCartTable__quantity">
            <div class="sleekyCartTable__quantity__container"> 
          <?php
						if ( $_product->is_sold_individually() ) {
							$min_quantity = 1;
							$max_quantity = 1;
						} else {
							$min_quantity = 0;
							$max_quantity = $_product->get_max_purchase_quantity();
						}

						$product_quantity = woocommerce_quantity_input(
							array(
								'input_name'   => "cart[{$cart_item_key}][qty]",
								'input_value'  => $cart_item['quantity'],
								'max_value'    => $max_quantity,
								'min_value'    => $min_quantity,
								'product_name' => $product_name,
							),
							$_product,
							false
						);
            ?>
            
            <script>
              function decreaseQuantity(element) {
                event.preventDefault();

                let currentValue = $(element).siblings('.quantity').find('.input-text.qty.text').val();

                currentValue--;

                $(element).siblings('.quantity').find('.input-text.qty.text').val(currentValue);
                $(element).siblings('.quantity').find('.input-text.qty.text').attr('value', currentValue);

                $(element).siblings('.quantity').find('.input-text.qty.text').trigger("change");
              }

              function increaseQuantity(element) {
                event.preventDefault();

                let currentValue = $(element).siblings('.quantity').find('.input-text.qty.text').val();

                currentValue++;

                $(element).siblings('.quantity').find('.input-text.qty.text').val(currentValue);
                $(element).siblings('.quantity').find('.input-text.qty.text').attr('value', currentValue);

                $(element).siblings('.quantity').find('.input-text.qty.text').trigger("change");
              }
            </script>

            <button class="sleekyCartTable__quantity__decrease" onClick="decreaseQuantity(this);">-</button><?php
						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
					?><button class="sleekyCartTable__quantity__increase" onClick="increaseQuantity(this);">+</button>
        </div>  
        </td>

          <td class="product-price sleekyCartTable__price">
          <?php
						echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
					?>
          </td>

          <td class="product-subtotal sleekyCartTable__subtotal">
          <?php
						echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
          ?>
          <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

            <div>x</div>
          </td>
      
        </tr>

        <?php } ?>
      <?php } ?>
      <tr>
				<td colspan="1" class="actions sleekyCartTable__coupon">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></button>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
        <td colspan="4" class="sleekyCartTable__totals">
          <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
          <?php do_action( 'woocommerce_cart_collaterals' ); ?>
        </td>
			</tr>
      </tbody>
    </table>
  </form>
  </div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>