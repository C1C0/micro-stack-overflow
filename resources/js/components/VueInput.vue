<template>
  <input :type="type" class="bg-primary bg-opacity-10 border-0" :value="value" :name="name" @input="$emit('keyup', $event)">
</template>

<script>
export default {
  props: {
    type: {
      default: 'text',
    },

    value: {
      default: '',
    },

    name: {
      required: true,
    }
  }
}
</script>