<template>
  <div class="row">
    <div class="col-12">
      <div class="product-info">
        <div class="tab-single">
          <div class="row">
            <div
              class="col-xl-3 col-lg-4 col-md-4 col-12"
              v-for="product in products"
              :key="product.id"
            >
              <product :user="user" :data="product"></product>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Product from '../../components/Product'
import ProductService from '../../services/ProductService'

export default {
  name: 'TrendingProducts',
  components: { Product },
  props: {
    user: { required: true },
  },
  data() {
    return {
      products: [],
    }
  },
  methods: {
    fetchData() {
      ProductService.trending().then(response => {
        this.products = response.data
      })
    },
  },
  mounted() {
    this.fetchData()
  },
}
</script>
