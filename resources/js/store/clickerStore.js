import { defineStore } from "pinia";

export const useClickerStore = defineStore('clicker', {
  state: () => ({
    score: 0,
  }),

  actions: {
    upScore() {
      this.score++;
      localStorage.setItem('score', this.score)
    }
  },
  getters: {
    getScore() {
      if (this.score == 0) {
        if (localStorage.getItem('score')) {
          return this.score = localStorage.getItem('score')
        }
        return this.score;
      } else {
        return this.score
      }
    },
    getScoreOddOrEven() {
      return this.score % 2 === 0 ? 1 : 0
    }
  }
})