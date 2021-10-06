<template>
  <div class="shopping-cart section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <table class="table shopping-summery">
            <thead>
              <tr class="main-hading">
                <th>PRODUCT</th>
                <th>NAME</th>
                <th class="text-center">UNIT PRICE</th>
                <th class="text-center">QUANTITY</th>
                <th class="text-center">TOTAL</th>
                <th class="text-center">
                  <i class="fa fa-trash remove-icon"></i>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in store.cart" :key="item.product.id">
                <td class="image" data-title="No">
                  <img src="https://via.placeholder.com/100x100" alt="#" />
                </td>
                <td class="product-des" data-title="Description">
                  <p class="product-name">
                    <a href="#">{{ item.product.name }}</a>
                  </p>
                  <p class="product-des">
                    {{ item.product.description || 'No description' }}
                  </p>
                </td>
                <td class="price" data-title="Price">
                  <span>{{ item.product.price }} ALL </span>
                </td>
                <td class="qty" data-title="Qty">
                  <div class="input-group">
                    <div class="button minus">
                      <button
                        type="button"
                        class="btn btn-primary btn-number"
                        data-type="minus"
                        data-field="quant[1]"
                        @click="decrementQuantity(item)"
                      >
                        <i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <input
                      type="text"
                      name="quant[1]"
                      class="input-number"
                      data-min="1"
                      data-max="100"
                      :value="item.quantity"
                    />
                    <div class="button plus">
                      <button
                        type="button"
                        class="btn btn-primary btn-number"
                        data-type="plus"
                        data-field="quant[1]"
                        @click="incrementQuantity(item)"
                      >
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                  </div>
                </td>
                <td class="total-amount" data-title="Total">
                  <span>{{ item.product.price * item.quantity }}</span>
                </td>
                <td
                  class="action"
                  data-title="Remove"
                  @click="removeItemFromCart(item)"
                >
                  <a href="#"><i class="fa fa-trash remove-icon"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="total-amount">
            <div class="row">
              <div class="col-lg-8 col-md-5 col-12"></div>
              <div class="col-lg-4 col-md-7 col-12">
                <div class="right">
                  <ul>
                    <li>
                      Cart Subtotal<span>{{ cartTotalPrice }} ALL</span>
                    </li>
                    <li>Shipping<span>Free</span></li>
                    <li class="last">
                      You Pay<span>{{ cartTotalPrice }} ALL</span>
                    </li>
                  </ul>
                  <div class="button5">
                    <a
                      :href="redirectTo"
                      class="btn"
                      :class="{ disabled: disableCheckout }"
                      >Checkout</a
                    >
                    <a :href="homeRoute" class="btn">Continue shopping</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CartView',
  props: {
    homeRoute: { required: true },
    checkoutRoute: { required: true },
    loginRoute: { required: true },
    user: { required: true },
  },
  data() {
    return {}
  },
  computed: {
    store() {
      return this.$store.state.cart
    },
    cartTotalPrice() {
      return this.$store.getters['cart/cartTotalPrice']
    },
    disableCheckout() {
      return this.cartTotalItems === 0
    },
    redirectTo() {
      return this.user ? this.checkoutRoute : this.loginRoute
    },
  },
  methods: {
    removeItemFromCart(item) {
      this.$store.dispatch('cart/removeItemFromCart', {
        product: item,
      })
    },
    decrementQuantity(item) {
      this.$store.dispatch('cart/decrementQuantity', {
        product: item,
      })
    },
    incrementQuantity(item) {
      this.$store.dispatch('cart/incrementQuantity', {
        product: item,
      })
    },
  },
  mounted() {
    return this.$store.getters['cart/localFetch']
  },
}
</script>

<style scoped>
.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
