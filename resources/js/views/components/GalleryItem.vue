<template>
  <div class="gallery__item" v-if="loaded">
    <img :src="imgSrc" :alt="props.title" />
    <h2>{{ props.title }}</h2>
    <span>{{ props.day }}</span>
  </div>
  <div v-else class="gallery__item loading">
    <div><div class="skeleton"></div></div>
    <h2><div class="skeleton"></div></h2>
    <span><div class="skeleton"></div></span>
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
      position: relative;
    }
    h2 {
      position: relative;
      display: block;
      width: 70%;
      height: 2%;
      background-color: darken($white, 60);
      border-radius: $br;
    }
    span {
      position: relative;
      display: block;
      width: 60%;
      height: 6%;
      background-color: darken($white, 60);
      border-radius: $br;
    }
    .skeleton {
      width: 0;
      height: 100%;
      box-shadow: 0 0 50px 2px rgba(160, 160, 160, 0.5);
      animation: skeleton 1.4s linear infinite;
      position: absolute;
      left: 0%;
      top: 0;
    }

    @keyframes skeleton {
      0% {
        left: 0%;
        opacity: 0;
      }

      20% {
        opacity: 0;
      }

      50% {
        left: 50%;
        opacity: 1;
      }

      100% {
        left: 100%;
        opacity: 0;
      }
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
