<template>
  <div class="sinlge-bar shopping">
    <a href="#" class="single-icon"
      ><i class="fa fa-shopping-cart"></i>
      <span class="total-count">{{ cartTotalItems }}</span></a
    >
    <div class="shopping-item">
      <div class="dropdown-cart-header">
        <span>{{ cartTotalItems }} Produkte</span>
        <a href="#">Shiko Shporten</a>
      </div>
      <ul
        class="shopping-list"
        v-for="item in store.cart"
        :key="item.product ? item.product.id : ''"
      >
        <cart-item :data="item"></cart-item>
      </ul>
      <div class="bottom">
        <div class="total">
          <span>Totali</span>
          <span class="total-amount">{{ cartTotalPrice }} ALL</span>
        </div>
        <a
          :href="redirectTo"
          class="btn animate"
          :class="{ disabled: disableCheckout }"
          >Checkout</a
        >
      </div>
    </div>
  </div>
</template>

<script>
import CartItem from './CartItem'

export default {
  name: 'Cart',
  components: { CartItem },
  props: {
    checkoutRoute: { required: true },
    loginRoute: { required: true },
    user: { required: true },
  },
  computed: {
    store() {
      return this.$store.state.cart
    },
    cartTotalItems() {
      return this.$store.getters['cart/cartTotalItems']
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
  mounted() {
    return this.$store.getters['cart/localFetch']
  },
}
</script>

<style scoped>
.header .shopping .shopping-item {
  top: 50px !important;
}

.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
