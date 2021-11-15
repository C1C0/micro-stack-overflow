<template>
  <div>
    <p>{{ name | capitalize }}:
      <slot></slot>
    </p>
  </div>
</template>

<script>
export default {
  props:{
    name: {
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