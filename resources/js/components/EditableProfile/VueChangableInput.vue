<template>
  <div>
    <vue-profile-data-label :name="name">
      <span v-if="!editing">{{ text }}</span>
      <vue-input v-else :name="name" :value="text" @keyup="$emit('keyup', $event)"/>
    </vue-profile-data-label>
  </div>
</template>

<script>
import VueInput from "../VueInput";
import VueProfileDataLabel from "../VueProfileDataLabel";

export default {
  components: {VueProfileDataLabel, VueInput},

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
}
</script>