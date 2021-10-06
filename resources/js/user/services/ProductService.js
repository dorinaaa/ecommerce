import axios from 'axios'

const apiClient = axios.create({
  baseURL: '/api',
  withCredentials: false,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
  },
})

export default {
  all(query = '') {
    return apiClient.get(`/products${query}`)
  },
  trending() {
    return apiClient.get('/products/trends')
  },
  hot() {
    return apiClient.get('/products/hot')
  },
}