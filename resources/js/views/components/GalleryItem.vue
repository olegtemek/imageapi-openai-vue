<template>
  <div class="gallery__item" v-if="loaded">
    <img :src="imgSrc" :alt="props.title" />
    <h2>{{ props.title }}</h2>
    <span>{{ props.day }}</span>
  </div>
  <div v-else class="gallery__item loading">
    <div></div>
    <h2></h2>
    <span></span>
  </div>
</template>



<script setup>
import { ref } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";

const props = defineProps({
  url: String,
  title: String,
  day: String,
});

const imgSrc = ref(null);
const loaded = ref(false);
onMounted(() => {
  let imageLoading = new Image();
  imageLoading.src = "/storage/" + props.url;

  imageLoading.onload = () => {
    imgSrc.value = imageLoading.src;
    loaded.value = true;
  };
});
</script>

<style lang="scss" scoped>
.gallery__item {
  width: 300px;
  height: 380px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-direction: column;
  border-radius: $br;
  border: 1px solid $blue-dark;
  padding: 10px;

  &.loading {
    > div {
      display: block;
      width: 100%;
      height: 80%;
      background-color: darken($white, 60);
      border-radius: $br;
    }
    h2 {
      display: block;
      width: 70%;
      height: 2%;
      background-color: darken($white, 60);
      border-radius: $br;
    }
    span {
      display: block;
      width: 60%;
      height: 6%;
      background-color: darken($white, 60);
      border-radius: $br;
    }
  }

  @media (max-width: 1280px) {
    width: 240px;
  }
  @media (max-width: 800px) {
    max-width: 100%;
  }
  img {
    width: 100%;
    border-radius: $br;
    object-fit: cover;
  }
  h2 {
    padding-top: 20px;
    font-size: 18px;
    font-weight: $fw-medium;
    color: $blue;
    padding-bottom: 6px;
  }
}
</style>