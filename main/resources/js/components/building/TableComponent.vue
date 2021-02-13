<template>
  <div class="card">
    <div class="card-header">
      <span class="card-title">
        Buildings
      </span>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>
            Name
          </th>
          <th>
            Price
          </th>
          <th>
            Bedrooms
          </th>
          <th>
            Bathrooms
          </th>
          <th>
            Storeys
          </th>
          <th>
            Garages
          </th>
        </tr>
        </thead>

        <tbody>
        <tr v-for="building in buildings">
          <td>
            {{ building.name }}
          </td>
          <td>
            {{ building.price | money }}
          </td>
          <td>
            {{ building.bedrooms }}
          </td>
          <td>
            {{ building.bathrooms }}
          </td>
          <td>
            {{ building.storeys }}
          </td>
          <td>
            {{ building.garages }}
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
  computed: {
    ...mapGetters({
      buildings: 'getBuildings',
    })
  },
  filters: {
    money: function (value) {
      if (isNaN(value)) return;

      return '$' + value.toString();
    }
  }
}
</script>