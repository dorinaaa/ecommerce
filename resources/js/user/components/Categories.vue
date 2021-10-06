<template>
  <div class="col-lg-3">
    <div class="all-category">
      <h3 class="cat-heading">
        <i class="fa fa-bars" aria-hidden="true"></i>KATEGORITE
      </h3>
      <ul class="main-category">
        <li v-for="category in categories" :key="category.id">
          <a :href="`${baseUrl}/shop-grid?category_id=${category.id}`">{{
            category.name
          }}</a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import CategoryService from '../services/CategoryService'

export default {
  name: 'Categories',
  data() {
    return {
      categories: [],
      baseUrl: 'http://localhost:8000',
    }
  },
  methods: {
    fetchData() {
      CategoryService.all().then(response => {
        this.categories = response.data
      })
    },
  },
  mounted() {
    this.fetchData()
  },
}
</script>
