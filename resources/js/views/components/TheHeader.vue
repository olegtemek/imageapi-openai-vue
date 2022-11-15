<template>
  <header class="header">
    <div class="container">
      <div class="header__wrapper">
        <div class="header__logo">
          <h1>ImageApi <span>based on OpenAi API</span></h1>
        </div>
        <div class="header__right">🖤</div>
      </div>
    </div>
  </header>
</template>



<script setup>
</script>

<style lang="scss" scoped>
.header {
  padding: 40px 0;
  background-color: $second;
  &__wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  &__logo {
    h1 {
      font-size: 24px;
      font-weight: $fw-medium;
      position: relative;
      color: $blue;
      span {
        color: $blue-dark;
        position: absolute;
        top: 100%;
        left: 40%;
        width: 160px;
        font-size: 16px;
        font-weight: $fw-light;
      }
    }
  }
}
</style>