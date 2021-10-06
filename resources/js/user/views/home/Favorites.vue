<template>
  <div class="shopping-cart section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <table class="table shopping-summery">
            <thead>
              <tr class="main-hading">
                <th>PRODUKTI</th>
                <th>TE DHENAT</th>
                <th class="text-center">CMIMI</th>
                <th class="text-center">
                  <i class="fa fa-trash remove-icon"></i>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="favorite in favorites" :key="favorite.id">
                <td class="image" data-title="No">
                  <img src="https://via.placeholder.com/100x100" alt="#" />
                </td>
                <td class="product-des" data-title="Description">
                  <p class="product-name">
                    <a href="#">{{ favorite.product ? favorite.product.name : 'Ska emer'}}</a>
                  </p>
                  <p class="product-des">
                    {{ favorite.product ? favorite.product.description : 'Ska pershkrim' }}
                  </p>
                </td>
                <td class="price" data-title="Price">
                  <span>{{ favorite.product ? favorite.product.price : 0 }} ALL </span>
                </td>
                <td class="action" data-title="Remove">
                  <a href="#" @click="deleteFavorite(favorite.id)"
                    ><i class="fa fa-trash remove-icon"></i
                  ></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import FavoriteService from '../../services/FavoriteService'

export default {
  name: 'Favorites',
  props: {
    user: { required: true },
  },
  data() {
    return {
      favorites: [],
    }
  },
  methods: {
    fetchData() {
      const user = JSON.parse(this.user)
      FavoriteService.all(user.id).then(response => {
        this.favorites = response.data
      })
    },
    deleteFavorite(id) {
      FavoriteService.delete(id)
      this.fetchData()
    },
  },
  mounted() {
    this.fetchData()
  },
}
</script>
