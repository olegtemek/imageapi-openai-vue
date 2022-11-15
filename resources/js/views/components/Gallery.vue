<template>
  <div class="gallery">
    <h2>All images</h2>
    <div class="gallery__wrapper" v-if="store.getImages">
      <GalleryItem
        v-for="item of store.getImages"
        :key="item.id"
        :title="item.title"
        :day="item.day"
        :url="item.url"
      />
    </div>
  </div>
</template>



<script setup>
import { useImageStore } from "@/store/imageStore.js";
import { onMounted } from "@vue/runtime-core";
import GalleryItem from "@/views/components/GalleryItem.vue";

const store = useImageStore();
onMounted(() => {
  store.fetchImages();
});
</script>

<style lang="scss" scoped>
.gallery {
  padding-top: 40px;
  h2 {
    text-align: center;
    padding-bottom: 40px;
    font-size: 24px;
    font-weight: $fw-medium;
  }
  &__wrapper {
    display: flex;
    align-items: center;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 40px 40px;
  }
}
</style>