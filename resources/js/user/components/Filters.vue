<template>
  <div class="shop-sidebar">
    <div class="single-widget category">
      <h3 class="title">Categories</h3>
      <ul class="categor-list">
        <li>
          <a href="#" @click="categorySelected()">
            All
          </a>
        </li>
        <li v-for="category in categories" :key="category.id">
          <a href="#" @click="categorySelected(category.id)">
            {{ category.name }}
          </a>
        </li>
      </ul>
    </div>
    <div class="single-widget range">
      <h3 class="title">Shop by Price</h3>
      <div class="price-filter">
        <div class="price-filter-inner">
          <div id="slider-range"></div>
          <div class="price_slider_amount">
            <div class="label-input">
              <span>Range:</span
              ><input
                type="text"
                id="amount"
                name="price"
                placeholder="Add Your Price"
              />
            </div>
          </div>
        </div>
      </div>
      <ul class="check-box-list">
        <li>
          <label class="checkbox-inline" for="1"
            ><input name="news" id="1" type="checkbox" />$20 - $50<span
              class="count"
              >(3)</span
            ></label
          >
        </li>
        <li>
          <label class="checkbox-inline" for="2"
            ><input name="news" id="2" type="checkbox" />$50 - $100<span
              class="count"
              >(5)</span
            ></label
          >
        </li>
        <li>
          <label class="checkbox-inline" for="3"
            ><input name="news" id="3" type="checkbox" />$100 - $250<span
              class="count"
              >(8)</span
            ></label
          >
        </li>
      </ul>
    </div>
    <div class="single-widget category">
      <h3 class="title">Manufacturers</h3>
      <ul class="categor-list">
        <li><a href="#">Forever</a></li>
        <li><a href="#">giordano</a></li>
        <li><a href="#">abercrombie</a></li>
        <li><a href="#">ecko united</a></li>
        <li><a href="#">zara</a></li>
      </ul>
    </div>
  </div>
</template>

<script>
import { EventBus } from '../plugins/event-bus'
import CategoryService from '../services/CategoryService'

export default {
  name: 'Filters',
  data() {
    return {
      categories: [],
    }
  },
  methods: {
    fetchCategories() {
      CategoryService.all().then(response => {
        this.categories = response.data
      })
    },
    categorySelected(id) {
      EventBus.$emit('category-selected', id)
    },
  },
  mounted() {
    this.fetchCategories()
  },
}
</script>
