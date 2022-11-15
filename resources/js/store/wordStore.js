import axios from "axios";
import { defineStore } from "pinia";

export const useWordStore = defineStore('word', {
  state: () => ({
    words: [],
    errors: {
      first: null,
      second: null
    }
  }),

  actions: {
    async storeWords(data) {
      this.errors.first = null;
      this.errors.second = null;

      if (/^[a-z]*$/i.test(data.first) && /^[a-z]*$/i.test(data.second)) {
        let res = await axios.post('/api/store-words', data)
        if (res.data.status == 200) {
          this.fetchWords()
        }
      } else {
        if (data.first != null && data.first != '') {
          if (/^[a-z]*$/i.test(data.first) == false) {
            this.errors.first = 'Error only A-z'
          }
        }
        if (data.second != null && data.second != '') {
          if (/^[a-z]*$/i.test(data.second) == false) {
            this.errors.second = 'Error only A-z'
          }
        }
      }
    },
    async fetchWords() {
      this.words = []
      let res = await axios.get('/api/get-words')
      if (res.data.status == 200) {
        res.data.data.forEach(word => {
          this.words.push(word.word)
        });
      }
    }
  },
  getters: {
    getErrors() {
      return this.errors
    },
    getWords() {
      return this.words
    }
  }
})