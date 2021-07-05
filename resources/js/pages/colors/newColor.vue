<template>
  <div class="col-md-12">
    <h2>
      <button
        type="button"
        @click="hasHistory() ? $router.go(-1) : $router.push('/')"
        class="btn btn-outline-error"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="30"
          height="30"
          fill="currentColor"
          class="bi bi-arrow-left-circle"
          viewBox="0 0 16 16"
        >
          <path
            fill-rule="evenodd"
            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"
          />
        </svg>
      </button>
      Añadir nuevo color:
    </h2>
    <div class="col-md-12 card card-container">
      <div class="col-md-12">
        <form @submit.prevent="create" @keydown="form.onKeydown($event)">
          <alert-success
            :form="form"
            message="¡El nuevo color fue creado con exito!"
          />
          <div class="form-group">
            <label for="inputColorName">Nombre:</label>
            <input
              type="text"
              class="form-control"
              id="inputColorName"
              placeholder="Ej: Amarillo"
              v-model="form.name"
              :class="{ 'is-invalid': form.errors.has('name') }"
            />
            <has-error :form="form" field="name" />
            <small class="form-text text-muted"
              >Nombre del nuevo color que desea añadir.</small
            >
          </div>
          <div class="form-group">
            <label for="inputColorHex">Color: </label>
            <input
              type="text"
              class="form-control"
              id="inputColorHex"
              placeholder="Ej: #0000"
              v-model="form.color"
              :class="{ 'is-invalid': form.errors.has('color') }"
            />
            <has-error :form="form" field="color" />
            <small class="form-text text-muted">Color en Hexadecimal.</small>
          </div>
          <div class="form-group">
            <label for="inputColorPantone">Pantone: </label>
            <input
              type="text"
              class="form-control"
              id="inputColorPantone"
              placeholder="Ej: 13-1106"
              v-model="form.pantone"
              :class="{ 'is-invalid': form.errors.has('pantone') }"
            />
            <has-error :form="form" field="pantone" />
          </div>
          <div class="form-group">
            <label for="inputColorYear">Año: </label>
            <input
              type="text"
              class="form-control"
              id="inputColorYear"
              placeholder="Ej: 2020"
              v-model="form.year"
              :class="{ 'is-invalid': form.errors.has('year') }"
            />
            <has-error :form="form" field="year" />
          </div>
          <v-button :loading="form.busy" type="success"> Crear </v-button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Form from "vform";

export default {
  middleware: "admin",
  data: () => ({
    form: new Form({
      name: "",
      color: "",
      pantone: "",
      year: null,
    }),
  }),

  methods: {
    async create() {
      const { data } = await this.form.post("/api/colores");

      if (data.success) {
        this.form.name = "";
        this.form.color = "";
        this.form.pantone = "";
        this.form.year = "";
      }

      console.log(data);
    },

    hasHistory() {
      return window.history.length > 2;
    },
  },
};
</script>

<style>
.card-container {
  padding: 3%;
}
</style>