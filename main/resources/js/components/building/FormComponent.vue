<template>
  <div class="container">

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input name="name" v-model="name" class="form-control" placeholder="Name">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <input type="number" min="0" name="price_from" v-model="price_from" class="form-control" placeholder="Price from">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <input type="number" min="0" name="price_to" v-model="price_to" class="form-control" placeholder="Price to">
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <input type="number" min="0" name="bedrooms" v-model="bedrooms" class="form-control" placeholder="Bedrooms">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <input type="number" min="0" name="bathrooms" v-model="bathrooms" class="form-control" placeholder="Bathrooms">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <input type="number" min="0" name="storeys" v-model="storeys" class="form-control" placeholder="Storeys">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <input type="number" min="0" name="garages" v-model="garages" class="form-control" placeholder="Garages">
            </div>
          </div>
        </div>
      </div>

      <div class="card-footer text-right">
        <button class="btn btn-primary" @click="cleanFilters" :disabled="loading">
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" v-if="loading"></span>
          <span class="sr-only" v-if="loading">Loading...</span>
          Clean filters
        </button>
        <button class="btn btn-success" @click="doLoadBuildings" :disabled="loading">
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" v-if="loading"></span>
          <span class="sr-only" v-if="loading">Loading...</span>
          Search
        </button>
      </div>
    </div>

    <table-component class="mt-3"></table-component>
  </div>
</template>
<script>
import TableComponent from './TableComponent';
import {mapActions} from 'vuex';
import Swal from 'sweetalert2'

export default {
  beforeCreate() {
    this.subscriber = this.$store.subscribeAction({
      after: (action, state) => {
        if (action.type === 'loadBuildings') {
          if (!state.buildings.length) {
            Swal.fire('No records found!', '', 'warning');
          }
        }
      }
    });
  },
  created() {
    this.loadBuildings();
  },
  beforeDestroy() {
    // Unsubscribe the action
    if (this.subscriber) {
      this.subscriber();
    }
  },
  components: {
    TableComponent,
  },
  data() {
    return {
      name: null,
      price_from: null,
      price_to: null,
      bedrooms: null,
      bathrooms: null,
      storeys: null,
      garages: null,

      subscriber: null,
      loading: false,
    };
  },
  methods: {
    cleanFilters() {
      this.name = null;
      this.price_from = null;
      this.price_to = null;
      this.bedrooms = null;
      this.bathrooms = null;
      this.storeys = null;
      this.garages = null;

      this.loadBuildings().finally(() => this.loading = false);
},
    doLoadBuildings() {
      this.loading = true;

      this.loadBuildings({
        name: this.name,
        price_from: this.price_from,
        price_to: this.price_to,
        bedrooms: this.bedrooms,
        bathrooms: this.bathrooms,
        storeys: this.storeys,
        garages: this.garages,
      }).catch(error => {
        if (error.response.status === 422) {
          let errorMsg = [];

          for (const field of Object.keys(error.response.data.errors)) {
            errorMsg.push(error.response.data.errors[field].join(', '));
          }

          Swal.fire(error.response.data.message, errorMsg.join('<br>'), 'error');
        } else {
          Swal.fire('An error occurred.', '', 'error');
        }
      }).finally(() => this.loading = false);
    },
    ...mapActions([
      'loadBuildings',
    ])
  }
}
</script>