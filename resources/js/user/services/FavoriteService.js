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
  all(userId) {
    return apiClient.get(`/favorites?user_id=${userId}`)
  },
  getOne(id) {
    return apiClient.get(`/favorites/${id}`)
  },
  create(data) {
    return apiClient.post('/favorites', data)
  },
  delete(id) {
    return apiClient.delete(`/favorites/${id}`)
  },
}
