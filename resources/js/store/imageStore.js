import axios from "axios";
import { defineStore } from "pinia";

export const useImageStore = defineStore('image', {
  state: () => ({
    images: [],
  }),

  actions: {
    async fetchImages() {
      let res = await axios.get('/api/get-images');
      if (res.data.status == 200) {
        this.images = res.data.data
      }
    }
  },
  getters: {
    getImages() {
      return this.images
    }
  }
})