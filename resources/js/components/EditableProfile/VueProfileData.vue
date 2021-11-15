<template>
  <div>
    <vue-changeable-input name="username" :editing="editing" :text="user.username"></vue-changeable-input>
    <vue-changeable-input name="email" :editing="editing" :text="user.email"></vue-changeable-input>
    <vue-button @click="changePassword = true">Change Password</vue-button>


    <div v-if="changePassword" class="mt-4">
      <p>New password:
        <vue-input/>
      </p>
      <p>Retype new password:
        <vue-input/>
      </p>

      <vue-button>Save password</vue-button>
    </div>
  </div>
</template>

<script>
import VueChangeableInput from './VueChangableInput';
import VueInput from "../VueInput";
import VueButton from "../VueButton";

export default {
  components: {VueChangeableInput, VueInput, VueButton},
  props: {
    user: {
      required: true,
    },

    editing: {
      default: false,
    },
  },
  data() {
    return {
      changePassword: false,
    }
  }
}
</script>

<style lang="scss"></style>