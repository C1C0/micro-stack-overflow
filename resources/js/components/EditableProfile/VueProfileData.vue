<template>
  <div>
    <vue-changeable-input name="username" :editing="editing" :text="user.username"
                          @keyup="user.username = $event.target.value"></vue-changeable-input>
    <vue-changeable-input name="email" :editing="editing" :text="user.email"
                          @keyup="user.email = $event.target.value"></vue-changeable-input>
    <vue-change-password :user="user"/>
  </div>
</template>

<script>
import VueChangeableInput from './VueChangableInput';
import VueInput from "../VueInput";
import VueButton from "../VueButton";
import VueChangePassword from "./VueChangePassword";

export default {
  components: {VueChangeableInput, VueInput, VueButton, VueChangePassword},

  props: {
    user: {
      required: true,
    },
    editing: {
      default: false,
    }
  },

  data() {
    return {
      changePassword: false,
    }
  },
}
</script>

<style lang="scss"></style>