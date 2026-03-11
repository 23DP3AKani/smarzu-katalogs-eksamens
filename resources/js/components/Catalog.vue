<template>
  <v-app>
    <v-app-bar color="black" dark>
      <v-toolbar-title class="font-weight-bold text-uppercase">Smaržu Katalogs</v-toolbar-title>
      <v-spacer></v-spacer>
      
      <v-text-field
        v-model="search"
        @input="fetchPerfumes"
        append-inner-icon="mdi-magnify"
        label="Meklēt smaržas vai zīmolu..."
        single-line
        hide-details
        density="compact"
        class="mr-4"
        style="max-width: 300px;"
        variant="solo-filled"
      ></v-text-field>

      <template v-if="!user">
        <v-btn href="/login" variant="text" class="text-none font-weight-bold">Ienākt</v-btn>
        <v-btn href="/register" variant="outlined" color="white" class="ml-2 text-none font-weight-bold">Reģistrēties</v-btn>
      </template>
      <template v-else>
        <span class="mr-4 text-subtitle-2 text-grey-lighten-1">Sveiki, {{ user.name }}!</span>
        <v-btn @click="logout" variant="text" color="red-lighten-1" class="text-none font-weight-bold">Iziet</v-btn>
      </template>
    </v-app-bar>

    <v-main class="bg-grey-lighten-4">
      <v-container>
        <v-row>
          <v-col cols="12" md="3">
            <v-card class="pa-4 rounded-lg" elevation="2">
              <h3 class="text-h6 mb-3 font-weight-bold">Filtri</h3>
              
              <v-divider class="mb-3"></v-divider>
              <h4 class="text-subtitle-1 font-weight-bold mb-2">Kam paredzēts:</h4>
              <v-checkbox v-model="filters.gender" label="Sievietēm" value="sievietēm" hide-details density="compact" @change="fetchPerfumes"></v-checkbox>
              <v-checkbox v-model="filters.gender" label="Vīriešiem" value="vīriešiem" hide-details density="compact" @change="fetchPerfumes"></v-checkbox>
              <v-checkbox v-model="filters.gender" label="Unisex" value="unisex" hide-details density="compact" @change="fetchPerfumes"></v-checkbox>

              <v-divider class="my-4"></v-divider>
              <h4 class="text-subtitle-1 font-weight-bold mb-2">Sezona:</h4>
              <v-checkbox v-model="filters.season" label="Vasarai" value="vasarai" hide-details density="compact" @change="fetchPerfumes"></v-checkbox>
              <v-checkbox v-model="filters.season" label="Ziemai" value="ziemai" hide-details density="compact" @change="fetchPerfumes"></v-checkbox>
              <v-checkbox v-model="filters.season" label="Pavasarim" value="pavasarim" hide-details density="compact" @change="fetchPerfumes"></v-checkbox>
              <v-checkbox v-model="filters.season" label="Rudenim" value="rudenim" hide-details density="compact" @change="fetchPerfumes"></v-checkbox>
              <v-checkbox v-model="filters.season" label="Vissezonas" value="vissezonas" hide-details density="compact" @change="fetchPerfumes"></v-checkbox>
            </v-card>
          </v-col>

          <v-col cols="12" md="9">
            <v-row>
              <v-col v-for="perfume in perfumes" :key="perfume.id" cols="12" sm="6" md="4">
                <v-card hover class="rounded-lg h-100 d-flex flex-column">
                  <v-img :src="perfume.image_url" height="250px" cover></v-img>
                  <v-card-title class="text-h6 font-weight-bold pb-1">{{ perfume.name }}</v-card-title>
                  <v-card-subtitle class="text-subtitle-1 text-grey-darken-1 pt-0">{{ perfume.brand }}</v-card-subtitle>
                  <v-card-text class="flex-grow-1">
                    {{ perfume.short_description }}
                  </v-card-text>
                  <v-divider></v-divider>
                  <v-card-actions class="pa-3">
                    <v-chip size="small" color="black" class="mr-2 text-uppercase">{{ perfume.gender }}</v-chip>
                    <v-chip size="small" color="grey-darken-2" variant="outlined" class="text-uppercase">{{ perfume.season }}</v-chip>
                  </v-card-actions>
                </v-card>
              </v-col>
            </v-row>
            
            <v-alert v-if="perfumes.length === 0" type="info" variant="tonal" class="mt-4">
              Diemžēl pēc Jūsu kritērijiem nekas netika atrasts. Pamēģiniet mainīt filtrus!
            </v-alert>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      search: '',
      filters: {
        gender: [],
        season: []
      },
      perfumes: [],

      user: window.authUser 
    };
  },
  mounted() {
    this.fetchPerfumes();
  },
  methods: {
    async fetchPerfumes() {
      try {
        const response = await axios.get('/api/perfumes', {
          params: { search: this.search, gender: this.filters.gender, season: this.filters.season }
        });
        this.perfumes = response.data;
      } catch (error) {
        console.error("Kļūda:", error);
      }
    },
    // viesis
    async logout() {
      try {
        await axios.post('/logout');
        window.location.reload();
      } catch (error) {
        console.error("Kļūda izejot:", error);
      }
    }
  }
};
</script>