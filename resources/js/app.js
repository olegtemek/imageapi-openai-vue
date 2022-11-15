import './bootstrap';

import App from '@/views/App.vue'
import { createApp } from 'vue';
import router from '@/router/router.js'
import { createPinia } from 'pinia'
const pinia = createPinia()


const app = createApp(App)


app
  .use(pinia)
  .use(router)
  .mount('#app')