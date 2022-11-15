<template>
  <div class="page">
    <TheHeader />
    <router-view :key="$route.path" />
  </div>
</template>



<script setup>
import TheHeader from "@/views/components/TheHeader.vue";
</script>

<style lang="scss" scoped>
.page {
  padding-bottom: 100px;
}
</style>