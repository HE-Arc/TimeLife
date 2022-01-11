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
                    <a class="button is-primary" :href="route('updateView')" v-if="user.id == publicUser.id"><strong> Modify Profile </strong></a>
                </div>

                <div class="column">
                    <h2 class="title is-2">Public Albums :</h2>
                    <div
                        v-show="publicAlbums.length > 0"
                        class="columns is-multiline"
                    >
                        <div
                            v-for="album in publicAlbums"
                            :key="album.id"
                            class="column is-half"
                        >
                            <CardAlbum
                                :title="album.name"
                                :username="
                                    album.first_name + ' ' + album.last_name
                                "
                                :thumbnail="publicAlbumsThumbnails[album.id]"
                                :link="route('album.gallery', album.id)"
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
    border: 1px solid rgba(0, 0, 0, 0.15);
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
    
    props: ["publicUser", "publicAlbums", "user", "publicAlbumsThumbnails"],

};
</script>
