<template>
  <div class="words">
    <div class="words__left">
      <h2>
        You can add 2 words, max size words = 40 word, in the response send 2
        random words
      </h2>
      <div class="words__left-wrapper">
        <label :class="store.getErrors.first ? 'error' : ''">
          <p>
            First word <span>{{ store.getErrors.first }}</span>
          </p>
          <input type="text" v-model.trim="words.first" />
        </label>
        <label :class="store.getErrors.second ? 'error' : ''">
          <p>
            Second word <span>{{ store.getErrors.second }}</span>
          </p>
          <input type="text" v-model.trim="words.second" />
        </label>
      </div>
      <Transition name="show">
        <button
          @click="storeWords"
          class="btn"
          v-if="words.first || words.second"
        >
          Save
        </button>
      </Transition>
    </div>

    <div class="words__right" v-if="store.getWords">
      <h2>All words like array</h2>
      <p>
        {{ store.getWords }}
      </p>
    </div>
  </div>
</template>



<script setup>
import { ref } from "@vue/reactivity";
import { useWordStore } from "@/store/wordStore.js";
import { onMounted } from "@vue/runtime-core";
const words = ref({
  first: null,
  second: null,
});
const store = useWordStore();
const storeWords = () => {
  store.storeWords(words.value);
  words.value.first = null;
  words.value.second = null;
};

onMounted(() => {
  store.fetchWords();
});
</script>

<style lang="scss" scoped>
.words {
  padding-top: 40px;
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  flex-direction: row;
  @media (max-width: 800px) {
    flex-direction: column-reverse;
  }

  &__left {
    display: flex;
    align-items: center;
    flex-direction: column;
    padding-bottom: 60px;
    position: relative;
    max-width: 500px;
    @media (max-width: 1024px) {
      max-width: 300px;
    }
    @media (max-width: 800px) {
      max-width: 100%;
      padding-top: 60px;
    }
    h2 {
      text-align: center;
    }
    button {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translate(-50%, 0%);
    }

    &-wrapper {
      padding-top: 20px;
      display: flex;
      justify-content: space-between;
      @media (max-width: 1024px) {
        flex-direction: column;
      }

      label {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-right: 20px;

        @media (max-width: 1024px) {
          margin-right: 0;
          margin-bottom: 20px;
          &:last-child {
            margin-bottom: 0;
          }
        }

        &.error {
          input {
            border: 1px solid red;
          }
        }
        p {
          padding-bottom: 20px;
          color: $blue;
          position: relative;
          span {
            position: absolute;
            bottom: 4px;
            width: 100px;
            color: red;
            font-size: 14px;
          }
        }
        input {
          border-radius: $br;
          background: transparent;
          border: 1px solid $blue-dark;
          padding: 10px 20px;
          color: $white;
          transition: $tr;

          &:focus {
            transform: scale(1.05);
          }
        }
        &:last-child {
          margin-right: 0;
        }
      }
    }
  }

  &__right {
    max-width: 600px;
    @media (max-width: 1280px) {
      max-width: 400px;
    }
    @media (max-width: 1024px) {
      max-width: 300px;
    }
    @media (max-width: 800px) {
      max-width: 100%;
    }
    h2 {
      padding-bottom: 10px;
    }
  }
}
</style>