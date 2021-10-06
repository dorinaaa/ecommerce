<template>
  <div>
    <div class="single-product">
      <div class="product-img">
        <a href="#">
          <img
            v-if="data.photos.length !== 0"
            class="default-img"
            :src="`${baseUrl}/${data.photos[0].path}`"
            alt="#"
          />
          <img
            v-else
            class="default-img"
            src="https://via.placeholder.com/550x750"
            alt="#"
          />
          <span class="out-of-stock" v-if="data.label === 'hot'">Ulje</span>
        </a>
        <div class="button-head">
          <div class="product-action">
            <a
              data-toggle="modal"
              data-target="#exampleModal"
              title="Quick View"
              href="#"
              @click="quickView(data)"
              ><b-icon icon="eye"></b-icon><span>Detajet</span></a
            >

            <a title="Wishlist" href="#" @click="addToFavorites(data)"
              ><b-icon icon="heart"></b-icon
              ><span>Shto tek te preferuarat</span></a
            >
            <a title="Cart" @click="addToCart()"
              ><b-icon icon="cart2"></b-icon><span>Shto ne shporte</span></a
            >
          </div>
          <div class="product-action-2">
            <a title="Add to cart">Shto ne shporte</a>
          </div>
        </div>
      </div>
      <div class="product-content">
        <h3>
          <a href="#">{{ data.name }}</a>
        </h3>
        <div class="product-price">
          <span>{{ data.price }} ALL</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from '../plugins/event-bus'
import FavoriteService from '../services/FavoriteService'

export default {
  name: 'Product',
  props: {
    data: { type: Object, default: () => {} },
    user: { required: true },
  },
  data() {
    return {
      baseUrl: 'http://localhost:8000',
    }
  },
  methods: {
    addToCart() {
      this.$store.dispatch('cart/addProductToCart', {
        product: this.data,
        quantity: 1,
      })
    },
    quickView(product) {
      EventBus.$emit('quick-look', product)
    },
    addToFavorites(data) {
      const user = JSON.parse(this.user)
      const payload = {
        user_id: user.id,
        product_id: data.id,
      }
      FavoriteService.create(payload)
    },
  },
}
</script>
