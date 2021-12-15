<template>
    <b-navbar class="is-dark">
        <template #brand>
            <b-navbar-item tag="router-link" :to="{ path: '/' }">
                <img
                    src="/img/logo_tmp.png"
                    alt="TimeLife, a photo album in a timeline format"
                >
            </b-navbar-item>
        </template>
        <template #start v-if="user">
            <b-navbar-item href="#">
                Albums
            </b-navbar-item>
            <b-navbar-item href="/profil">
                Profil
            </b-navbar-item>
        </template>

        <template #end>
            <b-navbar-item tag="div" >
                <div v-if="user">
                    <div>
                        Bonjour {{ user.first_name }}
                    </div>
                    <div class="buttons">
                        <a class="button is-primary" href="/logout">
                            <strong>Log out</strong>
                        </a>
                    </div>
                </div>
                <div class="buttons" v-else>
                    <a class="button is-primary" href="/users">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light" href="/login">
                        Log in
                    </a>
                </div>
            </b-navbar-item>
        </template>
    </b-navbar>
</template>
<script>
export default {
  computed: {
    user() {
      return this.$page.props.user
    }
  }
}
</script>
