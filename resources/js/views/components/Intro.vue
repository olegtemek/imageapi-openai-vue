<template>
  <div class="intro">
    <div class="intro__wrapper">
      <p>
        In this case, I would like to learn more about cron entries and improve
        API work on Vue composition api and Laravel
      </p>

      <Clicker />
    </div>
  </div>
</template>



<script setup>
import Clicker from "@/views/components/Clicker.vue";
</script>

<style lang="scss" scoped>
.intro {
  &__wrapper {
    p {
      font-size: 18px;
      text-align: center;
      max-width: 90%;
      margin: 0 auto;
      padding-bottom: 20px;
    }
  }
}
</style>