<template>
  <div>
    <div class="row">
      <div class="col-12">
        <div class="shop-top">
          <div class="shop-shorter">
            <div class="single-shorter">
              <label>Show :</label>
              <select v-model.number="pageSize">
                <option selected="selected" value="10">10</option>
                <option value="15">15</option>
                <option value="25">25</option>
                <option value="30">30</option>
              </select>
            </div>
            <div class="single-shorter">
              <label>Sort By :</label>
              <select>
                <option selected="selected" value="name">Name</option>
                <option value="price">Price</option>
                <option value="size">Size</option>
              </select>
            </div>
          </div>
          <ul class="view-mode">
            <li class="active">
              <a href="#"><i class="fa fa-th-large"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa fa-th-list"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div
        class="col-lg-4 col-md-6 col-12"
        v-for="product in products"
        :key="product.id"
      >
        <product :user="user" :data="product"></product>
      </div>
    </div>
  </div>
</template>

<script>
import Product from './Product'
import { EventBus } from '../plugins/event-bus'
import ProductService from '../services/ProductService'

export default {
  name: 'ProductList',
  components: { Product },
  props: {
    user: { required: true },
  },
  data() {
    return {
      products: [],
      pageSize: 10,
      categoryId: null,
    }
  },
  watch: {
    pageSize() {
      this.fetchProducts()
    },
    categoryId() {
      this.fetchProducts()
    },
  },
  methods: {
    fetchProducts() {
      const category = `category_id=${this.categoryId}`

      const query = `?page-size=${this.pageSize}&${
        this.categoryId ? category : 'category_id='
      }`
      ProductService.all(query).then(response => {
        this.products = response.data
      })
    },
  },
  mounted() {
    let url_string = window.location.href
    let url = new URL(url_string)
    let categoryId = url.searchParams.get('category_id')
    let category = ``

    if (categoryId) {
      category = `category_id=${categoryId}`
      const query = `?page-size=${this.pageSize}&${category}`
      ProductService.all(query).then(response => {
        this.products = response.data
      })
    } else {
      this.fetchProducts()
    }

    EventBus.$on('category-selected', id => {
      this.categoryId = id
    })
  },
}
</script>
