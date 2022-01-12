<template>
    <b-navbar class="is-dark">
        <template #brand>
            <b-navbar-item :href="route('home')" >
                <img
                    src="/img/logo_tmp.png"
                    alt="TimeLife, a photo album in a timeline format"
                />
            </b-navbar-item>
        </template>
        <template #start v-if="authUser !== null">
            <b-navbar-item :href="route('albums.index')">
                Albums
            </b-navbar-item>
            <b-navbar-item :href="route('users.show', authUser.id)">
                Profile
            </b-navbar-item>
        </template>

        <template #end>
            <b-navbar-item tag="div" v-if="authUser !== null">
                Bonjour {{ authUser.first_name }}
            </b-navbar-item>
            <b-navbar-item tag="div" v-if="authUser !== null">
                <div class="buttons">
                    <a class="button is-primary" :href="route('logout')">
                        <strong>Log out</strong>
                    </a>
                </div>
            </b-navbar-item>
            <b-navbar-item tag="div" v-else>
                <div class="buttons">
                    <a class="button is-primary" :href="route('users.create')">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light" :href="route('login')"> Log in </a>
                </div>
            </b-navbar-item>
        </template>
    </b-navbar>
</template>
<script>
export default {
    computed: {
        authUser() {
            return this.$page.props.auth.user;
        },
    },
};
</script>
