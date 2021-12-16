<template>
    <div>
    <Head title="Profil" />
    <Menu />
    <section>
        <div class="box">
            Nom - Prenom : {{ user.last_name }} {{ user.first_name }}
        </div>
    </section>
    <Footer />
    </div>
</template>
<script>

import { Head, Link } from "@inertiajs/inertia-vue";
import Menu from '../Component/Menu.vue';
import Footer from '../Component/Footer.vue';

export default {
    components: {
        Link,
        Head,
        Menu,
        Footer
    },
  computed: {
    user() {
      return this.$page.props.user
    }
  }
}
</script>
