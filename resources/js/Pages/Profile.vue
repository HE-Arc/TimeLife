<template>
    <div>
        <Head title="Profile" />
        <Menu />
        <section>
            <div class="columns">
                <div class="column">
                    <div class="container">
                        <img src="http://placekitten.com/g/200/200" />
                        <div>
                            <h2 class="title is-2">Prenom nom</h2>
                            <h4 class="title is-4">email@email.com</h4>
                        </div>
                    </div>
                    <div class="box">
                        This is a sample of a description. <br />
                        Please insert here what you want
                    </div>
                </div>

                <div class="column">
                    <h2 class="title is-2">Public Albums :</h2>
                    <div
                        v-show="publicAlbums.length == 0"
                        class="columns is-multiline"
                    >
                        <div v-for="n in 4" :key="n" class="column is-half">
                            <CardAlbum />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <Footer />
    </div>
</template>
<style scoped lang="scss">
img {
    max-width: 200px;
    border-radius: 50%;
    padding-right: 1rem;
}
.container {
    display: flex;
    align-items: center;
}

.columns {
    padding: 2rem;
}

.box {
    margin-top: 1rem;
}
</style>
<script>
import { Head, Link } from "@inertiajs/inertia-vue";
import Menu from "../Component/Menu.vue";
import CardAlbum from "../Component/CardAlbum";
import Footer from "../Component/Footer.vue";

export default {
    components: {
        Link,
        Head,
        Menu,
        Footer,
        CardAlbum,
    },
    props: ["publicAlbums"],
};
</script>
