<template>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span class="fa fa-close" aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row no-gutters">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
              <div class="product-gallery">
                <div class="single-slider">
                  <img src="https://via.placeholder.com/569x515" alt="#" />
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
              <div class="quickview-content">
                <h2>{{ data.product.name }}</h2>
                <div class="quickview-ratting-review">
                  <div class="quickview-ratting-wrap">
                    <div class="quickview-ratting">
                      <i class="yellow fa fa-star"></i>
                      <i class="yellow fa fa-star"></i>
                      <i class="yellow fa fa-star"></i>
                      <i class="yellow fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <a href="#"> (1 review)</a>
                  </div>
                  <div class="quickview-stock">
                    <span><i class="fa fa-check-circle-o"></i> ne stock</span>
                  </div>
                </div>
                <h3>{{ data.product.price }} ALL</h3>
                <div class="quickview-peragraph" style="margin-bottom: 40px">
                  <p>
                    {{ data.product.description ? data.product.description : 'Ska pershkrim' }}
                  </p>
                </div>
                <div class="quantity">
                  <div class="input-group">
                    <div class="button minus">
                      <button
                        type="button"
                        class="btn btn-primary btn-number"
                        data-type="minus"
                        data-field="quant[1]"
                        @click="decrementQuantity(data)"
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
                      :value="data.quantity"
                    />
                    <div class="button plus">
                      <button
                        type="button"
                        class="btn btn-primary btn-number"
                        data-type="plus"
                        data-field="quant[1]"
                        @click="incrementQuantity(data)"
                      >
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="add-to-cart">
                  <a href="#" class="btn" @click="addToCart()">Shto ne shporte</a>
                  <a href="#" class="btn min"><i class="fa fa-heart"></i></a>
                </div>
                <div class="default-social">
                  <h4 class="share-now">Share:</h4>
                  <ul>
                    <li>
                      <a class="facebook" href="#"
                        ><i class="fa fa-facebook"></i
                      ></a>
                    </li>
                    <li>
                      <a class="twitter" href="#"
                        ><i class="fa fa-twitter"></i
                      ></a>
                    </li>
                    <li>
                      <a class="youtube" href="#"
                        ><i class="fa fa-pinterest-p"></i
                      ></a>
                    </li>
                    <li>
                      <a class="dribbble" href="#"
                        ><i class="fa fa-google-plus"></i
                      ></a>
                    </li>
                  </ul>
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
import { EventBus } from '../plugins/event-bus'

export default {
  name: 'ProductModal',
  data() {
    return {
      data: {
        product: {},
        quantity: 1,
      },
    }
  },
  methods: {
    addToCart() {
      this.$store.dispatch('cart/addProductToCart', {
        product: this.data.product,
        quantity: this.data.quantity,
      })
    },
    decrementQuantity(item) {
      if (item.quantity <= 1) {
        return
      }
      item.quantity--
    },
    incrementQuantity(item) {
      item.quantity++
    },
  },
  mounted() {
    EventBus.$on('quick-look', product => {
      this.data.product = product
    })
  },
}
</script>
