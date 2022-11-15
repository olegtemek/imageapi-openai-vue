<template>
  <div class="main">
    <div class="container">
      <div class="main__wrapper">
        <Intro />
        <AddWords />
        <Gallery />
      </div>
    </div>
  </div>
</template>



<script setup>
import Intro from "@/views/components/Intro.vue";
import AddWords from "@/views/components/AddWords.vue";
import Gallery from "@/views/components/Gallery.vue";
</script>

<style lang="scss" scoped>
.main {
  padding-top: 80px;
}
</style>