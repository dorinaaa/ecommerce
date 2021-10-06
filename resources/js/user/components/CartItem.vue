<template>
  <li>
    <a
      href="#"
      class="remove"
      title="Remove this item"
      @click="removeItemFromCart"
      ><i class="fa fa-remove"></i
    ></a>
    <a class="cart-img" href="#"
      ><img src="https://via.placeholder.com/70x70" alt="#"
    /></a>
    <h4>
      <a href="#">{{ data.product.name }}</a>
    </h4>
    <p class="quantity">
      {{ data.quantity }} x -
      <span class="amount">{{ data.product.price }} ALL</span>
    </p>
  </li>
</template>

<script>
export default {
  name: 'CartItem',
  props: {
    data: { type: Object, default: () => {} },
  },
  methods: {
    removeItemFromCart() {
      this.$store.dispatch('cart/removeItemFromCart', {
        product: this.data,
      })
    },
  },
}
</script>
