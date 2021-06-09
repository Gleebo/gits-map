<template>
  <div>
    <span>id</span>
    <input type="text" v-model="description">
    <button>Remove</button>
  </div>
</template>
<script>
import { mapState } from "vuex"
export default {
  computed: mapState(['']),
  methods: {
    handleChange(event) {
      console.log(event.target.value);
    }
  }
}
</script>