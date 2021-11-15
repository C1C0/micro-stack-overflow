<template>
  <div>
    <p>{{ name | capitalize }}:
      <span v-if="!editing">{{ text }}</span>
      <vue-input v-else :name="name" :value="text"/>
    </p>
  </div>
</template>

<script>
import VueInput from "./VueInput";

export default {
  components: {VueInput},

  props: {
    editing: {
      default: false,
    },

    name: {
      required: true,
    },

    text: {
      required: true,
    }
  },

  filters: {
    capitalize(text) {
      return text.charAt(0).toUpperCase() + text.slice(1);
    }
  }
}
</script>