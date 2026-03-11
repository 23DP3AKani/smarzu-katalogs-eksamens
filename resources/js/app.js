import './bootstrap';
import { createApp } from 'vue';

// Vuetify
import 'vuetify/styles';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import '@mdi/font/css/materialdesignicons.css';

// Component
import Catalog from './components/Catalog.vue';

const vuetify = createVuetify({
  components,
  directives,
});

const app = createApp(Catalog);
app.use(vuetify);
app.mount('#app');