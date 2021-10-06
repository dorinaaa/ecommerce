export const cart = {
  namespaced: true,
  state: {
    cart: [],
  },
  actions: {
    addProductToCart({
      commit
    }, {
      product,
      quantity
    }) {
      commit('ADD_TO_CART', {
        product,
        quantity
      })
    },
    removeItemFromCart({
      commit
    }, {
      product
    }) {
      commit('REMOVE_FROM_CART', {
        product
      })
    },
    decrementQuantity({
      commit
    }, {
      product
    }) {
      commit('DECREMENT_QUANTITY', {
        product
      })
    },
    incrementQuantity({
      commit
    }, {
      product
    }) {
      commit('INCREMENT_QUANTITY', {
        product
      })
    },
  },
  mutations: {
    ADD_TO_CART(state, {
      product,
      quantity
    }) {
      console.log(state.cart)
      if (state.cart.length !== 0) {
        var productInCart = state.cart.find(item => {
          return item.product.id === product.id
        })
      }

      if (productInCart) {
        state.cart.map(item => {
          item.product.id === product.id ?
            {
              ...item,
              quantity: (item.quantity += quantity)
            } :
            item
        })
        localStorage.setItem('cart', JSON.stringify(state.cart))
        return
      }

      state.cart.push({
        product,
        quantity,
      })
      localStorage.setItem('cart', JSON.stringify(state.cart))
    },
    REMOVE_FROM_CART(state, {
      product
    }) {
      let index = state.cart.findIndex(item => {
        return item.product.id === product.product.id
      })
      state.cart.splice(index, 1)
      localStorage.setItem('cart', JSON.stringify(state.cart))
    },
    DECREMENT_QUANTITY(state, {
      product
    }) {
      if (product.quantity === 1) {
        return
      }
      state.cart.map(item => {
        item.product.id === product.product.id ?
          {
            ...item,
            quantity: (item.quantity -= 1)
          } :
          item
      })
      localStorage.setItem('cart', JSON.stringify(state.cart))
    },
    INCREMENT_QUANTITY(state, {
      product
    }) {
      state.cart.map(item => {
        item.product.id === product.product.id ?
          {
            ...item,
            quantity: (item.quantity += 1)
          } :
          item
      })
      localStorage.setItem('cart', JSON.stringify(state.cart))
    },
  },
  getters: {
    cartTotalItems(state) {
      return state.cart ? state.cart.length : 0
    },
    cartTotalPrice(state) {
      let total = 0
      if (!state.cart) {
        return total
      }
      state.cart.forEach(item => {
        total += item.product.price * item.quantity
      })
      return total
    },
    localFetch(state) {
      let localStorageCart = JSON.parse(localStorage.getItem('cart'))
      if (!localStorageCart) {
        JSON.parse(localStorage.setItem('cart', JSON.stringify(state.cart)))
      }
      state.cart = JSON.parse(localStorage.getItem('cart'))
    },
  },
}