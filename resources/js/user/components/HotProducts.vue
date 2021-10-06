<template>
  <div class="product-area most-popular section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title">
            <h2>Produktet me Ulje</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="product-info">
            <div class="tab-single">
              <div class="row">
                <div
                  class="col-xl-3 col-lg-4 col-md-4 col-12"
                  v-for="product in hotProducts"
                  :key="product.id"
                >
                  <product :user="user" :data="product" />
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
import Product from './Product'
import ProductService from '../services/ProductService'

export default {
  name: 'HotProducts',
  components: { Product },
  props: {
    user: { required: true },
  },
  data() {
    return {
      hotProducts: [],
    }
  },
  methods: {
    fetchData() {
      ProductService.hot().then(response => {
        this.hotProducts = response.data
      })
    },
  },
  mounted() {
    this.fetchData()
  },
}
</script>
