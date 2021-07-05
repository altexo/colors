<template>
  <div class="col-md-12">
     <router-link :to="{ name: 'newColor' }"  v-if="this.role === 1">
       <button class="btn btn-primary btn-sm">Añadir color <i class="bi bi-plus-lg"> </i></button>
     </router-link>
    <div class="col-md-12 row">
      <div
        class="col-md-4 mt-1 no-padding"
        v-for="color in colors.data"
        v-bind:key="color.id"
      >
        <color
          @deleted="onColorDelete"
          :colorName="color.name"
          :colorHex="color.color"
          :pantone="color.pantone"
          :year="color.year"
          :id="color.id"
        >
        </color>
      </div>
    </div>

    <nav class="pagination-nav">
      <ul class="pagination row justify-content-between">
        <li class="page-item">
          <a href="#" class="" @click.prevent="getPreviousPage">
            <button
              type="button"
              class="btn btn-lg btn-link"
              :disabled="!colors['prev_page_url']"
              aria-hidden="true"
            >
              <i class="bi bi-chevron-left"></i>
              Anterior
            </button>
          </a>
        </li>

        <li class="page-item">
          <a href="#" class="" @click.prevent="getNextPage">
            <button
              type="button"
              class="btn btn-lg btn-link"
              :disabled="!colors['next_page_url']"
              aria-hidden="true"
            >
              Siguiente <i class="bi bi-chevron-right"></i>
            </button>
          </a>
        </li>
      </ul>
    </nav>


  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      role: this.$store.state.auth.user.role_id,
      colors: null,
    };
  },

  middleware: "auth",

  metaInfo() {
    return { title: "home" };
  },
  mounted() {
    this.getColors();
  },

  methods: {
    getColors() {
      axios
        .get("/api/colores")
        .then((response) => {
          (this.colors = response.data.data),
            console.log("COLORES", this.colors);
        })
        .catch((err) => console.log(err));
    },

    getPage(page) {
      axios.get("/api/colores?page=" + page).then((response) => {
        this.colors = response.data.data;
      });
    },

    getPreviousPage() {
      axios.get(this.colors["prev_page_url"]).then((response) => {
        this.colors = response.data.data;
      });
    },
    getNextPage() {
      axios.get(this.colors["next_page_url"]).then((response) => {
        this.colors = response.data.data;
      });
    },
    onColorDelete(value) {

      for (var i = this.colors.data.length - 1; i >= 0; --i) {

        if (this.colors.data[i].id === value) {
          this.colors.data.splice(i, 1);
        }
      }
    },
  },
};
</script>
<style >
.no-padding {
  padding-right: 2px;
  padding-left: 2px;
}
.pagination-nav {
  width: 100%;
}
</style>