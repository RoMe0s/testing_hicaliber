<template>
  <div>
    <h1 class="text-center">
      Cool header
    </h1>

    <hr>

    <form-component></form-component>
  </div>
</template>
<script>
import FormComponent from './building/FormComponent';

export default {
  components: {
    FormComponent,
  }
}
</script>