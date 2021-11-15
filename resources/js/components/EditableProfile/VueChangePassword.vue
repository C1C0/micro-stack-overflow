<template>
  <div>

    <vue-button @click="changePassword=true" v-if="!changePassword">Change Password</vue-button>

    <div v-if="changePassword" class="mt-4">
      <p>New password:
        <vue-input type="password" name="password" @keyup="user.password = $event.target.value"/>
      </p>
      <p>Retype new password:
        <vue-input type="password" name="password2" @keyup="user.password2 = $event.target.value"/>
      </p>

      <vue-button @click="savePassword">Save password</vue-button>
    </div>

  </div>
</template>

<script>
import VueButton from "../VueButton";
import VueInput from "../VueInput";

export default {
  components: {VueButton, VueInput},
  props: {
    user: {
      required: true,
    }
  },
  data() {
    return {
      changePassword: false,
    }
  },

  methods: {
    savePassword() {
      this.user.update({
        password: this.user.password,
        password2: this.user.password2,
      }).then(() => {
        this.user.password = '';
        this.user.password2 = '';
        this.changePassword = false;
      });
    },
  }
}
</script>