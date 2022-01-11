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
                            <h2 class="title is-2">
                                {{
                                    publicUser.first_name +
                                    " " +
                                    publicUser.last_name
                                }}
                            </h2>
                            <h4 class="title is-4">{{ publicUser.email }}</h4>
                        </div>
                    </div>
                    <!-- Please do not indent in another way-->
                    <div class="box">{{ publicUser.description }}</div>
                    <a class="button is-light" href="/updateUser" v-if="user.id == publicUser.id"> Modify Profile </a>
                </div>

                <div class="column">
                    <h2 class="title is-2">Public Albums :</h2>
                    <div
                        v-show="publicAlbums.length > 0"
                        class="columns is-multiline"
                    >
                        <div v-for="n in 4" :key="n" class="column is-half">
                            <CardAlbum
                                title="Vacances a Rome"
                                username="Bedric Sila"
                                thumbnail="https://picsum.photos/600/400"
                            />
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
    white-space: pre-wrap;
    box-shadow: none;
    border: 1px solid rgba(0,0,0,.15);
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
    props: ["publicUser", "publicAlbums", "user"],
};
</script>
