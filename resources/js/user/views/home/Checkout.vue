<template>
  <section class="shop checkout section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-12">
          <div class="checkout-form">
            <h2>Vazhdoni me porosine ketu</h2>
            <p>Regjistrohuni me pare qe te vazhdoni me porosine</p>
            <form class="form" method="post" action="#">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="form-group">
                    <label>Qyteti<span>*</span></label>
                    <input
                      v-model="request.city"
                      type="text"
                      name="city"
                      placeholder=""
                      required="required"
                    />
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="form-group">
                    <label>Rruga<span>*</span></label>
                    <input
                      v-model="request.street"
                      type="text"
                      name="street"
                      placeholder=""
                      required="required"
                    />
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="form-group">
                    <label>Numri i telefonit<span>*</span></label>
                    <input
                      v-model="request.phone"
                      type="text"
                      name="phone"
                      placeholder=""
                      required="required"
                    />
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="form-group">
                    <label>Shteti<span>*</span></label>
                    <input
                      v-model="request.state"
                      type="text"
                      name="state"
                      placeholder=""
                      required="required"
                    />
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="form-group">
                    <label>Kodi postar<span>*</span></label>
                    <input
                      v-model="request.zip_code"
                      type="text"
                      name="zip_code"
                      placeholder=""
                      required="required"
                    />
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group create-account">
                    <input id="cbox" type="checkbox" />
                    <label>Krijoni llogari?</label>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="order-details">
            <div class="single-widget">
              <h2>TOTALI</h2>
              <div class="content">
                <ul>
                  <li>
                    Sub Totali<span>{{ cartTotalPrice }} ALL</span>
                  </li>
                  <li>(+) Shipping<span>$10.00</span></li>
                  <li class="last">
                    Totali<span>{{ cartTotalPrice }} ALL</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="single-widget">
              <h2>Metodat e pageses</h2>
              <div class="content">
                <div class="checkbox">
                  <!-- <label class="checkbox-inline" for="1"
                    ><input name="updates" id="1" type="checkbox" /> Check
                    Payments</label
                  >
                  <label class="checkbox-inline" for="2"
                    ><input name="news" id="2" type="checkbox" /> Cash On
                    Delivery</label
                  > -->
                  <label class="checkbox-inline" for="3"
                    ><input name="news" id="3" type="checkbox" checked />
                    PayPal</label
                  >
                </div>
              </div>
            </div>
            <div class="single-widget payement">
              <div class="content">
                <!-- <img src="images/payment-method.png" alt="#" /> -->
                <div id="paypal-button"></div>
              </div>
            </div>
            <div class="single-widget get-button">
              <div class="content">
                <div class="button">
                  <a
                    :href="redirectTo"
                    :class="{ disabled: disableCheckout }"
                    class="btn"
                    >Vazhdoni me porosine</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Checkout',
  props: {
    user: { required: true },
    loginRoute: { required: true },
  },
  data() {
    return {
      request: {
        city: null,
        street: null,
        zip_code: null,
        state: null,
        phone: null,
      },
    }
  },
  computed: {
    store() {
      return this.$store.state.cart
    },
    cartTotalPrice() {
      return this.$store.getters['cart/cartTotalPrice']
    },
    redirectTo() {
      if (!this.user) return this.loginRoute
    },
    disableCheckout() {
      return this.cartTotalItems === 0
    },
  },
  mounted() {
    var orderData = {
      amount: {
        currency_code: 'USD',
        value: this.cartTotalPrice,
        breakdown: {
          item_total: {
            currency_code: 'USD',
            value: this.cartTotalPrice,
          },
        },
      },
      items: [],
    }
    for (let product of this.store.cart) {
      orderData.items.push({
        name: product.product.name,
        unit_amount: {
          currency_code: 'USD',
          value: product.product.price,
        },
        quantity: product.quantity,
      })
    }

    paypal
      .Buttons({
        createOrder: function(data, actions) {
          // This function sets up the details of the transaction, including the amount and line item details.
          return actions.order.create({
            purchase_units: [orderData],
          })
        },
        onApprove: function(data, actions) {
          orderData = orderData.customerData = [
            {
              total_price: this.cartTotalPrice,
              address: {
                phone: this.request.phone,
                state: this.request.state,
                city: this.request.city,
                street: this.request.street,
                zip_code: this.request.zip_code,
              },
            },
          ]
          return fetch('/capture-order', {
            method: 'post',
            headers: {
              'content-type': 'application/json',
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            body: JSON.stringify({
              orderID: data.orderID,
              orderData: orderData,
            }),
          })
        },
      })
      .render('#paypal-button')
  },
}
</script>

<style scoped>
.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
