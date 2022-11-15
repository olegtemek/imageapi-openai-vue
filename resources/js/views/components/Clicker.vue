<template>
  <div class="clicker">
    <h3>Clicker based on LocalStorage</h3>
    <div class="clicker__wrapper">
      <button
        class="btn"
        @click="upScore"
        :class="store.getScoreOddOrEven ? 'left' : 'right'"
      >
        Click
      </button>
      <p>Your score: {{ store.getScore }}</p>
    </div>
  </div>
</template>



<script setup>
import { useClickerStore } from "@/store/clickerStore.js";

const store = useClickerStore();
const upScore = () => {
  store.upScore();
};
</script>

<style lang="scss" scoped>
.clicker {
  max-width: 320px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  h3 {
    font-size: 18px;
    font-weight: $fw-medium;

    @media (max-width: 340px) {
      font-size: 16px;
    }
  }

  &__wrapper {
    padding-top: 10px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;

    button {
      &.left {
        transform: rotate(-4deg);
      }
      &.right {
        transform: rotate(4deg);
      }
    }
  }
}
</style>